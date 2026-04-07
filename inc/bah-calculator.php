<?php
/**
 * BAH Calculator — shortcode and script registration.
 *
 * Shortcode: [nwmr_bah_calculator]
 *
 * @package nathan-west-michigan-realty
 */

defined( 'ABSPATH' ) || exit;

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

add_shortcode( 'nwmr_bah_calculator', 'nwmr_bah_calculator_shortcode' );
function nwmr_bah_calculator_shortcode(): string {

	wp_enqueue_script( 'nwmr-bah-calculator' );
	wp_localize_script( 'nwmr-bah-calculator', 'nwmrBah', [
		'areas' => nwmr_bah_get_area_data(),
	] );

	ob_start();
	?>
<style>
/* ── BAH Calculator ─────────────────────────────────────────────────── */
.nwmr-bah-wrap {
	max-width: 860px;
	margin: 0 auto;
	font-family: var(--wp--preset--font-family--inter, system-ui, sans-serif);
}

/* Hero */
.nwmr-bah-hero { margin-bottom: 1.5rem; }
.nwmr-bah-hero__title {
	font-family: var(--wp--preset--font-family--montserrat, sans-serif);
	font-size: clamp(1.25rem, 3vw, 1.625rem);
	font-weight: 800;
	color: #0B1F3A;
	margin: 0 0 0.5rem;
	line-height: 1.25;
}
.nwmr-bah-hero__sub { color: #4B5563; font-size: 0.9375rem; margin: 0; }

/* Card */
.nwmr-bah-card {
	background: #F9FAFB;
	border: 1px solid #E5E7EB;
	border-radius: 12px;
	padding: clamp(1.25rem, 4vw, 2rem);
}

/* Two-column field row */
.nwmr-bah-fields-row {
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 1.25rem 1.5rem;
	margin-bottom: 1.25rem;
}
@media (max-width: 480px) { .nwmr-bah-fields-row { grid-template-columns: 1fr; } }

/* Field labels */
.nwmr-bah-field label {
	display: block;
	font-weight: 600;
	font-size: 0.8125rem;
	text-transform: uppercase;
	letter-spacing: .05em;
	color: #374151;
	margin-bottom: 0.5rem;
}
.nwmr-bah-field__note {
	font-weight: 400;
	text-transform: none;
	letter-spacing: 0;
	color: #9CA3AF;
	font-size: 0.75rem;
}
.nwmr-bah-field select,
.nwmr-bah-field input[type="text"],
.nwmr-bah-field input[type="number"] {
	width: 100%;
	padding: 0.6875rem 0.875rem;
	border: 1.5px solid #D1D5DB;
	border-radius: 8px;
	font-size: 0.9375rem;
	background: #fff;
	color: #0B1F3A;
	box-sizing: border-box;
	transition: border-color .15s, box-shadow .15s;
}
.nwmr-bah-field select:focus,
.nwmr-bah-field input[type="text"]:focus,
.nwmr-bah-field input[type="number"]:focus {
	outline: none;
	border-color: #C8A96B;
	box-shadow: 0 0 0 3px rgba(200,169,107,.18);
}

/* ZIP field */
.nwmr-bah-field--zip { margin-bottom: 0; }
.nwmr-bah-zip-row input { max-width: 14rem; }
.nwmr-bah-field__hint { font-size: 0.8125rem; margin: 0.375rem 0 0; min-height: 1.2em; }
.nwmr-bah-field__hint--warn { color: #B45309; }
.nwmr-bah-field__hint--ok   { color: #166534; font-weight: 500; }

/* Dollar input */
.nwmr-bah-dollar-wrap { position: relative; }
.nwmr-bah-dollar-wrap__sign {
	position: absolute; left: 0.875rem; top: 50%;
	transform: translateY(-50%);
	color: #6B7280; font-size: 0.9375rem; pointer-events: none;
}
.nwmr-bah-dollar-wrap input { padding-left: 1.625rem !important; }

/* Dependency toggle */
.nwmr-bah-toggle {
	display: flex;
	border: 1.5px solid #D1D5DB;
	border-radius: 8px;
	overflow: hidden;
	background: #fff;
}
.nwmr-bah-toggle__btn {
	flex: 1; padding: 0.6875rem 0.5rem;
	background: transparent; border: none;
	cursor: pointer; font-size: 0.875rem; color: #374151;
	transition: background .15s, color .15s;
	line-height: 1.4; font-weight: 500;
}
.nwmr-bah-toggle__btn + .nwmr-bah-toggle__btn { border-left: 1.5px solid #D1D5DB; }
.nwmr-bah-toggle__btn--active { background: #0B1F3A; color: #fff; font-weight: 700; }

/* Separator */
.nwmr-bah-sep { height: 1px; background: #E5E7EB; margin: 1.25rem 0; }

/* Accordion */
.nwmr-bah-accordion { border: none; }
.nwmr-bah-accordion > summary { list-style: none; }
.nwmr-bah-accordion > summary::-webkit-details-marker { display: none; }
.nwmr-bah-accordion__summary {
	cursor: pointer;
	display: flex;
	align-items: center;
	gap: 0.5rem;
	font-weight: 600;
	font-size: 0.9375rem;
	color: #0B1F3A;
	padding: 0.375rem 0;
	user-select: none;
}
.nwmr-bah-accordion__summary:hover { color: #C8A96B; }
.nwmr-bah-accordion__chevron {
	font-size: 1.125rem;
	transition: transform .2s;
	display: inline-block;
	color: #C8A96B;
	line-height: 1;
	font-style: normal;
}
.nwmr-bah-accordion[open] .nwmr-bah-accordion__chevron { transform: rotate(90deg); }
.nwmr-bah-accordion__note { font-weight: 400; font-size: 0.8125rem; color: #9CA3AF; }
.nwmr-bah-accordion__body { padding-top: 1.25rem; }

/* Slider */
.nwmr-bah-slider-header {
	display: flex; justify-content: space-between; align-items: baseline;
	margin-bottom: 0.75rem;
}
.nwmr-bah-slider-header label {
	font-weight: 600; font-size: 0.8125rem;
	text-transform: uppercase; letter-spacing: .05em;
	color: #374151; margin: 0;
}
.nwmr-bah-slider-value {
	font-size: 1.625rem; font-weight: 800; color: #C8A96B;
	font-family: var(--wp--preset--font-family--montserrat, sans-serif);
	line-height: 1;
}
input[type="range"]#nwmr-bah-rate {
	-webkit-appearance: none; appearance: none;
	width: 100%; height: 6px; border-radius: 3px;
	outline: none; cursor: pointer;
	background: linear-gradient(to right, #C8A96B var(--pct, 41%), #E5E7EB var(--pct, 41%));
}
input[type="range"]#nwmr-bah-rate::-webkit-slider-thumb {
	-webkit-appearance: none; appearance: none;
	width: 22px; height: 22px; border-radius: 50%;
	background: #0B1F3A; border: 3px solid #C8A96B;
	cursor: pointer; transition: transform .15s;
}
input[type="range"]#nwmr-bah-rate::-moz-range-thumb {
	width: 22px; height: 22px; border-radius: 50%;
	background: #0B1F3A; border: 3px solid #C8A96B; cursor: pointer;
}
input[type="range"]#nwmr-bah-rate:focus::-webkit-slider-thumb { transform: scale(1.15); }
input[type="range"]#nwmr-bah-rate:focus { outline: none; }
.nwmr-bah-slider-ticks {
	display: flex !important; justify-content: space-between;
	margin-top: 0.375rem; padding: 0 2px;
}
.nwmr-bah-slider-ticks span { display: inline !important; font-size: 0.75rem; color: #9CA3AF; }

/* Assumptions table */
.nwmr-bah-assumptions {
	display: flex; flex-direction: column;
	border: 1px solid #E5E7EB; border-radius: 8px;
	overflow: hidden; margin-top: 1.25rem; font-size: 0.8125rem;
}
.nwmr-bah-assumptions > div { display: flex; border-bottom: 1px solid #E5E7EB; }
.nwmr-bah-assumptions > div:last-child { border-bottom: none; }
.nwmr-bah-assumptions dt {
	font-weight: 600; color: #374151; background: #F9FAFB;
	padding: 0.5rem 0.75rem; width: 9.5rem; flex-shrink: 0;
}
.nwmr-bah-assumptions dd { color: #6B7280; padding: 0.5rem 0.75rem; margin: 0; flex: 1; }

/* ── Results ────────────────────────────────────────────────────────── */
.nwmr-bah-results { margin-top: 1.5rem; }

/* Stat bar (dark) */
.nwmr-bah-results__bar {
	display: flex; align-items: center; justify-content: space-around;
	flex-wrap: wrap; gap: 1rem;
	background: #0B1F3A; border-radius: 12px 12px 0 0;
	padding: 1.25rem 1.75rem;
}
.nwmr-bah-results__stat { text-align: center; }
.nwmr-bah-results__label {
	display: block; font-size: 0.625rem;
	text-transform: uppercase; letter-spacing: .1em;
	color: rgba(255,255,255,.5); margin-bottom: 0.25rem;
}
.nwmr-bah-results__value {
	display: block; font-size: 1.25rem; font-weight: 700; color: #fff;
	font-family: var(--wp--preset--font-family--montserrat, sans-serif);
}
.nwmr-bah-results__value--gold { color: #C8A96B; }
.nwmr-bah-results__divider { width: 1px; height: 2.5rem; background: rgba(255,255,255,.15); flex-shrink: 0; }
@media (max-width: 500px) { .nwmr-bah-results__divider { display: none; } }

/* Main panel */
.nwmr-bah-results__main {
	display: grid; grid-template-columns: 1fr 1fr;
	background: #fff;
	border: 1px solid #E5E7EB; border-top: none;
	border-radius: 0 0 12px 12px;
}
@media (max-width: 560px) { .nwmr-bah-results__main { grid-template-columns: 1fr; } }

.nwmr-bah-results__price-block {
	padding: 1.75rem 1.75rem 1.5rem;
	border-right: 1px solid #E5E7EB;
}
@media (max-width: 560px) {
	.nwmr-bah-results__price-block { border-right: none; border-bottom: 1px solid #E5E7EB; }
}
.nwmr-bah-results__price-label {
	font-size: 0.6875rem; text-transform: uppercase;
	letter-spacing: .1em; color: #9CA3AF; margin-bottom: 0.25rem;
}
.nwmr-bah-results__price {
	font-family: var(--wp--preset--font-family--montserrat, sans-serif);
	font-size: clamp(2rem, 4.5vw, 2.75rem);
	font-weight: 800; color: #0B1F3A;
	line-height: 1; margin-bottom: 1.25rem;
}
.nwmr-bah-results__range-label {
	font-size: 0.6875rem; text-transform: uppercase;
	letter-spacing: .1em; color: #9CA3AF; margin-bottom: 0.25rem;
}
.nwmr-bah-results__range {
	font-family: var(--wp--preset--font-family--montserrat, sans-serif);
	font-size: 1.0625rem; font-weight: 700; color: #C8A96B;
}
.nwmr-bah-results__range-note { font-size: 0.75rem; color: #9CA3AF; margin-top: 0.25rem; }

/* Breakdown block */
.nwmr-bah-results__breakdown-block { padding: 1.75rem 1.75rem 1.5rem; }
.nwmr-bah-results__breakdown-title {
	font-size: 0.6875rem; text-transform: uppercase;
	letter-spacing: .1em; color: #9CA3AF; margin-bottom: 0.875rem;
}
.nwmr-bah-results__breakdown {
	border: 1px solid #F3F4F6; border-radius: 8px;
	overflow: hidden; margin-bottom: 0.875rem;
}
.nwmr-bah-results__brow {
	display: flex; justify-content: space-between;
	padding: 0.5rem 0.75rem; font-size: 0.875rem; color: #4B5563;
	border-bottom: 1px solid #F3F4F6;
}
.nwmr-bah-results__brow:last-child { border-bottom: none; }
.nwmr-bah-results__brow--total {
	background: #F9FAFB; font-weight: 700;
	color: #0B1F3A; font-size: 0.9375rem;
}
.nwmr-bah-results__va-note {
	font-size: 0.75rem; color: #166534; font-weight: 600;
	background: #ECFDF5; border-radius: 4px;
	padding: 0.375rem 0.625rem; display: inline-block;
}

/* Affordability message */
.nwmr-bah-results__message {
	margin-top: 1.25rem;
	padding: 1rem 1.25rem;
	background: #FFFBEB; border: 1px solid #FDE68A;
	border-radius: 10px; font-size: 0.9375rem;
	color: #374151; font-weight: 500; line-height: 1.5;
}
.nwmr-bah-results__message:empty { display: none; }

/* Disclaimer */
.nwmr-bah-results__disclaimer { font-size: 0.8125rem; color: #9CA3AF; margin: 0.875rem 0 0; }
.nwmr-bah-results__disclaimer a { color: #C8A96B; text-decoration: none; }
.nwmr-bah-results__disclaimer a:hover { text-decoration: underline; }

/* Area cards */
.nwmr-bah-areas { margin-top: 2rem; }
.nwmr-bah-areas__title {
	font-family: var(--wp--preset--font-family--montserrat, sans-serif);
	font-size: 1.125rem; font-weight: 700; color: #0B1F3A; margin: 0 0 1.25rem;
}
.nwmr-bah-areas__grid {
	display: grid;
	grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
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
.nwmr-bah-area-card__badge { font-size: 0.6875rem; font-weight: 700; text-transform: uppercase; letter-spacing: .07em; }
.nwmr-bah-area-card--fit     .nwmr-bah-area-card__badge { color: #065F46; }
.nwmr-bah-area-card--stretch .nwmr-bah-area-card__badge { color: #92400E; }
.nwmr-bah-area-card__name  { font-weight: 700; color: #0B1F3A; font-size: 1rem; }
.nwmr-bah-area-card__price { font-size: 0.875rem; color: #374151; }
.nwmr-bah-area-card__link  { font-size: 0.8125rem; font-weight: 600; margin-top: 0.25rem; }
.nwmr-bah-area-card--fit     .nwmr-bah-area-card__link { color: #065F46; }
.nwmr-bah-area-card--stretch .nwmr-bah-area-card__link { color: #92400E; }
.nwmr-bah-areas__none { color: #4B5563; font-size: 0.9375rem; }
.nwmr-bah-areas__none a { color: #C8A96B; }

/* CTA */
.nwmr-bah-cta {
	margin-top: 2rem;
	background: #0B1F3A; border-radius: 12px;
	padding: 1.5rem 2rem;
	display: flex; align-items: center; justify-content: space-between;
	gap: 1.5rem; flex-wrap: wrap;
}
.nwmr-bah-cta__copy { display: flex; flex-direction: column; gap: 0.25rem; }
.nwmr-bah-cta__copy strong {
	font-family: var(--wp--preset--font-family--montserrat, sans-serif);
	font-size: 1rem; font-weight: 700; color: #fff;
}
.nwmr-bah-cta__copy span { font-size: 0.875rem; color: rgba(255,255,255,.65); }
.nwmr-bah-cta__btn {
	background: #C8A96B; color: #0B1F3A;
	font-family: var(--wp--preset--font-family--montserrat, sans-serif);
	font-weight: 700; font-size: 0.9375rem;
	padding: 0.75rem 1.5rem; border-radius: 6px;
	text-decoration: none; white-space: nowrap;
	transition: background .2s; flex-shrink: 0;
}
.nwmr-bah-cta__btn:hover { background: #b8945a; color: #0B1F3A; }
</style>

<div class="nwmr-bah-wrap" id="nwmr-bah-calculator">

	<div class="nwmr-bah-hero">
		<h3 class="nwmr-bah-hero__title">Find Out What You Can Afford in West Michigan Using Your BAH</h3>
		<p class="nwmr-bah-hero__sub">Adjust your pay grade and see your home buying power update instantly — no email required.</p>
	</div>

	<div class="nwmr-bah-card">

		<div class="nwmr-bah-fields-row">
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
			<div class="nwmr-bah-field">
				<label>Dependency Status</label>
				<div class="nwmr-bah-toggle" role="group" aria-label="Dependency status">
					<button type="button" class="nwmr-bah-toggle__btn nwmr-bah-toggle__btn--active" data-dep="nodep" aria-pressed="true">Without Dependents</button>
					<button type="button" class="nwmr-bah-toggle__btn" data-dep="dep" aria-pressed="false">With Dependents</button>
				</div>
			</div>
		</div>

		<div class="nwmr-bah-field nwmr-bah-field--zip">
			<label for="nwmr-bah-zip">ZIP Code <span class="nwmr-bah-field__note">(confirms West Michigan MHA)</span></label>
			<div class="nwmr-bah-zip-row">
				<input type="text" id="nwmr-bah-zip" inputmode="numeric" pattern="[0-9]{5}" maxlength="5" placeholder="e.g. 49506">
				<p class="nwmr-bah-field__hint" id="nwmr-bah-zip-hint" aria-live="polite"></p>
			</div>
		</div>

		<div class="nwmr-bah-sep"></div>

		<details class="nwmr-bah-accordion" id="nwmr-bah-income-details">
			<summary class="nwmr-bah-accordion__summary">
				<i class="nwmr-bah-accordion__chevron" aria-hidden="true">›</i>
				Add income sources
				<span class="nwmr-bah-accordion__note">VA disability, spouse income — improves your estimate</span>
			</summary>
			<div class="nwmr-bah-accordion__body">
				<div class="nwmr-bah-fields-row">
					<div class="nwmr-bah-field">
						<label for="nwmr-bah-disability">VA Disability Compensation <span class="nwmr-bah-field__note">(monthly)</span></label>
						<div class="nwmr-bah-dollar-wrap">
							<span class="nwmr-bah-dollar-wrap__sign" aria-hidden="true">$</span>
							<input type="number" id="nwmr-bah-disability" min="0" step="10" placeholder="0" inputmode="numeric">
						</div>
					</div>
					<div class="nwmr-bah-field">
						<label for="nwmr-bah-income">Additional Monthly Income <span class="nwmr-bah-field__note">(toward housing)</span></label>
						<div class="nwmr-bah-dollar-wrap">
							<span class="nwmr-bah-dollar-wrap__sign" aria-hidden="true">$</span>
							<input type="number" id="nwmr-bah-income" min="0" step="50" placeholder="0" inputmode="numeric">
						</div>
					</div>
				</div>
			</div>
		</details>

		<div class="nwmr-bah-sep"></div>

		<details class="nwmr-bah-accordion" id="nwmr-bah-rate-details">
			<summary class="nwmr-bah-accordion__summary">
				<i class="nwmr-bah-accordion__chevron" aria-hidden="true">›</i>
				Loan assumptions
				<span class="nwmr-bah-accordion__note" id="nwmr-bah-rate-summary-note">VA 30-yr at 6.75%</span>
			</summary>
			<div class="nwmr-bah-accordion__body">
				<div class="nwmr-bah-slider-header">
					<label for="nwmr-bah-rate">Assumed Interest Rate</label>
					<span class="nwmr-bah-slider-value" id="nwmr-bah-rate-display" aria-live="polite">6.75%</span>
				</div>
				<input type="range" id="nwmr-bah-rate" min="3" max="12" step="0.125" value="6.75"
					aria-label="Interest rate" aria-valuemin="3" aria-valuemax="12" aria-valuenow="6.75">
				<div class="nwmr-bah-slider-ticks" aria-hidden="true">
					<span>3%</span><span>5%</span><span>7%</span><span>9%</span><span>11%</span><span>12%</span>
				</div>
				<dl class="nwmr-bah-assumptions">
					<div><dt>Loan type</dt><dd>VA (0% down, no PMI)</dd></div>
					<div><dt>Term</dt><dd>30 years, fixed</dd></div>
					<div><dt>Property tax</dt><dd>~1.5%/yr (Michigan avg)</dd></div>
					<div><dt>Insurance</dt><dd>~0.6%/yr</dd></div>
					<div><dt>Budget used</dt><dd>100% of BAH + supplemental income</dd></div>
				</dl>
			</div>
		</details>

	</div><!-- .nwmr-bah-card -->

	<!-- ── Results ─────────────────────────────────────────── -->
	<div class="nwmr-bah-results" id="nwmr-bah-results" hidden>

		<div class="nwmr-bah-results__bar">
			<div class="nwmr-bah-results__stat">
				<span class="nwmr-bah-results__label">Monthly BAH</span>
				<span class="nwmr-bah-results__value" id="nwmr-bah-monthly">—</span>
			</div>
			<div class="nwmr-bah-results__divider" id="nwmr-bah-extra-div" hidden aria-hidden="true"></div>
			<div class="nwmr-bah-results__stat" id="nwmr-bah-extra-stat" hidden>
				<span class="nwmr-bah-results__label">+ Extra Income</span>
				<span class="nwmr-bah-results__value nwmr-bah-results__value--gold" id="nwmr-bah-extra">—</span>
			</div>
			<div class="nwmr-bah-results__divider" aria-hidden="true"></div>
			<div class="nwmr-bah-results__stat">
				<span class="nwmr-bah-results__label">Total Housing Budget</span>
				<span class="nwmr-bah-results__value nwmr-bah-results__value--gold" id="nwmr-bah-budget">—</span>
			</div>
		</div>

		<div class="nwmr-bah-results__main">
			<div class="nwmr-bah-results__price-block">
				<div class="nwmr-bah-results__price-label">Est. Max Home Price</div>
				<div class="nwmr-bah-results__price" id="nwmr-bah-maxprice">—</div>
				<div class="nwmr-bah-results__range-label">Recommended range</div>
				<div class="nwmr-bah-results__range" id="nwmr-bah-range">—</div>
				<div class="nwmr-bah-results__range-note">Leaves a monthly buffer for maintenance &amp; utilities</div>
			</div>
			<div class="nwmr-bah-results__breakdown-block">
				<div class="nwmr-bah-results__breakdown-title">Monthly breakdown at max price</div>
				<div class="nwmr-bah-results__breakdown">
					<div class="nwmr-bah-results__brow">
						<span>Principal &amp; Interest</span>
						<span id="nwmr-bah-pi">—</span>
					</div>
					<div class="nwmr-bah-results__brow">
						<span>Property Taxes (~1.5%/yr)</span>
						<span id="nwmr-bah-tax">—</span>
					</div>
					<div class="nwmr-bah-results__brow">
						<span>Insurance (~0.6%/yr)</span>
						<span id="nwmr-bah-ins">—</span>
					</div>
					<div class="nwmr-bah-results__brow nwmr-bah-results__brow--total">
						<span>Total / month</span>
						<span id="nwmr-bah-total-mo">—</span>
					</div>
				</div>
				<div class="nwmr-bah-results__va-note">$0 cash to close &mdash; VA loan benefit</div>
			</div>
		</div>

		<div class="nwmr-bah-results__message" id="nwmr-bah-message" aria-live="polite"></div>

		<p class="nwmr-bah-results__disclaimer">
			CY2026 Grand Rapids MHA rates.
			<a href="https://www.defensetravel.dod.mil/site/bahCalc.cfm" target="_blank" rel="noopener noreferrer">Verify official rates at DoD &rarr;</a>
		</p>

		<div class="nwmr-bah-areas">
			<h4 class="nwmr-bah-areas__title">West Michigan Neighborhoods Within Your Budget</h4>
			<div class="nwmr-bah-areas__grid" id="nwmr-bah-areas-grid"></div>
			<p class="nwmr-bah-areas__none" id="nwmr-bah-areas-none" hidden>
				No neighborhoods match at this budget. <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Contact me</a> &mdash; there may be great options we can find together.
			</p>
		</div>

		<div class="nwmr-bah-cta">
			<div class="nwmr-bah-cta__copy">
				<strong>Ready to see homes in your price range?</strong>
				<span>I&rsquo;ll put together a curated list of VA-eligible homes &mdash; no obligation.</span>
			</div>
			<a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="nwmr-bah-cta__btn">Get My Personalized Home List &rarr;</a>
		</div>

	</div><!-- .nwmr-bah-results -->

</div><!-- .nwmr-bah-wrap -->
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
