<?php

add_action('wp_enqueue_scripts', 'kurator_register_script');

add_action( 'wp_head',  'kurator_frontendHeader'  );

function kurator_frontendHeader() {

	$backcolor = (get_option('kurator-box-color-btn')) ? get_option('kurator-box-color-btn') : '#0086E1';
	$colorTxt = (get_option('kurator-box-color-txt')) ? get_option('kurator-box-color-txt'): '#ffffff';
	$fontSize = (get_option('kurator-box-font-size')) ? get_option('kurator-box-font-size') : '13';
	$borderRadius = (get_option('kurator-box-border-radius')) ? get_option('kurator-box-border-radius') : '5';
	$colorBtnHover = (get_option('kurator-box-color-btn-hover')) ? get_option('kurator-box-color-btn-hover') : '#006fb9';
	$colorTxtHover = (get_option('kurator-box-color-txt-hover')) ? get_option('kurator-box-color-txt-hover') : '#ffffff';
	$backcolorImportant = (get_option('kurator-box-color-btn-important')) ? '!important' : '';
	$colorTxtImportant = (get_option('kurator-box-color-txt-important')) ? '!important': '';
	$fontSizeImportant = (get_option('kurator-box-font-size-important')) ? '!important' : '';
	$borderRadiusImportant = (get_option('kurator-box-border-radius-important')) ? '!important' : '';
	$colorBtnHoverImportant = (get_option('kurator-box-color-btn-hover-important')) ? '!important' : '';
	$colorTxtHoverImportant = (get_option('kurator-box-color-txt-hover-important')) ? '!important' : '';

	$style = '<style>';
	$style .= 'a.kurator-link {';
	$style .= 'color:' . $colorTxt . ' ' . $colorTxtImportant . ';';
	$style .= 'background-color:' . $backcolor . ' ' . $backcolorImportant . ';';
	$style .= 'font-size:' . $fontSize . 'px ' . $fontSizeImportant . ';';
	$style .= 'border-radius:' . $borderRadius . 'px ' . $borderRadiusImportant . ';';
	$style .= 'padding: 10px 20px;
			    margin-left: 8px;
			    transition: box-shadow 0.2s cubic-bezier(0.4, 0, 0.2, 1);
			    transition-duration: 0.5s;
			    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
			    font-weight: 700;
			    position: relative;
			    text-align: center;
			    text-transform: uppercase;
			    text-decoration: none;';
	$style .= '}';
	$style .= 'a.kurator-link:hover {';
	$style .= 'color:' . $colorTxtHover . ' ' . $colorBtnHoverImportant . ';';
	$style .= 'background-color:' . $colorBtnHover . ' ' . $colorTxtHoverImportant . ';';
	$style .= '}';
	$style .='</style>';

	echo $style;
 }

function kurator_register_script(){

	if(get_option('kurator-box-analytic')) {
		wp_enqueue_script('jquery');
		wp_register_script('kurator_js', KURATOR_URL.'js/kurator.js');		
		wp_enqueue_script('kurator_js');	
	
	}
}