<div class="row news__slider" id="news-slider">
    <?php
        $se = get_field('mona_seatmap');
    if (is_array($se)) {
        foreach ($se as $item) {
            ?>
            <div class="col-md-6 slider-wrap">
                <div class="news-slide swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        $it = $item['info'];
                        if (is_array($it)) {
                            foreach ($it as $ite) {
                                ?>
                                <a href="<?php echo $ite['url'] ?>" target="_blank" class="swiper-slide" 
                                   style="background-image:url(<?php
                                   $image = $ite['img'];
                                   $size = '700x300';
                                   echo wp_get_attachment_image_url($image, $size);
                                   ?>
                                   )"></a>
                                   <?php
                               }
                           }
                           ?>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next swiper-button-white"></div>
                    <div class="swiper-button-prev swiper-button-white"></div>
                </div>
            </div>         
            <?php
        }
    }
    ?>
</div>