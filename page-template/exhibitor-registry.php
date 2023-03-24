<?php
/**
 * Template name: Exhibitor Registry Page
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
            <div class="ex-registry">
                <?php the_content() ?>
                <div class="guide-line">
                    <?php
                    $image = get_field('mona_image');
                    $size = 'full';
                    echo wp_get_attachment_image($image, $size);
                    ?>
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

