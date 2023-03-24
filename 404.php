<?php get_header(); ?>

<main id="main-wrap">
    <div class="mona-wrapper-404">
        <h1 class="title-404">404</h1>
        <h3 class="content-404">Oops, the page you are looking for does not exist.</h3>
        <div class="mona-context-404-button">
            <a href="<?php echo get_home_url(); ?>" class="btn mona-button-style"><?php _e('Back to home','monamedia'); ?></a>
        </div>
    </div>

</main>


<?php get_footer(); ?>
