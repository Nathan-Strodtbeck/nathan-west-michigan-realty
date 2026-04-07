/**
 * BAH Calculator
 *
 * Rates: CY2026, Grand Rapids MI MHA (MI154).
 * E-5 without dependents = $1,635 (user-verified against DoD official table).
 * Verify the full table annually at: defensetravel.dod.mil/site/bahCalc.cfm
 */
( function () {
	'use strict';

	/* ── CY2026 BAH rates: Grand Rapids, MI MHA (MI154) ─────────
	 * Source: Official DoD 2026 BAH Rate Tables, MHA MI154.
	 * { no: withoutDependents, dep: withDependents } — USD/month
	 * O8–O10 estimated slightly above O7 (not in published table).
	 * ─────────────────────────────────────────────────────────*/
	var RATES = {
		E1:  { no: 1464, dep: 1950 },
		E2:  { no: 1464, dep: 1950 },
		E3:  { no: 1464, dep: 1950 },
		E4:  { no: 1464, dep: 1950 },
		E5:  { no: 1635, dep: 2148 },
		E6:  { no: 1800, dep: 2403 },
		E7:  { no: 1956, dep: 2424 },
		E8:  { no: 2205, dep: 2433 },
		E9:  { no: 2271, dep: 2517 },
		W1:  { no: 1893, dep: 2421 },
		W2:  { no: 2202, dep: 2430 },
		W3:  { no: 2283, dep: 2442 },
		W4:  { no: 2397, dep: 2547 },
		W5:  { no: 2415, dep: 2688 },
		O1:  { no: 1752, dep: 2184 },
		O1E: { no: 2145, dep: 2427 },
		O2:  { no: 2085, dep: 2400 },
		O2E: { no: 2256, dep: 2436 },
		O3:  { no: 2307, dep: 2439 },
		O3E: { no: 2394, dep: 2571 },
		O4:  { no: 2403, dep: 2730 },
		O5:  { no: 2418, dep: 2946 },
		O6:  { no: 2421, dep: 2970 },
		O7:  { no: 2454, dep: 2988 },
		O8:  { no: 2487, dep: 3012 }, // estimated — not in published table
		O9:  { no: 2511, dep: 3033 }, // estimated — not in published table
		O10: { no: 2511, dep: 3033 }, // estimated — not in published table
	};

	var WM_PREFIXES    = [ '494', '495', '496' ];
	var TAX_INS_FACTOR = ( 0.015 + 0.006 ) / 12; // per $1 of home value/month

	/* ── Helpers ─────────────────────────────────────────────*/
	function fmt( n ) {
		return '$' + Math.round( n ).toLocaleString( 'en-US' );
	}

	function piMonthlyFactor( annualRatePct ) {
		var r = annualRatePct / 100 / 12;
		var n = 360;
		return ( r * Math.pow( 1 + r, n ) ) / ( Math.pow( 1 + r, n ) - 1 );
	}

	function calcMaxPrice( totalBudget, annualRatePct ) {
		return totalBudget / ( piMonthlyFactor( annualRatePct ) + TAX_INS_FACTOR );
	}

	function updateSliderFill( slider ) {
		var min = parseFloat( slider.min );
		var max = parseFloat( slider.max );
		var val = parseFloat( slider.value );
		var pct = ( ( val - min ) / ( max - min ) ) * 100;
		slider.style.setProperty( '--pct', pct.toFixed( 1 ) + '%' );
	}

	function getAffordabilityMessage( maxPrice ) {
		if ( maxPrice < 150000 ) {
			return '💡 Your BAH alone is tight for West Michigan — opening "Add income sources" above and including VA disability or other income will expand your options significantly.';
		}
		if ( maxPrice < 250000 ) {
			return '📍 Starter home options exist in this range. There are neighborhoods worth exploring — let\'s find the right fit for your situation.';
		}
		if ( maxPrice < 400000 ) {
			return '✅ Solid buying power. Several West Michigan neighborhoods are comfortably within reach with a VA loan.';
		}
		if ( maxPrice < 600000 ) {
			return '💪 Strong position — most West Michigan areas are within your budget. You have real options here.';
		}
		return '⭐ Excellent buying power. You have outstanding options throughout the West Michigan region.';
	}

	/* ── DOM refs ────────────────────────────────────────────*/
	var wrap = document.getElementById( 'nwmr-bah-calculator' );
	if ( ! wrap ) return;

	var gradeEl          = document.getElementById( 'nwmr-bah-grade' );
	var zipEl            = document.getElementById( 'nwmr-bah-zip' );
	var zipHint          = document.getElementById( 'nwmr-bah-zip-hint' );
	var rateSlider       = document.getElementById( 'nwmr-bah-rate' );
	var rateDisplay      = document.getElementById( 'nwmr-bah-rate-display' );
	var rateSummNote     = document.getElementById( 'nwmr-bah-rate-summary-note' );
	var disabilityEl     = document.getElementById( 'nwmr-bah-disability' );
	var incomeEl         = document.getElementById( 'nwmr-bah-income' );

	var resultsEl        = document.getElementById( 'nwmr-bah-results' );
	var monthlyEl        = document.getElementById( 'nwmr-bah-monthly' );
	var extraStatEl      = document.getElementById( 'nwmr-bah-extra-stat' );
	var extraDivEl       = document.getElementById( 'nwmr-bah-extra-div' );
	var extraEl          = document.getElementById( 'nwmr-bah-extra' );
	var budgetEl         = document.getElementById( 'nwmr-bah-budget' );
	var maxPriceEl       = document.getElementById( 'nwmr-bah-maxprice' );
	var rangeEl          = document.getElementById( 'nwmr-bah-range' );
	var piEl             = document.getElementById( 'nwmr-bah-pi' );
	var taxEl            = document.getElementById( 'nwmr-bah-tax' );
	var insEl            = document.getElementById( 'nwmr-bah-ins' );
	var totalMoEl        = document.getElementById( 'nwmr-bah-total-mo' );
	var messageEl        = document.getElementById( 'nwmr-bah-message' );
	var areaGrid         = document.getElementById( 'nwmr-bah-areas-grid' );
	var areaNone         = document.getElementById( 'nwmr-bah-areas-none' );

	var depStatus = 'nodep';

	/* ── Dependency toggle ───────────────────────────────────*/
	wrap.querySelectorAll( '.nwmr-bah-toggle__btn' ).forEach( function ( btn ) {
		btn.addEventListener( 'click', function () {
			wrap.querySelectorAll( '.nwmr-bah-toggle__btn' ).forEach( function ( b ) {
				b.classList.remove( 'nwmr-bah-toggle__btn--active' );
				b.setAttribute( 'aria-pressed', 'false' );
			} );
			btn.classList.add( 'nwmr-bah-toggle__btn--active' );
			btn.setAttribute( 'aria-pressed', 'true' );
			depStatus = btn.dataset.dep;
			autoCalc();
		} );
	} );

	/* ── Zip hint ────────────────────────────────────────────*/
	zipEl.addEventListener( 'input', function () {
		var val = zipEl.value.trim();
		if ( val.length < 5 ) {
			zipHint.textContent = '';
			zipHint.className = 'nwmr-bah-field__hint';
			return;
		}
		if ( WM_PREFIXES.indexOf( val.slice( 0, 3 ) ) !== -1 ) {
			zipHint.textContent = '✓ West Michigan — Grand Rapids MHA rates applied';
			zipHint.className = 'nwmr-bah-field__hint nwmr-bah-field__hint--ok';
		} else {
			zipHint.textContent = '⚠ Outside West Michigan — verify your rates at the official DoD calculator.';
			zipHint.className = 'nwmr-bah-field__hint nwmr-bah-field__hint--warn';
		}
	} );

	/* ── Rate slider ─────────────────────────────────────────*/
	updateSliderFill( rateSlider );
	rateSlider.addEventListener( 'input', function () {
		var v       = parseFloat( rateSlider.value );
		var display = v % 1 === 0 ? v + '.0%' : v + '%';
		rateDisplay.textContent = display;
		if ( rateSummNote ) {
			rateSummNote.textContent = 'VA 30-yr at ' + display;
		}
		rateSlider.setAttribute( 'aria-valuenow', v );
		updateSliderFill( rateSlider );
		autoCalc();
	} );

	/* ── Live update on grade / income changes ───────────────*/
	gradeEl.addEventListener( 'change', autoCalc );
	disabilityEl.addEventListener( 'input', autoCalc );
	incomeEl.addEventListener( 'input', autoCalc );

	/* ── Core calculation ────────────────────────────────────*/
	function autoCalc() {
		var grade    = gradeEl.value;
		var rateData = RATES[ grade ];
		if ( ! rateData ) return;

		var bah        = rateData[ depStatus === 'dep' ? 'dep' : 'no' ];
		var disability = Math.max( 0, parseFloat( disabilityEl.value ) || 0 );
		var addlIncome = Math.max( 0, parseFloat( incomeEl.value ) || 0 );
		var extra      = disability + addlIncome;
		var budget     = bah + extra;
		var rate       = parseFloat( rateSlider.value ) || 6.75;
		var maxPrice   = calcMaxPrice( budget, rate );

		/* Recommended range: 75% – 90% of max price */
		var rangeLow  = maxPrice * 0.75;
		var rangeHigh = maxPrice * 0.90;

		/* Monthly breakdown at max price */
		var piF      = piMonthlyFactor( rate );
		var piAmt    = piF * maxPrice;
		var taxAmt   = ( 0.015 / 12 ) * maxPrice;
		var insAmt   = ( 0.006 / 12 ) * maxPrice;
		var totalAmt = piAmt + taxAmt + insAmt;

		/* Stat bar */
		monthlyEl.textContent = fmt( bah ) + '/mo';
		budgetEl.textContent  = fmt( budget ) + '/mo';

		if ( extra > 0 ) {
			extraEl.textContent  = '+' + fmt( extra ) + '/mo';
			extraStatEl.hidden   = false;
			extraDivEl.hidden    = false;
		} else {
			extraStatEl.hidden = true;
			extraDivEl.hidden  = true;
		}

		/* Main panel */
		maxPriceEl.textContent = fmt( maxPrice );
		rangeEl.textContent    = fmt( rangeLow ) + ' \u2013 ' + fmt( rangeHigh );
		piEl.textContent       = fmt( piAmt ) + '/mo';
		taxEl.textContent      = fmt( taxAmt ) + '/mo';
		insEl.textContent      = fmt( insAmt ) + '/mo';
		totalMoEl.textContent  = fmt( totalAmt ) + '/mo';

		/* Affordability message */
		messageEl.textContent = getAffordabilityMessage( maxPrice );

		/* Neighborhood grid */
		renderAreas( maxPrice );

		/* Show results section */
		resultsEl.hidden = false;
	}

	/* ── Render area cards ───────────────────────────────────*/
	function renderAreas( maxPrice ) {
		var areas   = ( window.nwmrBah && window.nwmrBah.areas ) ? window.nwmrBah.areas : [];
		var STRETCH = 1.20;

		var affordable = [];
		var stretch    = [];

		areas.forEach( function ( area ) {
			if ( area.price <= maxPrice ) {
				affordable.push( area );
			} else if ( area.price <= maxPrice * STRETCH ) {
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

		affordable.forEach( function ( a ) { areaGrid.appendChild( makeCard( a, 'fit',     '\u2705 Within Budget' ) ); } );
		stretch.forEach(    function ( a ) { areaGrid.appendChild( makeCard( a, 'stretch', '\u26a0\ufe0f Slight Stretch' ) ); } );
	}

	function makeCard( area, type, badge ) {
		var a       = document.createElement( 'a' );
		a.href      = area.url;
		a.className = 'nwmr-bah-area-card nwmr-bah-area-card--' + type;
		a.innerHTML =
			'<span class="nwmr-bah-area-card__badge">'  + badge + '</span>' +
			'<span class="nwmr-bah-area-card__name">'   + esc( area.name ) + '</span>' +
			'<span class="nwmr-bah-area-card__price">Median: ' + fmt( area.price ) + '</span>' +
			'<span class="nwmr-bah-area-card__link">View Neighborhood Guide \u2192</span>';
		return a;
	}

	function esc( str ) {
		var d = document.createElement( 'div' );
		d.appendChild( document.createTextNode( str ) );
		return d.innerHTML;
	}

	/* ── Auto-calculate on load with defaults ────────────────*/
	autoCalc();

} )();
