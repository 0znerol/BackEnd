<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />
    <?php wp_head(); ?>
</head>
<nav id="nav">
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => '',
            'menu_id' => '',
            'fallback_cb' => '__return_false',
            'items_wrap' => '<ul id="%1$s" class="links">%3$s</ul>',
            'depth' => 0
        )
    );
    ?>
</nav>

<body <?php body_class(); ?>