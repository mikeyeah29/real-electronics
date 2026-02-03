import { __ } from '@wordpress/i18n';
import { RichText, useBlockProps } from '@wordpress/block-editor';

const STAT_FIELDS = [
    {
        value: 'value1',
        label: 'label1',
        description: 'description1',
    },
    {
        value: 'value2',
        label: 'label2',
        description: 'description2',
    },
    {
        value: 'value3',
        label: 'label3',
        description: 'description3',
        isStar: true,
    },
    {
        value: 'value4',
        label: 'label4',
        description: 'description4',
    },
];

export default function Edit({ attributes, setAttributes }) {
    const blockProps = useBlockProps({ className: 'about-stats' });

    return (
        <div {...blockProps}>
            {STAT_FIELDS.map((fields, index) => {
                const cardClass = `about-stats__card${fields.isStar ? ' is-star' : ''}`;
                return (
                    <article className={cardClass} key={index}>
                        <div className="about-stats__top">
                            <RichText
                                tagName="span"
                                className="about-stats__value"
                                value={attributes[fields.value]}
                                onChange={(value) => setAttributes({ [fields.value]: value })}
                                placeholder={__('Stat value', 'real-electronics')}
                                allowedFormats={[]}
                            />
                            <RichText
                                tagName="h3"
                                className="about-stats__label"
                                value={attributes[fields.label]}
                                onChange={(value) => setAttributes({ [fields.label]: value })}
                                placeholder={__('Stat label', 'real-electronics')}
                                allowedFormats={[]}
                            />
                        </div>
                        <RichText
                            tagName="p"
                            className="about-stats__description"
                            value={attributes[fields.description]}
                            onChange={(value) => setAttributes({ [fields.description]: value })}
                            placeholder={__('Stat description', 'real-electronics')}
                            allowedFormats={[]}
                        />
                    </article>
                );
            })}
        </div>
    );
}
