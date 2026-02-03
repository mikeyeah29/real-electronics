import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';

export default function Edit() {
    return (
        <div {...useBlockProps()}>
            <div className="reviews__placeholder">
                <strong>{__('Reviews', 'real-electronics')}</strong>
                <p>{__('Displays the testimonial slider on the front end.', 'real-electronics')}</p>
            </div>
        </div>
    );
}
