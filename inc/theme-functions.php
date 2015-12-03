<?php

/**
 * Theme Functions
 *
 * @package Misfist Network Theme
 */

if(! function_exists( 'misfist_network_sites' ) ) {

    function misfist_network_sites() {

        $args = array(
            'public'     => 1,
            'archived'   => 0,
            'spam'       => 0,
            'deleted'    => 0,
        );

        $sites = wp_get_sites( $args );

        return $sites;

    }

}

if(! function_exists( 'misfist_network_posts' ) ) {

}


?>