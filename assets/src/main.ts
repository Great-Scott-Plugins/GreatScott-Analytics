import { ClickstreamAnalytics, PageType, SendMode } from '@aws/clickstream-web';

declare global {
	interface Window {
		GreatScottAnalytics: {
			siteName: string;
			siteNameEncoded: string;
			siteUrl: string;
		};
	}
}

ClickstreamAnalytics.init( {
	appId: window.GreatScottAnalytics.siteNameEncoded,
	endpoint: window.GreatScottAnalytics.siteUrl,
	isLogEvents: true, // TODO: Make this configurable.
	isTrackAppEndEvents: true, // TODO: Make this configurable.
	isTrackAppStartEvents: true, // TODO: Make this configurable.
	isTrackClickEvents: true, // TODO: Make this configurable.
	isTrackPageLoadEvents: true, // TODO: Make this configurable.
	isTrackPageViewEvents: true, // TODO: Make this configurable.
	isTrackScrollEvents: true, // TODO: Make this configurable.
	isTrackSearchEvents: true, // TODO: Make this configurable.
	isTrackUserEngagementEvents: true, // TODO: Make this configurable.
	pageType: PageType.multiPageApp,
	sendEventsInterval: 1000,
	sendMode: SendMode.Batch,
} );

window.addEventListener( 'DOMContentLoaded', function () {
	// Add link event listener here.
} );
