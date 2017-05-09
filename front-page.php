<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package joecue
 */

get_header(); ?>

	<div id="primary" class="content-area content-homepage">
		<main id="main" class="site-main" role="main">
			<div class="row">
				<div class="small-12 columns">
					<h2 class="homepage">Articles</h2>
				</div>
			</div>
			<?php
					$args = array(
						'post_type'	=> 'post',
						'post_status'	=> 'publish',
						'posts_per_page' => 6,
						'category_name'	=> 'articles',
					);
			
				$the_query = new WP_Query( $args );
			
				if ( $the_query->have_posts() ){
					echo '<div class="row">';
					echo '<div class="small-12 medium-9 columns">';
					echo '<div class="row small-up-1 medium-up-2 articles-list">';
					while ( $the_query->have_posts() ){
						$the_query->the_post();
						echo '	<div class="column column-block article">';
						if( the_post_thumbnail('homepage_post_thumbnail') != '' ) : 
							echo the_post_thumbnail('homepage_post_thumbnail');
						endif;
						echo '   <h2>' . get_the_title() . '</h2>';
						echo '<p>' . get_the_excerpt() . '</p>';
						echo ' </div>';
					}
					echo '</div>';
					echo '</div>';
					echo '<div class="small-12 hide-for-medium columns">&nbsp;</div>';
					echo '  <div class="medium-3 columns home-sidebar">';
							dynamic_sidebar( 'home-sidebar' );
					echo '  </div>';
					echo '</div>';
					wp_reset_postdata();
				}
			
			?>
		

		</main><!-- #main -->
	</div><!-- #primary -->

	<div class="show-for-medium corner-lines">
				<img src="/wp-content/themes/joecue/images/cross-lines-corner.png" border=0/>

	</div>

<?php
get_footer();
