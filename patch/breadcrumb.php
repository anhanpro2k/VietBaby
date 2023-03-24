<!--st_area-->
<div class="st_area s01">
    <h2><?php _e('TRIỂN LÃM','monamedia');?></h2>
    <div class="location">
        <a href="<?php echo get_the_permalink(MONA_HOME) ?>"><?php _e('Trang chủ','monamedia');?></a><i></i>
        <?php _e('Triển lãm','monamedia');?><i></i>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </div>
</div>
<!--//st_area-->

<!--sub_menu-->
<div class="sub_menu">
    <?php
    wp_nav_menu(array(
        'container' => false,
        'container_class' => '',
        'menu_class' => 'nav-tabs sub04',
        'theme_location' => 'top-menu',
        'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'fallback_cb' => false,
            //'walker' => new Mona_Custom_Walker_Nav_Menu,
    ));
    ?>  
</div>
<!--//sub_menu-->