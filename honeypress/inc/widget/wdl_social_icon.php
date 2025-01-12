<?php // Register and load the widget
	function honeypress_social_icon_widget() {
  		register_widget( 'honeypress_social_icon_widget' );
	}
	add_action( 'widgets_init', 'honeypress_social_icon_widget' );

	// Creating the widget
class Honeypress_Social_Icon_Widget extends WP_Widget {

		function __construct() {
			parent::__construct(
					'honeypress_social_icon_widget', // Base ID
					esc_html__('HoneyPress: Social icons','honeypress'), // Widget Name
					array(
						'classname' => 'Honeypress_Social_Icon_Widget',
						'description' => esc_html__('HoneyPress social icons widget','honeypress'),
					),
					array(
						'width' => 300,
					)
			);
			/* enqueue script  */
			add_action( 'admin_enqueue_scripts', array( $this, 'honeypress_social_icon_style' ) );
		}
		public function honeypress_social_icon_style(){?>
				<style type="text/css">
						.customize-control-widget_form .widget-control-save {
						    display: block!important;
						}
				</style>
		<?php }
		public function widget( $args, $instance ) {
				echo $args['before_widget']; ?>
				<ul class="custom-social-icons">
				<?php
						//Facebook Link
						if(!empty($instance['facebook_link'])) { ?>
								<li><a class="facebook" href="<?php echo esc_url($instance['facebook_link']); ?>" <?php if(!empty($instance['facebook_target'])){ echo "target='_blank'"; } ?> ><i class="fa-brands fa-facebook-f"></i></a></li>
						<?php }

						//Twitter Link
						if(!empty($instance['twitter_link'])) { ?>
								<li><a class="twitter" href="<?php echo esc_url($instance['twitter_link']); ?>" <?php if(!empty($instance['twitter_target'])){ echo "target='_blank'"; } ?> ><i class="fa-brands fa-x-twitter"></i></a></li>
						<?php }

						//Linkedin Link
						if(!empty($instance['linkedin_link'])) { ?>
								<li><a class="linkedin" href="<?php echo esc_url($instance['linkedin_link']); ?>" <?php if(!empty($instance['linkedin_target'])){ echo "target='_blank'"; } ?> ><i class="fa-brands fa-linkedin"></i></a></li>
						<?php }

						//Instagram Link
						if(!empty($instance['instagram_link'])) { ?>
								<li><a class="instagram" href="<?php echo esc_url($instance['instagram_link']); ?>" <?php if(!empty($instance['instagram_target'])){ echo "target='_blank'"; } ?> ><i class="fa-brands fa-instagram"></i></a></li>
						<?php }

						//Youtube Link
						if(!empty($instance['youtube_link'])) { ?>
								<li><a class="youtube" href="<?php echo esc_url($instance['youtube_link']); ?>" <?php if(!empty($instance['youtube_target'])){ echo "target='_blank'"; } ?> ><i class="fa-brands fa-youtube"></i></a></li>
						<?php }

						//Skype Link
						if(!empty($instance['skype_link'])) { ?>
								<li><a class="skype" href="<?php echo esc_url($instance['skype_link']); ?>" <?php if(!empty($instance['skype_target'])){ echo "target='_blank'"; } ?> ><i class="fa-brands fa-skype"></i></a></li>
						<?php }

						//Vimeo Link
						if(!empty($instance['vimeo_link'])) { ?>
								<li><a class="vimeo" href="<?php echo esc_url($instance['vimeo_link']); ?>" <?php if(!empty($instance['vimeo_target'])){ echo "target='_blank'"; } ?> ><i class="fa-brands fa-square-vimeo"></i></a></li>
						<?php }

						//Dribble Link
						if(!empty($instance['dribble_link'])) { ?>
								<li><a class="dribbble" href="<?php echo esc_url($instance['dribble_link']); ?>" <?php if(!empty($instance['dribble_target'])){ echo "target='_blank'"; } ?> ><i class="fa-brands fa-dribbble"></i></a></li>
						<?php } ?>
						</ul>
				<?php
				echo $args['after_widget'];
		}

