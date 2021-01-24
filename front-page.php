<?php 
/**
 * Template Name: front page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BSQUARE
 */
get_header();
?>
<?php
$part = '';
// Get the parts.
$template_parts = get_theme_mod( 'My_sorter', array( 'banner', 'service', 'counter','project','team','testimony','news', 'contact','address') );
// Loop parts.

if ( ! empty( $template_parts ) && is_array( $template_parts ) ) {
    foreach ( $template_parts as $part ) {
        get_template_part( 'sections/section-' . $part );
    }
}
get_footer();
 ?>