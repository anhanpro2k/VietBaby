<?php
/**
 * Template name: Show Overview Page
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
            <!--online_app-->
            <ul class="online_app">
                <?php
                $ap = get_field('mona_apply');
                if (is_array($ap)) {
                    foreach ($ap as $i => $item) {
                        ?>
                        <li class="s0<?php echo $i+3 ?>">
                            <div class="box">
                                <h4><?php echo $item['title'] ?></h4> 
                                <p><?php echo $item['subtitle'] ?></p>
                                <a href="<?php echo $item['url'] ?>" class="bt_regi"><?php echo $item['button'] ?></a>
                            </div>
                        </li>           
                    <?php
                    }
                }
                ?>
            </ul>
            <!--//online_app-->
        </div>
        <!--//wrap-->
    </div>
    <!--//container-->

    <?php
endwhile;
get_footer();
?>

