<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package JobScout
 */
/**
 * Doctype Hook
 * 
 * @hooked jobscout_doctype
 */
do_action('jobscout_doctype');
?>

<head itemscope itemtype="https://schema.org/WebSite">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <?php
    /**
     * Before wp_head
     * 
     * @hooked jobscout_head
     */
    do_action('jobscout_before_wp_head');

    wp_head(); ?>

</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">

    <?php
    wp_body_open();

    /**
     * Before Header
     * @hooked jobscout_responsive_header - 15
     * @hooked jobscout_page_start - 20 
     */
    do_action('jobscout_before_header');

    /**
     * Header
     * 
     * @hooked jobscout_header - 20     
     */
    do_action('jobscout_header');

    /**
     * Content
     * 
     * @hooked jobscout_breadcrumbs_bar
     */
    do_action('jobscout_after_header');


    /**
     * Content
     * 
     * @hooked jobscout_content_start
     */
    do_action('jobscout_content');