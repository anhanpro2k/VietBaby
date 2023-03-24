<?php

/**
 * Undocumented class
 * Create widget
 */
class M_Social extends WP_Widget {

	/**
	 * Undocumented function
	 */
	function __construct() {
		parent::__construct(
			'M_Social',
			__( 'Mona - Social', 'mona-admin' ),
			[
				'description' => __( 'Social list', 'mona-admin' ),
			]
		);
	}

	/**
	 * Undocumented function
	 *
	 * @param [type] $args
	 * @param [type] $instance
	 *
	 * @return void
	 */
	public function widget( $args, $instance ) {
		$widget_id   = $args['widget_id'];
		$social_list = $instance['social_list'] ?? '';
		$title       = $instance['title'] ?? '';
		if ( ! empty ( $social_list ) ) {
			echo $args['before_widget'];
			?>
			<?php
			if ( ! empty( $title ) ) {
				?>
                <div class="social-title c-white body-14">
					<?php echo $title; ?>
                </div>
				<?php
			}
			?>
			<?php
			if ( content_exists( $social_list ) ) {
				?>
                <div class="social-list">
					<?php
					foreach ( $social_list as $item_social ) {
						?>
                        <a target="_blank" href="<?php echo $item_social['item_link'] ?>" class="item-link">
                                 <span class="bg">
         	                        <img src="<?php echo get_site_url(); ?>/template/img/polygon.svg" alt=""/>
                                 </span>
							<?php echo wp_get_attachment_image( attachment_url_to_postid( $item_social['item_icon'] ), '64x64', '', [ 'class' => 'icon' ] ); ?>
                        </a>
						<?php
					}
					?>
                </div>
				<?php
			}
			?>
			<?php
			echo $args['after_widget'];
		}
	}


	/**
	 * Undocumented function
	 *
	 * Widget Backend
	 *
	 * @param [type] $instance
	 *
	 * @return void
	 */
	public function form( $instance ) {
		if ( isset( $instance['social_list'] ) ) {
			$social_list = $instance['social_list'];
		} else {
			$social_list = '';
		}

		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = '';
		}

		if ( class_exists( 'Mona_Widgets' ) ) {


			Mona_Widgets::create_field(
				[
					'type'        => 'text',
					'name'        => $this->get_field_name( 'title' ),
					'id'          => $this->get_field_id( 'title' ),
					'value'       => $title,
					'title'       => __( 'Title', 'monamedia' ),
					'placeholder' => __( 'Nhập nội dung văn bản', 'monamedia' ),
					'docs'        => false,
				]
			);


			Mona_Widgets::create_field(
				[
					'type'   => 'repeater',
					'name'   => $this->get_field_name( 'social_list' ),
					'id'     => $this->get_field_id( 'social_list' ),
					'value'  => $social_list,
					'title'  => __( 'Social list', 'monamedia' ),
					'fields' => [
						'item_icon' => [
							'type'        => 'image',
							'title'       => __( 'Icon', 'monamedia' ),
							'placeholder' => __( 'Choose an image', 'monamedia' ),
							'width'       => 24,
						],
						'item_link' => [
							'type'        => 'text',
							'title'       => __( 'Link', 'monamedia' ),
							'placeholder' => __( 'Enter link', 'mona-admin' ),
						]
					],
					'docs'   => false,
				]
			);
		}
	}

	/**
	 * Undocumented function
	 *
	 * Updating widget replacing old instances with new
	 *
	 * @param [type] $new_instance
	 * @param [type] $old_instance
	 *
	 * @return void
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = [];
		if ( class_exists( 'Mona_Widgets' ) ) {
			$instance['social_list'] = Mona_Widgets::update_field( $new_instance['social_list'] );
			$instance['title']       = Mona_Widgets::update_field( $new_instance['title'] );
		}

		return $instance;
	}

}

/**
 * Undocumented function
 *
 * Register and load the widget
 * @return void
 */
function M_Social() {
	register_widget( 'M_Social' );
}

add_action( 'widgets_init', 'M_Social' );
