<?php get_header(); ?>
<?php get_template_part('patch/breadcrumb3') ?>
<!--container-->
<div id="container">
    <!--wrap-->
    <div class="wrap">
        <h3><?php single_cat_title() ?></h3>
        <div class="blog__wrap">
            <div class="blog-list row">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        ?>   
                        <div class="blog-item col-sm-6 col-lg-4">
                            <div class="blog">
                                <a href="<?php the_permalink() ?>">
                                    <div class="blog-image">
                                        <?php the_post_thumbnail() ?>
                                        <div class="img-caption">
                                            <div class="box-holder"></div>
                                        </div>
                                    </div>
                                </a>
                                <div class="blog-content">
                                    <h2 class="title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                                    <div class="summary">
                                        <p class="line-clamp"><?php echo get_the_excerpt() ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>       
                        <?php
                    }
                }
                ?>
            </div>
            <?php mona_page_navi() ?>
        </div>
    </div>
    <!--//wrap-->
</div>
<!--//container-->
<?php get_footer(); ?>
