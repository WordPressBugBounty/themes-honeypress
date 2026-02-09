<?php
$honeypress_repeater_path = trailingslashit( HONEYPRESS_THEME_DIR ) . '/inc/customizer-repeater/functions.php';
if ( file_exists( $honeypress_repeater_path ) ) {
require_once( $honeypress_repeater_path );
}
/**
 * Customize for taxonomy with dropdown, extend the WP customizer
 */

if ( ! class_exists( 'WP_Customize_Control' ) )
	return NULL;

function honeypress_sections_settings( $wp_customize ){

$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

	/* Sections Settings */
	$wp_customize->add_panel( 'section_settings', array(
		'priority'       => 126,
		'capability'     => 'edit_theme_options',
		'title'      => esc_html__('Homepage Section Settings','honeypress'),
	) );


	//Page editor Section
	$wp_customize->add_section('honeypress_gutenberg_editor_section',array(
				'title' => esc_html__('Gutenberg Editor settings','honeypress'),
				'panel' => 'section_settings',
				'priority'       => 2,
	));


	// Enable editor section
	$wp_customize->add_setting( 'gutenberg_editor_section_enable' , array( 'default' => 'on',  'sanitize_callback' => 'honeypress_sanitize_radio',) );
	$wp_customize->add_control(	'gutenberg_editor_section_enable' , array(
			'label'    => esc_html__( 'Enable Page Editor', 'honeypress' ),
			'section'  => 'honeypress_gutenberg_editor_section',
			'type'     => 'radio',
			'choices' => array(
				'on'=>esc_html__('ON', 'honeypress'),
				'off'=>esc_html__('OFF', 'honeypress')
			)
	));

	// Custom Control Button
	class Honeypress_Editor_Customize_Control extends WP_Customize_Control {
	    public $type = 'new_menu';

	    public function render_content() {

	        $template_file = 'template-business.php';

	        $pages = get_posts(array(
	            'post_type'  => 'page',
	            'meta_key'   => '_wp_page_template',
	            'meta_value' => $template_file,
	            'posts_per_page' => 1,
	        ));

	        if ( !empty($pages) ) {
	            $page_id = $pages[0]->ID;
	            $edit_link = admin_url('post.php?post=' . $page_id . '&action=edit');
	        } else {
	            $edit_link = admin_url('edit.php?post_type=page');
	        }
	        ?>
	        <div class="honeypress-pro-features-customizer">
	            <p>Use this button to insert Gutenberg blocks into the Business Template page.</p>
	            <a href="<?php echo esc_url($edit_link); ?>" class="honeypress-pro-button button-primary">
	                <?php esc_html_e('Page Editor Section', 'honeypress'); ?>
	            </a>
	        </div>
	        <?php
	    }
	}


	$wp_customize->add_setting(
	    'edit_homepage_button_setting',
	    array(
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'sanitize_text_field',
	    )	
	);

	$wp_customize->add_control( 
	    new Honeypress_Editor_Customize_Control( 
	        $wp_customize, 
	        'edit_homepage_button_setting', 
	        array(
	            'section' => 'honeypress_gutenberg_editor_section',
	            'active_callback'   =>  'honeypress_editor_button_callback',
	            'setting' => 'edit_homepage_button_setting'
	        )
	    )
	);


	//Latest News Section
	$wp_customize->add_section('honeypress_latest_news_section',array(
			'title' => esc_html__('Latest News Settings','honeypress'),
			'panel' => 'section_settings',
			'priority'       => 8,
			));


	// Enable news section
	$wp_customize->add_setting( 'latest_news_section_enable' , array( 'default' => 'on',  'sanitize_callback' => 'honeypress_sanitize_radio',) );
			$wp_customize->add_control(	'latest_news_section_enable' , array(
					'label'    => esc_html__( 'Enable Home News Section', 'honeypress' ),
					'section'  => 'honeypress_latest_news_section',
					'type'     => 'radio',
					'choices' => array(
						'on'=>esc_html__('ON', 'honeypress'),
						'off'=>esc_html__('OFF', 'honeypress')
					)
			));

		// News section title
		$wp_customize->add_setting( 'home_news_section_title',array(
		'capability'     => 'edit_theme_options',
		'default' => esc_html__('Vitae Lacinia','honeypress'),
		'sanitize_callback' => 'honeypress_sanitize_text',
		));
		$wp_customize->add_control( 'home_news_section_title',array(
		'label'   => esc_html__('Title','honeypress'),
		'section' => 'honeypress_latest_news_section',
		'type' => 'text',
		));

		//News section discription
		$wp_customize->add_setting( 'home_news_section_discription',array(
		'default'=> esc_html__('Cras Vitae Placerat','honeypress'),
		'sanitize_callback' => 'honeypress_sanitize_text',
		));
		$wp_customize->add_control( 'home_news_section_discription',array(
		'label'   => esc_html__('Description','honeypress'),
		'section' => 'honeypress_latest_news_section',
		'type' => 'textarea',
		));


		// enable / disable meta section
		$wp_customize->add_setting(
			'blog_meta_section_enable',
			array('capability'  => 'edit_theme_options',
			'default' => true,
			'sanitize_callback' => 'honeypress_sanitize_checkbox',

			));
		$wp_customize->add_control(
			'blog_meta_section_enable',
			array(
				'type' => 'checkbox',
				'label' => esc_html__('Enable post meta values, like author name, date, comments, etc.','honeypress'),
				'section' => 'honeypress_latest_news_section',
			)
		);
}
add_action( 'customize_register', 'honeypress_sections_settings' );

/**
 * Add selective refresh for Front page section section controls.
 */
function honeypress_register_home_section_partials( $wp_customize ){
	//News
	$wp_customize->selective_refresh->add_partial( 'home_news_section_title', array(
		'selector'            => '.section-module.blog .section-subtitle',
		'settings'            => 'home_news_section_title',
		'render_callback'  => 'honeypress_home_news_section_title_render_callback',

	) );

	$wp_customize->selective_refresh->add_partial( 'home_news_section_discription', array(
		'selector'            => '.section-module.blog .section-title',
		'settings'            => 'home_news_section_discription',
		'render_callback'  => 'honeypress_home_news_section_discription_render_callback',

	) );
}
add_action( 'customize_register', 'honeypress_register_home_section_partials' );

function honeypress_home_news_section_title_render_callback() {
	return get_theme_mod( 'home_news_section_title' );
}

function honeypress_home_news_section_discription_render_callback() {
	return get_theme_mod( 'home_news_section_discription' );
}

function honeypress_sanitize_radio( $input, $setting ){
     //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

     //get the list of possible radio box options
     $choices = $setting->manager->get_control( $setting->id )->choices;

     //return input if valid or return default option
     return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
