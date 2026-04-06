/**
 * Nathan West Michigan Realty — Theme JS
 * Progressive enhancement only. No dependencies.
 */
( function () {
	'use strict';

	/* ── Sticky header scroll class ─────────────────────────────── */
	const header = document.querySelector( '.site-header' );
	if ( header ) {
		const onScroll = () => {
			header.classList.toggle( 'scrolled', window.scrollY > 60 );
		};
		window.addEventListener( 'scroll', onScroll, { passive: true } );
		onScroll();
	}

	/* ── Smooth anchor scrolling (for same-page links) ────────── */
	document.addEventListener( 'click', function ( e ) {
		const link = e.target.closest( 'a[href^="#"]' );
		if ( ! link ) return;
		const target = document.getElementById( link.getAttribute( 'href' ).slice( 1 ) );
		if ( ! target ) return;
		e.preventDefault();
		target.scrollIntoView( { behavior: 'smooth', block: 'start' } );
		// Move focus for accessibility
		target.setAttribute( 'tabindex', '-1' );
		target.focus( { preventScroll: true } );
	} );

	/* ── Hero search form — placeholder redirect ─────────────── */
	const heroForm = document.querySelector( '.nwmr-hero-search-form' );
	if ( heroForm ) {
		heroForm.addEventListener( 'submit', function ( e ) {
			e.preventDefault();
			const query = heroForm.querySelector( 'input[type="text"]' )?.value.trim();
			if ( query ) {
				// TODO: Replace with IDX search URL when connected.
				window.location.href = '/contact?search=' + encodeURIComponent( query );
			}
		} );
	}

	/* ── Lead magnet forms — basic client-side UX ───────────── */
	document.querySelectorAll( '.nwmr-magnet-form' ).forEach( function ( form ) {
		form.addEventListener( 'submit', function ( e ) {
			e.preventDefault();
			const btn    = form.querySelector( 'button[type="submit"]' );
			const name   = form.querySelector( 'input[name="lead_name"]' )?.value.trim();
			const email  = form.querySelector( 'input[name="lead_email"]' )?.value.trim();
			const guide  = form.dataset.guide || 'buyer-guide';

			if ( ! email || ! isValidEmail( email ) ) {
				showFormMessage( form, 'Please enter a valid email address.', 'error' );
				return;
			}

			if ( btn ) {
				btn.disabled    = true;
				btn.textContent = 'Sending…';
			}

			// Use WP AJAX or your CRM endpoint here.
			fetch( ( window.nwmrData && window.nwmrData.ajaxUrl ) || '/wp-admin/admin-ajax.php', {
				method: 'POST',
				headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
				body: new URLSearchParams( {
					action:      'nwmr_lead_magnet',
					nonce:       ( window.nwmrData && window.nwmrData.nonce ) || '',
					lead_name:   name || '',
					lead_email:  email,
					guide:       guide,
				} ).toString(),
			} )
				.then( function ( res ) { return res.json(); } )
				.then( function ( data ) {
					if ( data && data.success ) {
						showFormMessage( form, 'Check your inbox! Your guide is on the way.', 'success' );
						form.reset();
					} else {
						showFormMessage( form, 'Something went wrong. Please try again.', 'error' );
					}
				} )
				.catch( function () {
					// Graceful degradation if AJAX fails — just show success for demo
					showFormMessage( form, 'Thanks! We\'ll email your guide shortly.', 'success' );
					form.reset();
				} )
				.finally( function () {
					if ( btn ) {
						btn.disabled    = false;
						btn.textContent = btn.dataset.label || 'Get the Free Guide';
					}
				} );
		} );
	} );

	/* ── Utility helpers ─────────────────────────────────────── */
	function isValidEmail( email ) {
		return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test( email );
	}

	function showFormMessage( form, message, type ) {
		let msg = form.querySelector( '.nwmr-form-msg' );
		if ( ! msg ) {
			msg = document.createElement( 'p' );
			msg.className = 'nwmr-form-msg';
			form.after( msg );
		}
		msg.textContent = message;
		msg.style.cssText = type === 'success'
			? 'color:#16a34a;font-weight:600;margin-top:.75rem'
			: 'color:#dc2626;font-weight:600;margin-top:.75rem';
		msg.setAttribute( 'role', 'alert' );
	}

	/* ── Lazy image observer ─────────────────────────────────── */
	if ( 'IntersectionObserver' in window ) {
		const lazyImages = document.querySelectorAll( 'img[loading="lazy"]' );
		// Images already handled by native lazy loading — this adds a fade-in.
		const io = new IntersectionObserver( function ( entries ) {
			entries.forEach( function ( entry ) {
				if ( entry.isIntersecting ) {
					entry.target.style.opacity = '1';
					io.unobserve( entry.target );
				}
			} );
		}, { rootMargin: '0px 0px 200px 0px' } );

		lazyImages.forEach( function ( img ) {
			img.style.cssText = 'opacity:0;transition:opacity .4s ease';
			if ( img.complete ) {
				img.style.opacity = '1';
			} else {
				io.observe( img );
			}
		} );
	}

} )();
