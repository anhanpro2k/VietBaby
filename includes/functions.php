<?php
function mona_page_navi($wp_query='') {
	if($wp_query==''){
	global $wp_query;	
	}
    
    $bignum = 999999999;
    if ($wp_query->max_num_pages <= 1)
        return;
    echo '<ul class="pagination-list center">';
    echo paginate_links(array(
        'base' => str_replace($bignum, '%#%', esc_url(get_pagenum_link($bignum))),
        'format' => '',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => '&larr;',
        'next_text' => '&rarr;',
        'type' => 'list',
        'end_size' => 3,
        'mid_size' => 3
    ));
    echo '</ul>';
}
function mona_page_navi_custom($wp_query = '') {
    if ($wp_query == '') {
        global $wp_query;
    }

    $bignum = 999999999;
    if ($wp_query->max_num_pages <= 1)
        return;
    echo '<ul class="pagination-list center">';
    echo paginate_links(array(
        'base' => '?phantrang=%#%',
        'format' => '',
        'current' => max(1, @$_GET['phantrang']),
        'total' => $wp_query->max_num_pages,
        'prev_text' => '&larr;',
        'next_text' => '&rarr;',
        'type' => 'list',
        'end_size' => 3,
        'mid_size' => 3
    ));
    echo '</ul>';
}

