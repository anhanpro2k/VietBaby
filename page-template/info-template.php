<?php
/**
 * Template name: Info Template
 * @author : Hy Hý
 */
get_header();
while ( have_posts() ):
	the_post();
	?>

    <main>
		<?php get_template_part( 'patch/breadcrumb2' ) ?>
        <div id="container">
            <div class="wrap">
                <h3>THÔNG TIN CHUNG</h3>
                <div class="gen-info sec">
                    <div class="container-cust">
                        <div class="title-box">
                            <div class="title-inner">Thông tin triển lãm</div>
                        </div>
                        <div class="gen-info">
                            <div class="gen-info__table">
                                <div class="table-main">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <th>
                                                <div class="tt">Tên triển lãm</div>
                                            </th>
                                            <td>
                                                <div class="detail">
                                                    Triển lãm Quốc tế Sản phẩm và Dịch vụ cho Mẹ bầu, Mẹ
                                                    và Trẻ em - VIETBABY
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <div class="tt">Thời gian</div>
                                            </th>
                                            <td>
                                                <div class="detail">01-04/06/2023</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <div class="tt">Địa điểm</div>
                                            </th>
                                            <td>
                                                <div class="detail">
                                                    SECC, 799 Nguyễn Văn Linh, Quận 7, Thành phố Hồ Chí
                                                    Minh, Việt Nam
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <div class="tt">Ban tổ chức</div>
                                            </th>
                                            <td>
                                                <div class="img"><img
                                                            src="http://vietbabyfair.com.vn/wp-content/uploads/2023/03/Logo-SEGE-CUT-1.png"
                                                            alt=""/>
                                                    <img
                                                            src="http://vietbabyfair.com.vn/wp-content/uploads/2023/03/Logo-SEGE-CUT-1.png"
                                                            alt=""/>
                                                    <img
                                                            src="http://vietbabyfair.com.vn/wp-content/uploads/2023/03/Logo-SEGE-CUT-1.png"
                                                            alt=""/>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <div class="tt">Đơn vị tài trợ</div>
                                            </th>
                                            <td>
                                                <div class="img"><img
                                                            src="http://vietbabyfair.com.vn/wp-content/uploads/2023/03/Logo-SEGE-CUT-1.png"
                                                            alt=""/>
                                                    <img
                                                            src="http://vietbabyfair.com.vn/wp-content/uploads/2023/03/Logo-SEGE-CUT-1.png"
                                                            alt=""/>
                                                    <img
                                                            src="http://vietbabyfair.com.vn/wp-content/uploads/2023/03/Logo-SEGE-CUT-1.png"
                                                            alt=""/>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <div class="tt">Đơn vị hỗ trợ</div>
                                            </th>
                                            <td>
                                                <div class="img"><img
                                                            src="http://vietbabyfair.com.vn/wp-content/uploads/2023/03/Logo-SEGE-CUT-1.png"
                                                            alt=""/>
                                                    <img
                                                            src="http://vietbabyfair.com.vn/wp-content/uploads/2023/03/Logo-SEGE-CUT-1.png"
                                                            alt=""/>
                                                    <img
                                                            src="http://vietbabyfair.com.vn/wp-content/uploads/2023/03/Logo-SEGE-CUT-1.png"
                                                            alt=""/>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="exhi-catalog sec">
                    <div class="container-cust">
                        <div class="title-box">
                            <div class="title-inner">Danh mục sản phẩm</div>
                        </div>
                        <div class="exhi-catalog-list">
                            <div class="item-col">
                                <div class="cata-item">
                                    <div class="cata-item-logo">
                                        <img src="<?php echo get_site_url(); ?>/template/images/img-1.png" alt=""/>
                                    </div>
                                    <div class="cata-item-title">
                                        SẢN PHẨM CHO TRẺ EM
                                    </div>
                                    <div class="cata-item-list">
                                        <div class="cata-item-child">
                                            <div class="icon">
                                                <img src="<?php echo get_site_url(); ?>/template/images/icon-baby2.png"
                                                     alt=""/>
                                            </div>
                                            <div class="text">
                                                <div class="text-title">Sản phẩm cho mẹ bầu:</div>
                                                <div class="text-desc">
                                                    Sản phẩm chăm sóc mẹ, chăm sóc da, dinh dưỡng
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cata-item-child">
                                            <div class="icon">
                                                <img src="<?php echo get_site_url(); ?>/template/images/icon-clothes.png"
                                                     alt=""/>
                                            </div>
                                            <div class="text">
                                                <div class="text-title">Sản phẩm tiền sản:</div>
                                                <div class="text-desc">
                                                    Trang phục ngủ, sách học làm mẹ
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cata-item-child">
                                            <div class="icon">
                                                <img src="<?php echo get_site_url(); ?>/template/images/icon-cradle.png"
                                                     alt=""/>
                                            </div>
                                            <div class="text">
                                                <div class="text-title">Sản phẩm chăm sóc bé:</div>
                                                <div class="text-desc">
                                                    Giường nôi, chăm sóc da, vật dụng nhà cửa, thực phẩm
                                                    chức năng
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cata-item-child">
                                            <div class="icon">
                                                <img src="<?php echo get_site_url(); ?>/template/images/icon-stroller.png"
                                                     alt=""/>
                                            </div>
                                            <div class="text">
                                                <div class="text-title">Sản phẩm an toàn:</div>
                                                <div class="text-desc">
                                                    Xe nôi, ghế trẻ em, thanh chắn an toàn
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cata-item-child">
                                            <div class="icon">
                                                <img src="<?php echo get_site_url(); ?>/template/images/icon-cradle.png"
                                                     alt=""/>
                                            </div>
                                            <div class="text">
                                                <div class="text-title">Dịch vụ bên ngoài:</div>
                                                <div class="text-desc">
                                                    Dịch vụ sau sinh, studio, dịch vụ giữ trẻ
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-col">
                                <div class="cata-item">
                                    <div class="cata-item-logo">
                                        <img src="<?php echo get_site_url(); ?>/template/images/img-3.png" alt=""/>
                                    </div>
                                    <div class="cata-item-title">
                                        SẢN PHẨM CHO TRẺ SƠ SINH
                                    </div>
                                    <div class="cata-item-list">
                                        <div class="cata-item-child">
                                            <div class="icon">
                                                <img src="<?php echo get_site_url(); ?>/template/images/icon-milk-bottle.png"
                                                     alt=""/>
                                            </div>
                                            <div class="text">
                                                <div class="text-title">Thực phẩm:</div>
                                                <div class="text-desc">Thức ăn đóng gói, snack</div>
                                            </div>
                                        </div>
                                        <div class="cata-item-child">
                                            <div class="icon">
                                                <img src="<?php echo get_site_url(); ?>/template/images/icon-star.png"
                                                     alt=""/>
                                            </div>
                                            <div class="text">
                                                <div class="text-title">Đồ nội thất:</div>
                                                <div class="text-desc">
                                                    Trang trí cho phòng ngủ của bé, thảm trải sàn, nội thất
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cata-item-child">
                                            <div class="icon">
                                                <img src="<?php echo get_site_url(); ?>/template/images/icon-toy.png"
                                                     alt=""/>
                                            </div>
                                            <div class="text">
                                                <div class="text-title">Đồ chơi: :</div>
                                                <div class="text-desc">
                                                    Đồ chơi trẻ em, trò Đồ chơi trẻ em, trò tuệ, Đồ chơi
                                                    công nghệ (0-12 tuổi)
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cata-item-child">
                                            <div class="icon">
                                                <img src="<?php echo get_site_url(); ?>/template/images/icon-washing-machine.png"
                                                     alt=""/>
                                            </div>
                                            <div class="text">
                                                <div class="text-title">Đồ dùng trong nhà:</div>
                                                <div class="text-desc">
                                                    Máy lọc không khí, máy rửa chén, máy hút bụi
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cata-item-child">
                                            <div class="icon">
                                                <img src="<?php echo get_site_url(); ?>/template/images/icon-cradle.png"
                                                     alt=""/>
                                            </div>
                                            <div class="text">
                                                <div class="text-title">Vật dụng an toàn:</div>
                                                <div class="text-desc">Tấm chắn bảo vệ</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-col">
                                <div class="cata-item">
                                    <div class="cata-item-logo">
                                        <img src="<?php echo get_site_url(); ?>/template/images/img-4.png" alt=""/>
                                    </div>
                                    <div class="cata-item-title">
                                        SẢN PHẨM GIÁO DỤC
                                    </div>
                                    <div class="cata-item-list">
                                        <div class="cata-item-child">
                                            <div class="icon">
                                                <img src="<?php echo get_site_url(); ?>/template/images/icon-abc.png"
                                                     alt=""/>
                                            </div>
                                            <div class="text">
                                                <div class="text-title">Chương trình học:</div>
                                                <div class="text-desc">
                                                    Ngoại ngữ, Hội họa, Âm nhạc, trung tâm Toán học
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cata-item-child">
                                            <div class="icon">
                                                <img src="<?php echo get_site_url(); ?>/template/images/icon-book.png"
                                                     alt=""/>
                                            </div>
                                            <div class="text">
                                                <div class="text-title">Ấn phẩm sách:</div>
                                                <div class="text-desc">
                                                    Sách theo bộ, sách ảnh, sách theo tập
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cata-item-child">
                                            <div class="icon">
                                                <img src="<?php echo get_site_url(); ?>/template/images/icon-baby.png"
                                                     alt=""/>
                                            </div>
                                            <div class="text">
                                                <div class="text-title">Vật dụng chăm sóc bé:</div>
                                                <div class="text-desc">
                                                    Giường, chăm sóc da, thức ăn cho trẻ nhỏ, thực phẩm chức
                                                    năng
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cata-item-child">
                                            <div class="icon">
                                                <img src="<?php echo get_site_url(); ?>/template/images/icon-washing-machine.png"
                                                     alt=""/>
                                            </div>
                                            <div class="text">
                                                <div class="text-title">
                                                    Hội họa, Âm nhạc và thể thao:
                                                </div>
                                                <div class="text-desc">Các lớp học kĩ năng</div>
                                            </div>
                                        </div>
                                        <div class="cata-item-child">
                                            <div class="icon">
                                                <img src="<?php echo get_site_url(); ?>/template/images/icon-cradle.png"
                                                     alt=""/>
                                            </div>
                                            <div class="text">
                                                <div class="text-title">Cung cấp vật liệu giáo dục:</div>
                                                <div class="text-desc">Cơ sở vật chất mầm non</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="exhi-catalog-bot">
                            <div class="bot-item">
                                <div class="bot-item-icon">
                                    <img src="<?php echo get_site_url(); ?>/template/images/img-5.png" alt=""/>
                                </div>
                                <div class="bot-item-title">VĂN PHÒNG PHẨM</div>
                            </div>
                            <div class="bot-item">
                                <div class="bot-item-icon">
                                    <img src="<?php echo get_site_url(); ?>/template/images/img-2.png" alt=""/>
                                </div>
                                <div class="bot-item-title">
                                    BẢN QUYỀN NHÂN VẬT VIỆT NAM
                                </div>
                            </div>
                        </div>
                        <div class="exhi-catalog-gallery">
                            <div class="gallery-wrap gallery-js">
                                <div class="img-item gItem"
                                     data-src="<?php echo get_site_url(); ?>/template/images/img-6.png">
                                    <img src="<?php echo get_site_url(); ?>/template/images/img-6.png" alt="">
                                </div>
                                <div class="img-item gItem"
                                     data-src="<?php echo get_site_url(); ?>/template/images/img-7.png">
                                    <img src="<?php echo get_site_url(); ?>/template/images/img-7.png" alt="">
                                </div>
                                <div class="img-item gItem"
                                     data-src="<?php echo get_site_url(); ?>/template/images/img-8.png">
                                    <img src="<?php echo get_site_url(); ?>/template/images/img-8.png" alt="">
                                </div>
                                <div class="img-item gItem"
                                     data-src="<?php echo get_site_url(); ?>/template/images/img-9.png">
                                    <img src="<?php echo get_site_url(); ?>/template/images/img-9.png" alt="">
                                </div>
                                <div class="img-item gItem"
                                     data-src="<?php echo get_site_url(); ?>/template/images/img-10.png">
                                    <img src="<?php echo get_site_url(); ?>/template/images/img-10.png"
                                         alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php
endwhile;
get_footer();
?>