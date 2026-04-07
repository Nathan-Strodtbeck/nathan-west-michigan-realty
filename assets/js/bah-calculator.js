/**
 * BAH Calculator
 * Rates: 2025 Grand Rapids, MI MHA (Military Housing Area)
 * Source: DoD BAH rate tables — verify annually at defensetravel.dod.mil
 */
( function () {
	'use strict';

	/* ── 2025 BAH rates: Grand Rapids, MI MHA ─────────────────
	 * Format: { no: withoutDependents, dep: withDependents }
	 * All values in USD/month.
	 * ─────────────────────────────────────────────────────────*/
	const RATES = {
		E1:  { no: 1116, dep: 1368 },
		E2:  { no: 1116, dep: 1368 },
		E3:  { no: 1116, dep: 1368 },
		E4:  { no: 1167, dep: 1419 },
		E5:  { no: 1218, dep: 1545 },
		E6:  { no: 1350, dep: 1680 },
		E7:  { no: 1500, dep: 1830 },
		E8:  { no: 1608, dep: 1950 },
		E9:  { no: 1680, dep: 2031 },
		W1:  { no: 1455, dep: 1791 },
		W2:  { no: 1629, dep: 1965 },
		W3:  { no: 1731, dep: 2070 },
		W4:  { no: 1824, dep: 2160 },
		W5:  { no: 1920, dep: 2259 },
		O1:  { no: 1455, dep: 1791 },
		O1E: { no: 1602, dep: 1950 },
		O2:  { no: 1602, dep: 1950 },
		O2E: { no: 1731, dep: 2070 },
		O3:  { no: 1869, dep: 2259 },
		O3E: { no: 1965, dep: 2358 },
		O4:  { no: 2127, dep: 2499 },
		O5:  { no: 2388, dep: 2781 },
		O6:  { no: 2682, dep: 3111 },
		O7:  { no: 3018, dep: 3468 },
		O8:  { no: 3180, dep: 3639 },
		O9:  { no: 3288, dep: 3810 },
		O10: { no: 3288, dep: 3810 },
	};

	/* ── West Michigan zip prefix → MHA ───────────────────────
	 * Nathan's service area is entirely within the Grand Rapids MHA.
	 * Zips starting with 494, 495 cover Kent, Ottawa, Ionia counties.
	 * ─────────────────────────────────────────────────────────*/
	const WM_PREFIXES = [ '494', '495', '496' ];

	/* ── Mortgage affordability constants ────────────────────── */
	// Michigan avg property tax rate ~1.5% / yr
	// Homeowner's insurance avg ~0.6% / yr
	// VA loan: 0% down, no PMI
	const TAX_INS_MONTHLY_FACTOR = ( 0.015 + 0.006 ) / 12; // ~0.00175

	/* ── Helpers ─────────────────────────────────────────────── */
	function fmtCurrency( n ) {
		return '$' + Math.round( n ).toLocaleString( 'en-US' );
	}

	/**
	 * Monthly payment factor for a 30-year fixed mortgage.
	 * @param {number} annualRatePct  e.g. 6.75
	 */
	function mortgageFactor( annualRatePct ) {
		const r = annualRatePct / 100 / 12;
		const n = 360;
		return ( r * Math.pow( 1 + r, n ) ) / ( Math.pow( 1 + r, n ) - 1 );
	}

	/**
	 * Max home price given a monthly BAH budget.
	 * Solves: BAH = price * (PI_factor + tax_ins_factor)
	 */
	function maxHomePrice( bah, annualRatePct ) {
		const piFactor    = mortgageFactor( annualRatePct );
		const totalFactor = piFactor + TAX_INS_MONTHLY_FACTOR;
		return bah / totalFactor;
	}

	/* ── DOM refs ────────────────────────────────────────────── */
	const wrap       = document.getElementById( 'nwmr-bah-calculator' );
	if ( ! wrap ) return;

	const gradeEl    = document.getElementById( 'nwmr-bah-grade' );
	const zipEl      = document.getElementById( 'nwmr-bah-zip' );
	const zipHint    = document.getElementById( 'nwmr-bah-zip-hint' );
	const rateEl     = document.getElementById( 'nwmr-bah-rate' );
	const calcBtn    = document.getElementById( 'nwmr-bah-calc-btn' );
	const resultsEl  = document.getElementById( 'nwmr-bah-results' );
	const monthlyEl  = document.getElementById( 'nwmr-bah-monthly' );
	const maxPriceEl = document.getElementById( 'nwmr-bah-maxprice' );
	const areaGrid   = document.getElementById( 'nwmr-bah-areas-grid' );
	const areaNone   = document.getElementById( 'nwmr-bah-areas-none' );

	let depStatus = 'nodep'; // 'nodep' | 'dep'

	/* ── Dependency toggle ───────────────────────────────────── */
	wrap.querySelectorAll( '.nwmr-bah-toggle__btn' ).forEach( function ( btn ) {
		btn.addEventListener( 'click', function () {
			wrap.querySelectorAll( '.nwmr-bah-toggle__btn' ).forEach( function ( b ) {
				b.classList.remove( 'nwmr-bah-toggle__btn--active' );
				b.removeAttribute( 'aria-pressed' );
			} );
			btn.classList.add( 'nwmr-bah-toggle__btn--active' );
			btn.setAttribute( 'aria-pressed', 'true' );
			depStatus = btn.dataset.dep;
		} );
	} );

	/* ── Zip validation hint ─────────────────────────────────── */
	zipEl.addEventListener( 'input', function () {
		const val = zipEl.value.trim();
		if ( val.length < 5 ) {
			zipHint.textContent = '';
			zipHint.className = 'nwmr-bah-field__hint';
			return;
		}
		const prefix = val.slice( 0, 3 );
		if ( WM_PREFIXES.includes( prefix ) ) {
			zipHint.textContent = '✓ West Michigan — using Grand Rapids MHA rates';
			zipHint.className = 'nwmr-bah-field__hint nwmr-bah-field__hint--ok';
		} else {
			zipHint.textContent = '⚠ Outside West Michigan. These are Grand Rapids MHA rates — verify yours at the official DoD calculator.';
			zipHint.className = 'nwmr-bah-field__hint nwmr-bah-field__hint--warn';
		}
	} );

	/* ── Calculate ───────────────────────────────────────────── */
	calcBtn.addEventListener( 'click', function () {
		const grade      = gradeEl.value;
		const rateInput  = parseFloat( rateEl.value ) || 6.75;
		const rateVal    = Math.min( Math.max( rateInput, 3 ), 15 );
		const rateData   = RATES[ grade ];

		if ( ! rateData ) return;

		const bah      = rateData[ depStatus === 'dep' ? 'dep' : 'no' ];
		const maxPrice = maxHomePrice( bah, rateVal );

		// Update summary stats
		monthlyEl.textContent  = fmtCurrency( bah ) + '/mo';
		maxPriceEl.textContent = fmtCurrency( maxPrice );

		// Render neighborhood cards
		renderAreas( maxPrice );

		// Show results
		resultsEl.hidden = false;
		resultsEl.scrollIntoView( { behavior: 'smooth', block: 'nearest' } );
	} );

	/* ── Render area cards ───────────────────────────────────── */
	function renderAreas( maxPrice ) {
		const areas      = ( window.nwmrBah && window.nwmrBah.areas ) ? window.nwmrBah.areas : [];
		const STRETCH_PCT = 1.20; // Show "stretch" if median is within 20% above budget

		const affordable = [];
		const stretch    = [];

		areas.forEach( function ( area ) {
			if ( area.price <= maxPrice ) {
				affordable.push( area );
			} else if ( area.price <= maxPrice * STRETCH_PCT ) {
				stretch.push( area );
			}
		} );

		areaGrid.innerHTML = '';

		if ( affordable.length === 0 && stretch.length === 0 ) {
			areaNone.hidden = false;
			areaGrid.hidden = true;
			return;
		}

		areaNone.hidden = true;
		areaGrid.hidden = false;

		affordable.forEach( function ( area ) {
			areaGrid.appendChild( makeCard( area, 'fit', 'Within Budget' ) );
		} );

		stretch.forEach( function ( area ) {
			areaGrid.appendChild( makeCard( area, 'stretch', 'Slight Stretch' ) );
		} );
	}

	function makeCard( area, type, badgeText ) {
		const a = document.createElement( 'a' );
		a.href      = area.url;
		a.className = 'nwmr-bah-area-card nwmr-bah-area-card--' + type;

		const icon = type === 'fit' ? '✅' : '⚠️';

		a.innerHTML =
			'<span class="nwmr-bah-area-card__badge">' + icon + ' ' + badgeText + '</span>' +
			'<span class="nwmr-bah-area-card__name">' + escHtml( area.name ) + '</span>' +
			'<span class="nwmr-bah-area-card__price">Median: ' + fmtCurrency( area.price ) + '</span>' +
			'<span class="nwmr-bah-area-card__link">View Neighborhood Guide →</span>';

		return a;
	}

	function escHtml( str ) {
		const d = document.createElement( 'div' );
		d.appendChild( document.createTextNode( str ) );
		return d.innerHTML;
	}

} )();
