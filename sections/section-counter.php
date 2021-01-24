<?php 
/*counter section*/
 ?>
<?php 
  $settings =''; 
?>
    <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-6 col-lg-4 d-flex">
            <?php 
                  $immage = get_theme_mod( 'quote_bg', '' ); 
             ?>
            <div class="img d-flex align-self-stretch align-items-center" style="background-image:url('<?php echo esc_url( $immage ); ?>);">
              <div class="request-quote py-5">
                <div class="py-2">
                  <span class="subheading"><?php echo esc_html(Kirki::get_option('Quote_subtitle')); ?></span>
                  <h3><?php echo esc_html (Kirki::get_option('Quote_title')); ?></h3>
                </div>
                <?php 
                $counter_form = get_theme_mod( 'counter_form' );
                ?>
                <div class="request-form ftco-animate">
                  <?php echo do_shortcode($counter_form); ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-8 pl-lg-5 py-5">
            <div class="row justify-content-start pb-3">
              <div class="col-md-12 heading-section ftco-animate">
                <span class="subheading rasub"><?php echo esc_html (Kirki::get_option('counter_tilte')); ?></span>
                <h2 class="mb-4 ami"><?php echo esc_html (Kirki::get_option('counter_subtitle')); ?></h2>
                <p class="counter-sub"><?php echo esc_html (Kirki::get_option('counter_des')); ?></p>
              </div>
            </div>
            <div class="row racount">
               <?php 
                  $settings = get_theme_mod( 'customizer_section_three' ); 
               ?>
              <?php if($settings !=''): foreach($settings as $setting):?>
              <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate d-flex">
                <div class="block-18 text-center p-4 mb-4 align-self-stretch d-flex">
                  <div class="text">
                    <?php if(!empty($setting['counter_title'])): ?>
                    <strong class="number" data-number="<?php echo esc_html($setting['counter_title']); ?>"><?php esc_html__('0','bsquare') ?>                     
                    </strong>
                  <?php endif; ?>
                    <?php if(!empty($setting['counter_sub'])): ?>
                    <span>
                    <?php echo esc_html ($setting['counter_sub']); ?>
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