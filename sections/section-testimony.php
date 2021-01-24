 <?php 
/**
 * testimony page
 */
?>
<?php 
  $settings = '';
 ?>
    <section class="testimony-section" id="testimony">
      <div class="container">
        <div class="row ftco-animate justify-content-center">
          <div class="col-md-12 d-flex align-items-center">
            <div class="carousel-testimony owl-carousel">
               <?php 
                  $settings = get_option( 'customizer_section_six' ); 
               ?>
              <?php if($settings !=''): foreach($settings as $setting):?>
              <div class="item">
                <div class="testimony-wrap d-flex align-items-stretch">
                  <?php if(!empty($setting['test_img'])): ?>
                  <div class="user-img d-flex align-self-stretch" style="background-image: url(<?php echo esc_url(wp_get_attachment_url( $setting['test_img'] )); ?>)">
                  </div>
                <?php endif; ?>
                  <div class="text d-flex align-items-center">
                    <div>
                      <div class="icon-quote">
                        <span class="icon-quote-left"></span>
                      </div>
                      <p class="mb-4"><?php echo esc_html($setting['test_spc']); ?></p>
                      <p class="name"><?php echo esc_html($setting['test_name']); ?>.</p>
                      <span class="position"><?php echo esc_html($setting['test_desgi']); ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>