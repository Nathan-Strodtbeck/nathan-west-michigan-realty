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
		<p class="has-text-align-center" style="color:#374151;font-size:1.0625rem">A curated look at homes available across West Michigan. Full MLS search coming soon.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- Listing Cards Grid -->
	<!-- wp:columns {"isStackedOnMobile":true,"style":{"spacing":{"blockGap":{"top":"1.75rem","left":"1.75rem"}}}} -->
	<div class="wp-block-columns">

		<!-- Card 1 -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"nwmr-listing-card","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"white","layout":{"type":"constrained","contentSize":"100%"}} -->
			<div class="wp-block-group nwmr-listing-card has-white-background-color has-background" style="border-radius:12px;overflow:hidden">
				<!-- wp:html -->
				<div class="nwmr-listing-card__image">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/listing-placeholder-1.jpg" alt="123 Maple Street, Grand Rapids" loading="lazy" width="600" height="400">
					<span class="nwmr-listing-card__badge nwmr-listing-card__badge--active">Active</span>
				</div>
				<!-- /wp:html -->
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"1.25rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="padding:1.25rem 1.5rem 1.5rem">
					<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|montserrat","fontSize":"1.375rem","fontWeight":"700"},"color":{"text":"#0B1F3A"},"spacing":{"margin":{"bottom":"0.25rem"}}}} -->
					<p style="font-family:var(--wp--preset--font-family--montserrat);font-size:1.375rem;font-weight:700;color:#0B1F3A;margin-bottom:0.25rem">$349,900</p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.9375rem"},"color":{"text":"#374151"},"spacing":{"margin":{"bottom":"0.875rem"}}}} -->
					<p style="font-size:0.9375rem;color:#374151;margin-bottom:0.875rem">123 Maple Street, Grand Rapids, MI 49505</p>
					<!-- /wp:paragraph -->
					<!-- wp:html -->
					<div class="nwmr-listing-card__stats">
						<span class="nwmr-listing-card__stat"><strong>3</strong> bd</span>
						<span class="nwmr-listing-card__stat"><strong>2</strong> ba</span>
						<span class="nwmr-listing-card__stat"><strong>1,820</strong> sqft</span>
					</div>
					<!-- /wp:html -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- Card 2 -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"nwmr-listing-card","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"white","layout":{"type":"constrained","contentSize":"100%"}} -->
			<div class="wp-block-group nwmr-listing-card has-white-background-color has-background" style="border-radius:12px;overflow:hidden">
				<!-- wp:html -->
				<div class="nwmr-listing-card__image">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/listing-placeholder-2.jpg" alt="456 Lakeview Drive, Grand Haven" loading="lazy" width="600" height="400">
					<span class="nwmr-listing-card__badge nwmr-listing-card__badge--active">Active</span>
				</div>
				<!-- /wp:html -->
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"1.25rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="padding:1.25rem 1.5rem 1.5rem">
					<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|montserrat","fontSize":"1.375rem","fontWeight":"700"},"color":{"text":"#0B1F3A"},"spacing":{"margin":{"bottom":"0.25rem"}}}} -->
					<p style="font-family:var(--wp--preset--font-family--montserrat);font-size:1.375rem;font-weight:700;color:#0B1F3A;margin-bottom:0.25rem">$287,500</p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.9375rem"},"color":{"text":"#374151"},"spacing":{"margin":{"bottom":"0.875rem"}}}} -->
					<p style="font-size:0.9375rem;color:#374151;margin-bottom:0.875rem">456 Lakeview Drive, Grand Haven, MI 49417</p>
					<!-- /wp:paragraph -->
					<!-- wp:html -->
					<div class="nwmr-listing-card__stats">
						<span class="nwmr-listing-card__stat"><strong>2</strong> bd</span>
						<span class="nwmr-listing-card__stat"><strong>1</strong> ba</span>
						<span class="nwmr-listing-card__stat"><strong>1,340</strong> sqft</span>
					</div>
					<!-- /wp:html -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- Card 3 -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"nwmr-listing-card","style":{"border":{"radius":"12px"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"white","layout":{"type":"constrained","contentSize":"100%"}} -->
			<div class="wp-block-group nwmr-listing-card has-white-background-color has-background" style="border-radius:12px;overflow:hidden">
				<!-- wp:html -->
				<div class="nwmr-listing-card__image">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/listing-placeholder-3.jpg" alt="789 River Rd, Lowell" loading="lazy" width="600" height="400">
					<span class="nwmr-listing-card__badge nwmr-listing-card__badge--pending">Pending</span>
				</div>
				<!-- /wp:html -->
				<!-- wp:group {"style":{"spacing":{"padding":{"top":"1.25rem","bottom":"1.5rem","left":"1.5rem","right":"1.5rem"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="padding:1.25rem 1.5rem 1.5rem">
					<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|montserrat","fontSize":"1.375rem","fontWeight":"700"},"color":{"text":"#0B1F3A"},"spacing":{"margin":{"bottom":"0.25rem"}}}} -->
					<p style="font-family:var(--wp--preset--font-family--montserrat);font-size:1.375rem;font-weight:700;color:#0B1F3A;margin-bottom:0.25rem">$414,000</p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.9375rem"},"color":{"text":"#374151"},"spacing":{"margin":{"bottom":"0.875rem"}}}} -->
					<p style="font-size:0.9375rem;color:#374151;margin-bottom:0.875rem">789 River Road, Lowell, MI 49331</p>
					<!-- /wp:paragraph -->
					<!-- wp:html -->
					<div class="nwmr-listing-card__stats">
						<span class="nwmr-listing-card__stat"><strong>4</strong> bd</span>
						<span class="nwmr-listing-card__stat"><strong>2.5</strong> ba</span>
						<span class="nwmr-listing-card__stat"><strong>2,200</strong> sqft</span>
					</div>
					<!-- /wp:html -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- IDX Placeholder Notice -->
	<!-- wp:group {"style":{"spacing":{"margin":{"top":"2.5rem"}}},"layout":{"type":"constrained","contentSize":"640px"}} -->
	<div class="wp-block-group" style="margin-top:2.5rem">
		<!-- wp:html -->
		<div class="nwmr-idx-placeholder">
			<h3>Full MLS Search Coming Soon</h3>
			<p>When your IDX provider is connected, replace this section with their embed widget or shortcode. Popular options: iHomefinder, IDX Broker, Showcase IDX.</p>
			<p style="margin-top:1rem"><a href="/contact" style="color:#0B1F3A;font-weight:600">Contact Nathan to discuss current listings →</a></p>
		</div>
		<!-- /wp:html -->
	</div>
	<!-- /wp:group -->

	<!-- View All CTA -->
	<!-- wp:group {"style":{"spacing":{"margin":{"top":"2.5rem"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-group" style="margin-top:2.5rem">
		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"backgroundColor":"navy","textColor":"white","style":{"border":{"radius":"4px"},"spacing":{"padding":{"top":"0.875rem","bottom":"0.875rem","left":"2rem","right":"2rem"}},"typography":{"fontFamily":"var:preset|font-family|montserrat","fontWeight":"600","letterSpacing":"0.04em"}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-navy-background-color has-text-color has-background wp-element-link" href="/featured-listings" style="border-radius:4px;padding:0.875rem 2rem;font-family:var(--wp--preset--font-family--montserrat);font-weight:600;letter-spacing:0.04em">View All Listings</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:group -->
