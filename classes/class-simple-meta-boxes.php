<?php

namespace RealElectronics\Theme;

class SimpleMetaBoxes {

    private $post_type;
    private $meta_box_id;
    private $meta_box_title;
    private $fields;

    private static $assets_enqueued = false;

    /**
     * Constructor.
     *
     * @param string $post_type      The post type this meta box applies to.
     * @param string $meta_box_title Title displayed in the editor.
     * @param array  $fields         Array of meta fields.
     */
    public function __construct($post_type, $meta_box_title, $fields = []) {
        $this->post_type      = $post_type;
        $this->meta_box_title = $meta_box_title;
        $this->meta_box_id    = $this->generate_id($meta_box_title);
        $this->fields         = $fields;

        add_action('add_meta_boxes', [$this, 'add_meta_box']);
        add_action('save_post', [$this, 'save_meta_box']);

        if (!self::$assets_enqueued) {
            add_action('admin_enqueue_scripts', [$this, 'enqueue_assets']);
            self::$assets_enqueued = true;
        }
    }

    public function enqueue_assets() {
        wp_enqueue_media();
        wp_enqueue_script('jquery');
        wp_register_style('simple-meta-boxes-inline', false);
        wp_enqueue_style('simple-meta-boxes-inline');

        wp_add_inline_script('jquery-core', <<<'JS'
            jQuery(function($) {
                function bindImageUploader(context) {
                    context.find('.smb-upload-image').off('click').on('click', function(e) {
                        e.preventDefault();

                        const wrapper = $(this).closest('.smb-image-wrapper');
                        const input = wrapper.find('input[type=hidden]').first();
                        const preview = wrapper.find('img').first();

                        const frame = wp.media({
                            title: 'Select Image',
                            button: { text: 'Use this image' },
                            multiple: false
                        });

                        frame.on('select', function() {
                            const attachment = frame.state().get('selection').first().toJSON();
                            const thumbnail = attachment.sizes && attachment.sizes.thumbnail
                                ? attachment.sizes.thumbnail.url
                                : attachment.url;

                            input.val(attachment.id);

                            if (preview.length) {
                                preview.attr('src', thumbnail);
                            } else {
                                $('<img>', {
                                    src: thumbnail,
                                    css: {
                                        maxWidth: '100%',
                                        height: 'auto',
                                        display: 'block',
                                        marginBottom: '8px'
                                    }
                                }).prependTo(wrapper);
                            }
                        });

                        frame.open();
                    });
                }

                function updateRepeaterIndexes(container) {
                    container.find('.smb-repeatable-row').each(function(index) {
                        $(this).find('[data-smb-base-name]').each(function() {
                            const input = $(this);
                            input.attr('name', input.attr('data-smb-base-name').replace(/__index__/g, index));
                        });
                    });
                }

                bindImageUploader($(document));

                $('.smb-repeatable').each(function() {
                    updateRepeaterIndexes($(this));
                });

                $(document).on('click', '.smb-repeatable-add', function(e) {
                    e.preventDefault();

                    const button = $(this);
                    const fieldWrapper = button.closest('p').prevAll('.smb-repeatable').first();
                    const templateWrapper = button.closest('p').prevAll('.smb-repeatable-template').first();
                    const container = fieldWrapper;
                    const template = templateWrapper.html();
                    const row = $(template);

                    if (!container.length || !template) {
                        return;
                    }

                    container.append(row);
                    updateRepeaterIndexes(container);
                    bindImageUploader(row);
                });

                $(document).on('click', '.smb-repeatable-remove', function(e) {
                    e.preventDefault();

                    const row = $(this).closest('.smb-repeatable-row');
                    const container = row.closest('.smb-repeatable');

                    row.remove();
                    updateRepeaterIndexes(container);
                });

                $(document).on('click', '.smb-remove-image', function(e) {
                    e.preventDefault();

                    const wrapper = $(this).closest('.smb-image-wrapper');
                    wrapper.find('input[type=hidden]').first().val('');
                    wrapper.find('img').first().remove();
                });
            });
        JS);

        wp_add_inline_style('simple-meta-boxes-inline', <<<'CSS'
            .smb-repeatable-row {
                border: 1px solid #dcdcde;
                padding: 12px;
                margin-bottom: 12px;
                background: #fff;
            }

            .smb-repeatable-row p {
                margin-top: 0;
            }

            .smb-image-actions {
                display: flex;
                flex-wrap: wrap;
                gap: 8px;
                margin-top: 8px;
            }

            .smb-repeatable-add {
                margin-top: 8px;
            }

            .smb-repeatable-remove,
            .smb-remove-image {
                color: #b32d2e;
            }
        CSS);
    }

    /**
     * Generate a slug-style ID from the title.
     */
    private function generate_id($title) {
        return sanitize_title($title) . '_meta_box';
    }

    private function has_repeatable_fields() {
        foreach ($this->fields as $field) {
            if (is_array($field) && (($field['type'] ?? '') === 'repeatable')) {
                return true;
            }
        }

        return false;
    }

    public function add_meta_box() {

        add_meta_box(
            $this->meta_box_id,
            $this->meta_box_title,
            [$this, 'render_meta_box'],
            $this->post_type,
            $this->has_repeatable_fields() ? 'normal' : 'side',
            'default'
        );
    }

    private function render_image_field($name, $image_id = 0, $base_name = null) {
        $image_id = intval($image_id);
        $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'thumbnail') : '';

        echo '<div class="smb-image-wrapper">';

