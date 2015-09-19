<?php
$output = $title = $number = $animation_type = $animation_duration = $animation_delay = $el_class = '';
extract( shortcode_atts( array(
    'title' => __( 'Top Rated Products', 'woocommerce' ),
    'number' => 5,
    'animation_type' => '',
    'animation_duration' => '',
    'animation_delay' => '',
    'el_class' => ''
), $atts ) );

$el_class = porto_shortcode_extract_class( $el_class );

if ($animation_type)
    $el_class .= ' appear-animation';

$output = '<div class="vc_widget_woo_top_rated_products wpb_content_element' . $el_class . '"';
if ($animation_type)
    $output .= ' data-appear-animation="'.$animation_type.'"';
if ($animation_delay)
    $output .= ' data-appear-animation-delay="'.$animation_delay.'"';
if ($animation_duration && $animation_duration != 1000)
    $output .= ' data-appear-animation-duration="'.$animation_duration.'"';
$output .= '>';

$type = 'WC_Widget_Top_Rated_Products';
$args = array('widget_id' => 'woocommerce_top_rated_products_'.$number);

ob_start();
the_widget( $type, $atts, $args );
$output .= ob_get_clean();

$output .= '</div>' . porto_shortcode_end_block_comment( 'porto_widget_woo_top_rated_products' ) . "\n";

echo $output;