<ul>
    <?php echo(mona_get_option('mona_sticky_header_facebook','') !=''? '<li class="fb"><a href="'.mona_get_option('mona_sticky_header_facebook','').'"></a></li>':'');?>
    <?php echo(mona_get_option('mona_sticky_header_youtube','') !=''? '<li class="yt"><a href="'.mona_get_option('mona_sticky_header_youtube','').'"></a></li>':'');?>
    <?php echo(mona_get_option('mona_sticky_header_email','') !=''? '<li class="em"><a href="'.mona_get_option('mona_sticky_header_email','').'"></a></li>':'');?>
	<?php echo(mona_get_option('mona_sticky_header_website','') !=''? '<li class="in"><a href="'.mona_get_option('mona_sticky_header_website','').'"></a></li>':'');?>
    
</ul>
