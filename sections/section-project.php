<?php 
/*project section*/
 ?>

<?php 
  $settings = '';
 ?>


    <section class="ftco-section ftco-project bg-light" id="projects">
      <div class="container-fluid px-md-5">
        <div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading projecsub"><?php echo esc_html (Kirki::get_option('project_subheading')); ?></span>
            <h2 class="mb-4 Projecttit"><?php echo esc_html (Kirki::get_option('project_title')); ?></h2>
            <p class="subti"><?php echo esc_html (Kirki::get_option('project_subtitle')); ?></p>
          </div>
        </div>
        <div class="row ok">
          <div class="col-md-12 testimonial">
            <div class="carousel-project owl-carousel">
            <?php 
                $settings = get_theme_mod( 'customizer_section_four' ); 
             ?>
            <?php if($settings !=''): foreach($settings as $setting):?>
              <div class="item">
                <div class="project">
                  <?php if(!empty($setting['project_img'])): ?>
                  <div class="img">
                    <img src="<?php echo esc_url(wp_get_attachment_url( $setting['project_img'] )); ?>" class="img-fluid" alt="<?php the_title_attribute(); ?>">
                    <a href="<?php echo esc_url(wp_get_attachment_url( $setting['project_img'] )); ?>" class="icon image-popup d-flex justify-content-center align-items-center">
                      <span class="icon-expand"></span>
                    </a>
                  <?php endif; ?>
                  </div>
                  <div class="text px-4">
                  <?php if (!empty($setting['pro_title'])): ?>
                   <h3>
                    <?php echo esc_html($setting['pro_title']); ?>
                   </h3>
                  <?php endif; ?>
                   <?php if (!empty($setting['pro_sub'])): ?>
                    <span>
                      <?php echo esc_html($setting['pro_sub']); ?>
                    </span>
                  <?php endif; ?>
                  </div>
                </div>
              </div>
             <?php endforeach; endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>