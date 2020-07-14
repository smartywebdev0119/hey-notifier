<?php
/**
 * Fields
 * 
 * @package HeyNotify
 */

namespace HeyNotify\Fields;

use Carbon_Fields\Container;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Actions
add_action( 'after_setup_theme', __NAMESPACE__ . '\\boot' );
add_action( 'carbon_fields_register_fields', __NAMESPACE__ . '\\service_container' );
add_action( 'carbon_fields_register_fields', __NAMESPACE__ . '\\notification_container' );

/**
 * Boot up Carbon Fields
 *
 * @return void
 */
function boot() {
	\Carbon_Fields\Carbon_Fields::boot();
}

/**
 * Service post meta container
 *
 * @return void
 */
function service_container() {
	Container::make( 'post_meta', __( 'Service', 'heynotify' ) )
		->where( 'post_type', '=', 'heynotify' )
		->set_context( 'normal' )
		->set_priority( 'default' )
		->add_fields( apply_filters( 'heynotify_service_fields', array() ) );
}

/**
 * Notification post meta container
 * 
 * @return void
 */
function notification_container() {
	Container::make( 'post_meta', __( 'Events', 'heynotify' ) )
		->where( 'post_type', '=', 'heynotify' )
		->set_context( 'normal' )
		->set_priority( 'default' )
		->add_fields( apply_filters( 'heynotify_event_fields', array() ) );
}