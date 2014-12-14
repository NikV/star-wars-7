<?php
/**
 * Plugin Name: Star Wars: The Force Awakens
 * Description: "There's been an awakening"
 * Author: Nikhil Vimal
 * Author URI: http://nik.techvoltz.com
 * Version: r.2.d.2
 * Plugin URI: http://www.starwars.com/
 * License: GNU GPLv2+
 */
/**
 * In now way is this plugin affiliated with Disney. This is simply for educational purposes, no more.
 * Keep up the good work J.J. Abrams
 */
/**
 * Copyright (c) December 2015 Nikhil Vimal
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

//The Force is within this shortcode
function force_awakens_shortcode() {

	$trailer_shortcode = wp_oembed_get( 'https://www.youtube.com/watch?v=erLk59H86ww' );
	return $trailer_shortcode;
}
add_shortcode( 'star-wars-7', 'force_awakens_shortcode' );

//Give the power of the Jedi to your theme
function force_awakens_the_force_function() {

	$trailer_function = wp_oembed_get( 'https://www.youtube.com/watch?v=erLk59H86ww' );
	echo $trailer_function;

}


/**
 * That's no moon, that's The Wookiee Widget
 */
class Wookiee_Widget extends WP_Widget {


	function __construct() {
		parent::__construct(
			'wookiee_widget', // Base ID
			__( 'Star Wars: The Force Awakens', 'star-wars-7' ), // Name
			array( 'description' => __( 'A widget to show off how big of a Star Wars fan you really are. May the force be with you.', 'star-wars-7' ), ) // Args
		);
	}

	/**
	 * Display the hologram of the trailer.
	 *
	 * @see Star Wars in theaters 2015.
	 */
	public function widget( $args, $instance ) {

		echo $args['before_widget'];

		$trailer_widget = wp_oembed_get('https://www.youtube.com/watch?v=erLk59H86ww');
		echo $trailer_widget;

		echo $args['after_widget'];
	}



} //This is not the end, but just the beginning

// I've got a bad feeling about this
function register_wookiee_widget() {
	register_widget( 'Wookiee_Widget' );
}
add_action( 'widgets_init', 'register_wookiee_widget' );


