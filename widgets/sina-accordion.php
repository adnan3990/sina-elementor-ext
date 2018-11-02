<?php

/**
 * Accordion Widget.
 *
 * @since 1.0.0
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Border;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Sina_Accordion_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return 'sina_accordion';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Sina Accordion', 'sina-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 */
	public function get_icon() {
		return 'eicon-accordion';
	}

	/**
	 * Get widget categories.
	 *
	 * @since 1.0.0
	 */
	public function get_categories() {
		return [ 'sina-extension' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 1.0.0
	 */
	public function get_keywords() {
		return [  'sina accordion', 'sina panel' ];
	}

	/**
	 * Get widget styles.
	 *
	 * Retrieve the list of styles the widget belongs to.
	 *
	 * @since 1.0.0
	 */
	public function get_style_depends() {
	    return [
	        'sina-widgets',
	    ];
	}

	/**
	 * Get widget scripts.
	 *
	 * Retrieve the list of scripts the widget belongs to.
	 *
	 * @since 1.0.0
	 */
	public function get_script_depends() {
	    return [
	        'sina-widgets',
	    ];
	}

	/**
	 * Register widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		// Start Accordion Content
		// =====================
		$this->start_controls_section(
			'accordion_content',
			[
				'label' => __( 'Accordion', 'sina-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'first_open',
			[
				'label' => __( 'First Item Open', 'sina-ext' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'sina-ext' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-angle-down',
			]
		);
		$this->add_control(
			'active_icon',
			[
				'label' => __( 'Active Icon', 'sina-ext' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-angle-up',
			]
		);
		$this->add_control(
			'accordion',
			[
				'label' => __('Add Item', 'sina-ext'),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'title',
						'label' => __('Title', 'sina-ext'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'placeholder' => __('Enter Title', 'sina-ext'),
						'default' => __('Web Development', 'sina-ext'),
						'dynamic' => [
							'active' => true,
						],
					],
					[
						'name' => 'desc',
						'label' => __('Description', 'sina-ext'),
						'label_block' => true,
						'type' => Controls_Manager::WYSIWYG,
						'default' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'sina-ext'),
						'dynamic' => [
							'active' => true,
						],
					],
				],
				'default' => [
					[
						'title' => __('Web Development', 'sina-ext'),
						'desc' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'sina-ext'),
					],
					[
						'title' => __('Graphics Design', 'sina-ext'),
						'desc' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'sina-ext'),
					],
					[
						'title' => __('Digital Marketing', 'sina-ext'),
						'desc' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'sina-ext'),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();
		// End Accordion Content
		// =====================


		// Start Box Style
		// =====================
		$this->start_controls_section(
			'box_style',
			[
				'label' => __( 'Box', 'sina-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'box_bg',
			[
				'label' => __( 'Background', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .sina-accordion-item' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'box_margin',
			[
				'label' => __( 'Margin', 'sina-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'max' => 100,
						'step' => 1,
					],
					'em' => [
						'max' => 20,
						'step' => 1,
					],
					'%' => [
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .sina-accordion-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Box Style
		// =====================


		// Start Header Style
		// =====================
		$this->start_controls_section(
			'header_style',
			[
				'label' => __( 'Header', 'sina-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label' => __( 'Icon Size', 'sina-ext' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .sina-accordion-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'header_tabs' );

		$this->start_controls_tab(
			'header_normal',
			[
				'label' => __( 'Normal', 'sina-ext' ),
			]
		);
		$this->add_control(
			'header_bg',
			[
				'label' => __('Background', 'sina-ext'),
				'type' => Controls_Manager::COLOR,
				'default'=> '#1085e4',
				'selectors' => [
					'{{WRAPPER}} .sina-accordion-header' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'selector' => '{{WRAPPER}} .sina-accordion-header',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Title Color', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#eee',
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .sina-accordion-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#eee',
				'selectors' => [
					'{{WRAPPER}} .sina-accordion-icon i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'header_hover',
			[
				'label' => __( 'Active', 'sina-ext' ),
			]
		);

		$this->add_control(
			'active_background',
			[
				'label' => __( 'Background', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .sina-accordion-item.open .sina-accordion-header' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'active_border',
			[
				'label' => __( 'Border Color', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .sina-accordion-item.open .sina-accordion-header' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_active_color',
			[
				'label' => __( 'Title Color', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .sina-accordion-item.open .sina-accordion-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'icon_active_color',
			[
				'label' => __( 'Icon Color', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .sina-accordion-item.open .sina-accordion-icon i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'header_padding',
			[
				'label' => __( 'Padding', 'sina-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'max' => 100,
						'step' => 1,
					],
					'em' => [
						'max' => 20,
						'step' => 1,
					],
					'%' => [
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .sina-accordion-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Header Style
		// =====================


		// Start Title Style
		// =====================
		$this->start_controls_section(
			'title_style',
			[
				'label' => __( 'Title', 'sina-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .sina-accordion-title',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'selector' => '{{WRAPPER}} .sina-accordion-title',
			]
		);

		$this->end_controls_section();
		// End Title Style
		// =====================


		// Start Desc Style
		// =====================
		$this->start_controls_section(
			'desc_style',
			[
				'label' => __( 'Description', 'sina-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'selector' => '{{WRAPPER}} .sina-accordion-desc',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_shadow',
				'selector' => '{{WRAPPER}} .sina-accordion-desc',
			]
		);
		$this->add_responsive_control(
			'alignment',
			[
				'label' => __( 'Alignment', 'sina-ext' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'sina-ext' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'sina-ext' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'sina-ext' ),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'justify', 'sina-ext' ),
						'icon' => 'fa fa-align-justify',
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'selectors' => [
					'{{WRAPPER}} .sina-accordion-desc' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'desc_border',
				'selector' => '{{WRAPPER}} .sina-accordion-body',
			]
		);
		$this->add_responsive_control(
			'desc_padding',
			[
				'label' => __( 'Padding', 'sina-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'max' => 100,
						'step' => 1,
					],
					'em' => [
						'max' => 20,
						'step' => 1,
					],
					'%' => [
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .sina-accordion-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Desc Style
		// =====================
	}


	protected function render() {
		$data = $this->get_settings_for_display();
		?>
		<div class="sina-accordion"
		data-open-first="<?php echo esc_attr( $data['first_open'] ); ?>">
			<?php
				foreach ($data['accordion'] as $index => $item) :
					$open_class = '';
					if ( 0 == $index && $data['first_open'] ) {
						$open_class = 'open';
					}

					$title_key = $this->get_repeater_setting_key( 'title', 'accordion', $index );
					$desc_key = $this->get_repeater_setting_key( 'desc', 'accordion', $index );

					$this->add_render_attribute( $title_key, 'class', 'sina-accordion-title' );
					$this->add_inline_editing_attributes( $title_key );

					$this->add_render_attribute( $desc_key, 'class', 'sina-accordion-desc' );
					$this->add_inline_editing_attributes( $desc_key );
				?>
				<div class="sina-accordion-item <?php echo esc_attr( $open_class ); ?>">
					<h4 class="sina-accordion-header">
						<span <?php echo $this->get_render_attribute_string( $title_key ); ?>>
							<?php echo esc_html( $item['title'] ); ?>
						</span>
						<div class="sina-accordion-icon">
							<i class="<?php echo esc_attr( $data['icon']); ?> off"></i>
							<i class="<?php echo esc_attr( $data['active_icon']); ?> on"></i>
						</div>
					</h4>
					<div class="sina-accordion-body">
						<div <?php echo $this->get_render_attribute_string( $desc_key ); ?>>
							<?php echo wp_kses_post( $item['desc'] ); ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div><!-- .sina-accordion -->
		<?php
	}


	protected function _content_template() {
		?>
		<# if ( settings.accordion.length > 0 ) { #>
		<div class="sina-accordion"
		data-open-first="{{{ settings.first_open }}}">
		<#
			_.each( settings.accordion, function( item, index ) {
				var openClass = '';
				if ( 0 == index && settings.first_open) {
					openClass = 'open';
				}

				var titleKey = view.getRepeaterSettingKey( 'title', 'accordion', index );
				var descKey = view.getRepeaterSettingKey( 'desc', 'accordion', index );

				view.addRenderAttribute( titleKey, 'class', 'sina-accordion-title' );
				view.addInlineEditingAttributes( titleKey );

				view.addRenderAttribute( descKey, 'class', 'sina-accordion-desc' );
				view.addInlineEditingAttributes( descKey );
			#>
			<div class="sina-accordion-item {{{openClass}}}">
				<h4 class="sina-accordion-header">
					<span {{{ view.getRenderAttributeString( titleKey ) }}}>
						{{{ item.title }}}
					</span>
					<div class="sina-accordion-icon">
						<i class="{{{ settings.icon }}} off"></i>
						<i class="{{{ settings.active_icon }}} on"></i>
					</div>
				</h4>
				<div class="sina-accordion-body">
					<div {{{ view.getRenderAttributeString( descKey ) }}}>
						{{{ item.desc }}}
					</div>
				</div>
			</div>
		<# }); #>
		</div>
		<# } #>
		<?php
	}
}