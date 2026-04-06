<?php
/**
 * Title: West Michigan Area Cards
 * Slug: nathan-west-michigan-realty/area-cards
 * Categories: nwmr-sections
 * Description: Four area/city cards for Grand Rapids, Grand Haven, Lowell, and Rockford.
 * Inserter: true
 */
?>
<!-- wp:group {"tagName":"section","backgroundColor":"light-gray","style":{"spacing":{"padding":{"top":"clamp(4rem,8vw,7rem)","bottom":"clamp(4rem,8vw,7rem)"}}},"layout":{"type":"constrained","wideSize":"1200px"}} -->
<section class="wp-block-group has-light-gray-background-color has-background" style="padding-top:clamp(4rem,8vw,7rem);padding-bottom:clamp(4rem,8vw,7rem)">

	<!-- Header -->
	<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"3rem"},"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"600px"}} -->
	<div class="wp-block-group" style="margin-bottom:3rem">
		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontFamily":"var:preset|font-family|montserrat","fontSize":"0.7rem","fontWeight":"700","letterSpacing":"0.18em","textTransform":"uppercase"},"color":{"text":"#C8A96B"},"spacing":{"margin":{"bottom":"0.75rem"}}}} -->
		<p class="has-text-align-center" style="font-family:var(--wp--preset--font-family--montserrat);font-size:0.7rem;font-weight:700;letter-spacing:0.18em;text-transform:uppercase;color:#C8A96B;margin-bottom:0.75rem">Communities We Love</p>
		<!-- /wp:paragraph -->
		<!-- wp:heading {"textAlign":"center","level":2,"textColor":"navy","style":{"typography":{"fontFamily":"var:preset|font-family|montserrat","fontWeight":"700"},"spacing":{"margin":{"bottom":"1rem"}}}} -->
		<h2 class="wp-block-heading has-text-align-center has-navy-color has-text-color" style="font-weight:700;margin-bottom:1rem">Explore West Michigan</h2>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#374151"},"typography":{"fontSize":"1.0625rem"}}} -->
		<p class="has-text-align-center" style="color:#374151;font-size:1.0625rem">From vibrant city life to quiet lakeside towns, West Michigan has a neighborhood for everyone.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- Area Cards Grid -->
	<!-- wp:columns {"isStackedOnMobile":true,"style":{"spacing":{"blockGap":{"top":"1.5rem","left":"1.5rem"}}}} -->
	<div class="wp-block-columns">

		<!-- Grand Rapids -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:html -->
			<div class="nwmr-area-card">
				<div class="nwmr-area-card__bg" style="background:linear-gradient(to top, rgba(7,21,42,.88) 0%, rgba(7,21,42,.25) 60%, transparent 100%), #1a3a5c;"></div>
				<!-- Replace with a real photo: recommended 800×500 -->
				<img class="nwmr-area-card__bg-img" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/area-grand-rapids.jpg" alt="Grand Rapids skyline" loading="lazy">
				<div class="nwmr-area-card__content">
					<div class="nwmr-area-card__title">Grand Rapids</div>
					<div class="nwmr-area-card__sub">Michigan's second-largest city — arts, dining, and growing neighborhoods</div>
					<a class="nwmr-area-card__link" href="/area/grand-rapids">Explore Grand Rapids →</a>
				</div>
			</div>
			<!-- /wp:html -->
		</div>
		<!-- /wp:column -->

		<!-- Grand Haven -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:html -->
			<div class="nwmr-area-card">
				<div class="nwmr-area-card__bg" style="background:linear-gradient(to top, rgba(7,21,42,.88) 0%, rgba(7,21,42,.25) 60%, transparent 100%), #1a3a5c;"></div>
				<img class="nwmr-area-card__bg-img" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/area-grand-haven.jpg" alt="Grand Haven lighthouse and beach" loading="lazy">
				<div class="nwmr-area-card__content">
					<div class="nwmr-area-card__title">Grand Haven</div>
					<div class="nwmr-area-card__sub">Charming lakeshore city with stunning sunsets and tight-knit community</div>
					<a class="nwmr-area-card__link" href="/area/grand-haven">Explore Grand Haven →</a>
				</div>
			</div>
			<!-- /wp:html -->
		</div>
		<!-- /wp:column -->

		<!-- Lowell -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:html -->
			<div class="nwmr-area-card">
				<div class="nwmr-area-card__bg" style="background:linear-gradient(to top, rgba(7,21,42,.88) 0%, rgba(7,21,42,.25) 60%, transparent 100%), #1a3a5c;"></div>
				<img class="nwmr-area-card__bg-img" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/area-lowell.jpg" alt="Lowell, Michigan riverfront" loading="lazy">
				<div class="nwmr-area-card__content">
					<div class="nwmr-area-card__title">Lowell</div>
					<div class="nwmr-area-card__sub">Peaceful river town with top-rated schools and a small-town feel</div>
					<a class="nwmr-area-card__link" href="/area/lowell">Explore Lowell →</a>
				</div>
			</div>
			<!-- /wp:html -->
		</div>
		<!-- /wp:column -->

		<!-- Rockford -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:html -->
			<div class="nwmr-area-card">
				<div class="nwmr-area-card__bg" style="background:linear-gradient(to top, rgba(7,21,42,.88) 0%, rgba(7,21,42,.25) 60%, transparent 100%), #1a3a5c;"></div>
				<img class="nwmr-area-card__bg-img" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/area-rockford.jpg" alt="Rockford, Michigan downtown" loading="lazy">
				<div class="nwmr-area-card__content">
					<div class="nwmr-area-card__title">Rockford</div>
					<div class="nwmr-area-card__sub">Thriving suburb known for great schools, trails, and family atmosphere</div>
					<a class="nwmr-area-card__link" href="/area/rockford">Explore Rockford →</a>
				</div>
			</div>
			<!-- /wp:html -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- View All Areas -->
	<!-- wp:group {"style":{"spacing":{"margin":{"top":"2.5rem"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-group" style="margin-top:2.5rem">
		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"style":{"border":{"radius":"4px","width":"2px","color":"#0B1F3A"},"color":{"text":"#0B1F3A","background":"transparent"},"spacing":{"padding":{"top":"0.875rem","bottom":"0.875rem","left":"2rem","right":"2rem"}},"typography":{"fontFamily":"var:preset|font-family|montserrat","fontWeight":"600","letterSpacing":"0.04em"}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-link" href="/area" style="border-radius:4px;border:2px solid #0B1F3A;color:#0B1F3A;background:transparent;padding:0.875rem 2rem;font-family:var(--wp--preset--font-family--montserrat);font-weight:600;letter-spacing:0.04em">View All Areas</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:group -->
