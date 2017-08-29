<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('css_url'))
{
    function css_url($uri = '')
    {
        $CI =& get_instance();
        return $CI->config->base_url('assets/css/' . $uri);
    }
}

if ( ! function_exists('js_url'))
{
    function js_url($uri = '')
    {
        $CI =& get_instance();
        return $CI->config->base_url('assets/js/' . $uri);
    }
}

if ( ! function_exists('images_url'))
{
    function images_url($uri = '')
    {
        $CI =& get_instance();
        return $CI->config->base_url('assets/images/' . $uri);
    }
}

if ( ! function_exists('media_url'))
{
    function media_url($uri = '')
    {
        $CI =& get_instance();
        return $CI->config->base_url('media/' . $uri);
    }
}