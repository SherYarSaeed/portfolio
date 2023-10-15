<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Sher_Yar_Portfolio
 */

get_header();
?>

	<main id="primary" class="site-main-single">

		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
		
				if ( 'post' === get_post_type() ) :
					?>
					<div class="entry-meta">
						<?php
						sheryarportfolio_posted_on();
						sheryarportfolio_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<section class="flex-intro">
				
				<?php sheryarportfolio_post_thumbnail(); ?>
			
				<div class="entry-content">
					<?php

					if ( function_exists ( 'get_field' ) ) {
						if ( get_field( 'title' ) ) {
							?>
							<h2> <?php the_field( 'title' ); ?> </h2>
							<?php
						}
						if ( get_field( 'summary_text' ) ) {
							?>
							<section class= "summary-text">
								<p> <?php the_field( 'summary_text' ); ?> </p>
							</section> 
							<?php
						}
						$link = get_field('live_site_link');
						if( $link ): 
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self';
							?>
							<a class="live-site-button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php endif;
						$github = get_field('github_link');
						if( $github ): 
							$github_url = $github['url'];
							$github_title = $github['title'];
							$github_target = $github['target'] ? $github['target'] : '_self';
							?>
							<a class="live-site-button" href="<?php echo esc_url( $github_url ); ?>" target="<?php echo esc_attr( $github_target ); ?>"><?php echo esc_html( $github_title ); ?></a>
						<?php endif; ?>

			</section>
		

					<section class="tools-used">

						<?php
						if ( get_field( 'tools_heading' ) ) {
							?>
								<h2> <?php the_field( 'tools_heading' ); ?> </h2>
							<?php
						}

						$terms = get_field('tools_list');
						if( $terms ): ?>
							<ul>
							<?php foreach( $terms as $term ): ?>
								<li>
									<?php echo esc_html( $term->name ); ?>
								</li>
							<?php endforeach; ?>
							</ul>
						<?php endif;?>

					</section>
					<?php
				} 



endwhile; // End of the loop.


				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'sheryarportfolio' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);

				if( $link ): 
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<a class="live-site-button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif;	
				
				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( '', 'sheryarportfolio' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( '', 'sheryarportfolio' ) . '</span> <span class="nav-title">%title</span>',
					)
				);
				
		
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sheryarportfolio' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->
		
			<footer class="entry-footer">
				<?php sheryarportfolio_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</article><!-- #post-<?php the_ID(); ?> -->



	</main><!-- #main -->

<?php
get_footer();
