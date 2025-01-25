// @ts-ignore
import { createRoot, render } from '@wordpress/element';
// @ts-ignore
import domReady from '@wordpress/dom-ready';

import App from './components/App';

domReady(() => {
    const target = document.getElementById( 'greatscottanalytics_app' );

    if (target) {
        createRoot(target).render(<App />);
    }
});