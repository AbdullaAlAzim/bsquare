 <?php 
/**
 * Banner page
 */
?>
<?php 

    $heade_img = '';
        if (has_header_image()) {
            $header_image = get_header_image();
            if (!empty($header_image)) {
                $heade_img = $header_image;
            }
        }
 ?>

    <section class="hero-wrap js-fullheight" style="background-image: url('<?php echo  esc_url($heade_img); ?>');" id="home">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate mt-5" data-scrollax=" properties: { translateY: '70%' }">
            <p class="d-flex align-items-center" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
              <a href="<?php echo esc_attr (Kirki::get_option('my_vd')); ?>" class="icon-video popup-vimeo d-flex justify-content-center align-items-center mr-3">
                <span class="ion-ios-play play mr-2"></span>
                <span class="watch video"><?php echo esc_html__('Watch Video','bsquare');?></span>
              </a>
            </p>
              <h1 class="mb-4 support" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
              <?php echo esc_html (Kirki::get_option('msy_setting')); ?>
              </h1>
            <p class="mb-4 subtitle" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
              <?php echo esc_html (Kirki::get_option('my_subtitle')); ?>
            </p>
          </div>
        </div>
      </div>
    </section>
    
    