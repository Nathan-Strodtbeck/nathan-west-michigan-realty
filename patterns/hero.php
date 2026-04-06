<?php
/**
 * Title: Homepage Hero
 * Slug: nathan-west-michigan-realty/hero
 * Categories: nwmr-hero
 * Description: Full-width hero with headline, subheadline, dual CTAs, and search placeholder.
 * Keywords: hero, home, real estate, search
 * Inserter: true
 */
?>
<!-- wp:cover {"dimRatio":65,"overlayColor":"navy","isUserOverlayColor":true,"minHeight":90,"minHeightUnit":"vh","contentPosition":"center center","isDark":true,"className":"nwmr-hero","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light nwmr-hero" style="min-height:90vh">
<span aria-hidden="true" class="wp-block-cover__background has-navy-background-color has-background-dim-65 has-background-dim"></span>
<!-- Replace src with an actual hero photo. Recommended: 1920×900px. -->
<img class="wp-block-cover__image-background" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/hero-placeholder.jpg" alt="" data-object-fit="cover" loading="eager"/>
<div class="wp-block-cover__inner-container">

	<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"740px"}} -->
	<div class="wp-block-group">

		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontFamily":"var:preset|font-family|montserrat","fontSize":"0.7rem","fontWeight":"700","letterSpacing":"0.18em","textTransform":"uppercase"},"color":{"text":"#C8A96B"},"spacing":{"margin":{"bottom":"1rem"}}}} -->
		<p class="has-text-align-center" style="font-family:var(--wp--preset--font-family--montserrat);font-size:0.7rem;font-weight:700;letter-spacing:0.18em;text-transform:uppercase;color:#C8A96B;margin-bottom:1rem">West Michigan Real Estate</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","level":1,"textColor":"white","style":{"typography":{"fontFamily":"var:preset|font-family|montserrat","fontSize":"clamp(2.4rem, 5.5vw, 4rem)","fontWeight":"800","lineHeight":"1.12"},"spacing":{"margin":{"bottom":"1.25rem"}}}} -->
		<h1 class="wp-block-heading has-text-align-center has-white-color has-text-color" style="font-family:var(--wp--preset--font-family--montserrat);font-size:clamp(2.4rem,5.5vw,4rem);font-weight:800;line-height:1.12;margin-bottom:1.25rem">Your West Michigan<br>Home Journey Starts Here</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"white","style":{"typography":{"fontSize":"clamp(1rem, 2vw, 1.25rem)"},"color":{"text":"rgba(255,255,255,0.85)"},"spacing":{"margin":{"bottom":"2.25rem"}}}} -->
		<p class="has-text-align-center" style="font-size:clamp(1rem,2vw,1.25rem);color:rgba(255,255,255,0.85);margin-bottom:2.25rem">Expert guidance for first-time buyers and veterans in Grand Rapids and across West Michigan. Let's find the home that fits your life.</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"1rem","margin":{"bottom":"2.5rem"}}}} -->
		<div class="wp-block-buttons" style="margin-bottom:2.5rem">
			<!-- wp:button {"backgroundColor":"gold","textColor":"navy","style":{"border":{"radius":"4px"},"spacing":{"padding":{"top":"1rem","bottom":"1rem","left":"2rem","right":"2rem"}},"typography":{"fontFamily":"var:preset|font-family|montserrat","fontSize":"0.9375rem","fontWeight":"700","letterSpacing":"0.04em"}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-navy-color has-gold-background-color has-text-color has-background wp-element-link" href="/featured-listings" style="border-radius:4px;padding:1rem 2rem;font-family:var(--wp--preset--font-family--montserrat);font-size:0.9375rem;font-weight:700;letter-spacing:0.04em">Browse Homes</a></div>
			<!-- /wp:button -->
			<!-- wp:button {"style":{"border":{"radius":"4px","width":"2px","color":"rgba(255,255,255,0.80)"},"color":{"background":"transparent","text":"#FFFFFF"},"spacing":{"padding":{"top":"1rem","bottom":"1rem","left":"2rem","right":"2rem"}},"typography":{"fontFamily":"var:preset|font-family|montserrat","fontSize":"0.9375rem","fontWeight":"600","letterSpacing":"0.04em"}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-link" href="/contact" style="border-radius:4px;border:2px solid rgba(255,255,255,0.80);background:transparent;color:#fff;padding:1rem 2rem;font-family:var(--wp--preset--font-family--montserrat);font-size:0.9375rem;font-weight:600;letter-spacing:0.04em">Schedule a Call</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

		<!-- wp:html -->
		<form class="nwmr-hero-search-form" role="search" aria-label="Search homes">
			<div class="hero-search-wrapper">
				<label for="hero-search-input" class="screen-reader-text">Search by city, zip code, or neighborhood</label>
				<input type="text" id="hero-search-input" name="q" placeholder="Enter city, zip code, or neighborhood…" autocomplete="off">
				<button type="submit">Search</button>
			</div>
			<p class="hero-search-note">Full MLS search available after IDX setup. <a href="/contact">Contact us</a> for current listings.</p>
		</form>
		<!-- /wp:html -->

	</div>
	<!-- /wp:group -->

</div>
</div>
<!-- /wp:cover -->
