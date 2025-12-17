import { registerBlockType } from '@wordpress/blocks';
import { InnerBlocks } from '@wordpress/block-editor';
import Edit from './edit';

import './style.scss';
import './editor.scss';

registerBlockType('enigma/accordion', {
    edit: Edit,
    save: () => <InnerBlocks.Content />
});
