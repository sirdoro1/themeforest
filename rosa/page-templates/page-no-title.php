<?php
/**
 * Template Name: Default Template (No title)
 * The template for displaying pages without a title.
 */

get_header();

global $post, $wpgrade_private_post, $page_section_idx, $header_height;

//some global variables that we use in our page sections
$is_gmap                = false;
$footer_needs_big_waves = false;
$page_section_idx       = 0;

if ( post_password_required() && ! $wpgrade_private_post['allowed'] ) {
	// password protection
	get_template_part( 'template-parts/password-request-form' );

} else {

	while ( have_posts() ) : the_post();

		$classes = "article--page  article--main" ;

		$border_style = get_post_meta( get_the_ID(), wpgrade::prefix() . 'page_border_style', true );
		if ( ! empty( $border_style ) ) {
			$classes .= ' border-' . $border_style;
		}

		$show_main_content = apply_filters( 'rosa_avoid_empty_markup_if_no_page_content', ( ! empty( $post->post_content ) ), $post );

		if ( $show_main_content ) : ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
				<section class="article__content">
					<div class="container">
						<section class="page__content  js-post-gallery  cf">
							<?php the_content(); ?>
						</section>
						<?php
						global $numpages;
						if ( $numpages > 1 ): ?>
							<div class="entry__meta-box  meta-box--pagination">
								<span class="meta-box__title"><?php _e( 'Pages', 'rosa' ) ?></span>
								<?php
								$args = array(
									'before'           => '<ol class="nav  pagination--single">',
									'after'            => '</ol>',
									'next_or_number'   => 'next_and_number',
									'previouspagelink' => __( '&laquo;', 'rosa' ),
									'nextpagelink'     => __( '&raquo;', 'rosa' )
								);
								wp_link_pages( $args ); ?>
							</div>
						<?php endif; ?>
					</div>
				</section>
			</article>
		<?php endif;

		$show_subpages = apply_filters( 'rosa_display_subpages', true );
		if ( $show_subpages ) {
			get_template_part( 'template-parts/subpages' );
		}

		//comments
		if ( comments_open() || '0' != get_comments_number() ): ?>
			<div class="container">
				<?php comments_template(); ?>
			</div>
		<?php endif;
	endwhile;

} // close if password protection

get_footer();
