import { __ } from '@wordpress/i18n';
import { RichText, useBlockProps } from '@wordpress/block-editor';

export default function Edit({ attributes, setAttributes }) {
    const { address, phone, email, hours } = attributes;

    return (
        <div {...useBlockProps()}>
            <div className="contact-info__group contact-info__group--address">
                <h3 className="contact-info__heading">
                    {__('Address', 'theme')}
                </h3>

                <RichText
                    tagName="div"
                    value={address}
                    onChange={(value) => setAttributes({ address: value })}
                    placeholder={__('Add address…', 'theme')}
                    allowedFormats={[]}
                />
            </div>

            <div className="contact-info__group contact-info__group--phone">
                <h3 className="contact-info__heading">
                    {__('Phone', 'theme')}
                </h3>

                <RichText
                    tagName="span"
                    value={phone}
                    onChange={(value) => setAttributes({ phone: value })}
                    placeholder={__('Add phone number…', 'theme')}
                    allowedFormats={[]}
                />
            </div>

            <div className="contact-info__group contact-info__group--email">
                <h3 className="contact-info__heading">
                    {__('Email', 'theme')}
                </h3>

                <RichText
                    tagName="span"
                    value={email}
                    onChange={(value) => setAttributes({ email: value })}
                    placeholder={__('Add email address…', 'theme')}
                    allowedFormats={[]}
                />
            </div>

            <div className="contact-info__group contact-info__group--hours">
                <h3 className="contact-info__heading">
                    {__('Opening Hours', 'theme')}
                </h3>

                <RichText
                    tagName="div"
                    value={hours}
                    onChange={(value) => setAttributes({ hours: value })}
                    placeholder={__('Add opening hours…', 'theme')}
                    allowedFormats={[]}
                />
            </div>
        </div>
    );
}
