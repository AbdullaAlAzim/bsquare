<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BSQUARE
 */
?>
    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">      
           <?php
            if ( is_active_sidebar( 'sidebar-2' ) ) {
              dynamic_sidebar( 'sidebar-2' );
            }
            ?>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="mam">
            <?php echo esc_html (Kirki::get_option('Copy_right')); ?>
            </div>
          </div>
        </div>
      </div>
    </footer>
  <!-- loader -->
<?php if ( true == get_theme_mod( 'preloader_swt', true ) ) : ?>
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  <?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>
