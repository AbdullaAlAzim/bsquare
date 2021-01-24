 <?php 
/**
 * Team page
 */
?>
<?php 
  $settings = '';
 ?>
    <section class="ftco-section" id="team">
      <div class="container-fluid p-0">
        <div class="row no-gutters justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading tmsub"><?php echo esc_html (Kirki::get_option('Team_subheading')); ?></span>
            <h2 class="mb-4 tmtile"><?php echo esc_html (Kirki::get_option('Team_title')); ?></h2>
            <p class="tmsubtitle"><?php echo esc_html (Kirki::get_option('Team_subtitle')); ?></p>
          </div>
        </div>
        <div class="row no-gutters">
            <?php 
                $settings = get_theme_mod( 'customizer_section_five' ); 
             ?>
          <?php if($settings !=''): foreach($settings as $setting):?>
          <div class="col-md-6 col-lg-3 ftco-animate nananana">
            <div class="staff">
              <div class="img-wrap d-flex align-items-stretch">
                <div class="img align-self-stretch" style="background-image: url(<?php echo esc_url(wp_get_attachment_url( $setting['mem_img'] )); ?>);"></div> 
              </div>
              <div class="text d-flex align-items-center pt-3 text-center ">
                <div>
                  <span class="position mb-2"><?php echo esc_html ($setting['mem_desgi']); ?></span>
                  <h3 class="mb-4"><?php echo esc_html ($setting['mem_name']); ?></h3>
                  <div class="faded">
                    <p><?php echo esc_html ($setting['mem_details']); ?></p>
                    <ul class="ftco-social text-center">
                        <?php if(!empty($setting['mem_social_one'])):?>
                      <li class="ftco-animate"><a href="<?php echo esc_attr ($setting['mem_social_one']); ?>"><span class="icon-twitter"></span></a></li>
                      <?php endif; ?>

                        <?php if(!empty($setting['mem_social_two'])):?>
                      <li class="ftco-animate"><a href="<?php echo esc_attr ($setting['mem_social_two']); ?>"><span class="icon-facebook"></span></a></li><?php endif; ?>    
                       <?php if(!empty($setting['mem_social_three'])):?>       
                      <li class="ftco-animate"><a href="<?php echo esc_attr ($setting['mem_social_three']); ?>"><span class="icon-google-plus"></span></a></li>   
                         <?php endif; ?>
                          <?php if(!empty($setting['mem_social_four'])):?>     
                      <li class="ftco-animate"><a href="<?php echo esc_attr ($setting['mem_social_four']); ?>"><span class="icon-instagram"></span></a></li><?php endif; ?>   
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <?php endforeach; endif; ?>
        </div>
      </div>
    </section>