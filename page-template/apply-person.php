<?php
/**
 * Template name: Apply Personal Page
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

            <div class="form__info__wrap">
                <?php the_content() ?>
                <div class="form__wrap">
                    <?php
                    $short = get_field('mona_cf7');
                    if ($short != '') {
                         echo '<div class="register-form">' . do_shortcode($short) . '</div>';
                    }
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


<script>
    jQuery(document).ready(function ($) {
        var wpcf7Elm = document.querySelector('.wpcf7');
        wpcf7Elm.addEventListener('wpcf7invalid', function (event,e) {
            $('html,body').animate({
        scrollTop: $(".wpcf7-form .wpcf7-not-valid").first().offset().top-100
    });
        });
        wpcf7Elm.addEventListener('wpcf7mailsent', function (event,e) {
      
        var $form = $('.register-form');
        var $formdata=  $form.find('form').serialize();
        $.ajax({
                url: mona_ajax_url.ajaxURL,
                type: 'post',
                data: {
                    action: 'mona_ajax_add_regiter',
                    form: $formdata
                },
                error: function (request) {
                  $form.find('.ajax-loader').removeClass('mona-active');
                    alert(request);

                },
                beforeSend: function () {
                   $form.find('.ajax-loader').addClass('mona-active');
                  
                    $form.find('.wpcf7-response-output').hide();
                },
                success: function (result) {
                    $form.find('.ajax-loader').removeClass('mona-active');
                    var $data = $.parseJSON(result);
                    location = '<?php echo get_the_permalink(MONA_SUCCESS); ?>?1';
                    //$form.find('.wpcf7-response-output').html($form.find('.screen-reader-response').html()).addClass('wpcf7-mail-sent-ok').show();
                }
            });
        
         
        }, false);
    });
</script>