        if ($image_url) {
            echo '<img src="' . esc_url($image_url) . '" style="max-width:100%; height:auto; display:block; margin-bottom:8px;" />';
        }

        echo '<input type="hidden"';

        if ($base_name) {
            echo ' data-smb-base-name="' . esc_attr($base_name) . '"';
        }

        echo ' name="' . esc_attr($name) . '" value="' . esc_attr($image_id) . '" />';
        echo '<div class="smb-image-actions">';
        echo '<button class="button smb-upload-image">Choose Image</button>';
        echo '<button class="button button-link-delete smb-remove-image">Remove Image</button>';
        echo '</div>';
        echo '</div>';
    }

    private function render_repeatable_row($key, $subfields, $row = [], $index = '__index__') {
        echo '<div class="smb-repeatable-row">';

        foreach ($subfields as $subfield_key => $subfield) {
            $label = $subfield['label'] ?? $subfield_key;
            $type = $subfield['type'] ?? 'text';
            $value = $row[$subfield_key] ?? '';
            $name = $key . '[' . $index . '][' . $subfield_key . ']';
            $base_name = $key . '[__index__][' . $subfield_key . ']';

            echo '<p>';
            echo '<label><strong>' . esc_html($label) . ':</strong></label><br />';

            switch ($type) {
                case 'image':
                    $this->render_image_field($name, intval($value), $base_name);
                    break;

                default:
                    echo '<input type="text" data-smb-base-name="' . esc_attr($base_name) . '" name="' . esc_attr($name) . '" value="' . esc_attr($value) . '" style="width:100%;" />';
                    break;
            }

            echo '</p>';
        }

        echo '<p><button class="button button-link-delete smb-repeatable-remove">Remove Item</button></p>';
        echo '</div>';
    }

    public function render_meta_box($post) {
        wp_nonce_field($this->meta_box_id . '_nonce', $this->meta_box_id . '_nonce_field');

        foreach ($this->fields as $key => $field) {

            $label = $field['label'] ?? $key;
            $type = $field['type'] ?? 'text';
            $value = get_post_meta($post->ID, $key, true);

            if (!is_array($field)) {
                $label = $field;
                $type = 'text';
                $value = get_post_meta($post->ID, $key, true);
            }

            echo '<p>';
            echo '<label for="' . esc_attr($key) . '"><strong>' . esc_html($label) . ':</strong></label><br />';

            switch ($type) {
                case 'checkbox':
                    echo '<input type="checkbox" id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" value="1" ' . checked($value, '1', false) . ' />';
                    break;

                case 'image':
                    $this->render_image_field($key, intval($value));
                    break;

                case 'repeatable':
                    $subfields = $field['fields'] ?? [];
                    $rows = is_array($value) ? $value : [];

                    echo '</p>';
                    echo '<div class="smb-repeatable">';

                    foreach ($rows as $index => $row) {
                        $this->render_repeatable_row($key, $subfields, is_array($row) ? $row : [], $index);
                    }

                    echo '</div>';
                    echo '<script type="text/html" class="smb-repeatable-template">';
                    $this->render_repeatable_row($key, $subfields);
                    echo '</script>';
                    echo '<p><button class="button button-primary smb-repeatable-add">Add Item</button></p>';
                    break;

                case 'select':
                    $options = $field['options'] ?? [];
                    echo '<select id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" style="width:100%;">';
                    foreach ($options as $option_value => $option_label) {
                        echo '<option value="' . esc_attr($option_value) . '" ' . selected($value, $option_value, false) . '>' . esc_html($option_label) . '</option>';
                    }
                    echo '</select>';
                    break;

                default:
                    echo '<input type="text" id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" value="' . esc_attr($value) . '" style="width:100%;" />';
                    break;
            }

            echo '</p>';
        }
    }

    public function save_meta_box($post_id) {
        if (!isset($_POST[$this->meta_box_id . '_nonce_field']) ||
            !wp_verify_nonce($_POST[$this->meta_box_id . '_nonce_field'], $this->meta_box_id . '_nonce')) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (wp_is_post_revision($post_id)) {
            return;
        }

        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        foreach ($this->fields as $key => $field) {
            $type = $field['type'] ?? 'text';

            if ($type === 'checkbox') {
                $value = isset($_POST[$key]) ? '1' : '0';
                update_post_meta($post_id, $key, $value);
                continue;
            }

            if ($type === 'repeatable') {
                $rows = $_POST[$key] ?? [];
                $subfields = $field['fields'] ?? [];
                $sanitized_rows = [];

                if (is_array($rows)) {
                    foreach ($rows as $row) {
                        if (!is_array($row)) {
                            continue;
                        }

                        $sanitized_row = [];

                        foreach ($subfields as $subfield_key => $subfield) {
                            $subfield_type = $subfield['type'] ?? 'text';
                            $subfield_value = $row[$subfield_key] ?? '';

                            $sanitized_row[$subfield_key] = $subfield_type === 'image'
                                ? absint($subfield_value)
                                : sanitize_text_field($subfield_value);
                        }

                        $has_content = false;

                        foreach ($sanitized_row as $sanitized_value) {
                            if (!empty($sanitized_value)) {
                                $has_content = true;
                                break;
                            }
                        }

                        if ($has_content) {
                            $sanitized_rows[] = $sanitized_row;
                        }
                    }
                }

                update_post_meta($post_id, $key, $sanitized_rows);
                continue;
            }

            if (isset($_POST[$key])) {
                $value = $type === 'image' ? absint($_POST[$key]) : sanitize_text_field($_POST[$key]);
                update_post_meta($post_id, $key, $value);
            }
        }
    }
}
