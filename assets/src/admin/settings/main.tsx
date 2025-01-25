import { createRoot } from 'react-dom/client';

import App from './components/App';

document.addEventListener('DOMContentLoaded', () => {
    const target = document.getElementById( 'greatscottanalytics_app' );

    if (target) {
        createRoot(target).render(<App />);
    }
});
