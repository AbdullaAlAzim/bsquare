<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package BSQUARE
 */

get_header();
?>
<section class="ftco-section four-zero">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 order-lg-last ftco-animate">
			<header class="page-header">
				<div class="jero-content text-center">
					<h1>Oops, sorry we can’t find that page</h1>
					<a href="<?php bloginfo('url'); ?>" class="btn btn-light"><?php echo esc_html__('back to home','bsquare'); ?></a>
				</div>
			</header>
	     </div>
	 </div>
 </div>
</section >
<?php
get_footer();
