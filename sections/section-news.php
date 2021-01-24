<?php 

/*counter section*/

 ?>
    <section class="ftco-section bg-light" id="blog">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading"><?php echo esc_html (Kirki::get_option('Blog_subheading')); ?></span>
            <h2 class="mb-4"><?php echo esc_html (Kirki::get_option('Blog_title')); ?></h2>
            <p><?php echo esc_html (Kirki::get_option('Blog_sub')); ?></p>
          </div>
        </div>

        <div class="row d-flex">
           <?php 
          $lp_nop = get_theme_mod('Blog_lt', true );
                $bpost = new WP_Query(array(
                      'post_type' => 'post',
                      'posts_per_page' => $lp_nop,
                ));    
            if($bpost->have_posts()) : while($bpost->have_posts()) : $bpost->the_post();
              $kjj = wp_get_attachment_image_url(get_post_thumbnail_id(),'full');
            ?>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry justify-content-end">
              <a href="<?php the_permalink(); ?>" class="block-20" style="background-image:url('<?php echo esc_url($kjj); ?>)'">
              </a>
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
                <div class="d-flex align-items-center mt-4 meta">
                  <p class="mb-0"><a href="<?php the_permalink(); ?>" class="btn btn-secondary"><?php echo esc_html__('Read More','bsquare'); ?><span class="ion-ios-arrow-round-forward"></span></a></p>
                  <p class="ml-auto mb-0">
                    <a href="<?php echo get_author_posts_url($authordata->ID); ?>" class="mr-2"><?php bsquare_posted_by(); ?></a>
                    <a href="#" class="meta-chat"><span class="icon-chat"></span><?php comments_popup_link('0','1','%'); ?></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
            <?php endwhile; 
                wp_reset_postdata();
            endif;?>
        </div>
      </div>
    </section>