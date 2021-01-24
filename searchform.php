<?php
/**
 * Template for displaying search forms in Plus Point
 *
 * @package WordPress
 * @subpackage plus-point
 * @since 1.0
 * @version 1.0
 */

?>
<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>
<div class="sidebar-box">                              
<form role="search" method="get" class="search-form search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	  <div class="form-group">
	  	 <span class="icon icon-search"></span>
	<input type="search" id="<?php echo esc_attr($unique_id); ?>" class="form-control" placeholder="<?php echo esc_attr_x( 'Keyword search....', 'placeholder', 'plus-point' ); ?>" value="<?php echo get_search_query(); ?>" name="s" /><a href="#"><i class="fa fa-search"></i></a>
	 </div>
</form>
</div>













