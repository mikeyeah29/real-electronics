import { registerBlockType } from '@wordpress/blocks';
import { InnerBlocks } from '@wordpress/block-editor';
import Edit from './edit';

registerBlockType('enigma/accordion-item', {
    edit: Edit,
    save: () => <InnerBlocks.Content />
});
