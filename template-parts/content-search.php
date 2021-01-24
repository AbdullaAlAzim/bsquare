<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BSQUARE
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 <div class="col-md-12 d-flex ftco-animate">
            <div class="blog-entry justify-content-end">
				<?php bsquare_post_thumbnail(); ?>
              <div class="text mt-3 float-right d-block">
                <div class="d-flex align-items-center pt-2 mb-4 topp">
                  <div class="one mr-3">
                    <span class="day"><?php the_time('d'); ?></span>
                  </div>
                  <div class="two">
                    <span class="yr"><?php the_time('Y'); ?></span>
                    <span class="mos"><?php the_time('M'); ?></span>
                  </div>
                </div>
                <h3 class="heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <span><?php echo esc_html__('Category:','bsquare'); ?><?php bsquare_entry_footer(); ?></span>
                <?php if(has_excerpt()):?>
                 <?php the_excerpt();?>
                 <?php endif;?>
              </div>
            </div>
          </div>
</div><!-- #post-<?php the_ID(); ?> -->
