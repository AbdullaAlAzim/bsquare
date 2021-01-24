<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BSQUARE
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<a href="<?php the_permalink();?>"><h2 class="mb-3"><?php the_title(); ?></h2></a>
<?php if(has_excerpt()):?>
<?php the_excerpt();?>
<?php endif;?>
</div>


