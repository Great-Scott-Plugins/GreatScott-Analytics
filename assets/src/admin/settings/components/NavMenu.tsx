'use client';

import * as React from 'react';
import {NavLink} from 'react-router';

import {cn} from '@/lib/utils';
import {
    NavigationMenu,
    NavigationMenuContent,
    NavigationMenuItem,
    NavigationMenuLink,
    NavigationMenuList,
    NavigationMenuTrigger,
    navigationMenuTriggerStyle,
} from '@/components/ui/navigation-menu';

export function NavMenu() {
	return (
		<NavigationMenu>
			<NavigationMenuList>
				<NavigationMenuItem>
					<NavLink className={ navigationMenuTriggerStyle() } to="/">
						Overview
					</NavLink>
				</NavigationMenuItem>
				<NavigationMenuItem>
					<NavLink
						className={ navigationMenuTriggerStyle() }
						to="/settings"
					>
						Settings
					</NavLink>
				</NavigationMenuItem>
				<NavigationMenuItem>
					<NavigationMenuTrigger className="cursor-pointer">
						Traffic
					</NavigationMenuTrigger>
					<NavigationMenuContent>
						<ul className="grid gap-3 p-6 md:w-[400px] lg:w-[500px] lg:grid-cols-[.75fr_1fr]">
							<ListItem href="#traffic_overview" title="Overview">
								See how customers find your website.
							</ListItem>
							<ListItem
								href="#traffic_landing_page_details"
								title="Landing Page Details"
							>
								See the first page visitors land on when
								visiting your website.
							</ListItem>
							<ListItem
								href="#traffic_source_medium"
								title="Source/Medium"
							>
								Details about referring traffic to your website.
							</ListItem>
							<ListItem
								href="#traffic_technology"
								title="Technology"
							>
								Discover the devices/browsers your visitors are
								using.
							</ListItem>
							<ListItem
								href="#traffic_campaigns"
								title="Campaigns"
							>
								Easily measure the effectiveness of your
								marketing campaigns.
							</ListItem>
							<ListItem href="#traffic_social" title="Social">
								Details about social traffic coming to your
								website.
							</ListItem>
						</ul>
					</NavigationMenuContent>
				</NavigationMenuItem>
			</NavigationMenuList>
		</NavigationMenu>
	);
}

const ListItem = React.forwardRef<
	React.ElementRef< 'a' >,
	React.ComponentPropsWithoutRef< 'a' >
>( ( { className, title, children, ...props }, ref ) => {
	return (
		<li>
			<NavigationMenuLink asChild>
				<a
					ref={ ref }
					className={ cn(
						'block select-none space-y-1 rounded-md p-3 leading-none no-underline outline-none transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground',
						className
					) }
					{ ...props }
				>
					<div className="text-sm font-medium leading-none">
						{ title }
					</div>
					<p className="line-clamp-2 text-sm leading-snug text-muted-foreground">
						{ children }
					</p>
				</a>
			</NavigationMenuLink>
		</li>
	);
} );
ListItem.displayName = 'ListItem';
