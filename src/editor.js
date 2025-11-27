// Import & register every block for the editor (no global site JS here)
const req = require.context('../blocks', true, /index\.js$/);
req.keys().forEach(req);

// Import all block editor styles automatically
const requireEditorStyles = require.context(
    '../blocks',
    true,
    /editor\.scss$/
);
requireEditorStyles.keys().forEach(requireEditorStyles);

// Optionally add editor-only global styles (panel tweaks, etc.)
import './sass/editor-global.scss';

import './js/editor-aos.js';