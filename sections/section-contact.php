<?php 
/**
 * Contact page
 */
?>
<?php 
   $uuuu = '';
 ?>


    <section class="ftco-section contact-section ftco-no-pb" id="contact">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">
              <?php echo esc_html(Kirki::get_option('contact_Subheading')); ?>
              </span>
            <h2 class="mb-4"><?php echo esc_html(Kirki::get_option('contact_title')); ?></h2>
            <p><?php echo esc_html(Kirki::get_option('contact_des')); ?></p>
          </div>
        </div>
        <div class="row no-gutters block-9">
          <div class="col-md-6 order-md-last d-flex">
            <?php 
                $uuuu = get_theme_mod( 'map_left' );
             ?>
            <?php if($uuuu != ''):?>
            <div class="bg-light p-5 contact-form">
              <?php echo do_shortcode($uuuu); ?>
            </div>
            <?php endif; ?>
          </div>
          <div class="col-md-6 d-flex">
             <iframe src="<?php echo esc_url(Kirki::get_option('con_right')); ?>" width="600" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
        </div>
      </div>
    </section>



