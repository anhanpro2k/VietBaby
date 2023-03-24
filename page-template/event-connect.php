<?php
/**
 * Template name: Event Connect Page
 * @author : Hy Hý
 */
get_header();
while (have_posts()):
    the_post();
    ?>
<?php get_template_part('patch/breadcrumb2') ?>
        <!--container-->
        <div id="container">
            <!--wrap-->
            <div class="wrap">
                <h3><?php the_title() ?></h3>
                <div class="event-wrap">
                    <div class="post_content mona-content" style="line-height:1.5; font-size:14px;">
                        <?php the_content(); ?>
                    </div>
                </div>

            </div>
            <!--//wrap-->
        </div>
        <!--//container-->

    <?php
endwhile;
get_footer();
?>

