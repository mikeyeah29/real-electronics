import { useBlockProps } from '@wordpress/block-editor';

export default function Edit() {
    const blockProps = useBlockProps({
        className: 'logo-slider'
    });

    return (
        <div {...blockProps}>
            <p style={{ opacity: 0.7 }}>
                Logo Slider block – logos are rendered on the frontend.
            </p>
        </div>
    );
}
