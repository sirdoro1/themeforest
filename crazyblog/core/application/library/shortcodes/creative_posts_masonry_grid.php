<?php
if ( !defined( "crazyblog_DIR" ) )
	die( '!!!' );

class crazyblog_creative_posts_masonry_grid_VC_ShortCode extends crazyblog_VC_ShortCode {

	public static function crazyblog_creative_posts_masonry_grid_vc( $atts = null, $contents = '' ) {

		if ( $atts == 'crazyblog_Shortcodes_Map' ) {

			return array(
				"name" => esc_html__( "Creative Posts Masonry Grid", 'crazyblog' ),
				"base" => "crazyblog_creative_posts_masonry_grid_outpupt",
				"icon" => crazyblog_URI . '',
				"category" => esc_html__( 'CBlog', 'crazyblog' ),
				"params" => array(
					array(
						"type" => "textfield",
						"heading" => esc_html__( 'Number of Posts', 'crazyblog' ),
						"param_name" => "number",
						"description" => esc_html__( 'Enter the number of posts to show', 'crazyblog' )
					),
					array(
						"type" => "multiselect",
						"class" => "",
						"heading" => esc_html__( 'Select Categories', 'crazyblog' ),
						"param_name" => "cat",
						"value" => crazyblog_get_categories( array( 'taxonomy' => 'category', 'hide_empty' => true ), true ),
						"description" => esc_html__( 'Choose posts categories for which posts you want to show', 'crazyblog' )
					),
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => esc_html__( 'Order', 'crazyblog' ),
						"param_name" => "order",
						"value" => array(
							esc_html__( 'Ascending', 'crazyblog' ) => 'ASC',
							esc_html__( 'Descending', 'crazyblog' ) => 'DESC'
						),
						"description" => esc_html__( "Select sorting order ascending or descending for posts listing", 'crazyblog' )
					),
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => esc_html__( "Order By", 'crazyblog' ),
						"param_name" => "orderby",
						"value" => array_flip(
								array(
									'date' => esc_html__( 'Date', 'crazyblog' ),
									'title' => esc_html__( 'Title', 'crazyblog' ),
									'name' => esc_html__( 'Name', 'crazyblog' ),
									'author' => esc_html__( 'Author', 'crazyblog' ),
									'comment_count' => esc_html__( 'Comment Count', 'crazyblog' ),
									'random' => esc_html__( 'Random', 'crazyblog' )
								)
						),
						"description" => esc_html__( "Select order by method for posts listing", 'crazyblog' )
					),
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => esc_html__( 'Show Load More', 'crazyblog' ),
						"param_name" => "load_more",
						"value" => array(
							esc_html__( 'True', 'crazyblog' ) => 'true',
							esc_html__( 'False', 'crazyblog' ) => 'false'
						),
						"description" => esc_html__( "show or hide load more post functionality", 'crazyblog' )
					),
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => esc_html__( 'Infinite Scroll', 'crazyblog' ),
						"param_name" => "infinite_scroll",
						"value" => array(
							esc_html__( 'False', 'crazyblog' ) => 'false',
							esc_html__( 'True', 'crazyblog' ) => 'true'
						),
						"description" => esc_html__( "Infinite scroll pagination functionality", 'crazyblog' ),
						'dependency' => array(
							'element' => 'load_more',
							'value' => array( 'true' )
						),
					),
				)
			);
		}
	}

	public static function crazyblog_creative_posts_masonry_grid_outpupt( $atts, $contents = null ) {
		include crazyblog_ROOT . 'core/application/library/shortcodes/shortcode_atts.php';
		ob_start();
		include crazyblog_ROOT . 'core/application/library/shortcodes/shortcode_defaut_atts_output.php';

		$args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'orderby' => $orderby,
			'order' => $order,
			'showposts' => $number,
			'category_name' => $cat,
		);
		crazyblog_View::get_instance()->crazyblog_enqueue_scripts( array( 'df-isotope', 'df-init-isotope' ) );
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
			echo '<div class="row"><div class="creative-blog masonary">';
			$counter = 0;
			$imag = array( 'crazyblog_470x540', 'crazyblog_462x343', 'crazyblog_470x540', 'crazyblog_470x540', 'crazyblog_462x343', 'crazyblog_462x343' );
			while ( $query->have_posts() ) {
				$query->the_post();
				$format = get_post_format();
				$post_meta = get_post_meta( get_the_ID(), 'crazyblog_post_meta', true );
				$meta = crazyblog_set( crazyblog_set( $post_meta, 'crazyblog_post_format_options' ), '0' );
				$view = (get_post_meta( get_the_ID(), 'crazyblog_post_views', true )) ? get_post_meta( get_the_ID(), 'crazyblog_post_views', true ) : '0';
				?>
				<div class="col-md-4">
					<div class="creative-post">
						<div class="creative-img">
							<?php the_post_thumbnail( crazyblog_set( $imag, $counter ) ) ?>
						</div>
						<div class="creative-post-name">
							<h4><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h4>
							<ul class="meta">
								<li><i class="fa fa-heart"></i> <?php echo crazyblog_post_counter( get_the_ID() ) ?></li>
								<li><i class="fa fa-eye"></i> <?php echo crazyblog_restyle_text( $view ) ?></li>
							</ul>
							<a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php esc_html_e( 'Read More', 'crazyblog' ) ?></a>
						</div>
					</div><!-- Creative Post -->
				</div>
				<?php
				$counter++;
				if ( $counter == 6 ) {
					$counter = 0;
				}
			}
			wp_reset_postdata();
			echo '</div></div>';
			if ( $load_more == 'true' && $infinite_scroll == 'false' ) {
				?>
				<div id="loaded">
					<div class="cssload-loader">
						<div class="cssload-inner cssload-one"></div>
						<div class="cssload-inner cssload-two"></div>
						<div class="cssload-inner cssload-three"></div>
					</div>
				</div>
				<div class="load-btn">
					<a id="creative_grid_posts_masonry" data-selector=".creative-blog.masonary" data-offset="div.col-md-4" data-type="creative_grid_posts_masonry" data-cats="<?php echo esc_attr( $cat ) ?>" data-order="<?php echo esc_attr( $order ) ?>" data-orderby="<?php echo esc_attr( $orderby ) ?>" data-posts="post" data-limit="<?php echo esc_attr( $number ); ?>" data-nonce="<?php echo wp_create_nonce( 'load_posts' ) ?>" class="loadmore" href="javascript:void(0)" title=""><i class="fa fa-refresh"></i><?php esc_html_e( 'Load More', 'crazyblog' ) ?></a>
				</div>
				<?php
			} else if ( $load_more == 'true' && $infinite_scroll == 'true' ) {
				?>
				<div id="loaded">
					<div class="cssload-loader">
						<div class="cssload-inner cssload-one"></div>
						<div class="cssload-inner cssload-two"></div>
						<div class="cssload-inner cssload-three"></div>
					</div>
				</div>
				<?php
				$custom_script = 'jQuery(document).ready(function ($) {
						$(window).scroll(function () {
							if ($(window).scrollTop() == $(document).height() - $(window).height()) {
								if (!jQuery("div#loaded").hasClass("laod_ajax") && !jQuery("div#loaded").hasClass("infinite_end")) {
									infinite_scroll(
											".creative-blog.masonary div.col-md-4",
											".creative-blog.masonary",
											"post",
											"' . esc_js( $number ) . '",
											"' . esc_js( $cat ) . '",
											"' . esc_js( $order ) . '",
											"' . esc_js( $orderby ) . '",
											"creative_grid_posts_masonry"
											);
								}
							}
						});
					});';
				wp_add_inline_script( 'crazyblog_df-script', $custom_script );
			}
		}

		$output = ob_get_contents();
		ob_clean();
		return $output;
	}

}
