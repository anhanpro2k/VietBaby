<?php
/**
 * Template name: Index Page
 * @author : Hy Hý
 */
get_header();
while (have_posts()):
    the_post();
    $in = get_field('mona_index');
    ?>

    <body class="">
        <div id="intro">
            <div class="con">
                <h1><a href="<?php echo get_the_permalink(MONA_HOME); ?>"><?php the_title() ?></a></h1>
                <ul class="menu">
                    <?php
                    if (is_array($in)) {
                        foreach ($in as $i => $item) {
                            ?>
                            <li class="s0<?php echo $i + 1 ?>">
                                <div class="tx">
                                    <h2><?php echo $item['title'] ?></h2>
                                    <div class="date"><?php echo $item['date'] ?></div>
                                </div>
                                <a href="<?php echo $item['url'] ?>"><?php echo $item['title'] ?></a>
                            </li>            
                        <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>

        <?php
    endwhile;
    get_footer();
    ?>
	<style>
	/*HOVER IMAGE HOME*/
@keyframes fadeInChange{
    0%{
        opacity:.5;
    }
     100%{
        opacity:1;
    }
}
@keyframes fadeOutChange{
    0%{
        opacity:.5;
    }
    100%{
        opacity:1;
       
    }
}
#intro .menu>li.s01 {
    background-image: url('<?php
     $image1 = get_field('bg');
     echo wp_get_attachment_image_url( $image1, 'full');?>')
}
#intro .menu>li.s02 {
    background-image: url('<?php
     $image2 = get_field('bg_hover');
     echo wp_get_attachment_image_url( $image2, 'full');?>')
}

#intro .menu>li.s01:hover{
    animation:fadeInChange 1.5s forwards;
    background-image: url('<?php
     $image3 = get_field('bg_2');
     echo wp_get_attachment_image_url( $image3, 'full');?>');
}

#intro .menu li.s02:hover {
    animation:fadeInChange 1.5s forwards;
    background-image: url('<?php
     $image4 = get_field('bg_hover_2');
     echo wp_get_attachment_image_url( $image4, 'full');?>');
}

#intro .menu>li.s01,#intro .menu li.s02{
    animation:fadeOutChange 1.5s forwards;
    background-repeat:no-repeat;
    background-position:center center;
}

#intro .con>h1{
    user-select:none;
    pointer-event:none;
}
@-webkit-keyframes fadeInChange{
    0%{
        opacity:.5;
    }
     100%{
        opacity:1;
    }
}

@-webkit-keyframes fadeOutChange{
    0%{
        opacity:.5;
    }
    100%{
        opacity:1;
       
    }
}
</style>

