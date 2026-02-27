import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';

export default function Edit() {
    const blockProps = useBlockProps({
        className: 'repair-tabs-block-placeholder repairs-tabs',
    });

    return (
        <div {...blockProps}>
            <div className="repair-tabs-block-placeholder__header">
                <strong>{__('Repair tabs will appear here', 'real-electronics')}</strong>
                <p>{__('This section is powered by the Repair Services custom post type.', 'real-electronics')}</p>
            </div>

            <div className="repair-tabs-block-placeholder__tabs repairs-tabs__controls" aria-hidden="true">
                <div className="repairs-tabs__control repairs-tabs__control--blue is-active">
                    <span className="repairs-tabs__label">{__('Tab One', 'real-electronics')}</span>
                </div>
                <div className="repairs-tabs__control repairs-tabs__control--green">
                    <span className="repairs-tabs__label">{__('Tab Two', 'real-electronics')}</span>
                </div>
                <div className="repairs-tabs__control repairs-tabs__control--purple">
                    <span className="repairs-tabs__label">{__('Tab Three', 'real-electronics')}</span>
                </div>
                <div className="repairs-tabs__control repairs-tabs__control--orange">
                    <span className="repairs-tabs__label">{__('Tab Four', 'real-electronics')}</span>
                </div>
            </div>

            <div className="repair-tabs-block-placeholder__content repairs-tabs__content">
                <div className="repairs-tabs__panel is-active">
                    <p>{__('Content for these tabs is managed in: Repair Services (Custom Post Type).', 'real-electronics')}</p>
                </div>
            </div>
        </div>
    );
}
