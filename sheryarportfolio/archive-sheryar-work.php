<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Sher_Yar_Portfolio
 */

get_header();
?>

	<main id="primary" class="site-main-work">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php

			// Output "My Work" intro paragraph
			if ( function_exists ( 'get_field' ) ) {
				if ( get_field( 'my_work_text', 'options' ) ) {
					?>
					<section class="work-header">
						<span><h1>My Work</h1></span><br>
						<span><p class= "work-intro"><?php the_field( 'my_work_text', 'options' );?> </p></span>
					 </section>
					<?php
				}

			}

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-work');

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
