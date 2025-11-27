// Add attributes to core blocks
wp.hooks.addFilter(
    'blocks.registerBlockType',
    'myplugin/aos-attributes',
    (settings, name) => {
        if (name.startsWith('core/')) {
            settings.attributes = Object.assign(settings.attributes, {
                aos: { type: 'string', default: '' },
                aosDelay: { type: 'string', default: '' },
            });
        }
        return settings;
    }
);

// Add controls in sidebar
const { __ } = wp.i18n;
const { InspectorControls } = wp.blockEditor;
const { PanelBody, TextControl } = wp.components;
const { createHigherOrderComponent } = wp.compose;

const withAOSControls = createHigherOrderComponent((BlockEdit) => {
    return (props) => {
        const { attributes, setAttributes } = props;
        return (
            <>
                <BlockEdit {...props} />
                <InspectorControls>
                    <PanelBody title="AOS Animation">
                        <TextControl
                            label="data-aos"
                            value={attributes.aos}
                            onChange={(val) => setAttributes({ aos: val })}
                        />
                        <TextControl
                            label="data-aos-delay"
                            value={attributes.aosDelay}
                            onChange={(val) => setAttributes({ aosDelay: val })}
                        />
                    </PanelBody>
                </InspectorControls>
            </>
        );
    };
}, 'withAOSControls');

wp.hooks.addFilter(
    'editor.BlockEdit',
    'myplugin/aos-controls',
    withAOSControls
);

// Apply attributes to save() output
const addSaveProps = (extraProps, blockType, attributes) => {
    if (attributes.aos) {
        extraProps['data-aos'] = attributes.aos;
    }
    if (attributes.aosDelay) {
        extraProps['data-aos-delay'] = attributes.aosDelay;
    }
    return extraProps;
};
wp.hooks.addFilter(
    'blocks.getSaveContent.extraProps',
    'myplugin/aos-save-props',
    addSaveProps
);
