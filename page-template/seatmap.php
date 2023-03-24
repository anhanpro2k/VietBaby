<?php
/**
 * Template name: Seatmap Page
 * @author : Hy Hý
 */
get_header();
while (have_posts()):
    the_post();
get_template_part('patch/breadcrumb2')
    ?>
    <?php //get_template_part('patch/breadcrumb') ?>
    <!--container-->
    <div id="container">
        <!--wrap-->
        <div class="wrap">
            <h3><?php the_title() ?></h3>
            <div class="booth-map">
                <?php the_content(); ?>
            </div>
            <?php //get_template_part('patch/banner', 'ads') ?>
        </div>
        <!--//wrap-->
    </div>
    <!--//container-->

    <?php
endwhile;
get_footer();
?>

