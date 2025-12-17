import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	InnerBlocks,
	InspectorControls,
	MediaUpload,
	MediaUploadCheck,
} from '@wordpress/block-editor';
import {
	PanelBody,
	SelectControl,
	TextControl,
	Button,
} from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
	const {
		backgroundImage,
		overlayGradient,
		responsiveHeight,
		paddingTop,
		paddingBottom,
	} = attributes;

	const blockProps = useBlockProps({
		className:
			responsiveHeight === 'all'
				? 'is-full-height-all'
				: responsiveHeight === 'desktop'
					? 'is-full-height-desktop'
					: '',
		style: {
			backgroundImage: backgroundImage
				? overlayGradient
					? `${overlayGradient}, url(${backgroundImage})`
					: `url(${backgroundImage})`
				: undefined,
			paddingTop,
			paddingBottom,
			minHeight: responsiveHeight === 'all' ? '100vh' : undefined,
		},
	});

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Hero Settings', 'enigma')}>
					<MediaUploadCheck>
						<MediaUpload
							onSelect={(media) =>
								setAttributes({ backgroundImage: media.url })
							}
							allowedTypes={['image']}
							render={({ open }) => (
								<div>
									{backgroundImage ? (
										<div className="hero-image-preview">
											<img
												src={backgroundImage}
												alt=""
												style={{
													maxWidth: '100%',
													height: 'auto',
												}}
											/>
											<Button
												variant="secondary"
												onClick={() =>
													setAttributes({
														backgroundImage: '',
													})
												}
												isDestructive
											>
												{__('Remove Image', 'enigma')}
											</Button>
										</div>
									) : (
										<Button variant="primary" onClick={open}>
											{__('Select Background Image', 'enigma')}
										</Button>
									)}
								</div>
							)}
						/>
					</MediaUploadCheck>

					{backgroundImage && (
						<TextControl
							label={__('Overlay Gradient (CSS value)', 'enigma')}
							value={overlayGradient}
							onChange={(val) =>
								setAttributes({ overlayGradient: val })
							}
							help={__(
								'Optional gradient overlay (e.g. linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)))',
								'enigma'
							)}
						/>
					)}

					<SelectControl
						label={__('Height', 'enigma')}
						value={responsiveHeight}
						options={[
							{ label: __('Auto', 'enigma'), value: 'none' },
							{
								label: __('Full Height (All Devices)', 'enigma'),
								value: 'all',
							},
							{
								label: __('Full Height (Desktop Only)', 'enigma'),
								value: 'desktop',
							},
						]}
						onChange={(val) =>
							setAttributes({ responsiveHeight: val })
						}
					/>
				</PanelBody>
			</InspectorControls>

			<section {...blockProps}>
				<div className="hero__inner">
					<InnerBlocks
						template={[
							[
								'core/heading',
								{ level: 1, content: __('Hero Title', 'enigma'), fontSize: 'hero' },
							]
						]}
						templateLock={false}
					/>
				</div>
			</section>
		</>
	);
}
