import { createRoot } from 'react-dom/client';
import { HashRouter, Routes, Route } from 'react-router';

import App from './components/App';

document.addEventListener( 'DOMContentLoaded', () => {
	const target = document.getElementById( 'greatscottanalytics_app' );

	if ( target ) {
		createRoot( target ).render(
			<HashRouter>
				<Routes>
					<Route path="/" element={ <App /> }>
						<Route index element={ <h2>Hello</h2> } />
						<Route path="settings" element={ <h2>Settings</h2> } />

						<Route
							path="traffic_overview"
							element={ <h2>Traffic Overview</h2> }
						/>
						<Route
							path="traffic_landing_page_details"
							element={ <h2>Traffic Landing Page Details</h2> }
						/>
						<Route
							path="traffic_source_medium"
							element={ <h2>Traffic Source Medium</h2> }
						/>
						<Route
							path="traffic_technology"
							element={ <h2>Traffic Technology</h2> }
						/>
						<Route
							path="traffic_campaigns"
							element={ <h2>Traffic Campaigns</h2> }
						/>
						<Route
							path="traffic_social"
							element={ <h2>Traffic Social</h2> }
						/>
					</Route>
				</Routes>
			</HashRouter>
		);
	}
} );
