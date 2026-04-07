<?php
/**
 * Title: Featured Listings Grid
 * Slug: nathan-west-michigan-realty/featured-listings
 * Categories: nwmr-listings, nwmr-sections
 * Description: Three featured listing cards with photo, price, and details. Replace with IDX widget when available.
 * Inserter: true
 */
?>
<!-- wp:group {"tagName":"section","backgroundColor":"light-gray","style":{"spacing":{"padding":{"top":"clamp(4rem,8vw,7rem)","bottom":"clamp(4rem,8vw,7rem)"}}},"layout":{"type":"constrained","wideSize":"1200px"}} -->
<section class="wp-block-group has-light-gray-background-color has-background" style="padding-top:clamp(4rem,8vw,7rem);padding-bottom:clamp(4rem,8vw,7rem)">

	<!-- Header -->
	<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"3rem"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"640px"}} -->
	<div class="wp-block-group" style="margin-bottom:3rem">
		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontFamily":"var:preset|font-family|montserrat","fontSize":"0.7rem","fontWeight":"700","letterSpacing":"0.18em","textTransform":"uppercase"},"color":{"text":"#C8A96B"},"spacing":{"margin":{"bottom":"0.75rem"}}}} -->
		<p class="has-text-align-center" style="font-family:var(--wp--preset--font-family--montserrat);font-size:0.7rem;font-weight:700;letter-spacing:0.18em;text-transform:uppercase;color:#C8A96B;margin-bottom:0.75rem">Handpicked for You</p>
		<!-- /wp:paragraph -->
		<!-- wp:heading {"textAlign":"center","level":2,"textColor":"navy","style":{"typography":{"fontFamily":"var:preset|font-family|montserrat","fontWeight":"700"},"spacing":{"margin":{"bottom":"1rem"}}}} -->
		<h2 class="wp-block-heading has-text-align-center has-navy-color has-text-color" style="font-family:var(--wp--preset--font-family--montserrat);font-weight:700;margin-bottom:1rem">Featured Listings</h2>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#374151"},"typography":{"fontSize":"1.0625rem"}}} -->
		<p class="has-text-align-center" style="color:#374151;font-size:1.0625rem">Browse current homes for sale across West Michigan. Updated live from the MLS.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- Showcase IDX: Live Listings -->
	<!-- wp:shortcode -->
[showcaseidx_search]
	<!-- /wp:shortcode -->

	<!-- View All / Search CTA -->
	<!-- wp:group {"style":{"spacing":{"margin":{"top":"2.5rem"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-group" style="margin-top:2.5rem">
		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"backgroundColor":"navy","textColor":"white","style":{"border":{"radius":"4px"},"spacing":{"padding":{"top":"0.875rem","bottom":"0.875rem","left":"2rem","right":"2rem"}},"typography":{"fontFamily":"var:preset|font-family|montserrat","fontWeight":"600","letterSpacing":"0.04em"}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-navy-background-color has-text-color has-background wp-element-link" href="/featured-listings" style="border-radius:4px;padding:0.875rem 2rem;font-family:var(--wp--preset--font-family--montserrat);font-weight:600;letter-spacing:0.04em">Search All West Michigan Homes</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:group -->
