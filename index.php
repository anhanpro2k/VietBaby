<?php
get_header();
?>
<main><!--End header-->

    <div id="primary" class="page blog">
        <div class="container clear">
            <section class="content">
                <div class="box-content">

                        <h1 class="page-title"><?php the_title(); ?></h1>
                    <?php if (have_posts()) : ?>

                        <ul class="products-list">
                            <?php while (have_posts()) : the_post(); ?>

                                <li class="clear product">
                                    <div class="tmb">
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                                    </div>
                                    <div class="content">
                                        <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <div class="excerpt">
                                            <?php the_excerpt(); ?>
                                        </div>
                                        <p class="read-more"><a href="<?php the_permalink()?>">Xem thêm <i class="arrow fa fa-long-arrow-right"></i></a></p>
                                    </div>
                                </li>

                            <?php endwhile; // end of the loop. ?>

                        </ul>
                        <?php endif;?>

                </div> 
            </section>
            <?php echo get_template_part('sidebar'); ?>
        </div>
    </div>
</main>
<?php get_footer();
