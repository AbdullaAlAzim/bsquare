<?php 
/**
 * Address page
 */
?>

<?php 
  $settings = '';
 ?>
    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex contact-info">
          <?php 
                $settings = get_theme_mod( 'customizer_section_nine' ); 
             ?>
             <?php if($settings !=''): foreach($settings as $setting):?>
          <div class="col-md-6 col-lg-3 d-flex">
            <div class="align-self-stretch box p-4 text-center">
              <?php if(!empty($setting['Com_img'])): ?>
              <div class="icon d-flex align-items-center justify-content-center">
                <img src="<?php echo esc_url(wp_get_attachment_url( $setting['Com_img'] )); ?>" alt="<?php the_title_attribute(); ?>">
              </div>
            <?php endif; ?>
             <?php if(!empty($setting['Com_txt'])):?>
              <h3 class="mb-4">
                <?php echo esc_html($setting['Com_txt']); ?>
              </h3>
            <?php endif; ?>
             <?php if(!empty($setting['Com_ara'])):?>
              <p>
                <?php echo esc_html($setting['Com_ara']); ?> 
              </p>
              <?php endif; ?>
            </div>
          </div>
          <?php endforeach; endif; ?>
        </div>
      </div>
    </section>