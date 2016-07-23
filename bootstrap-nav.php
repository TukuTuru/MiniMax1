<?php
/**
 * The template for the Bootstrap nav-walker menu mockup.
 * 
 * Edit the Main Menu here
 * 
 * @link http://getbootstrap.com/components/
 *
 * @since MinimaX1 1.0.0
 */
?>
<nav role="navigation">
    <div class="navbar navbar-static-top navbar-default">
        <div class="container-fluid">
            <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ) ?>" rel="homepage"><?php bloginfo( 'name' ) ?></a>
            </div>

            <div class="navbar-collapse collapse navbar-responsive-collapse">
                <?php
                /**
                 * Include the Navwalker Class
                 */
                MinimaX1_require_once('wp_bootstrap_navwalker');

                $args = array(
                    'theme_location'    => 'primary',
                    'depth'             => 2,
                    'container'         => false,
                    'menu_class'        => 'nav navbar-nav navbar-right',
                    'walker'            => new wp_bootstrap_navwalker()
                );

                if (has_nav_menu('primary')) {
                    wp_nav_menu($args);
                }
                ?>
            </div>
        </div>
    </div>           
</nav>

