<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_parallax_first_color = get_theme_mod('vw_parallax_first_color');

	$vw_parallax_custom_css = '';

	if($vw_parallax_first_color != false){
		$vw_parallax_custom_css .='.more-btn a, .about-btn a, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .catgory-box:hover, #sidebar .custom-social-icons i, #footer .custom-social-icons i, #footer .tagcloud a:hover, .scrollup i, #footer-2, input[type="submit"], .content-bttn a, .pagination span, .pagination a, #sidebar .tagcloud a:hover, nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .error-btn a, #comments a.comment-reply-link, .toggle-nav i, #sidebar .widget_price_filter .ui-slider .ui-slider-range, #sidebar .widget_price_filter .ui-slider .ui-slider-handle, #sidebar .woocommerce-product-search button, #footer .widget_price_filter .ui-slider .ui-slider-range, #footer .widget_price_filter .ui-slider .ui-slider-handle, #footer .woocommerce-product-search button, #footer a.custom_read_more, #sidebar a.custom_read_more, .woocommerce nav.woocommerce-pagination ul li a, .nav-previous a, .nav-next a, .wp-block-button__link{';
			$vw_parallax_custom_css .='background-color: '.esc_attr($vw_parallax_first_color).';';
		$vw_parallax_custom_css .='}';
	}
	if($vw_parallax_first_color != false){
		$vw_parallax_custom_css .='#comments input[type="submit"].submit{';
			$vw_parallax_custom_css .='background-color: '.esc_attr($vw_parallax_first_color).'!important;';
		$vw_parallax_custom_css .='}';
	}
	if($vw_parallax_first_color != false){
		$vw_parallax_custom_css .='a, #slider .inner_carousel h1 a, #about h3, #footer .custom-social-icons i:hover, #footer li a:hover, .post-main-box:hover h2 a, .woocommerce-info::before, .woocommerce-message::before, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, .entry-content a, #sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, #footer a.custom_read_more:hover{';
			$vw_parallax_custom_css .='color: '.esc_attr($vw_parallax_first_color).';';
		$vw_parallax_custom_css .='}';
	}
	if($vw_parallax_first_color != false){
		$vw_parallax_custom_css .='#top-header, .post-info hr, .woocommerce-info, .woocommerce-message, .main-navigation ul ul{';
			$vw_parallax_custom_css .='border-top-color: '.esc_attr($vw_parallax_first_color).';';
		$vw_parallax_custom_css .='}';
	}
	if($vw_parallax_first_color != false){
		$vw_parallax_custom_css .='.home-page-header, .main-navigation ul ul, .header-fixed{';
			$vw_parallax_custom_css .='border-bottom-color: '.esc_attr($vw_parallax_first_color).';';
		$vw_parallax_custom_css .='}';
	}
	if($vw_parallax_first_color != false){
		$vw_parallax_custom_css .='#topbar{
		background: rgba(0, 0, 0, 0) linear-gradient(60deg, transparent 3%,'.esc_attr($vw_parallax_first_color).' 0%) scroll 0 0;
		}';
	}

	$vw_parallax_custom_css .='@media screen and (max-width:1000px) {';
		if($vw_parallax_first_color != false){
			$vw_parallax_custom_css .='.search-box i{
			background-color:'.esc_attr($vw_parallax_first_color).';
			}';
		}
	$vw_parallax_custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$vw_parallax_theme_lay = get_theme_mod( 'vw_parallax_width_option','Full Width');
    if($vw_parallax_theme_lay == 'Boxed'){
		$vw_parallax_custom_css .='body{';
			$vw_parallax_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_parallax_custom_css .='}';
		$vw_parallax_custom_css .='.page-template-custom-home-page .main-header{';
			$vw_parallax_custom_css .='width: 97%; top: 1em;';
		$vw_parallax_custom_css .='}';
	}else if($vw_parallax_theme_lay == 'Wide Width'){
		$vw_parallax_custom_css .='body{';
			$vw_parallax_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_parallax_custom_css .='}';
	}else if($vw_parallax_theme_lay == 'Full Width'){
		$vw_parallax_custom_css .='body{';
			$vw_parallax_custom_css .='max-width: 100%;';
		$vw_parallax_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_parallax_theme_lay = get_theme_mod( 'vw_parallax_slider_opacity_color','0.5');
	if($vw_parallax_theme_lay == '0'){
		$vw_parallax_custom_css .='#slider img{';
			$vw_parallax_custom_css .='opacity:0';
		$vw_parallax_custom_css .='}';
		}else if($vw_parallax_theme_lay == '0.1'){
		$vw_parallax_custom_css .='#slider img{';
			$vw_parallax_custom_css .='opacity:0.1';
		$vw_parallax_custom_css .='}';
		}else if($vw_parallax_theme_lay == '0.2'){
		$vw_parallax_custom_css .='#slider img{';
			$vw_parallax_custom_css .='opacity:0.2';
		$vw_parallax_custom_css .='}';
		}else if($vw_parallax_theme_lay == '0.3'){
		$vw_parallax_custom_css .='#slider img{';
			$vw_parallax_custom_css .='opacity:0.3';
		$vw_parallax_custom_css .='}';
		}else if($vw_parallax_theme_lay == '0.4'){
		$vw_parallax_custom_css .='#slider img{';
			$vw_parallax_custom_css .='opacity:0.4';
		$vw_parallax_custom_css .='}';
		}else if($vw_parallax_theme_lay == '0.5'){
		$vw_parallax_custom_css .='#slider img{';
			$vw_parallax_custom_css .='opacity:0.5';
		$vw_parallax_custom_css .='}';
		}else if($vw_parallax_theme_lay == '0.6'){
		$vw_parallax_custom_css .='#slider img{';
			$vw_parallax_custom_css .='opacity:0.6';
		$vw_parallax_custom_css .='}';
		}else if($vw_parallax_theme_lay == '0.7'){
		$vw_parallax_custom_css .='#slider img{';
			$vw_parallax_custom_css .='opacity:0.7';
		$vw_parallax_custom_css .='}';
		}else if($vw_parallax_theme_lay == '0.8'){
		$vw_parallax_custom_css .='#slider img{';
			$vw_parallax_custom_css .='opacity:0.8';
		$vw_parallax_custom_css .='}';
		}else if($vw_parallax_theme_lay == '0.9'){
		$vw_parallax_custom_css .='#slider img{';
			$vw_parallax_custom_css .='opacity:0.9';
		$vw_parallax_custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$vw_parallax_theme_lay = get_theme_mod( 'vw_parallax_slider_content_option','Center');
    if($vw_parallax_theme_lay == 'Left'){
		$vw_parallax_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_parallax_custom_css .='text-align:left; left:15%; right:45%;';
		$vw_parallax_custom_css .='}';
	}else if($vw_parallax_theme_lay == 'Center'){
		$vw_parallax_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_parallax_custom_css .='text-align:center; left:20%; right:20%;';
		$vw_parallax_custom_css .='}';
	}else if($vw_parallax_theme_lay == 'Right'){
		$vw_parallax_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_parallax_custom_css .='text-align:right; left:45%; right:15%;';
		$vw_parallax_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_parallax_slider_height = get_theme_mod('vw_parallax_slider_height');
	if($vw_parallax_slider_height != false){
		$vw_parallax_custom_css .='#slider img{';
			$vw_parallax_custom_css .='height: '.esc_attr($vw_parallax_slider_height).';';
		$vw_parallax_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_parallax_slider = get_theme_mod('vw_parallax_slider_hide_show');
	if($vw_parallax_slider == false){
		$vw_parallax_custom_css .='.page-template-custom-home-page .home-page-header{';
			$vw_parallax_custom_css .='padding: 2em 0; border-bottom: solid 5px #f7b403;';
		$vw_parallax_custom_css .='}';
		$vw_parallax_custom_css .='.page-template-custom-home-page .main-header{';
			$vw_parallax_custom_css .='position: static;';
		$vw_parallax_custom_css .='}';
		$vw_parallax_custom_css .='.page-template-custom-home-page #about{';
			$vw_parallax_custom_css .='padding: 1%;';
		$vw_parallax_custom_css .='}';
		$vw_parallax_custom_css .='#service-sec{';
			$vw_parallax_custom_css .='margin-top: 12em;';
		$vw_parallax_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_parallax_theme_lay = get_theme_mod( 'vw_parallax_blog_layout_option','Default');
    if($vw_parallax_theme_lay == 'Default'){
		$vw_parallax_custom_css .='.post-main-box{';
			$vw_parallax_custom_css .='';
		$vw_parallax_custom_css .='}';
	}else if($vw_parallax_theme_lay == 'Center'){
		$vw_parallax_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_parallax_custom_css .='text-align:center;';
		$vw_parallax_custom_css .='}';
		$vw_parallax_custom_css .='.post-info{';
			$vw_parallax_custom_css .='margin-top:10px;';
		$vw_parallax_custom_css .='}';
		$vw_parallax_custom_css .='.post-info hr{';
			$vw_parallax_custom_css .='margin:10px auto;';
		$vw_parallax_custom_css .='}';
	}else if($vw_parallax_theme_lay == 'Left'){
		$vw_parallax_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_parallax_custom_css .='text-align:Left;';
		$vw_parallax_custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$vw_parallax_resp_topbar = get_theme_mod( 'vw_parallax_resp_topbar_hide_show',false);
	if($vw_parallax_resp_topbar == true && get_theme_mod( 'vw_parallax_topbar_hide_show', false) == false){
    	$vw_parallax_custom_css .='#topbar{';
			$vw_parallax_custom_css .='display:none;';
		$vw_parallax_custom_css .='} ';
	}
    if($vw_parallax_resp_topbar == true){
    	$vw_parallax_custom_css .='@media screen and (max-width:575px) {';
		$vw_parallax_custom_css .='#topbar{';
			$vw_parallax_custom_css .='display:block;';
		$vw_parallax_custom_css .='} }';
	}else if($vw_parallax_resp_topbar == false){
		$vw_parallax_custom_css .='@media screen and (max-width:575px) {';
		$vw_parallax_custom_css .='#topbar{';
			$vw_parallax_custom_css .='display:none;';
		$vw_parallax_custom_css .='} }';
	}

	$vw_parallax_resp_stickyheader = get_theme_mod( 'vw_parallax_stickyheader_hide_show',false);
	if($vw_parallax_resp_stickyheader == true && get_theme_mod( 'vw_parallax_sticky_header',false) != true){
    	$vw_parallax_custom_css .='.header-fixed{';
			$vw_parallax_custom_css .='position:static;';
		$vw_parallax_custom_css .='} ';
	}
    if($vw_parallax_resp_stickyheader == true){
    	$vw_parallax_custom_css .='@media screen and (max-width:575px) {';
		$vw_parallax_custom_css .='.header-fixed{';
			$vw_parallax_custom_css .='position:fixed;';
		$vw_parallax_custom_css .='} }';
	}else if($vw_parallax_resp_stickyheader == false){
		$vw_parallax_custom_css .='@media screen and (max-width:575px){';
		$vw_parallax_custom_css .='.header-fixed{';
			$vw_parallax_custom_css .='position:static;';
		$vw_parallax_custom_css .='} }';
	}

	$vw_parallax_resp_slider = get_theme_mod( 'vw_parallax_resp_slider_hide_show',false);
	if($vw_parallax_resp_slider == true && get_theme_mod( 'vw_parallax_slider_hide_show', false) == false){
    	$vw_parallax_custom_css .='#slider{';
			$vw_parallax_custom_css .='display:none;';
		$vw_parallax_custom_css .='} ';
	}
    if($vw_parallax_resp_slider == true){
    	$vw_parallax_custom_css .='@media screen and (max-width:575px) {';
		$vw_parallax_custom_css .='#slider{';
			$vw_parallax_custom_css .='display:block;';
		$vw_parallax_custom_css .='} }';
	}else if($vw_parallax_resp_slider == false){
		$vw_parallax_custom_css .='@media screen and (max-width:575px) {';
		$vw_parallax_custom_css .='#slider{';
			$vw_parallax_custom_css .='display:none;';
		$vw_parallax_custom_css .='} }';
	}

	$vw_parallax_resp_metabox = get_theme_mod( 'vw_parallax_metabox_hide_show',true);
    if($vw_parallax_resp_metabox == true){
    	$vw_parallax_custom_css .='@media screen and (max-width:575px) {';
		$vw_parallax_custom_css .='.post-info{';
			$vw_parallax_custom_css .='display:block;';
		$vw_parallax_custom_css .='} }';
	}else if($vw_parallax_resp_metabox == false){
		$vw_parallax_custom_css .='@media screen and (max-width:575px) {';
		$vw_parallax_custom_css .='.post-info{';
			$vw_parallax_custom_css .='display:none;';
		$vw_parallax_custom_css .='} }';
	}

	$vw_parallax_resp_sidebar = get_theme_mod( 'vw_parallax_sidebar_hide_show',true);
    if($vw_parallax_resp_sidebar == true){
    	$vw_parallax_custom_css .='@media screen and (max-width:575px) {';
		$vw_parallax_custom_css .='#sidebar{';
			$vw_parallax_custom_css .='display:block;';
		$vw_parallax_custom_css .='} }';
	}else if($vw_parallax_resp_sidebar == false){
		$vw_parallax_custom_css .='@media screen and (max-width:575px) {';
		$vw_parallax_custom_css .='#sidebar{';
			$vw_parallax_custom_css .='display:none;';
		$vw_parallax_custom_css .='} }';
	}

	$vw_parallax_resp_scroll_top = get_theme_mod( 'vw_parallax_resp_scroll_top_hide_show',true);
	if($vw_parallax_resp_scroll_top == true && get_theme_mod( 'vw_parallax_hide_show_scroll',true) != true){
    	$vw_parallax_custom_css .='.scrollup i{';
			$vw_parallax_custom_css .='visibility:hidden !important;';
		$vw_parallax_custom_css .='} ';
	}
    if($vw_parallax_resp_scroll_top == true){
    	$vw_parallax_custom_css .='@media screen and (max-width:575px) {';
		$vw_parallax_custom_css .='.scrollup i{';
			$vw_parallax_custom_css .='visibility:visible !important;';
		$vw_parallax_custom_css .='} }';
	}else if($vw_parallax_resp_scroll_top == false){
		$vw_parallax_custom_css .='@media screen and (max-width:575px){';
		$vw_parallax_custom_css .='.scrollup i{';
			$vw_parallax_custom_css .='visibility:hidden !important;';
		$vw_parallax_custom_css .='} }';
	}

	/*------------- Top Bar Settings ------------------*/

	$vw_parallax_topbar_padding_top_bottom = get_theme_mod('vw_parallax_topbar_padding_top_bottom');
	if($vw_parallax_topbar_padding_top_bottom != false){
		$vw_parallax_custom_css .='#topbar{';
			$vw_parallax_custom_css .='padding-top: '.esc_attr($vw_parallax_topbar_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_parallax_topbar_padding_top_bottom).';';
		$vw_parallax_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_parallax_sticky_header_padding = get_theme_mod('vw_parallax_sticky_header_padding');
	if($vw_parallax_sticky_header_padding != false){
		$vw_parallax_custom_css .='.header-fixed{';
			$vw_parallax_custom_css .='padding: '.esc_attr($vw_parallax_sticky_header_padding).';';
		$vw_parallax_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/
	
	$vw_parallax_search_font_size = get_theme_mod('vw_parallax_search_font_size');
	if($vw_parallax_search_font_size != false){
		$vw_parallax_custom_css .='.search-box i{';
			$vw_parallax_custom_css .='font-size: '.esc_attr($vw_parallax_search_font_size).';';
		$vw_parallax_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_parallax_button_padding_top_bottom = get_theme_mod('vw_parallax_button_padding_top_bottom');
	$vw_parallax_button_padding_left_right = get_theme_mod('vw_parallax_button_padding_left_right');
	if($vw_parallax_button_padding_top_bottom != false || $vw_parallax_button_padding_left_right != false){
		$vw_parallax_custom_css .='.post-main-box .content-bttn a{';
			$vw_parallax_custom_css .='padding-top: '.esc_attr($vw_parallax_button_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_parallax_button_padding_top_bottom).';padding-left: '.esc_attr($vw_parallax_button_padding_left_right).';padding-right: '.esc_attr($vw_parallax_button_padding_left_right).';';
		$vw_parallax_custom_css .='}';
	}

	$vw_parallax_button_border_radius = get_theme_mod('vw_parallax_button_border_radius');
	if($vw_parallax_button_border_radius != false){
		$vw_parallax_custom_css .='.post-main-box .content-bttn a{';
			$vw_parallax_custom_css .='border-radius: '.esc_attr($vw_parallax_button_border_radius).'px;';
		$vw_parallax_custom_css .='}';
	}

	/*------------- Single Blog Page------------------*/

	$vw_parallax_single_blog_post_navigation_show_hide = get_theme_mod('vw_parallax_single_blog_post_navigation_show_hide',true);
	if($vw_parallax_single_blog_post_navigation_show_hide != true){
		$vw_parallax_custom_css .='.post-navigation{';
			$vw_parallax_custom_css .='display: none;';
		$vw_parallax_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_parallax_copyright_alingment = get_theme_mod('vw_parallax_copyright_alingment');
	if($vw_parallax_copyright_alingment != false){
		$vw_parallax_custom_css .='.copyright p{';
			$vw_parallax_custom_css .='text-align: '.esc_attr($vw_parallax_copyright_alingment).';';
		$vw_parallax_custom_css .='}';
	}

	$vw_parallax_copyright_padding_top_bottom = get_theme_mod('vw_parallax_copyright_padding_top_bottom');
	if($vw_parallax_copyright_padding_top_bottom != false){
		$vw_parallax_custom_css .='#footer-2{';
			$vw_parallax_custom_css .='padding-top: '.esc_attr($vw_parallax_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_parallax_copyright_padding_top_bottom).';';
		$vw_parallax_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_parallax_scroll_to_top_font_size = get_theme_mod('vw_parallax_scroll_to_top_font_size');
	if($vw_parallax_scroll_to_top_font_size != false){
		$vw_parallax_custom_css .='.scrollup i{';
			$vw_parallax_custom_css .='font-size: '.esc_attr($vw_parallax_scroll_to_top_font_size).';';
		$vw_parallax_custom_css .='}';
	}

	$vw_parallax_scroll_to_top_padding = get_theme_mod('vw_parallax_scroll_to_top_padding');
	$vw_parallax_scroll_to_top_padding = get_theme_mod('vw_parallax_scroll_to_top_padding');
	if($vw_parallax_scroll_to_top_padding != false){
		$vw_parallax_custom_css .='.scrollup i{';
			$vw_parallax_custom_css .='padding-top: '.esc_attr($vw_parallax_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_parallax_scroll_to_top_padding).';';
		$vw_parallax_custom_css .='}';
	}

	$vw_parallax_scroll_to_top_width = get_theme_mod('vw_parallax_scroll_to_top_width');
	if($vw_parallax_scroll_to_top_width != false){
		$vw_parallax_custom_css .='.scrollup i{';
			$vw_parallax_custom_css .='width: '.esc_attr($vw_parallax_scroll_to_top_width).';';
		$vw_parallax_custom_css .='}';
	}

	$vw_parallax_scroll_to_top_height = get_theme_mod('vw_parallax_scroll_to_top_height');
	if($vw_parallax_scroll_to_top_height != false){
		$vw_parallax_custom_css .='.scrollup i{';
			$vw_parallax_custom_css .='height: '.esc_attr($vw_parallax_scroll_to_top_height).';';
		$vw_parallax_custom_css .='}';
	}

	$vw_parallax_scroll_to_top_border_radius = get_theme_mod('vw_parallax_scroll_to_top_border_radius');
	if($vw_parallax_scroll_to_top_border_radius != false){
		$vw_parallax_custom_css .='.scrollup i{';
			$vw_parallax_custom_css .='border-radius: '.esc_attr($vw_parallax_scroll_to_top_border_radius).'px;';
		$vw_parallax_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_parallax_social_icon_font_size = get_theme_mod('vw_parallax_social_icon_font_size');
	if($vw_parallax_social_icon_font_size != false){
		$vw_parallax_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_parallax_custom_css .='font-size: '.esc_attr($vw_parallax_social_icon_font_size).';';
		$vw_parallax_custom_css .='}';
	}

	$vw_parallax_social_icon_padding = get_theme_mod('vw_parallax_social_icon_padding');
	if($vw_parallax_social_icon_padding != false){
		$vw_parallax_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_parallax_custom_css .='padding: '.esc_attr($vw_parallax_social_icon_padding).';';
		$vw_parallax_custom_css .='}';
	}

	$vw_parallax_social_icon_width = get_theme_mod('vw_parallax_social_icon_width');
	if($vw_parallax_social_icon_width != false){
		$vw_parallax_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_parallax_custom_css .='width: '.esc_attr($vw_parallax_social_icon_width).';';
		$vw_parallax_custom_css .='}';
	}

	$vw_parallax_social_icon_height = get_theme_mod('vw_parallax_social_icon_height');
	if($vw_parallax_social_icon_height != false){
		$vw_parallax_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_parallax_custom_css .='height: '.esc_attr($vw_parallax_social_icon_height).';';
		$vw_parallax_custom_css .='}';
	}

	$vw_parallax_social_icon_border_radius = get_theme_mod('vw_parallax_social_icon_border_radius');
	if($vw_parallax_social_icon_border_radius != false){
		$vw_parallax_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_parallax_custom_css .='border-radius: '.esc_attr($vw_parallax_social_icon_border_radius).'px;';
		$vw_parallax_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_parallax_products_padding_top_bottom = get_theme_mod('vw_parallax_products_padding_top_bottom');
	if($vw_parallax_products_padding_top_bottom != false){
		$vw_parallax_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_parallax_custom_css .='padding-top: '.esc_attr($vw_parallax_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_parallax_products_padding_top_bottom).'!important;';
		$vw_parallax_custom_css .='}';
	}

	$vw_parallax_products_padding_left_right = get_theme_mod('vw_parallax_products_padding_left_right');
	if($vw_parallax_products_padding_left_right != false){
		$vw_parallax_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_parallax_custom_css .='padding-left: '.esc_attr($vw_parallax_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_parallax_products_padding_left_right).'!important;';
		$vw_parallax_custom_css .='}';
	}

	$vw_parallax_products_box_shadow = get_theme_mod('vw_parallax_products_box_shadow');
	if($vw_parallax_products_box_shadow != false){
		$vw_parallax_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_parallax_custom_css .='box-shadow: '.esc_attr($vw_parallax_products_box_shadow).'px '.esc_attr($vw_parallax_products_box_shadow).'px '.esc_attr($vw_parallax_products_box_shadow).'px #ddd;';
		$vw_parallax_custom_css .='}';
	}

	$vw_parallax_products_border_radius = get_theme_mod('vw_parallax_products_border_radius');
	if($vw_parallax_products_border_radius != false){
		$vw_parallax_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_parallax_custom_css .='border-radius: '.esc_attr($vw_parallax_products_border_radius).'px;';
		$vw_parallax_custom_css .='}';
	}