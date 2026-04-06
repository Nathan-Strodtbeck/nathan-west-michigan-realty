<?php
/**
 * Title: Lead Magnet — Free Guide Download
 * Slug: nathan-west-michigan-realty/lead-magnet
 * Categories: nwmr-cta, nwmr-sections
 * Description: Email capture section offering a free buyer checklist or VA guide.
 * Inserter: true
 */
?>
<!-- wp:group {"tagName":"section","className":"nwmr-lead-magnet","style":{"spacing":{"padding":{"top":"clamp(4rem,8vw,7rem)","bottom":"clamp(4rem,8vw,7rem)"}}},"layout":{"type":"constrained","wideSize":"1100px"}} -->
<section class="wp-block-group nwmr-lead-magnet" style="padding-top:clamp(4rem,8vw,7rem);padding-bottom:clamp(4rem,8vw,7rem)">

	<!-- wp:columns {"isStackedOnMobile":true,"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"3rem","left":"4rem"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center">

		<!-- Left: Book Cover Placeholder -->
		<!-- wp:column {"width":"35%","verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:35%">
			<!-- wp:html -->
			<div style="background:linear-gradient(135deg,#162d50 0%,#0B1F3A 100%);border:1px solid rgba(200,169,107,.25);border-radius:12px;padding:2.5rem 2rem;text-align:center;box-shadow:0 20px 50px rgba(0,0,0,.35)">
				<div style="font-size:3rem;margin-bottom:1rem" aria-hidden="true">📋</div>
				<div style="font-family:var(--wp--preset--font-family--montserrat);font-size:1.125rem;font-weight:800;color:#fff;line-height:1.3;margin-bottom:0.5rem">West Michigan<br>First-Time Buyer<br>Checklist</div>
				<div style="height:2px;background:#C8A96B;margin:1rem auto;width:40px;border-radius:2px"></div>
				<div style="font-size:0.8125rem;color:rgba(255,255,255,.6)">Free Download</div>
			</div>
			<!-- /wp:html -->
		</div>
		<!-- /wp:column -->

		<!-- Right: Form + Copy -->
		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">

			<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|montserrat","fontSize":"0.7rem","fontWeight":"700","letterSpacing":"0.18em","textTransform":"uppercase"},"color":{"text":"#C8A96B"},"spacing":{"margin":{"bottom":"0.75rem"}}}} -->
			<p style="font-family:var(--wp--preset--font-family--montserrat);font-size:0.7rem;font-weight:700;letter-spacing:0.18em;text-transform:uppercase;color:#C8A96B;margin-bottom:0.75rem">Free Resource</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":2,"textColor":"white","style":{"typography":{"fontFamily":"var:preset|font-family|montserrat","fontWeight":"700","fontSize":"clamp(1.75rem,3.5vw,2.5rem)"},"spacing":{"margin":{"bottom":"1rem"}}}} -->
			<h2 class="wp-block-heading has-white-color has-text-color" style="font-family:var(--wp--preset--font-family--montserrat);font-weight:700;font-size:clamp(1.75rem,3.5vw,2.5rem);margin-bottom:1rem">Get the Free West Michigan First-Time Buyer Checklist</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.78)"},"typography":{"fontSize":"1rem"},"spacing":{"margin":{"bottom":"1.75rem"}}}} -->
			<p style="color:rgba(255,255,255,0.78);font-size:1rem;margin-bottom:1.75rem">Everything you need to know before you buy your first home in West Michigan — from pre-approval to keys in hand. 8 pages, plain English, completely free.</p>
			<!-- /wp:paragraph -->

			<!-- wp:html -->
			<form class="nwmr-magnet-form" action="#" method="post" data-guide="buyer-checklist" novalidate>
				<input type="text" name="lead_name" placeholder="Your first name" autocomplete="given-name">
				<input type="email" name="lead_email" placeholder="Your email address" autocomplete="email" required>
				<button type="submit" data-label="Get the Free Guide">Get the Free Guide →</button>
			</form>
			<p class="nwmr-form-disclaimer">No spam, ever. We'll send your guide and keep you in the loop with local market news. Unsubscribe anytime.</p>
			<!-- /wp:html -->

			<!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.5)"},"typography":{"fontSize":"0.8125rem"},"spacing":{"margin":{"top":"1rem"}}}} -->
			<p style="color:rgba(255,255,255,0.5);font-size:0.8125rem;margin-top:1rem">Also available: <a href="/va-loans" style="color:#C8A96B;text-decoration:underline">VA Buyer's Guide for West Michigan Veterans →</a></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</section>
<!-- /wp:group -->