function mona_ajax_add_regiter() {
    $form = [];
    parse_str($_POST['form'], $form);
    $args = array(     
        
        'Tên' => @$form['text-name'],
        'Số điện thoại' => @$form['tel-1'],
        'Công ty'  => @$form['text-city'],
        'Email'  => @$form['email-1'],
        'Tuổi'   => @$form['menu-age'],
        'Giới tính'  => @$form['radio-sex'],
        'Tình trạng hôn nhân'  => @$form['radio-marry'],
        '1. Đối tượng'  => @$form['radio-q1'],
        '2. Thu nhập gia đình hàng tháng'  => @$form['radio-q2'],
        '3. Con bạn bao nhiêu tuổi'  => @$form['radio-q3'],
        '4. Số trẻ em trong gia đình'  => @$form['radio-q4'],
        '5. Chi tiêu trung bình cho con'  => @$form['radio-q5'],
        '6. Số lần tham gia sự kiện'  => @$form['radio-q6'],
        '7. Thông tin triển lãm qua'  => @$form['radio-q7'],
        
'Công ty : ' => @$form['text-company2'],
'Tên : ' => @$form['text-name2'],
'Quốc gia : ' => @$form['text-country2'],
'Quận/huyện : ' => @$form['text-city2'],
'Số điện thoại : ' => @$form['tel-12'],
'Email : ' => @$form['emmail-12'],
'Website : ' => @$form['text-web2'],
'1. Lĩnh vực kinh doanh : ' => @$form['radio-q12'],
'2. Chức vụ : ' => @$form['radio-q22'],
'3. Công việc đảm nhiệm : ' => @$form['radio-q32'],
'4. Thẩm quyền quyết định : ' => @$form['radio-q42'],
'5. Mục đích viếng thăm : ' => @$form['radio-q52'],
'6. Thông tin triển lãm qua : ' => @$form['radio-q62'],

    );
    $code = random_code();
    $ins = wp_insert_post(array(
        'post_type' => 'mona_code',
        'post_title' => $code,
        'post_status' => 'publish',
    ));
    add_post_meta($ins, '_code_data', serialize($args));
    add_post_meta($ins, '_code', $code);
    add_post_meta($ins, '_phone', @$form['tel-1']);
    add_post_meta($ins, '_phone', @$form['tel-12']);
    $html = mona_get_email_html($ins);
    add_filter('wp_mail_content_type', 'set_html_content_type');
    wp_mail(@$form['email-1'], 'Register', $html);
     wp_mail(@$form['emmail-12'], 'Register', $html);
	 
    echo json_encode(array(
	'title'=> ('Chúc mừng bạn đã đăng ký thành công!'),
	'mess'=> ('Mã đăng kí đã được gửi về e-mail của bạn, mời bạn kiểm tra.
	Hẹn gặp bạn tại Vietbaby Fair 2021') ));
    wp_die();
}

add_action('wp_ajax_mona_ajax_add_regiter', 'mona_ajax_add_regiter');
add_action('wp_ajax_nopriv_mona_ajax_add_regiter', 'mona_ajax_add_regiter');

function RandomString() {
    $characters = '0123456789';
    $randstring = '';
    for ($i = 0; $i < 6; $i++) {
        $randstring = $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}

function random_code() {
    global $wpdb;
    $code = date("Y") . '-' . rand(100000, 999999);
    $args = array(
        'post_type' => 'mona_code',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => '_code',
                'value' => $code,
                'compare' => '='
            )
        )
    );
    $my_query = new WP_Query($args);
    if (!$my_query->have_posts()) {
        return $code;
    }
    return random_code();
}

function mona_get_email_html($post_id) {
    $html = '<h2 style="text-align: center">Cảm ơn bạn đã đăng kí tham quan Triển lãm Vietbaby 2022! </h2>';
    $html .= '<p><strong>Thời gian: 02/06 - 05/06/2022 </strong></p>';
	$html .= '<p>10:00 - 18:00: 02 - 05/06/2022</p>';
	
	$html .= '<p><strong>Địa điểm: </strong> Vietbaby Fair 2022 HCMC - Trung tâm triển lãm Sài Gòn (SECC), 799 Nguyễn Văn Linh, Quận 7, TP.HCM</p>';
	$html .= '<p><strong>Mã đăng ký của bạn: </strong></p>';
    $html .= '<h4><strong style="color: #fff;padding: 5px 20px;background: #dc2455;border-radius: 40px;border: 7px solid #48abac;font-size: 25px;margin-left: 10px;display: inline-block;">' . get_post_meta($post_id, '_code', true) . '</strong></h4>';
    $html .= '<p>Vui lòng đọc mã trên cho nhân viên tại Quầy đăng kí Triển lãm Vietbaby để vào cổng miễn phí </p>';

    $html .= '<hr>';
    $html .= '<h2 style="text-align: center">Thank you for registering to visit Vietbaby 2022!</h2>';
    $html .= '<p><strong>Time: June 02, 2022 - June 05, 2022</strong></p>';
	$html .= '<p>10:00 - 18:00: 02 - 05 June, 2022</p>';
	$html .= '<p><strong>Venue: </strong> Vietbaby Fair 2022 HCMC - Sai Gon Exhibition & Conference Center (SECC), 799 Nguyen Van Linh parkway, Dist 7, HCMC</p>';
    $html .= '<p><strong>Registration code:  </strong></p>';
	$html .= '<h4> <strong style="color: #fff;padding: 5px 20px;background: #dc2455;border-radius: 40px;border: 7px solid #48abac;font-size: 25px;margin-left: 10px;display: inline-block;">' . get_post_meta($post_id, '_code', true) . '</strong></h4>';
	$html .= '<p>Please read the code above for staff at Vietbaby Exhibition Registration Counter for free entrance </p>';

    return $html;
}
function mona_test(){
    if(isset($_GET['test'])){
        echo mona_get_email_html(3694);
        die();
    }
}
add_action('init','mona_test');
function set_html_content_type() {
    return 'text/html';
}

function mona_admin_metabox() {
    add_meta_box('thong-tin', 'Thông tin đăng ký', 'mona_code_data', 'mona_code');
}

add_action('add_meta_boxes', 'mona_admin_metabox');

function mona_code_data($post) {
    $post_id = $post->ID;
    ?>
    <h4>Mã đăng ký: <strong style="color:blue;"><?php echo get_post_meta($post_id, '_code', true); ?></strong></h4>
    <h5>Thông tin</h5>
    <ul class="mona-data">
        <?php
        $data = get_post_meta($post_id, '_code_data', true);
        $data = unserialize($data);
        if (is_array($data)) {
            foreach ($data as $k => $item) {
                ?>
                <li><?php echo $k; ?>: <?php echo (is_array($item)) ? implode(' - ', $item) : $item; ?></li>    
            <?php
        }
    }
    ?>
    </ul>
    <?php
}

// define the wpcf7_is_tel callback 
function custom_filter_wpcf7_is_tel( $result, $tel ) { 
  $result = preg_match( '/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/', $tel );
  return $result; 
}
         
add_filter( 'wpcf7_is_tel', 'custom_filter_wpcf7_is_tel', 10, 2 );