
<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BSQUARE
 */

?>
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
  <head>
    <meta charset="utf-<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <?php wp_head(); ?>
  </head>
 <body <?php body_class(); ?>>
<?php wp_body_open(); ?>
     <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">

           <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
           
             <a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>"><span><?php the_custom_logo(); ?></span></a>
            <?php
            else :?>
              <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'title' ); ?></a>
            <?php
          endif;?>
            <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span>
            </button>
          
          <?php
           $my_menu =   wp_nav_menu(
            array(
              'theme_location'   =>   'menu-1',
              'menu_id'          =>   'primary-menu',
              'menu_class'       =>   'navbar-nav nav ml-auto',
              'container_class'  =>   'collapse navbar-collapse',
              'container_id'     =>   'ftco-nav',
              'container'        =>   'div',
              'echo'             =>   false,
            )
          );
           $my_menu = str_replace('menu-item', 'menu-item nav-item', $my_menu );
           $my_menu = str_replace('<a', '<a class="nav-link"', $my_menu );
           $my_menu = str_replace('<a', '<a data-scroll', $my_menu );
            echo $my_menu;
          ?>
            </div>
        </div>
    </nav>

 <!-- ==========================  Breadcrumb Section Start ================== -->
<?php
   if(!is_page_template('front-page.php') && !is_404() && !is_front_page()) :
?>
<?php 
 $bred_swict = get_theme_mod( 'bred_swict');
 $Blog_bread = get_theme_mod( 'Blog_bread');
 $bread_color = get_theme_mod( 'bread_color',true);

 ?>
<?php if($bred_swict == true):  ?>
  <section class="hero-wrap hero-wrap-2" style="<?php if($Blog_bread): ?>background-image:url(<?php echo esc_attr($Blog_bread);?>);<?php else:?> background-color:<?php echo esc_attr($bread_color); ?>;<?php endif;?>" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
             <?php if($bred_swict == true) :  ?>
                   <?php 
                  if(is_search()){
                  ?>
                    <h1 class="mb-3 bread">
                      <?php
                      echo esc_html__('Search Results For : ', 'bsquare') .get_search_query();
                       ?>
                    </h1>
                  <?php
                  } 
                  elseif (is_archive()) {
                   the_archive_title( '<h2 class="breadcrumb-title">', '</h2>' );
                  }
                  elseif (!is_single() || is_page()) {
                   the_title('<h2 class="breadcrumb-title">', '</h2>');
                  }
                   elseif(!is_home()){
                   ?><h1 class="breadcrumb-title"><?php echo apply_filters( 'the_title', get_the_title( get_option( 'page_for_posts' ) ) ); ?></h1><?php
                  }
              ?>
                <?php  if(function_exists('bootstrap_breadcrumb') && !is_search()) :bootstrap_breadcrumb(); endif; ?>
          </div>
        </div>
      </div>
    </section>
  <?php endif; endif; endif; ?>




   

  



    


  