		// Widget Backend
		public function form( $instance ) {

				//facebook
				if ( isset( $instance[ 'facebook_link' ])){
						$facebook_link = $instance[ 'facebook_link' ];
				}
				else {
						$facebook_link = '#';
				}
				$instance['facebook_target'] = (isset($instance['facebook_target'])?$instance['facebook_target']:'');
				if ( isset( $instance[ 'facebook_target' ])){
						$facebook_target = $instance[ 'facebook_target' ];
				}

				//twitter
				if ( isset( $instance[ 'twitter_link' ])){
						$twitter_link = $instance[ 'twitter_link' ];
				}
				else {
						$twitter_link = '#';
				}
				$instance['twitter_target'] = (isset($instance['twitter_target'])?$instance['twitter_target']:'');
				if ( isset( $instance[ 'twitter_target' ])){
						$twitter_target = $instance[ 'twitter_target' ];
				}

				//Lindedin
				if ( isset( $instance[ 'linkedin_link' ])){
						$linkedin_link = $instance[ 'linkedin_link' ];
				}
				else {
						$linkedin_link = '#';
				}
				$instance['linkedin_target'] = (isset($instance['linkedin_target'])?$instance['linkedin_target']:'');
				if ( isset( $instance[ 'linkedin_target' ])){
						$linkedin_target = $instance[ 'linkedin_target' ];
				}

				//Instagram
				if ( isset( $instance[ 'instagram_link' ])){
						$instagram_link = $instance[ 'instagram_link' ];
				}
				else {
						$instagram_link = '#';
				}
				$instance['instagram_target'] = (isset($instance['instagram_target'])?$instance['instagram_target']:'');
				if ( isset( $instance[ 'instagram_target' ])){
						$instagram_target = $instance[ 'instagram_target' ];
				}

				//Youtube
				if ( isset( $instance[ 'youtube_link' ])){
						$youtube_link = $instance[ 'youtube_link' ];
				}
				else {
						$youtube_link = '#';
				}
				$instance['youtube_target'] = (isset($instance['youtube_target'])?$instance['youtube_target']:'');
				if ( isset( $instance[ 'youtube_target' ])){
						$youtube_target = $instance[ 'youtube_target' ];
				}

				//Skype
				if ( isset( $instance[ 'skype_link' ])){
						$skype_link = $instance[ 'skype_link' ];
				}
				else {
						$skype_link = '#';
				}
				$instance['skype_target'] = (isset($instance['skype_target'])?$instance['skype_target']:'');
				if ( isset( $instance[ 'skype_target' ])){
						$skype_target = $instance[ 'skype_target' ];
				}

				//Vimeo
				if ( isset( $instance[ 'vimeo_link' ])){
						$vimeo_link = $instance[ 'vimeo_link' ];
				}
				else {
						$vimeo_link = '';
				}
				$instance['vimeo_target'] = (isset($instance['vimeo_target'])?$instance['vimeo_target']:'');
				if ( isset( $instance[ 'vimeo_target' ])){
						$vimeo_target = $instance[ 'vimeo_target' ];
				}

				//Drrible
				if ( isset( $instance[ 'dribble_link' ])){
						$dribble_link = $instance[ 'dribble_link' ];
				}
				else {
						$dribble_link = '';
				}
				$instance['dribble_target'] = (isset($instance['dribble_target'])?$instance['dribble_target']:'');
				if ( isset( $instance[ 'dribble_target' ])){
						$dribble_target = $instance[ 'dribble_target' ];
				}
				// Widget admin form
				?>
				<!-- Facebook Link -->
				<h4 for="<?php echo esc_attr($this->get_field_id( 'facebook_link' )); ?>"><?php esc_html_e( 'Facebook URL','honeypress' ); ?></h4>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'facebook_link' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook_link' )); ?>" type="text" value="<?php if($facebook_link) echo esc_attr( $facebook_link ); ?>" />
				<input class="checkbox" type="checkbox" <?php if($instance['facebook_target']==true){ echo 'checked'; } ?> id="<?php echo esc_attr($this->get_field_id( 'facebook_target' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook_target' )); ?>" />
				<label for="<?php echo esc_attr($this->get_field_id( 'facebook_target' )); ?>"><?php esc_html_e( 'Open link in new tab','honeypress' ); ?></label>

				<!-- Twitter Link -->
				<h4 for="<?php echo esc_attr($this->get_field_id( 'twitter_link' )); ?>"><?php esc_html_e( 'Twitter URL','honeypress' ); ?></h4>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'twitter_link' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'twitter_link' )); ?>" type="text" value="<?php if($twitter_link) echo esc_attr( $twitter_link ); ?>" />
				<input class="checkbox" type="checkbox" <?php if($instance['twitter_target']==true){ echo 'checked'; } ?> id="<?php echo esc_attr($this->get_field_id( 'twitter_target' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'twitter_target' )); ?>" />
				<label for="<?php echo esc_attr($this->get_field_id( 'twitter_target' )); ?>"><?php esc_html_e( 'Open link in new tab','honeypress' ); ?></label>


				<!-- Lindedin Link -->
				<h4 for="<?php echo esc_attr($this->get_field_id( 'linkedin_link' )); ?>"><?php esc_html_e( 'LinkedIn URL','honeypress' ); ?></h4>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'linkedin_link' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'linkedin_link' )); ?>" type="text" value="<?php if($linkedin_link) echo esc_attr( $linkedin_link ); ?>" />
				<input class="checkbox" type="checkbox" <?php if($instance['linkedin_target']==true){ echo 'checked'; } ?> id="<?php echo esc_attr($this->get_field_id( 'linkedin_target' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'linkedin_target' )); ?>" />
				<label for="<?php echo esc_attr($this->get_field_id( 'linkedin_target' )); ?>"><?php esc_html_e( 'Open link in new tab','honeypress' ); ?></label>

				<!-- Instagram Link -->
				<h4 for="<?php echo esc_attr($this->get_field_id( 'instagram_link' )); ?>"><?php esc_html_e( 'Instagram URL','honeypress' ); ?></h4>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'instagram_link' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'instagram_link' )); ?>" type="text" value="<?php if($instagram_link) echo esc_attr( $instagram_link );?>" />
				<input class="checkbox" type="checkbox" <?php if($instance['instagram_target']==true){ echo 'checked'; } ?> id="<?php echo esc_attr($this->get_field_id( 'instagram_target' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'instagram_target' )); ?>" />
				<label for="<?php echo esc_attr($this->get_field_id( 'instagram_target' )); ?>"><?php esc_html_e( 'Open link in new tab','honeypress' ); ?></label>

				<!-- Youtube Link -->
				<h4 for="<?php echo esc_attr($this->get_field_id( 'youtube_link' )); ?>"><?php esc_html_e( 'Youtube URL','honeypress' ); ?></h4>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'youtube_link' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'youtube_link' )); ?>" type="text" value="<?php if($youtube_link) echo esc_attr( $youtube_link );?>" />
				<input class="checkbox" type="checkbox" <?php if($instance['youtube_target']==true){ echo 'checked'; } ?> id="<?php echo esc_attr($this->get_field_id( 'youtube_target' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'youtube_target' )); ?>" />
				<label for="<?php echo esc_attr($this->get_field_id( 'youtube_target' )); ?>"><?php esc_html_e( 'Open link in new tab','honeypress' ); ?></label>

				<!-- Skype Link -->
				<h4 for="<?php echo esc_attr($this->get_field_id( 'skype_link' )); ?>"><?php esc_html_e( 'Skype URL','honeypress' ); ?></h4>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'skype_link' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'skype_link' )); ?>" type="text" value="<?php if($skype_link) echo esc_attr( $skype_link );?>" />
				<input class="checkbox" type="checkbox" <?php if($instance['skype_target']==true){ echo 'checked'; } ?> id="<?php echo esc_attr($this->get_field_id( 'skype_target' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'skype_target' )); ?>" />
				<label for="<?php echo esc_attr($this->get_field_id( 'skype_target' )); ?>"><?php esc_html_e( 'Open link in new tab','honeypress' ); ?></label>

				<!-- Vimeo Link -->
				<h4 for="<?php echo esc_attr($this->get_field_id( 'vimeo_link' )); ?>"><?php esc_html_e( 'Vimeo URL','honeypress' ); ?></h4>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'vimeo_link' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'vimeo_link' )); ?>" type="text" value="<?php if($vimeo_link) echo esc_attr( $vimeo_link ); ?>" />
				<input class="checkbox" type="checkbox" <?php if($instance['vimeo_target']==true){ echo 'checked'; } ?> id="<?php echo esc_attr($this->get_field_id( 'vimeo_target' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'vimeo_target' )); ?>" />
				<label for="<?php echo esc_attr($this->get_field_id( 'vimeo_target' )); ?>"><?php esc_html_e( 'Open link in new tab','honeypress' ); ?></label>

				<!-- Dribble Link -->
				<h4 for="<?php echo esc_attr($this->get_field_id( 'dribble_link' )); ?>"><?php esc_html_e( 'Dribble URL','honeypress' ); ?></h4>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'dribble_link' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'dribble_link' )); ?>" type="text" value="<?php if($dribble_link) echo esc_attr( $dribble_link );?>" />
				<input class="checkbox" type="checkbox" <?php if($instance['dribble_target']==true){ echo 'checked'; } ?> id="<?php echo esc_attr($this->get_field_id( 'dribble_target' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'dribble_target' )); ?>" />
				<label for="<?php echo esc_attr($this->get_field_id( 'dribble_target' )); ?>"><?php esc_html_e( 'Open link in new tab','honeypress' ); ?></label>
		<?php
		}

		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {

				$instance = array();
				$instance['facebook_link'] = ( ! empty( $new_instance['facebook_link'] ) ) ? esc_url_raw( $new_instance['facebook_link'] ) : '';
				$instance['facebook_target'] = ( ! empty( $new_instance['facebook_target'] ) ) ? honeypress_sanitize_checkbox( $new_instance['facebook_target'] ) : '';

				$instance['twitter_link'] = ( ! empty( $new_instance['twitter_link'] ) ) ? esc_url_raw( $new_instance['twitter_link'] ) : '';
				$instance['twitter_target'] = ( ! empty( $new_instance['twitter_target'] ) ) ? honeypress_sanitize_checkbox( $new_instance['twitter_target'] ) : '';

				$instance['linkedin_link'] = ( ! empty( $new_instance['linkedin_link'] ) ) ? esc_url_raw( $new_instance['linkedin_link'] ) : '';
				$instance['linkedin_target'] = ( ! empty( $new_instance['linkedin_target'] ) ) ? honeypress_sanitize_checkbox( $new_instance['linkedin_target'] ) : '';

				$instance['instagram_link'] = ( ! empty( $new_instance['instagram_link'] ) ) ? esc_url_raw( $new_instance['instagram_link'] ) : '';
				$instance['instagram_target'] = ( ! empty( $new_instance['instagram_target'] ) ) ? honeypress_sanitize_checkbox( $new_instance['instagram_target'] ) : '';

				$instance['youtube_link'] = ( ! empty( $new_instance['youtube_link'] ) ) ? esc_url_raw( $new_instance['youtube_link'] ) : '';
				$instance['youtube_target'] = ( ! empty( $new_instance['youtube_target'] ) ) ? honeypress_sanitize_checkbox( $new_instance['youtube_target'] ) : '';

				$instance['skype_link'] = ( ! empty( $new_instance['skype_link'] ) ) ? esc_url_raw( $new_instance['skype_link'] ) : '';
				$instance['skype_target'] = ( ! empty( $new_instance['skype_target'] ) ) ? honeypress_sanitize_checkbox( $new_instance['skype_target'] ) : '';

				$instance['vimeo_link'] = ( ! empty( $new_instance['vimeo_link'] ) ) ? esc_url_raw( $new_instance['vimeo_link'] ) : '';
				$instance['vimeo_target'] = ( ! empty( $new_instance['vimeo_target'] ) ) ? honeypress_sanitize_checkbox( $new_instance['vimeo_target'] ) : '';

				$instance['dribble_link'] = ( ! empty( $new_instance['dribble_link'] ) ) ? esc_url_raw( $new_instance['dribble_link'] ) : '';
				$instance['dribble_target'] = ( ! empty( $new_instance['dribble_target'] ) ) ? honeypress_sanitize_checkbox( $new_instance['dribble_target'] ) : '';

				return $instance;
		}
}
