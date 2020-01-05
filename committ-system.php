
<?php
/**
 * Plugin Name: Committ System
 * Description: Custom Post Types for Committ theme
 */

define( 'COMMITT_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
/*Courses and Universities Post Types*/
require( COMMITT_PLUGIN_DIR . '/lib/courses_post_type.php' );
require( COMMITT_PLUGIN_DIR . '/lib/universities_post_type.php' );
/*Courses and Universities Custom Taxonomies*/
require( COMMITT_PLUGIN_DIR . '/lib/courses_taxonomies.php' );
require( COMMITT_PLUGIN_DIR . '/lib/universities_taxonomies.php' );
/*Ajax Search Filters for Courses post types*/
require( COMMITT_PLUGIN_DIR . '/profilter/filter-form.php' );
require( COMMITT_PLUGIN_DIR . '/profilter/filter-callback.php' );
/*Ajax Search Filters for Universities post types*/
require( COMMITT_PLUGIN_DIR . '/university-search/filter-form.php' );
require( COMMITT_PLUGIN_DIR . '/university-search/filter-callback.php' );