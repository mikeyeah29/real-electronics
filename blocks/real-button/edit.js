import { __ } from '@wordpress/i18n';
import {
    RichText,
    useBlockProps,
    InspectorControls
} from '@wordpress/block-editor';
import {
    PanelBody,
    SelectControl,
    TextControl
} from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
    const { label, url, type, icon } = attributes;

    return (
        <>
            <InspectorControls>
                <PanelBody title={__('Button Settings', 'theme')} initialOpen={true}>
                    <SelectControl
                        label={__('Button Type', 'theme')}
                        value={type}
                        options={[
                            { label: 'Primary', value: 'primary' },
                            { label: 'Secondary', value: 'secondary' },
                            { label: 'Accent', value: 'accent' }
                        ]}
                        onChange={(value) => setAttributes({ type: value })}
                    />

                    <TextControl
                        label={__('URL', 'theme')}
                        value={url}
                        onChange={(value) => setAttributes({ url: value })}
                        placeholder="https://"
                    />

                    <TextControl
                        label={__('Icon Slug', 'theme')}
                        value={icon}
                        onChange={(value) => setAttributes({ icon: value })}
                        help={__('e.g. "next" loads template-parts/svg/next.php', 'theme')}
                    />
                </PanelBody>
            </InspectorControls>

            <div {...useBlockProps()}>
                <div className="real-button">
                    <RichText
                        tagName="span"
                        className="real-button__text"
                        value={label}
                        onChange={(value) => setAttributes({ label: value })}
                        placeholder={__('Button text…', 'theme')}
                        allowedFormats={[]}
                    />
                </div>
            </div>
        </>
    );
}
