<?php
$icon_css = $title_css = $title_spacing = $padding_icon = '';

if ( $icon_color != '' ) {    
        $icon_css  .= "color: {$icon_color};";  
}

if ( $size != '' ) {
    $size       = (int) $size;
    $icon_css  .= "width: {$size}px;";
    $icon_css  .= "height:{$size}px;";
    $icon_css  .= "line-height:{$size}px;";
}

if ( $icon_padding != '' ) {    
    $icon_padding = (int) $icon_padding;
    $padding_icon    .= "padding: {$icon_padding}px;";
}

if ( $service_icon_bg != '' ) { 
    $icon_css  .= "background-color: {$service_icon_bg};";  
}

if ( $title_color != '' ) {    
     $title_css  .= "color: {$title_color};";  
}

if ( $spacing_top != '' ) {  
    $title_spacing .= "padding-top: {$spacing_top}px;";  
}

if ( $spacing_bottom != '' ) {
    $title_spacing .= "margin-bottom: {$spacing_bottom}px;";
}

if ( $title_size != '' ) {
    $title_size   = (int) $title_size;
    $title_css   .= "font-size: {$title_size}px;";
}
if( $icon_style_2 == 'square' ){
	if( $icon_radiussize != '' ){
		$icon_css .= "border-radius: {$icon_radiussize}px;";
	}	
}
elseif($icon_style_2 == 'circle'){	
	if( $icon_radiussize != '' ){		
		$icon_css .= "border-radius: {$icon_radiussize}%;";
	}
}
?>

<div class="services-main rs-services1 services-<?php echo $align; ?>" data-icon-hover="<?php echo $icon_hover_color;?>" data-icon-hoverbg="<?php echo $icon_hover_bg;?>" data-icon-bg="<?php echo $service_icon_bg;?>" data-icon-color="<?php echo $icon_color_normal;?>">
	<div class="services-wrap <?php echo $css_class; ?> <?php echo $css_class_custom; ?>"> 
		<div class="services-item">
			<div class="services-icon">
				<span style="<?php echo esc_attr($padding_icon);?>"><i class="vc_icon_element-icon <?php echo $services_icon; ?>" style="<?php echo $icon_css;?>"
				></i></span>
			</div>

			<div class="services-desc" <?php echo $desc_bg; ?>>
				<h2 class="services-title"><a <?php echo $attributes; ?> style="<?php echo $title_css ; ?>" data-onhovercolor="<?php echo $title_hovercolor;?>" data-onleavecolor="<?php echo $title_color;?>"><?php echo $title; ?></a></h2>
				<p <?php echo $desc_color; ?> ><?php echo $atts['content']; ?></p>
			</div>

		</div>	
	</div>
</div>