 <?php 
/**
 * Service page
 */
?>
<?php 
  $settings = '';
 ?>
     <section class="ftco-section ftco-services ftco-no-pt">
      <div class="container">
        <div class="row services-section card-one">
        <?php 
            $settings = get_theme_mod( 'customizer_section_two' ); 
         ?>
         <?php if($settings !=''): foreach($settings as $setting):?>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">

            <div class="media block-6 services text-center d-block">
              <?php if(!empty($setting['service_image'])): ?>
              <div class="icon">
                <img src="<?php echo esc_url(wp_get_attachment_url( $setting['service_image'] )); ?>" alt="<?php the_title_attribute(); ?>">
              </div>
            <?php endif; ?>
              <div class="media-body">
                <?php if(!empty($setting['service_title'])): ?>
                <h3 class="heading mb-3">
                  <?php echo esc_html($setting['service_title']); ?>
                  </h3>
                <?php endif; ?>
                <?php if(!empty($setting['service_subtile'])): ?>
                  <p>
                    <?php echo esc_html($setting['service_subtile']); ?>
                  </p>
                  <?php endif; ?>
                <p>
                   <?php if(!empty($setting['service_btn'])): ?>
                <a href="<?php echo esc_attr($setting['service_btn_lnk']); ?>" class="btn btn-primary">
                  <?php echo esc_html($setting['service_btn']); ?></a>
                </p>
                  <?php endif; ?>
              </div>
            </div> 

          </div>
    <?php endforeach; endif; ?>
        </div>
      </div>
    </section>

