<?php
/*
Plugin Name: Display You Tube Videos
Plugin URI: http://www.nativewebs.com
Description: A custom module to show you tube videos on website sidebar. Added a widget on wordpress backend.
Author: Chaudhary Sushil Kandola
Author URI: http://www.sushilk.com
Version: 1.0.0
*/
class display_you_tube_video extends WP_Widget {

	function display_you_tube_video() {
		// Instantiate the parent object
		parent::__construct( false, 'You Tube Videos' );
	}

	function widget( $args, $instance ) {
		// Widget output
		extract($args);
		extract($instance);
		$title = esc_attr($instance['title']);
		$code = esc_attr($instance['code']);
		echo $before_title . $title . $after_title;
		echo '<iframe width="240" height="200" src="http://www.youtube.com/embed/';
		echo $code;
		echo '" frameborder="0" allowfullscreen></iframe>';
	}

	function form( $instance ) {
		$title = esc_attr($instance['title']);
		$code = esc_attr($instance['code']);
		echo "<br/>Title<input id = \"" . $this->get_field_id('title') . "\" class = \"widefat\" name = \"" . $this->get_field_name('title') . "\" type=\"text\" value =\"" . $title . "\" placeholder='Title Of Widget' / ><br/><br/>";
		echo "<br/>Code(Only Video-ID)<input id = \"" . $this->get_field_id('code') . "\" class = \"widefat\" name = \"" . $this->get_field_name('code') . "\" type=\"text\" value =\"" . $code . "\" placeholder='Youtube Video Id'  / ><br/><br/>";
	}
	
}
add_action('widgets_init','register_display_you_tube_video');
function register_display_you_tube_video(){
	register_widget('display_you_tube_video');
}

?>
