<?php


					$featured_args = array(
						'post_type'	=> 'post',
						'post_status'	=> 'publish',
						'posts_per_page' => 1,
						'category_name'	=> 'featured',
					);
			
				$featured_query = new WP_Query( $featured_args );
						if ( $featured_query->have_posts() ){
								$featured_query->the_post();
											echo '<div class="row">';
										 echo ' <div class="small-12 columns"><h2 class="homepage">Featured Article</h2></div>';
											echo '</div>';
											echo '<div class="row">';
											echo '	<div class="featured-article">';
											echo '    <h2>' . get_the_title() . '</h2>';
											echo '      <p>' . get_the_excerpt() . '</p>';
											echo ' 	<div class="text-right"><a href="' . get_the_permalink() . '" class="button">Read more</a></div>';
											echo ' </div>';
											echo '</div>';
						}
			
								wp_reset_postdata();

?>
