<?php

/**
 * Mailchim Widget.
 *
 * @since 1.0.0
 */

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Sina_MC_Subscribe_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return 'sina_mc_subscribe';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Sina Subscribe Form', 'sina-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 */
	public function get_icon() {
		return 'fa fa-wpforms';
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
		return [ 'sina form', 'sina subscribe form', 'sina mailchimp' ];
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
	        'mailchimp',
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
		// Start Email Content
		// =====================
		$this->start_controls_section(
			'email_content',
			[
				'label' => __( 'Email Field', 'sina-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Mailchimp URL', 'sina-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Mailchimp URL', 'sina-ext' ),
			]
		);
		$this->add_control(
			'placeholder',
			[
				'label' => __( 'Placeholder Text', 'sina-ext' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Placeholder Text', 'sina-ext' ),
				'default' => __( 'Enter Your Email', 'sina-ext' ),
			]
		);
		$this->add_control(
			'display',
			[
				'label' => __( 'Display', 'sina-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'inline-block' => __( 'Inline', 'sina-ext' ),
					'block' => __( 'Block', 'sina-ext' ),
				],
				'default' => 'inline-block',
			]
		);

		$this->end_controls_section();
		// End Email Content
		// =====================


		// Start Button Content
		// =====================
		$this->start_controls_section(
			'btn_content',
			[
				'label' => __( 'Submit Button', 'sina-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'label',
			[
				'label' => __( 'Button Label', 'sina-ext' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Label', 'sina-ext' ),
				'default' => 'Subscribe',
			]
		);
		$this->add_control(
			'icon',
			[
				'label' => __( 'Button Icon', 'sina-ext' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-paper-plane-o',
			]
		);
		$this->add_control(
			'icon_position',
			[
				'label' => __( 'Icon Position', 'sina-ext' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'left' => __( 'Left', 'sina-ext' ),
					'right' => __( 'Right', 'sina-ext' ),
				],
				'condition' => [
					'icon!' => '',
				],
				'default' => 'right',
			]
		);
		$this->add_responsive_control(
			'icon_space',
			[
				'label' => __( 'Icon Space', 'sina-ext' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'condition' => [
					'icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .sina-btn-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .sina-btn-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Button Content
		// =====================


		// Start Field Style
		// =====================
		$this->start_controls_section(
			'field_style',
			[
				'label' => __( 'Email Field', 'sina-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'field_tabs' );

		$this->start_controls_tab(
			'field_normal',
			[
				'label' => __( 'Normal', 'sina-ext' ),
			]
		);

		$this->add_control(
			'background',
			[
				'label' => __( 'Background', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .sina-subs-input .sina-input-field' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'color',
			[
				'label' => __( 'Color', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#111',
				'selectors' => [
					'{{WRAPPER}} .sina-subs-input .sina-input-field' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .sina-subs-input .sina-input-field',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'field_focus',
			[
				'label' => __( 'Focus', 'sina-ext' ),
			]
		);

		$this->add_control(
			'focus_background',
			[
				'label' => __( 'Background', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .sina-subs-input .sina-input-field:focus' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'focus_color',
			[
				'label' => __( 'Color', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .sina-subs-input .sina-input-field:focus' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'focus_border',
			[
				'label' => __( 'Border Color', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .sina-subs-input .sina-input-field:focus' => 'border-color: {{VALUE}}'
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'email_width',
			[
				'label' => __( 'Width', 'sina-ext' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => 10,
						'max' => 30,
						'step' => 1,
					],
					'%' => [
						'min' => 5,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .sina-subs-input .sina-input-field' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'email_margin',
			[
				'label' => __( 'Margin', 'sina-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'range' => [
					'px' => [
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'max' => 20,
						'step' => 1,
					],
					'%' => [
						'max' => 50,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .sina-subs-input .sina-input-field' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Field Style
		// =====================


		// Start Button Style
		// =====================
		$this->start_controls_section(
			'btn_style',
			[
				'label' => __( 'Submit Button', 'sina-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} .sina-subs-btn',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'btn_text_shadow',
				'selector' => '{{WRAPPER}} .sina-subs-btn',
			]
		);

		$this->start_controls_tabs( 'btn_tabs' );

		$this->start_controls_tab(
			'btn_normal',
			[
				'label' => __( 'Normal', 'sina-ext' ),
			]
		);

		$this->add_control(
			'btn_background',
			[
				'label' => __( 'Background', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#1085e4',
				'selectors' => [
					'{{WRAPPER}} .sina-subs-btn' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_color',
			[
				'label' => __( 'Color', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#eee',
				'selectors' => [
					'{{WRAPPER}} .sina-subs-btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'btn_border',
				'selector' => '{{WRAPPER}} .sina-subs-btn',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'btn_shadow',
				'selector' => '{{WRAPPER}} .sina-subs-btn',
				'separator' => 'before',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'btn_hover',
			[
				'label' => __( 'Hober', 'sina-ext' ),
			]
		);

		$this->add_control(
			'hover_background',
			[
				'label' => __( 'Background', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .sina-subs-btn:hover' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'hover_color',
			[
				'label' => __( 'Color', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .sina-subs-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'hover_border',
			[
				'label' => __( 'Border Color', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .sina-subs-btn:hover' => 'border-color: {{VALUE}}'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'btn_hover_shadow',
				'selector' => '{{WRAPPER}} .sina-subs-btn:hover',
				'separator' => 'before',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'btn_radius',
			[
				'label' => __( 'Radius', 'sina-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .sina-subs-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'btn_padding',
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
					'{{WRAPPER}} .sina-subs-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'btn_margin',
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
					'{{WRAPPER}} .sina-subs-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Button Style
		// =====================
	}


	protected function render() {
		$data = $this->get_settings_for_display();

		$this->add_render_attribute( 'label' );
		$this->add_inline_editing_attributes( 'label' );

		$display_class = ('block' == $data['display']) ? 'sina-input-block' : ''; 
		?>
		<div class="sina-form">
			<form class="sina-subs-form"
			data-link="<?php echo esc_attr( $data['link'] ); ?>">
				<div class="sina-subs-input">
					<input class="sina-input-field <?php echo esc_attr( $display_class ); ?>" type="email" name="subscribe" placeholder="<?php echo esc_attr( $data['placeholder'] ); ?>" required>
					<button type="submit" class="sina-button sina-subs-btn">
						<?php if ( $data['icon'] && 'left' == $data['icon_position'] ): ?>
							<i class="<?php echo esc_attr( $data['icon'] ); ?> sina-btn-icon-left"></i>
						<?php endif ?>
						<span <?php echo $this->get_render_attribute_string( 'label' ); ?>>
							<?php echo esc_html( $data['label'] ); ?>
						</span>
						<?php if ( $data['icon'] && 'right' == $data['icon_position'] ): ?>
							<i class="<?php echo esc_attr( $data['icon'] ); ?> sina-btn-icon-right"></i>
						<?php endif ?>
					</button>
				</div>
				<h5 class="sina-subs-success"></h5>
				<h5 class="sina-subs-error"></h5>
				<p class="sina-subs-process"><?php _e( 'Processing...', 'sina-ext' ); ?></p>
			</form><!-- .sina-subs-form -->
		</div><!-- .sina-form -->
		<?php
	}


	protected function _content_template() {
		?>
		<#
			var displayClass = ('block' == settings.display) ? 'sina-input-block' : '';

			view.addRenderAttribute( 'label' );
			view.addInlineEditingAttributes( 'label' );
			#>
			<div class="sina-form">
				<form class="sina-subs-form"
				data-link="{{{settings.link}}}">
					<div class="sina-subs-input">
						<input class="sina-input-field {{{displayClass}}}" type="email" name="subscribe" placeholder="{{{settings.placeholder}}}" required>
						<button type="submit" class="sina-button sina-subs-btn">
							<# if ( settings.icon && 'left' == settings.icon_position ) { #>
								<i class="{{{settings.icon}}} sina-btn-icon-left"></i>
							<# } #>

							<span {{{ view.getRenderAttributeString( 'label' ) }}}>{{{settings.label}}}</span>

							<# if ( settings.icon && 'right' == settings.icon_position ) { #>
								<i class="{{{settings.icon}}} sina-btn-icon-right"></i>
							<# } #>
						</button>
					</div>
					<h5 class="sina-subs-success"></h5>
					<h5 class="sina-subs-error"></h5>
					<p class="sina-subs-process"><?php _e( 'Processing...', 'sina-ext' ); ?></p>
				</form>
			</div>
		<?php
	}
}