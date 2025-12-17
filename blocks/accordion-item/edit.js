import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText, InnerBlocks } from '@wordpress/block-editor';

export default function Edit({ attributes, setAttributes }) {
    const { heading } = attributes;

    const blockProps = useBlockProps({
        className: 'enigma-accordion-item',
    });

    return (
        <div {...blockProps}>
            <div className="enigma-accordion-heading">
                <RichText
                    tagName="span"
                    placeholder={__('Accordion heading...', 'enigma')}
                    value={heading}
                    onChange={(value) => setAttributes({ heading: value })}
                />
                <span className="enigma-accordion-arrow">▼</span>
            </div>
            <div className="enigma-accordion-content">
                <InnerBlocks />
            </div>
        </div>
    );
}
