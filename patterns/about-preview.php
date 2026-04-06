<?php
/**
 * Title: About Agent Preview
 * Slug: nathan-west-michigan-realty/about-preview
 * Categories: nwmr-sections
 * Description: Agent photo, short story, and link to full About page.
 * Inserter: true
 */
?>
<!-- wp:group {"tagName":"section","backgroundColor":"white","style":{"spacing":{"padding":{"top":"clamp(4rem,8vw,7rem)","bottom":"clamp(4rem,8vw,7rem)"}}},"layout":{"type":"constrained","wideSize":"1100px"}} -->
<section class="wp-block-group has-white-background-color has-background" style="padding-top:clamp(4rem,8vw,7rem);padding-bottom:clamp(4rem,8vw,7rem)">

	<!-- wp:columns {"isStackedOnMobile":true,"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"3rem","left":"5rem"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center">

		<!-- Left: Agent Photo -->
		<!-- wp:column {"width":"40%","verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
			<!-- wp:html -->
			<div class="nwmr-agent-photo">
				<!-- Replace src with an actual agent photo. Recommended: 600×750px. -->
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/agent-photo-placeholder.jpg"
				     alt="Nathan — West Michigan Real Estate Agent"
				     loading="lazy"
				     width="600"
				     height="750">
			</div>
			<!-- /wp:html -->
		</div>
		<!-- /wp:column -->

		<!-- Right: Story & CTA -->
		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">

			<!-- wp:html --><hr class="nwmr-gold-rule" aria-hidden="true"><!-- /wp:html -->

			<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|montserrat","fontSize":"0.7rem","fontWeight":"700","letterSpacing":"0.18em","textTransform":"uppercase"},"color":{"text":"#C8A96B"},"spacing":{"margin":{"bottom":"0.75rem"}}}} -->
			<p style="font-family:var(--wp--preset--font-family--montserrat);font-size:0.7rem;font-weight:700;letter-spacing:0.18em;text-transform:uppercase;color:#C8A96B;margin-bottom:0.75rem">Meet Your Agent</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":2,"textColor":"navy","style":{"typography":{"fontFamily":"var:preset|font-family|montserrat","fontWeight":"700","fontSize":"clamp(1.75rem,3.5vw,2.5rem)"},"spacing":{"margin":{"bottom":"1.25rem"}}}} -->
			<h2 class="wp-block-heading has-navy-color has-text-color" style="font-family:var(--wp--preset--font-family--montserrat);font-weight:700;font-size:clamp(1.75rem,3.5vw,2.5rem);margin-bottom:1.25rem">Hi, I'm Nathan. Let's Find Your Home.</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"#374151"},"typography":{"fontSize":"1.0625rem","lineHeight":"1.75"},"spacing":{"margin":{"bottom":"1rem"}}}} -->
			<p style="color:#374151;font-size:1.0625rem;line-height:1.75;margin-bottom:1rem">I'm a West Michigan native with a deep passion for helping people find not just a house, but a home where real life happens. Whether you're buying your very first home or navigating a VA loan for the first time, I'll be with you every step of the way — clear, honest, and always in your corner.</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"color":{"text":"#374151"},"typography":{"fontSize":"1.0625rem","lineHeight":"1.75"},"spacing":{"margin":{"bottom":"2rem"}}}} -->
			<p style="color:#374151;font-size:1.0625rem;line-height:1.75;margin-bottom:2rem">I grew up in this community, I know these neighborhoods, and I believe buying a home should feel exciting — not overwhelming. My job is to make sure you feel confident every single day of this process.</p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"},"style":{"spacing":{"blockGap":"1rem"}}} -->
			<div class="wp-block-group">
				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button {"backgroundColor":"navy","textColor":"white","style":{"border":{"radius":"4px"},"spacing":{"padding":{"top":"0.875rem","bottom":"0.875rem","left":"1.75rem","right":"1.75rem"}},"typography":{"fontFamily":"var:preset|font-family|montserrat","fontWeight":"600","letterSpacing":"0.04em"}}} -->
					<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-navy-background-color has-text-color has-background wp-element-link" href="/about" style="border-radius:4px;padding:0.875rem 1.75rem;font-family:var(--wp--preset--font-family--montserrat);font-weight:600;letter-spacing:0.04em">Read My Full Story</a></div>
					<!-- /wp:button -->
					<!-- wp:button {"style":{"border":{"radius":"4px","width":"2px","color":"#0B1F3A"},"color":{"text":"#0B1F3A","background":"transparent"},"spacing":{"padding":{"top":"0.875rem","bottom":"0.875rem","left":"1.75rem","right":"1.75rem"}},"typography":{"fontFamily":"var:preset|font-family|montserrat","fontWeight":"600","letterSpacing":"0.04em"}}} -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-link" href="/contact" style="border-radius:4px;border:2px solid #0B1F3A;color:#0B1F3A;background:transparent;padding:0.875rem 1.75rem;font-family:var(--wp--preset--font-family--montserrat);font-weight:600;letter-spacing:0.04em">Let's Talk</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</section>
<!-- /wp:group -->
