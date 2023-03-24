<?php
/**
 * Template name: Items Page
 * @author : Hy Hý
 */
get_header();
while (have_posts()):
    the_post();
    ?>
<?php get_template_part('patch/breadcrumb') ?>

    <!--container-->
    <div id="container">
        <!--wrap-->
        <div class="wrap">
            <h3><?php the_title() ?></h3>
            <!--dp_item-->
            <div class="dp_item">
			<?php the_content(); ?>
                <?php
                /*$it = get_field('mona_item');
                if (is_array($it)) {
                    foreach ($it as $i => $item) {
                        ?>
                        <div class="unit">
                            <dl class="i0<?php echo $i+1 ?>">
                                <dt><?php echo $item['title'] ?></dt>
                                <dd>
                                    <?php echo $item['table'] ?>
                                </dd>
                            </dl>
                        </div>          
                        <?php
                    }
                }*/
                ?>
            </div>
            <!--//dp_item-->
        </div>
        <!--//wrap-->
    </div>
    <!--//container-->

    <?php
endwhile;
get_footer();
?>

