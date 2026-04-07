<?php
/**
 * BAH Calculator — shortcode and script registration.
 *
 * Shortcode: [nwmr_bah_calculator]
 *
 * @package nathan-west-michigan-realty
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register the script (not enqueued globally — only when shortcode is used).
 */
add_action( 'wp_enqueue_scripts', 'nwmr_register_bah_script' );
function nwmr_register_bah_script(): void {
	wp_register_script(
		'nwmr-bah-calculator',
		NWMR_URI . '/assets/js/bah-calculator.js',
		[],
		NWMR_VERSION,
		[ 'strategy' => 'defer', 'in_footer' => true ]
	);
}

/**
 * Shortcode: [nwmr_bah_calculator]
 */
add_shortcode( 'nwmr_bah_calculator', 'nwmr_bah_calculator_shortcode' );
function nwmr_bah_calculator_shortcode(): string {

	wp_enqueue_script( 'nwmr-bah-calculator' );
	wp_localize_script( 'nwmr-bah-calculator', 'nwmrBah', [
		'areas' => nwmr_bah_get_area_data(),
	] );

	ob_start();
	?>
	<div class="nwmr-bah-wrap" id="nwmr-bah-calculator">

		<!-- ── Calculator card ───────────────────────────────────── -->
		<div class="nwmr-bah-card">

			<div class="nwmr-bah-card__header">
				<hr class="nwmr-gold-rule" aria-hidden="true">
				<h3 class="nwmr-bah-card__title">BAH Calculator</h3>
				<p class="nwmr-bah-card__sub">See your Basic Allowance for Housing and which West Michigan neighborhoods fit your budget — no email required.</p>
			</div>

			<div class="nwmr-bah-card__fields">

				<!-- Pay Grade -->
				<div class="nwmr-bah-field">
					<label for="nwmr-bah-grade">Pay Grade</label>
					<select id="nwmr-bah-grade">
						<optgroup label="Enlisted">
							<option value="E1">E-1</option>
							<option value="E2">E-2</option>
							<option value="E3">E-3</option>
							<option value="E4">E-4</option>
							<option value="E5" selected>E-5</option>
							<option value="E6">E-6</option>
							<option value="E7">E-7</option>
							<option value="E8">E-8</option>
							<option value="E9">E-9</option>
						</optgroup>
						<optgroup label="Warrant Officer">
							<option value="W1">W-1</option>
							<option value="W2">W-2</option>
							<option value="W3">W-3</option>
							<option value="W4">W-4</option>
							<option value="W5">W-5</option>
						</optgroup>
						<optgroup label="Officer">
							<option value="O1">O-1</option>
							<option value="O1E">O-1E (4+ yrs enlisted)</option>
							<option value="O2">O-2</option>
							<option value="O2E">O-2E (4+ yrs enlisted)</option>
							<option value="O3">O-3</option>
							<option value="O3E">O-3E (4+ yrs enlisted)</option>
							<option value="O4">O-4</option>
							<option value="O5">O-5</option>
							<option value="O6">O-6</option>
							<option value="O7">O-7</option>
							<option value="O8">O-8</option>
							<option value="O9">O-9</option>
							<option value="O10">O-10</option>
						</optgroup>
					</select>
				</div>

				<!-- Dependency Status -->
				<div class="nwmr-bah-field">
					<label>Dependency Status</label>
					<div class="nwmr-bah-toggle" role="group" aria-label="Dependency status">
						<button type="button" class="nwmr-bah-toggle__btn nwmr-bah-toggle__btn--active" data-dep="nodep">Without Dependents</button>
						<button type="button" class="nwmr-bah-toggle__btn" data-dep="dep">With Dependents</button>
					</div>
				</div>

				<!-- Zip Code -->
				<div class="nwmr-bah-field">
					<label for="nwmr-bah-zip">Your Zip Code <span class="nwmr-bah-field__note">(West Michigan)</span></label>
					<input type="text" id="nwmr-bah-zip" inputmode="numeric" pattern="[0-9]{5}" maxlength="5" placeholder="e.g. 49506">
					<p class="nwmr-bah-field__hint" id="nwmr-bah-zip-hint" aria-live="polite"></p>
				</div>

				<!-- VA Disability Compensation -->
				<div class="nwmr-bah-field">
					<label for="nwmr-bah-disability">VA Disability Compensation <span class="nwmr-bah-field__note">(monthly, if applicable)</span></label>
					<div class="nwmr-bah-dollar-wrap">
						<span class="nwmr-bah-dollar-wrap__sign" aria-hidden="true">$</span>
						<input type="number" id="nwmr-bah-disability" min="0" step="10" placeholder="0">
					</div>
				</div>

				<!-- Additional Monthly Income -->
				<div class="nwmr-bah-field">
					<label for="nwmr-bah-income">Additional Monthly Income <span class="nwmr-bah-field__note">(to apply toward housing)</span></label>
					<div class="nwmr-bah-dollar-wrap">
						<span class="nwmr-bah-dollar-wrap__sign" aria-hidden="true">$</span>
						<input type="number" id="nwmr-bah-income" min="0" step="50" placeholder="0">
					</div>
				</div>

				<!-- Interest Rate Slider — spans full width -->
				<div class="nwmr-bah-field nwmr-bah-field--full">
					<div class="nwmr-bah-slider-header">
						<label for="nwmr-bah-rate">Assumed Interest Rate</label>
						<span class="nwmr-bah-slider-value" id="nwmr-bah-rate-display" aria-live="polite">6.75%</span>
					</div>
					<input type="range" id="nwmr-bah-rate" min="3" max="12" step="0.125" value="6.75"
						aria-label="Interest rate assumption" aria-valuemin="3" aria-valuemax="12" aria-valuenow="6.75">
					<div class="nwmr-bah-slider-ticks" aria-hidden="true">
						<span>3%</span><span>5%</span><span>7%</span><span>9%</span><span>11%</span><span>12%</span>
					</div>
				</div>

			</div><!-- .nwmr-bah-card__fields -->

			<button type="button" class="nwmr-bah-btn" id="nwmr-bah-calc-btn">Calculate My BAH →</button>

		</div><!-- .nwmr-bah-card -->

		<!-- ── Results ───────────────────────────────────────────── -->
		<div class="nwmr-bah-results" id="nwmr-bah-results" hidden>

			<div class="nwmr-bah-results__summary">
				<div class="nwmr-bah-results__stat">
					<span class="nwmr-bah-results__label">Monthly BAH</span>
					<span class="nwmr-bah-results__value" id="nwmr-bah-monthly">—</span>
				</div>
				<div class="nwmr-bah-results__divider" aria-hidden="true"></div>
				<div class="nwmr-bah-results__stat" id="nwmr-bah-extra-stat" hidden>
					<span class="nwmr-bah-results__label">Extra Monthly Income</span>
					<span class="nwmr-bah-results__value nwmr-bah-results__value--gold" id="nwmr-bah-extra">—</span>
				</div>
				<div class="nwmr-bah-results__divider" id="nwmr-bah-extra-div" aria-hidden="true" hidden></div>
				<div class="nwmr-bah-results__stat">
					<span class="nwmr-bah-results__label">Total Housing Budget</span>
					<span class="nwmr-bah-results__value nwmr-bah-results__value--gold" id="nwmr-bah-budget">—</span>
				</div>
				<div class="nwmr-bah-results__divider" aria-hidden="true"></div>
				<div class="nwmr-bah-results__stat">
					<span class="nwmr-bah-results__label">Est. Max Home Price</span>
					<span class="nwmr-bah-results__value" id="nwmr-bah-maxprice">—</span>
				</div>
				<div class="nwmr-bah-results__divider" aria-hidden="true"></div>
				<div class="nwmr-bah-results__stat">
					<span class="nwmr-bah-results__label">Down Payment (VA)</span>
					<span class="nwmr-bah-results__value">$0</span>
				</div>
			</div>

			<p class="nwmr-bah-results__disclaimer">
				CY2026 Grand Rapids MHA rates. Affordability includes P&amp;I at your chosen rate + est. property tax (~1.5%/yr) + insurance (~0.6%/yr). No PMI — that's your VA benefit.
				<a href="https://www.defensetravel.dod.mil/site/bahCalc.cfm" target="_blank" rel="noopener noreferrer">Verify official rates at DoD →</a>
			</p>

			<!-- Neighborhood affordability -->
			<div class="nwmr-bah-areas" id="nwmr-bah-areas">
				<h4 class="nwmr-bah-areas__title">West Michigan Neighborhoods Within Your Budget</h4>
				<div class="nwmr-bah-areas__grid" id="nwmr-bah-areas-grid"></div>
				<p class="nwmr-bah-areas__none" id="nwmr-bah-areas-none" hidden>
					No neighborhoods match your current budget. Contact me — there may be options we can find together.
				</p>
			</div>

		</div><!-- .nwmr-bah-results -->

	</div><!-- .nwmr-bah-wrap -->

	<style>
	/* ── BAH Calculator ──────────────────────────────────────── */
	.nwmr-bah-wrap { max-width: 860px; margin: 0 auto; }

	.nwmr-bah-card {
		background: #fff;
		border: 1px solid rgba(200,169,107,0.35);
		border-radius: 12px;
		padding: clamp(1.5rem, 4vw, 2.5rem);
		box-shadow: 0 2px 16px rgba(11,31,58,.06);
	}
	.nwmr-bah-card__header { margin-bottom: 1.75rem; }
	.nwmr-bah-card__title {
		font-family: var(--wp--preset--font-family--montserrat, sans-serif);
		font-size: 1.25rem; font-weight: 700; color: #0B1F3A;
		margin: 0.75rem 0 0.5rem;
	}
	.nwmr-bah-card__sub { color: #374151; font-size: 0.9375rem; margin: 0; }

	.nwmr-bah-card__fields {
		display: grid;
		grid-template-columns: 1fr 1fr;
		gap: 1.25rem 1.5rem;
		margin-bottom: 1.75rem;
	}
	@media (max-width: 480px) { .nwmr-bah-card__fields { grid-template-columns: 1fr; } }

	.nwmr-bah-field--full { grid-column: 1 / -1; }

	.nwmr-bah-field label {
		display: block; font-weight: 600; font-size: 0.8125rem;
		text-transform: uppercase; letter-spacing: .04em;
		color: #374151; margin-bottom: 0.5rem;
	}
	.nwmr-bah-field__note { font-weight: 400; text-transform: none; letter-spacing: 0; color: #9CA3AF; font-size: 0.75rem; }

	.nwmr-bah-field select,
	.nwmr-bah-field input[type="text"],
	.nwmr-bah-field input[type="number"] {
		width: 100%; padding: 0.625rem 0.875rem;
		border: 1px solid #D1D5DB; border-radius: 6px;
		font-size: 0.9375rem; background: #fff; color: #0B1F3A;
		box-sizing: border-box; appearance: auto;
	}
	.nwmr-bah-field select:focus,
	.nwmr-bah-field input[type="text"]:focus,
	.nwmr-bah-field input[type="number"]:focus {
		outline: 2px solid #C8A96B; outline-offset: 1px; border-color: #C8A96B;
	}
	.nwmr-bah-field__hint { font-size: 0.8125rem; margin: 0.375rem 0 0; min-height: 1.2em; }
	.nwmr-bah-field__hint--warn { color: #B45309; }
	.nwmr-bah-field__hint--ok   { color: #166534; }

	/* Dollar input wrapper */
	.nwmr-bah-dollar-wrap { position: relative; }
	.nwmr-bah-dollar-wrap__sign {
		position: absolute; left: 0.875rem; top: 50%; transform: translateY(-50%);
		color: #6B7280; font-size: 0.9375rem; pointer-events: none;
	}
	.nwmr-bah-dollar-wrap input { padding-left: 1.625rem !important; }

	/* Dependency toggle */
	.nwmr-bah-toggle { display: flex; border: 1px solid #D1D5DB; border-radius: 6px; overflow: hidden; }
	.nwmr-bah-toggle__btn {
		flex: 1; padding: 0.625rem 0.5rem; background: #fff;
		border: none; cursor: pointer; font-size: 0.875rem; color: #374151;
		transition: background .15s, color .15s; line-height: 1.4;
	}
	.nwmr-bah-toggle__btn + .nwmr-bah-toggle__btn { border-left: 1px solid #D1D5DB; }
	.nwmr-bah-toggle__btn--active { background: #0B1F3A; color: #fff; font-weight: 600; }

	/* Interest rate slider */
	.nwmr-bah-slider-header {
		display: flex; justify-content: space-between; align-items: baseline;
		margin-bottom: 0.625rem;
	}
	.nwmr-bah-slider-header label { margin-bottom: 0; }
	.nwmr-bah-slider-value {
		font-size: 1.5rem; font-weight: 700; color: #C8A96B;
		font-family: var(--wp--preset--font-family--montserrat, sans-serif);
		line-height: 1;
	}

	input[type="range"]#nwmr-bah-rate {
		-webkit-appearance: none; appearance: none;
		width: 100%; height: 6px; border-radius: 3px;
		background: #E5E7EB; outline: none; cursor: pointer;
		/* filled portion set by JS via --pct custom property */
		background: linear-gradient(to right, #C8A96B var(--pct, 31%), #E5E7EB var(--pct, 31%));
	}
	input[type="range"]#nwmr-bah-rate::-webkit-slider-thumb {
		-webkit-appearance: none; appearance: none;
		width: 22px; height: 22px; border-radius: 50%;
		background: #0B1F3A; border: 3px solid #C8A96B;
		cursor: pointer; transition: transform .15s;
	}
	input[type="range"]#nwmr-bah-rate::-moz-range-thumb {
		width: 22px; height: 22px; border-radius: 50%;
		background: #0B1F3A; border: 3px solid #C8A96B;
		cursor: pointer;
	}
	input[type="range"]#nwmr-bah-rate:focus::-webkit-slider-thumb { transform: scale(1.15); }
	input[type="range"]#nwmr-bah-rate:focus { outline: none; }

	.nwmr-bah-slider-ticks {
		display: flex !important; justify-content: space-between;
		margin-top: 0.375rem; padding: 0 2px;
	}
	.nwmr-bah-slider-ticks span {
		display: inline !important; font-size: 0.75rem; color: #9CA3AF;
	}

	/* Calculate button */
	.nwmr-bah-btn {
		width: 100%; padding: 0.875rem 2rem;
		background: #C8A96B; color: #0B1F3A;
		font-family: var(--wp--preset--font-family--montserrat, sans-serif);
		font-weight: 700; font-size: 1rem;
		border: none; border-radius: 6px; cursor: pointer;
		transition: background .2s, transform .1s;
	}
	.nwmr-bah-btn:hover { background: #b8945a; }
	.nwmr-bah-btn:active { transform: scale(.98); }

	/* Results */
	.nwmr-bah-results { margin-top: 2rem; }
	.nwmr-bah-results__summary {
		display: flex; align-items: center; justify-content: space-around;
		flex-wrap: wrap; gap: 1rem;
		background: #0B1F3A; border-radius: 12px;
		padding: 1.5rem 2rem;
	}
	.nwmr-bah-results__stat { text-align: center; }
	.nwmr-bah-results__label {
		display: block; font-size: 0.6875rem; text-transform: uppercase;
		letter-spacing: .08em; color: rgba(255,255,255,0.55); margin-bottom: 0.375rem;
	}
	.nwmr-bah-results__value {
		display: block; font-size: 1.5rem; font-weight: 700; color: #fff;
		font-family: var(--wp--preset--font-family--montserrat, sans-serif);
	}
	.nwmr-bah-results__value--gold { color: #C8A96B; }
	.nwmr-bah-results__divider { width: 1px; height: 2.75rem; background: rgba(255,255,255,.12); flex-shrink: 0; }
	@media (max-width: 560px) { .nwmr-bah-results__divider { display: none; } }

	.nwmr-bah-results__disclaimer {
		font-size: 0.8125rem; color: #6B7280; margin: 0.875rem 0 0; line-height: 1.6;
	}
	.nwmr-bah-results__disclaimer a { color: #C8A96B; }

	/* Area cards */
	.nwmr-bah-areas { margin-top: 2rem; }
	.nwmr-bah-areas__title {
		font-family: var(--wp--preset--font-family--montserrat, sans-serif);
		font-size: 1.125rem; font-weight: 700; color: #0B1F3A; margin: 0 0 1.25rem;
	}
	.nwmr-bah-areas__grid {
		display: grid;
		grid-template-columns: repeat(auto-fill, minmax(210px, 1fr));
		gap: 1rem;
	}
	.nwmr-bah-area-card {
		border-radius: 10px; padding: 1.25rem 1.25rem 1rem;
		border: 2px solid transparent; text-decoration: none;
		display: flex; flex-direction: column; gap: 0.375rem;
		transition: transform .15s, box-shadow .15s;
	}
	.nwmr-bah-area-card:hover { transform: translateY(-3px); box-shadow: 0 8px 24px rgba(0,0,0,.1); }
	.nwmr-bah-area-card--fit     { background: #ECFDF5; border-color: #6EE7B7; }
	.nwmr-bah-area-card--stretch { background: #FFFBEB; border-color: #FCD34D; }
	.nwmr-bah-area-card__badge {
		font-size: 0.6875rem; font-weight: 700; text-transform: uppercase; letter-spacing: .07em;
	}
	.nwmr-bah-area-card--fit     .nwmr-bah-area-card__badge { color: #065F46; }
	.nwmr-bah-area-card--stretch .nwmr-bah-area-card__badge { color: #92400E; }
	.nwmr-bah-area-card__name  { font-weight: 700; color: #0B1F3A; font-size: 1rem; }
	.nwmr-bah-area-card__price { font-size: 0.875rem; color: #374151; }
	.nwmr-bah-area-card__link  { font-size: 0.8125rem; font-weight: 600; margin-top: 0.25rem; }
	.nwmr-bah-area-card--fit     .nwmr-bah-area-card__link { color: #065F46; }
	.nwmr-bah-area-card--stretch .nwmr-bah-area-card__link { color: #92400E; }

	.nwmr-bah-areas__none { color: #374151; font-size: 0.9375rem; }
	</style>
	<?php

	return ob_get_clean();
}

/**
 * Pull area guide posts with median prices.
 * Falls back to curated West Michigan defaults until area guides are published.
 *
 * @return array<array{name:string,price:int,url:string}>
 */
function nwmr_bah_get_area_data(): array {
	$areas = [];

	$posts = get_posts( [
		'post_type'      => 'area_guide',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => 'title',
		'order'          => 'ASC',
	] );

	foreach ( $posts as $post ) {
		$raw_price = get_post_meta( $post->ID, '_nwmr_area_median_price', true );
		$price     = (int) preg_replace( '/[^0-9]/', '', $raw_price );
		if ( $price < 1 ) {
			continue;
		}
		$areas[] = [
			'name'  => get_the_title( $post ),
			'price' => $price,
			'url'   => get_permalink( $post ),
		];
	}

	if ( empty( $areas ) ) {
		$areas = [
			[ 'name' => 'Lowell',       'price' => 320000, 'url' => home_url( '/area/lowell' ) ],
			[ 'name' => 'Grand Rapids', 'price' => 355000, 'url' => home_url( '/area/grand-rapids' ) ],
			[ 'name' => 'Holland',      'price' => 390000, 'url' => home_url( '/area/holland' ) ],
			[ 'name' => 'Rockford',     'price' => 415000, 'url' => home_url( '/area/rockford' ) ],
			[ 'name' => 'Grand Haven',  'price' => 440000, 'url' => home_url( '/area/grand-haven' ) ],
			[ 'name' => 'Spring Lake',  'price' => 460000, 'url' => home_url( '/area/spring-lake' ) ],
		];
	}

	return $areas;
}
