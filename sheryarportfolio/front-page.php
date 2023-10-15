<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Sher_Yar_Portfolio
 */

get_header();
?>

	<main id="primary" class="site-main-front">

		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<section class="hero-image">
				<?php
				// $image = get_field('hero_image', 'option');
				// $size = 'full'; // (thumbnail, medium, large, full or custom size)
				// if( $image ) {
				// 	echo wp_get_attachment_image( $image, $size );
				// }
				?>

				<picture>
				<source 
					srcset="<?php echo get_template_directory_uri() ?>/images/hero-desktop.png"
					media="(min-width: 800px)"
				/>
				<source 
					srcset="<?php echo get_template_directory_uri() ?>/images/hero-middle.png"
					media="(min-width: 500px)"
				/>
				<source 
					srcset="<?php echo get_template_directory_uri() ?>/images/hero-mobile.png"
					media="(min-width: 300px)"
				/>
				<img 
					src="<?php echo get_template_directory_uri() ?>/images/hero-mobile.png" 
					alt="Desktop Hero Image"
				/>
				</picture>

				<?php
				if ( get_field( 'hero_text' ) ) {
					?>
					<p class="hero-text"><?php the_field( 'hero_text' );?> </p>
					<?php
				}
				?>
			</section>
			<?php		
			get_template_part( 'template-parts/content', 'page' );

			// Output "My Work" CTA
			?>
			<section class="home-cta">				
				<?php
				if ( function_exists ( 'get_field' ) ) {
					if ( get_field( 'work_title' ) ) {
						?>
						<h2><?php the_field( 'work_title' );?> </h2>
						<?php
					}
					if ( get_field( 'work_text' ) ) {
						?>
						<p><?php the_field( 'work_text' );?> </p>
						<?php
					}
					$image = get_field('work_image');
					if( !empty( $image ) ): ?>
						<img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php endif;

					$link = get_field('work_link');
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<a class="cta-button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif;
				}
				?>
			</section>

			<section class="home-cta-reverse">
				<?php
				// Output "About Me" CTA
				if ( function_exists ( 'get_field' ) ) {
					if ( get_field( 'about_title' ) ) {
						?>
						<h2><?php the_field( 'about_title' );?> </h2>
						<?php
					}
					if ( get_field( 'about_text' ) ) {
						?>
						<p><?php the_field( 'about_text' );?> </p>
						<?php
					}
					$image = get_field('about_image');
					if( !empty( $image ) ): ?>
						<img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php endif;

					$link = get_field('about_link');
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<a class="cta-button-reverse" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif;
				}
			?>
			</section>

			
			<section class="home-cta">
				<?php
				// Output "Contact Me" CTA
				if ( function_exists ( 'get_field' ) ) {
					if ( get_field( 'contact_title' ) ) {
						?>
						<h2 class= "cta-title"><?php the_field( 'contact_title' );?> </h2>
						<?php
					}
					if ( get_field( 'contact_text' ) ) {
						?>
						<p class= "cta-text"><?php the_field( 'contact_text' );?> </p>
						<?php
					}
					$image = get_field('contact_image');
					if( !empty( $image ) ): ?>
						<img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php endif;

					$link = get_field('contact_link');
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<a class="cta-button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif;
				}
				?>
			</section>
			<?php

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
