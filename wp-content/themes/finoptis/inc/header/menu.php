<?php
global $finoptis_option;
$menu_bracket = !empty($finoptis_option['menu_border_style']) ? '' : 'no-menu-bracket';
if ( has_nav_menu( 'menu-1' ) ) {
    // User has assigned menu to this location;
    // output it
    ?>
    <nav class="nav navbar <?php echo esc_attr($menu_bracket); ?>">
        <div class="navbar-menu">
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu-single',
                ) );
            ?>
        </div>
       
        <div class='nav-link-container mobile-menu-link'> 
            <a href='#' class="nav-menu-link">              
                <span class="hamburger1"></span>
                <span class="hamburger2"></span>
                <span class="hamburger3"></span>
            </a> 
        </div>
    </nav>
    <?php
}
?>

<nav class="nav-container mobile-menu-container">
    <ul class="sidenav">
        <li class='nav-link-container'> 
            <a href='#' class="nav-menu-link">              
                <span class="hamburger1"></span>
                <span class="hamburger3"></span>
            </a> 
        </li>
        <li>
          <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu-single2',
                ) );
            ?>
        </li>
        <li class="social-icon-responsive">
             <?php get_template_part( 'inc/header/offcanvas-content' );?>
        </li>
    </ul>

   

</nav>