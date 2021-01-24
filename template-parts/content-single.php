<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BSQUARE
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h2 class="mb-3"><?php the_title(); ?></h2>

      <?php bsquare_post_thumbnail(); ?>

      <?php the_content(); ?>
       <div class="tag-widget post-tag-container mb-5 mt-5">
        <div class="tagcloud">
          <a href="#" class="tag-cloud-link"><?php bsquare_tags(); ?></a>
        </div>
      </div>

      <div class="about-author d-flex p-4 bg-light">
        <div class="bio mr-5">
          <?php echo get_avatar(get_the_author_meta('ID'),512);?>
        </div>
        <div class="desc">
          <h3><?php echo get_the_author_meta('nickname');?></h3>
          <p> <?php echo wpautop(get_the_author_meta('description'));?></p>
        </div>
      </div>
</div>