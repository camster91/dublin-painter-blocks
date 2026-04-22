/**
 * Dublin Painter Blocks — Shared Utilities
 *
 * IntersectionObserver for scroll reveal animations.
 * Loaded globally, used by all blocks.
 */
( function() {
	'use strict';

	// Scroll reveal with IntersectionObserver
	document.addEventListener( 'DOMContentLoaded', function() {
		const revealElements = document.querySelectorAll( '.dp-reveal' );

		if ( ! revealElements.length ) return;

		const observer = new IntersectionObserver( function( entries ) {
			entries.forEach( function( entry ) {
				if ( entry.isIntersecting ) {
					entry.target.classList.add( 'is-visible' );
					observer.unobserve( entry.target );
				}
			} );
		}, {
			threshold: 0.1,
			rootMargin: '0px 0px -50px 0px'
		} );

		revealElements.forEach( function( el ) {
			observer.observe( el );
		} );
	} );
} )();