<?php

/**
 * Pricing Widget.
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

class Sina_Pricing_Widget extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @since 1.0.0
	 */
	public function get_name() {
		return 'sina_pricing';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Sina Pricing', 'sina-ext' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 */
	public function get_icon() {
		return 'eicon-price-table';
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
		return [ 'sina price', 'sina plan' ];
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
	 * Register widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		// Start Box Content
		// =====================
		$this->start_controls_section(
			'pricing_box_content',
			[
				'label' => __( 'Pricing', 'sina-ext' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'sina-ext' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Title', 'sina-ext' ),
				'default' => __( 'Basic', 'sina-ext' ),
			]
		);
		$this->add_control(
			'price',
			[
				'label' => __( 'Price', 'sina-ext' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Price', 'sina-ext' ),
				'default' => __( '$20', 'sina-ext' ),
			]
		);
		$this->add_control(
			'price_suffix',
			[
				'label' => __( 'Price Suffix', 'sina-ext' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Suffix', 'sina-ext' ),
				'default' => __( 'm', 'sina-ext' ),
			]
		);
		$this->add_control(
			'btn_label',
			[
				'label' => __( 'Button Label', 'sina-ext' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter Label', 'sina-ext' ),
				'default' => __( 'Order', 'sina-ext' ),
			]
		);
		$this->add_control(
			'btn_link',
			[
				'label' => __( 'Button Link', 'sina-ext' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'sina-ext' ),
				'default' => [
					'url' => '#',
				],
			]
		);
		$this->add_control(
			'item',
			[
				'label' => __( 'Add Item', 'sina-ext' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'title',
						'label' => __( 'Content', 'sina-ext' ),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'placeholder' => __( 'Enter Content', 'sina-ext' ),
					],
				],
				'default' => [
					[
						'title' => __( '1GB', 'sina-ext' ),
					],
					[
						'title' => __( '15GB Bandwith', 'sina-ext' ),
					],
					[
						'title' => __( '5 Subdomain', 'sina-ext' ),
					],
					[
						'title' => __( 'SSD Server', 'sina-ext' ),
					],
					[
						'title' => __( '1 Web Hosting', 'sina-ext' ),
					],
					[
						'title' => __( 'Free SSL', 'sina-ext' ),
					],
					[
						'title' => __( '24/7 Support', 'sina-ext' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);


		$this->end_controls_section();
		// End Box Content
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


		$this->start_controls_tabs( 'box_tabs' );

		$this->start_controls_tab(
			'box_normal',
			[
				'label' => __( 'Normal', 'sina-ext' ),
			]
		);

		$this->add_control(
			'box_bg',
			[
				'label' => __( 'Background', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .sina-pricing' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'selector' => '{{WRAPPER}} .sina-pricing',
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .sina-pricing',
				'separator' => 'before',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'box_hover',
			[
				'label' => __( 'Hover', 'sina-ext' ),
			]
		);

		$this->add_control(
			'box_hover_bg',
			[
				'label' => __( 'Background', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .sina-pricing:hover' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'box_hover_border',
			[
				'label' => __( 'Border Color', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .sina-pricing:hover' => 'border-color: {{VALUE}}'
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_hover_shadow',
				'selector' => '{{WRAPPER}} .sina-pricing:hover',
				'separator' => 'before',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'box_radius',
			[
				'label' => __( 'Radius', 'sina-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .sina-pricing' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'box_padding',
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
					'{{WRAPPER}} .sina-pricing' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .sina-pricing' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Box Style
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

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#111',
				'selectors' => [
					'{{WRAPPER}} .sina-pricing .sina-pricing-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .sina-pricing .sina-pricing-title',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'selector' => '{{WRAPPER}} .sina-pricing .sina-pricing-title',
			]
		);
		$this->add_control(
			'title_bg',
			[
				'label' => __( 'Background', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .sina-pricing .sina-pricing-title' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'title_border',
				'selector' => '{{WRAPPER}} .sina-pricing .sina-pricing-title',
			]
		);
		$this->add_responsive_control(
			'title_radius',
			[
				'label' => __( 'Radius', 'sina-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .sina-pricing .sina-pricing-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label' => __( 'Padding', 'sina-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .sina-pricing .sina-pricing-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Title Style
		// =====================


		// Start Price Style
		// =====================
		$this->start_controls_section(
			'price_style',
			[
				'label' => __( 'Price', 'sina-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'price_color',
			[
				'label' => __( 'Color', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#eee',
				'selectors' => [
					'{{WRAPPER}} .sina-pricing .sina-price-tag' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'selector' => '{{WRAPPER}} .sina-pricing .sina-price-tag',
			]
		);
		$this->add_control(
			'suffix_size',
			[
				'label' => __( 'Suffix Size', 'sina-ext' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .sina-pricing .sina-price-tag .sina-price-suffix' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'price_shadow',
				'selector' => '{{WRAPPER}} .sina-pricing .sina-price-tag',
			]
		);
		$this->add_control(
			'price_bg',
			[
				'label' => __( 'Background', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#1085e4',
				'selectors' => [
					'{{WRAPPER}} .sina-pricing .sina-price-tag' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'price_border',
				'selector' => '{{WRAPPER}} .sina-pricing .sina-price-tag',
			]
		);
		$this->add_responsive_control(
			'price_radius',
			[
				'label' => __( 'Radius', 'sina-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .sina-pricing .sina-price-tag' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'price_padding',
			[
				'label' => __( 'Padding', 'sina-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .sina-pricing .sina-price-tag' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Price Style
		// =====================


		// Start Button Style
		// =====================
		$this->start_controls_section(
			'btn_style',
			[
				'label' => __( 'Button', 'sina-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
			'btn_color',
			[
				'label' => __( 'Color', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#eee',
				'selectors' => [
					'{{WRAPPER}} .sina-pricing-btn .sina-order-btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_bg',
			[
				'label' => __( 'Background', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#1085e4',
				'selectors' => [
					'{{WRAPPER}} .sina-pricing-btn .sina-order-btn' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'btn_border',
				'selector' => '{{WRAPPER}} .sina-pricing-btn .sina-order-btn',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'btn_hover',
			[
				'label' => __( 'Hover', 'sina-ext' ),
			]
		);

		$this->add_control(
			'btn_hover_color',
			[
				'label' => __( 'Color', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#1085e4',
				'selectors' => [
					'{{WRAPPER}} .sina-pricing-btn .sina-order-btn:hover, {{WRAPPER}} .sina-pricing-btn .sina-order-btn:focus' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_hover_bg',
			[
				'label' => __( 'Background', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .sina-pricing-btn .sina-order-btn:hover, {{WRAPPER}} .sina-pricing-btn .sina-order-btn:focus' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_hover_border',
			[
				'label' => __( 'Border Color', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .sina-pricing-btn .sina-order-btn:hover, {{WRAPPER}} .sina-pricing-btn .sina-order-btn:focus' => 'border-color: {{VALUE}}'
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'separator' => 'before',
				'selector' => '{{WRAPPER}} .sina-pricing-btn .sina-order-btn',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'btn_shadow',
				'selector' => '{{WRAPPER}} .sina-pricing-btn .sina-order-btn',
			]
		);
		$this->add_responsive_control(
			'btn_radius',
			[
				'label' => __( 'Radius', 'sina-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .sina-pricing-btn .sina-order-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'btn_padding',
			[
				'label' => __( 'Padding', 'sina-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .sina-pricing-btn .sina-order-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'btn_margin',
			[
				'label' => __( 'Margin', 'sina-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .sina-pricing-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Button Style
		// =====================


		// Start Content Style
		// =====================
		$this->start_controls_section(
			'content_style',
			[
				'label' => __( 'Content', 'sina-ext' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => __( 'Color', 'sina-ext' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#111',
				'selectors' => [
					'{{WRAPPER}} .sina-pricing-body li' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .sina-pricing-body li',
			]
		);
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'content_shadow',
				'selector' => '{{WRAPPER}} .sina-pricing-body li',
			]
		);
		$this->add_responsive_control(
			'content_padding',
			[
				'label' => __( 'Padding', 'sina-ext' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .sina-pricing-body li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Content Style
		// =====================
	}


	protected function render() {
		$data = $this->get_settings_for_display();

		$this->add_render_attribute( 'title', 'class', 'sina-pricing-title' );
		$this->add_inline_editing_attributes( 'title' );

		$this->add_render_attribute( 'btn_label', 'class', 'sina-order-btn' );
		$this->add_inline_editing_attributes( 'btn_label' );

		$this->add_render_attribute( 'price' );
		$this->add_inline_editing_attributes( 'price' );

		$this->add_render_attribute( 'price_suffix', 'class', 'sina-price-suffix' );
		$this->add_inline_editing_attributes( 'price_suffix' );
		?>
		<div class="sina-pricing">
			<h3 <?php echo $this->get_render_attribute_string( 'title' ); ?>>
				<?php echo esc_html( $data['title'] ); ?>
			</h3>
			<h4 class="sina-price-tag">
				<span <?php echo $this->get_render_attribute_string( 'price' ); ?>><?php echo esc_html( $data['price'] ); ?></span><span <?php echo $this->get_render_attribute_string( 'price_suffix' ); ?>><?php echo esc_html( $data['price_suffix'] ); ?></span>
			</h4>
			<ul class="sina-pricing-body">
				<?php
					foreach ($data['item'] as $index => $item) :
						$item_key = $this->get_repeater_setting_key( 'title', 'item', $index );

						$this->add_render_attribute( $item_key );
						$this->add_inline_editing_attributes( $item_key );
					?>
					<li <?php echo $this->get_render_attribute_string( $item_key ); ?>><?php echo esc_html( $item['title'] ) ?></li>
				<?php endforeach ?>
			</ul>
			<?php if ( $data['btn_label'] ) : ?>
				<div class="sina-pricing-btn">
					<a <?php echo $this->get_render_attribute_string( 'btn_label' ); ?>
					href="<?php echo esc_url( $data['btn_link']['url'] ); ?>"
					<?php if ( 'on' == $data['btn_link']['is_external'] ): ?>
						target="_blank" 
					<?php endif; ?>
					<?php if ( 'on' == $data['btn_link']['nofollow'] ): ?>
						rel="nofollow" 
					<?php endif; ?>>
						<?php echo esc_html( $data['btn_label'] ); ?>
					</a>
				</div>
			<?php endif; ?>
		</div><!-- .sina-pricing -->
		<?php
	}


	protected function _content_template() {
		?>
		<#
		view.addRenderAttribute( 'title', 'class', 'sina-pricing-title' );
		view.addInlineEditingAttributes( 'title' );

		view.addRenderAttribute( 'btn_label', 'class', 'sina-order-btn' );
		view.addInlineEditingAttributes( 'btn_label' );

		view.addRenderAttribute( 'price' );
		view.addInlineEditingAttributes( 'price' );

		view.addRenderAttribute( 'price_suffix', 'class', 'sina-price-suffix' );
		view.addInlineEditingAttributes( 'price_suffix' );
		#>
		<div class="sina-pricing">
			<h3 {{{ view.getRenderAttributeString( 'title' ) }}}>
				{{{settings.title}}}
			</h3>
			<h4 class="sina-price-tag">
				<span {{{ view.getRenderAttributeString( 'price' ) }}}>{{{settings.price}}}</span><span {{{ view.getRenderAttributeString( 'price_suffix' ) }}}>{{{settings.price_suffix}}}</span>
			</h4>
			<ul class="sina-pricing-body">
				<#
					_.each( settings.item, function( item, index ) {
						var titleKey = view.getRepeaterSettingKey( 'title', 'item', index );
						view.addRenderAttribute( titleKey );
						view.addInlineEditingAttributes( titleKey );
					#>
					<li {{{ view.getRenderAttributeString( titleKey ) }}}>{{{item.title}}}</li>
				<# }); #>
			</ul>
			<# if ( settings.btn_label) { #>
				<div class="sina-pricing-btn">
					<a {{{ view.getRenderAttributeString( 'btn_label' ) }}}
					href="{{{settings.btn_link.url}}}">
						{{{settings.btn_label}}}
					</a>
				</div>
			<# } #>
		</div>
		<?php
	}
}