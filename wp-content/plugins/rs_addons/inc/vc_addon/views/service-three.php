<?php if(!empty($use_link))
	{
		$readmore = '<a class="readon" '. $attributes.'>Read More</a>';
	}
	else{
		$readmore = '';
	}
$icon_css = $title_css = $title_spacing = $icon_spancing = $padding_icon = '';
if ( $icon_color != '' ) {    
        $icon_css  .= "color: {$icon_color};";  
}

if ( $size != '' ) {
    $size       = (int) $size;
    $icon_css  .= "font-size: {$size}px;";
    
}
if ( $wrapper_size != '' ) {
    $icon_spancing .= "width: {$wrapper_size}px;";
    $icon_spancing .= "height: {$wrapper_size}px;";
    $icon_spancing .= "line-height: {$wrapper_size}px;";
    
}



if ( $service_icon_bg != '' ) { 
    $icon_spancing  .= "background-color: {$service_icon_bg};";  
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
		$icon_spancing .= "border-radius: {$icon_radiussize}px;";
	}	
}
elseif($icon_style_2 == 'circle'){	
	if( $icon_radiussize != '' ){		
		$icon_spancing .= "border-radius: {$icon_radiussize}%;";
	}
}

?>
<div class="rs-services-style3  services-<?php echo $align; ?> <?php echo $css_class; ?> <?php echo $css_class_custom; ?>" <?php echo $border_color; ?> >
	<?php if ($imgSrc) { ?>
		<div class="bg-img" style="background-image: url(<?php echo $imgSrc; ?>);"><?php echo $readmore; ?></div>
	<?php } ?>

	<div class="services-item">
		<div class="services-icon">
			<span style="<?php echo $icon_spancing; ?>"><i class="vc_icon_element-icon <?php echo $services_icon; ?>" style="<?php echo $icon_css; ?>"></i></span>
		</div>
		<div class="services-desc" <?php echo $desc_bg; ?>>
			<h4 class="services-title" style="<?php echo $title_spacing; ?>"><a <?php echo $attributes; ?> style="<?php echo $title_css; ?>" > <?php echo $title; ?> </a></h4>
			<p <?php echo $desc_color; ?>><?php echo $atts['content']; ?></p>
		</div>
	</div>	
</div>