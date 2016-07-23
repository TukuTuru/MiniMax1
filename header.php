<?php
/**
 * The Header.
 *
 * Displays all of the <head> section and opens the <body> tag.
 * Includes the Menu container
 *
 * @link https://codex.wordpress.org/Designing_Headers
 *
 * @since MiniMax1 1.0.0
 */
?>
<!DOCTYPE html>
<?php
/**
 * Display the Language Attributes
 * 
 * @link https://codex.wordpress.org/Function_Reference/language_attributes
 *
 * @since MiniMax1 1.0.0
 */
?>
<html <?php language_attributes(); ?>>
        <head>
            <?php
            /**
             * Display the “Encoding for pages and feeds” set in Settings > Reading.
             * 
             * @link https://developer.wordpress.org/reference/functions/bloginfo/
             *
             * @since MiniMax1 1.0.0
             */
            ?>
            <meta charset="<?php bloginfo( 'charset' ); ?>">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
            <?php
            /**
             * Always have wp_head() just before the closing </head> tag of your theme, or you will break many plugins, which
             * generally use this hook to add elements to <head> such as styles, scripts, and meta tags.
             *
             * @link https://codex.wordpress.org/Plugin_API/Action_Reference/wp_head
             *
             * @since MiniMax1 1.0.0
             */
            wp_head();?>
        </head>
    <?php
    /**
     * Open the body and add dynamic body class
     * 
     * @link https://developer.wordpress.org/reference/functions/body_class/
     */
    ?> 
    <body <?php body_class(); ?>>

        <?php 
        /**
         * The main navigation
         * Edit in bootstrap-nav.php
         *
         * @link https://developer.wordpress.org/reference/functions/get_template_part/
         */
        get_template_part( 'bootstrap-nav'); ?> 
        