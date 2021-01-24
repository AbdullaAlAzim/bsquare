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
 <?php if(has_excerpt()):?>
 <?php the_excerpt();?>
 <?php endif;?>
</div>
