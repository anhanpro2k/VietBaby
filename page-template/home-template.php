<?php
/**
 * Template name: Home Page
 * @author : Hy Hý
 */
get_header();
while (have_posts()):
    the_post();
    ?>

    <body class="">
        <!--main_contents-->
        <div id="main_contents">
            <!--wrap-->
            <div class="wrap">
                <div class="m_img">
                    <!-- Swiper -->
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php
                            $sl = get_field('mona_home_slider');
                            if (is_array($sl)) {
                                foreach ($sl as $item) {
                                    ?>
                                    <div class="swiper-slide">
                                        <img src="<?php
                                        $image = $item['img_pc'];
                                        $size = '830x400';
                                        echo wp_get_attachment_image_url($image, $size);
                                        ?>                  " class="pc" />
                                        <img src="<?php
                                        $image = $item['img_mo'];
                                        $size = '370x180';
                                        echo wp_get_attachment_image_url($image, $size);
                                        ?>" class="mo" />
                                    </div>           
                                    <?php
                                }
                            }
                            ?> 
                        </div>
                    </div>
                </div>
                <ul class="m_c_menu">
                    <?php
                    $me = get_field('mona_home_menu');
                    if (is_array($me)) {
                        foreach ($me as $i => $item) {
                            ?>
                            <li class="m0<?php echo $i+1 ?>"><a target="_blank" href="<?php echo $item['url'] ?>"><span><?php echo $item['title'] ?></span></a></li>       
                            <?php
                        }
                    }
                    ?>
                </ul>
                <div class="m_board">
				<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fvietbabyfair%2F&tabs=timeline&width=340&height=400&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId=538498843471899" width="340" height="400" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe><!--<ul class="tab_m_board">
                        <li class="active"><a href="#tab_m_board_c01"><?php _e('Tin triển lãm ','monamedia');?></a></li>
                        <li><a href="#tab_m_board_c02"><?php _e('Tin thị trường ','monamedia');?></a></li>
                    </ul>

                    <div id="tab_m_board_c01" class="tab_m_board_content on">
                        <ul>
                            <?php
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 6,
                                'tax_query' => array(
                                    'relation' => 'AND',
                                    array(
                                        'taxonomy' => 'category',
                                        'field' => 'id',
                                        'terms' => 1,
                                        'compare' => '='
                                    )
                                )
                            );
                            $my_query = new WP_Query($args);
                            while ($my_query->have_posts()) {
                                $my_query->the_post();
                                ?>
                                <li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
                            <?php }
                            wp_reset_postdata();
                            ?>
                        </ul>
                        <a href="<?php the_field('mona_home_cate_1') ?>" class="bt_more">more</a>
                    </div>
                    <div id="tab_m_board_c02" class="tab_m_board_content">
                        <ul>
                            <?php
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 6,
                                'tax_query' => array(
                                    'relation' => 'AND',
                                    array(
                                        'taxonomy' => 'category',
                                        'field' => 'id',
                                        'terms' => 9,
                                        'compare' => '='
                                    )
                                )
                            );
                            $my_query = new WP_Query($args);
                            while ($my_query->have_posts()) {
                                $my_query->the_post();
                                ?>
                                <li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
                            <?php }
                            wp_reset_postdata();
                            ?>
                        </ul>
                        <a href="<?php the_field('mona_home_cate_2') ?>" class="bt_more">more</a>
                    </div>-->
                </div>

                <div class="m_gallery video__gallery">
                    <h2><span><?php _e('Thư viện ','monamedia');?></span></h2>
                    <a href="<?php echo get_the_permalink(MONA_GALLERY) ?>" class="bt_more">more</a>
                    <div class="swiper-container gallery-video-thumbs">
                        <div class="swiper-wrapper">
                            <?php
                            $vi = get_field('mona_city_video');
                            if (is_array($vi)) {
                                foreach ($vi as $item) {
                                    ?>
                                    <a class="swiper-slide youtube-popup" href="<?php echo $item['url'] ?>" data-src="<?php echo $item['url'] ?>"><span class="title"><?php echo $item['title'] ?></span></a>
                                    <?php
                                }
                            }
                            ?>     
                        </div>
                        <div class="swiper-button-next swiper-button-white"></div>
                        <div class="swiper-button-prev swiper-button-white"></div>
                    </div>
                </div>
            </div>
            <!--//wrap-->
        </div>
        <!--//main_contents-->

        <?php
    endwhile;
    get_footer();
    ?>