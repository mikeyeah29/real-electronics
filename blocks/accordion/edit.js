import { InnerBlocks, useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { PanelBody, SelectControl } from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
    const { theme } = attributes;

    const blockProps = useBlockProps({
        className: `enigma-accordion-container theme-${theme}`,
    });

    return (
        <>
            <InspectorControls>
                <PanelBody title={__('Accordion Settings', 'enigma')} initialOpen={true}>
                    <SelectControl
                        label={__('Theme', 'enigma')}
                        value={theme}
                        options={[
                            { label: __('Default', 'enigma'), value: 'default' },
                            { label: __('Dark', 'enigma'), value: 'dark' },
                            { label: __('Light', 'enigma'), value: 'light' },
                            { label: __('Accent', 'enigma'), value: 'accent' },
                        ]}
                        onChange={(value) => setAttributes({ theme: value })}
                    />
                </PanelBody>
            </InspectorControls>

            <div {...blockProps}>
                <InnerBlocks
                    allowedBlocks={['enigma/accordion-item']}
                    template={[['enigma/accordion-item']]}
                />
            </div>
        </>
    );
}
