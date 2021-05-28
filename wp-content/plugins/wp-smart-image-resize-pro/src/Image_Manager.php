<?php

namespace WP_Smart_Image_Resize;

use Intervention\Image\ImageManager;
use WP_Smart_Image_Resize\Utilities\Env;

class Image_Manager extends ImageManager
{
    /**
     * @param $size
     */
    public function __construct( $size )
    {

        $driver = apply_filters( 'wp_sir_driver', Env::default_image_processor() );

        if ( ! empty( $driver ) ) {
            parent::__construct( compact( 'driver' ) );
        } else {
            parent::__construct();
        }
    }

    public function make( $data )
    {
        wp_raise_memory_limit( 'image' );

        return parent::make( $data );
    }

    private function is_image_large( $size )
    {
        return $size[ 0 ] > 1500 || $size[ 1 ] > 1500;
    }

    /**
     * Check if the manager is using Imagick driver.
     *
     * @return bool
     */

    public function usingImagick()
    {
        return $this->config[ 'driver' ] === 'imagick';
    }

    /**
     * Check if the manager is using GD driver.
     *
     * @return bool
     */
    public function usingGD()
    {
        return $this->config[ 'driver' ] === 'gd';
    }
}
