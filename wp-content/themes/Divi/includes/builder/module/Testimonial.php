<?php

class ET_Builder_Module_Testimonial extends ET_Builder_Module {
	function init() {
		$this->name       = esc_html__( 'Testimonial', 'et_builder' );
		$this->plural     = esc_html__( 'Testimonials', 'et_builder' );
		$this->slug       = 'et_pb_testimonial';
		$this->vb_support = 'on';
		$this->main_css_element = '%%order_class%%.et_pb_testimonial';

		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Text', 'et_builder' ),
					'image'        => esc_html__( 'Image', 'et_builder' ),
					'elements'     => esc_html__( 'Elements', 'et_builder' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'icon'       => esc_html__( 'Quote Icon', 'et_builder' ),
					'text'       => array(
						'title'    => esc_html__( 'Text', 'et_builder' ),
						'priority' => 49,
					),
					'image' => array(
						'title' => esc_html__( 'Image', 'et_builder' ),
						'priority' => 51,
					),
					'animation' => array(
						'title'    => esc_html__( 'Animation', 'et_builder' ),
						'priority' => 100,
					),
				),
			),
		);

		$this->advanced_fields = array(
			'fonts'                 => array(
				'body' => array(
					'label'            => esc_html__( 'Body', 'et_builder' ),
					'css'              => array(
						'main' => "{$this->main_css_element} *",
					),
					'hide_text_shadow' => true,
				),
			),
			'background'            => array(
				'has_background_color_toggle' => true,
				'use_background_color' => true,
				'options' => array(
					'use_background_color' => array(
						'default'          => 'on',
					),
					'background_color' => array(
						'depends_show_if'  => 'on',
						'default'          => '#f5f5f5',
					),
				),
				'settings'             => array(
					'color' => 'alpha',
				),
			),
			'borders'               => array(
				'default' => array(),
				'portrait' => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => "%%order_class%% .et_pb_testimonial_portrait, %%order_class%% .et_pb_testimonial_portrait:before",
							'border_styles' => "%%order_class%% .et_pb_testimonial_portrait",
						),
					),
					'label_prefix' => esc_html__( 'Image', 'et_builder' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'image',
					'defaults'        => array(
						'border_radii'  => 'on|90px|90px|90px|90px',
						'border_styles' => array(
							'width' => '0px',
							'color' => '#333333',
							'style' => 'solid',
						),
					),
				),
			),
			'box_shadow'            => array(
				'default' => array(),
				'image'   => array(
					'label'           => esc_html__( 'Image Box Shadow', 'et_builder' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'image',
					'css'             => array(
						'main'         => '%%order_class%% .et_pb_testimonial_portrait:before',
					),
					'default_on_fronts'  => array(
						'color'    => '',
						'position' => '',
					),
				),
			),
			'margin_padding' => array(
				'css' => array(
					'important' => 'all',
				),
			),
			'text'                  => array(
				'use_background_layout' => true,
				'options' => array(
					'text_orientation'  => array(
						'default'      => 'left',
					),
					'background_layout' => array(
						'default' => 'light',
						'hover'   => 'tabs',
					),
				),
				'css' => array(
					'main' => implode(', ', array(
						'%%order_class%% .et_pb_testimonial_description p',
						'%%order_class%% .et_pb_testimonial_description a',
						'%%order_class%% .et_pb_testimonial_description .et_pb_testimonial_author',
					))
				)
			),
			'filters'               => array(
				'child_filters_target' => array(
					'tab_slug' => 'advanced',
					'toggle_slug' => 'image',
				),
			),
			'image'                 => array(
				'css' => array(
					'main' => '%%order_class%% .et_pb_testimonial_portrait',
				),
			),
			'button'                => false,
		);

		$this->custom_css_fields = array(
			'testimonial_portrait' => array(
				'label'    => esc_html__( 'Testimonial Portrait', 'et_builder' ),
				'selector' => '.et_pb_testimonial_portrait',
			),
			'testimonial_description' => array(
				'label'    => esc_html__( 'Testimonial Description', 'et_builder' ),
				'selector' => '.et_pb_testimonial_description',
			),
			'testimonial_author' => array(
				'label'    => esc_html__( 'Testimonial Author', 'et_builder' ),
				'selector' => '.et_pb_testimonial_author',
			),
			'testimonial_meta' => array(
				'label'    => esc_html__( 'Testimonial Meta', 'et_builder' ),
				'selector' => '.et_pb_testimonial_meta',
			),
		);

		$this->help_videos = array(
			array(
				'id'   => esc_html( 'FkQuawiGWUw' ),
				'name' => esc_html__( 'An introduction to the Testimonial module', 'et_builder' ),
			),
		);
	}

	function get_fields() {
		$fields = array(
			'author' => array(
				'label'           => esc_html__( 'Author Name', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input the name of the testimonial author.', 'et_builder' ),
				'toggle_slug'     => 'main_content',
			),
			'job_title' => array(
				'label'           => esc_html__( 'Job Title', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input the job title.', 'et_builder' ),
				'toggle_slug'     => 'main_content',
			),
			'company_name' => array(
				'label'           => esc_html__( 'Company Name', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input the name of the company.', 'et_builder' ),
				'toggle_slug'     => 'main_content',
			),
			'url' => array(
				'label'           => esc_html__( 'Company Link URL', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input the website of the author or leave blank for no link.', 'et_builder' ),
				'toggle_slug'     => 'link_options',
			),
			'url_new_window' => array(
				'label'           => esc_html__( 'Company Link Target', 'et_builder' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'In The Same Window', 'et_builder' ),
					'on'  => esc_html__( 'In The New Tab', 'et_builder' ),
				),
				'toggle_slug'     => 'link_options',
				'description'     => esc_html__( 'Choose whether or not the URL should open in a new window.', 'et_builder' ),
				'default_on_front' => 'off',
			),
			'portrait_url' => array(
				'label'              => esc_html__( 'Portrait Image URL', 'et_builder' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'et_builder' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'et_builder' ),
				'update_text'        => esc_attr__( 'Set As Image', 'et_builder' ),
				'description'        => esc_html__( 'Upload your desired image, or type in the URL to the image you would like to display.', 'et_builder' ),
				'toggle_slug'        => 'image',
			),
			'quote_icon' => array(
				'label'           => esc_html__( 'Show Quote Icon', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
				),
				'default_on_front' => 'on',
				'description'     => esc_html__( 'Choose whether or not the quote icon should be visible.', 'et_builder' ),
				'toggle_slug'     => 'elements',
			),
			'content' => array(
				'label'           => esc_html__( 'Content', 'et_builder' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input the main text content for your module here.', 'et_builder' ),
				'toggle_slug'     => 'main_content',
			),
			'quote_icon_color' => array(
				'label'             => esc_html__( 'Quote Icon Color', 'et_builder' ),
				'type'              => 'color-alpha',
				'custom_color'      => true,
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'icon',
				'hover'             => 'tabs',
			),
			'quote_icon_background_color' => array(
				'label'            => esc_html__( 'Quote Icon Background Color', 'et_builder' ),
				'type'             => 'color-alpha',
				'custom_color'     => true,
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'icon',
				'default'          => '#f5f5f5',
				'default_on_front' => '',
				'hover'            => 'tabs',
			),
			'portrait_width' => array(
				'label'           => esc_html__( 'Portrait Width', 'et_builder' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'image',
				'default_unit'    => 'px',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '200',
					'step' => '1',
				),
			),
			'portrait_height' => array(
				'label'           => esc_html__( 'Portrait Height', 'et_builder' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'image',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '200',
					'step' => '1',
				),
			),
		);

		return $fields;
	}

	public function get_transition_fields_css_props() {
		$fields = parent::get_transition_fields_css_props();

		$fields['quote_icon_color'] = array( 'color' => '%%order_class%%.et_pb_testimonial:before' );
		$fields['quote_icon_background_color'] = array( 'background-color' => '%%order_class%%.et_pb_testimonial:before' );

		return $fields;
	}

	public function get_transition_image_fields_css_props() {
		$fields = parent::get_transition_image_fields_css_props();
		$fields = array_merge( $this->get_transition_borders_fields_css_props( 'portrait' ), $fields );

		return $fields;
	}

	function render( $attrs, $content = null, $render_slug ) {
		$author                            = $this->props['author'];
		$job_title                         = $this->props['job_title'];
		$portrait_url                      = $this->props['portrait_url'];
		$company_name                      = $this->props['company_name'];
		$url                               = $this->props['url'];
		$quote_icon                        = $this->props['quote_icon'];
		$url_new_window                    = $this->props['url_new_window'];
		$use_background_color              = $this->props['use_background_color'];
		$background_color                  = $this->props['background_color'];
		$background_color_hover            = $this->get_hover_value( 'background_color' );
		$background_layout                 = $this->props['background_layout'];
		$background_layout_hover           = et_pb_hover_options()->get_value( 'background_layout', $this->props, 'light' );
		$background_layout_hover_enabled   = et_pb_hover_options()->is_enabled( 'background_layout', $this->props );
		$quote_icon_color                  = $this->props['quote_icon_color'];
		$quote_icon_color_hover            = $this->get_hover_value('quote_icon_color');
		$quote_icon_background_color       = $this->props['quote_icon_background_color'];
		$quote_icon_background_color_hover = $this->get_hover_value('quote_icon_background_color');
		$portrait_width                    = $this->props['portrait_width'];
		$portrait_height                   = $this->props['portrait_height'];

		if ( '' !== $portrait_width ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .et_pb_testimonial_portrait',
				'declaration' => sprintf(
					'width: %1$s;',
					esc_html( et_builder_process_range_value( $portrait_width ) )
				),
			) );
		}

		if ( '' !== $portrait_height ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .et_pb_testimonial_portrait',
				'declaration' => sprintf(
					'height: %1$s;',
					esc_html( et_builder_process_range_value( $portrait_height ) )
				),
			) );
		}

		if ( '' !== $quote_icon_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%%.et_pb_testimonial:before',
				'declaration' => sprintf(
					'color: %1$s;',
					esc_html( $quote_icon_color )
				),
			) );
		}

		if ( et_builder_is_hover_enabled( 'quote_icon_color', $this->props ) ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%%.et_pb_testimonial:hover:before',
				'declaration' => sprintf(
					'color: %1$s;',
					esc_html( $quote_icon_color_hover )
				),
			) );
		}

		if ( '' !== $quote_icon_background_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%%.et_pb_testimonial:before',
				'declaration' => sprintf(
					'background-color: %1$s;',
					esc_html( $quote_icon_background_color )
				),
			) );
		}

		if ( et_builder_is_hover_enabled( 'quote_icon_background_color', $this->props ) ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%%.et_pb_testimonial:hover:before',
				'declaration' => sprintf(
					'background-color: %1$s;',
					esc_html( $quote_icon_background_color_hover )
				),
			) );
		}

		$portrait_image = '';

		$video_background = $this->video_background();
		$parallax_image_background = $this->get_parallax_image_background();

		if ( '' !== $portrait_url ) {
			$portrait_image = sprintf(
				'<div class="et_pb_testimonial_portrait" style="background-image: url(%1$s);">
				</div>',
				esc_attr( $portrait_url )
			);
		}

		if ( '' !== $url && ( '' !== $company_name || '' !== $author ) ) {
			$link_output = sprintf( '<a href="%1$s"%3$s>%2$s</a>',
				esc_url( $url ),
				( '' !== $company_name ? esc_html( $company_name ) : esc_html( $author ) ),
				( 'on' === $url_new_window ? ' target="_blank"' : '' )
			);

			if ( '' !== $company_name ) {
				$company_name = $link_output;
			} else {
				$author = $link_output;
			}
		}

		// Images: Add CSS Filters and Mix Blend Mode rules (if set)
		if ( array_key_exists( 'image', $this->advanced_fields ) && array_key_exists( 'css', $this->advanced_fields['image'] ) ) {
			$this->add_classname( $this->generate_css_filters(
				$render_slug,
				'child_',
				self::$data_utils->array_get( $this->advanced_fields['image']['css'], 'main', '%%order_class%%' )
			) );
		}

		// Module classnames
		$this->add_classname( array(
			'clearfix',
			"et_pb_bg_layout_{$background_layout}",
			$this->get_text_orientation_classname(),
		) );

		if ( 'off' === $quote_icon ) {
			$this->add_classname( 'et_pb_icon_off' );
		}

		if ( '' === $portrait_image ) {
			$this->add_classname( 'et_pb_testimonial_no_image' );
		}

		if ( 'off' === $use_background_color ) {
			$this->add_classname( 'et_pb_testimonial_no_bg' );
		}

		$data_background_layout       = '';
		$data_background_layout_hover = '';

		if ( $background_layout_hover_enabled ) {
			$data_background_layout = sprintf(
				' data-background-layout="%1$s"',
				esc_attr( $background_layout )
			);
			$data_background_layout_hover = sprintf(
				' data-background-layout-hover="%1$s"',
				esc_attr( $background_layout_hover )
			);
		}

		if ( 'on' === $use_background_color ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%%.et_pb_testimonial',
				'declaration' => sprintf(
					'background-color: %1$s;',
					esc_html( $background_color )
				),
			) );

			if ( et_builder_is_hover_enabled( 'background_color', $this->props ) ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => $this->add_hover_to_order_class( '%%order_class%%.et_pb_testimonial' ),
					'declaration' => sprintf(
						'background-color: %1$s;',
						esc_html( $background_color_hover )
					),
				) );
			}
		}

		$output = sprintf(
			'<div%3$s class="%4$s"%10$s%11$s>
				%9$s
				%8$s
				%7$s
				<div class="et_pb_testimonial_description">
					<div class="et_pb_testimonial_description_inner">
					%1$s
					<strong class="et_pb_testimonial_author">%2$s</strong>
					<p class="et_pb_testimonial_meta">%5$s%6$s</p>
					</div> <!-- .et_pb_testimonial_description_inner -->
				</div> <!-- .et_pb_testimonial_description -->
			</div> <!-- .et_pb_testimonial -->',
			$this->content,
			$author,
			$this->module_id(),
			$this->module_classname( $render_slug ),
			( '' !== $job_title ? esc_html( $job_title ) : '' ), // #5
			( '' !== $company_name
				? sprintf( '%2$s%1$s',
					$company_name,
					( '' !== $job_title ? ', ' : '' )
				)
				: ''
			),
			( '' !== $portrait_image ? $portrait_image : '' ),
			$video_background,
			$parallax_image_background,
			et_esc_previously( $data_background_layout ), // #10
			et_esc_previously( $data_background_layout_hover )
		);

		return $output;
	}
}

new ET_Builder_Module_Testimonial;
