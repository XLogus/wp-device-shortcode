<?php 
/*
Plugin Name: WP Devices Shotcode
Version: 1.0 Beta
Plugin URI: https://github.com/XLogus/wp-device-shortcode
Description: A WordPress plugin based on the PHP Mobile Detect class (Original author Victor Stanciu now maintained by Serban Ghita) add shortcodes and body class to show or hide content depending device (phone, tablet, desktop)
Author: Miguel Manchego
Author URI: http://miguelmanchego.com
License: GPL v3

WP Device Shortcode
Copyright (C) 2015, Miguel Manchego - http://miguelmanchego.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/



/******** Include mobile detect class ********************/
require_once('mobile_detect.php');
$cur_device = new Mobile_Detect();

function wpds_show( $atts, $content="" ) {	
	$att = shortcode_atts( array(
        'on' => 'desktop'        
    ), $atts );	
	$devices_str = strtolower(str_replace(' ', '', $att['on']));
	$devices = explode(",", $devices_str);
	$mostrar = false;
	$mostrar = wpds_show_device($devices);
	
	// Show if current device is in the list
	if($mostrar==true) { 
		return do_shortcode($content);
	}
}
add_shortcode( 'wpshow', 'wpds_show' );


function wpds_showon($devices) {
	global $cur_device;
	$mostrar = false;
	$mostrar = wpds_show_device($devices);
	if($mostrar==true) { 
		return do_shortcode($content);
	}
}


function wpds_show_device($devices) {
	global $cur_device;
	$mostrar = false;
	// If device is tablet or phone
	if (in_array("mobile", $devices)) {
		if($cur_device->isMobile()) {
				$mostrar = true;
		}		
	}
	
	// If device is phone
	if (in_array("phone", $devices)) {
		if($cur_device->isMobile() && ! $cur_device->isTablet()) {
			$mostrar = true;
		}		
	}
	
	// If device is tablet
	if (in_array("tablet", $devices)) {
		if($cur_device->isTablet()) {
			$mostrar = true;
		}		
	}
	
	// If device is dektop
	if (in_array("desktop", $devices)) {
		if(!$cur_device->isTablet() && !$cur_device->isMobile()) {
			$mostrar = true;
		}		
	}
	// If device is iOs
	if (in_array("ios", $devices)) {
		if($cur_device->isiOS()) {
			$mostrar = true;
		}		
	}
	// If device is iOs
	if (in_array("iphone", $devices)) {
		if($cur_device->isiPhone()) {
			$mostrar = true;
		}		
	}
	// If device is iOs
	if (in_array("ipad", $devices)) {
		if($cur_device->isiPad()) {
			$mostrar = true;
		}		
	}
	// If device is Android
	if (in_array("android", $devices)) {
		if($cur_device->isAndroidOS()) {
			$mostrar = true;
		}		
	}
	// If device is Android
	if (in_array("windows", $devices)) {
		if($cur_device->isWindowsMobileOS()) {
			$mostrar = true;
		}		
	}
	// If browser is Chrome
	if (in_array("chrome", $devices)) {
		if($cur_device->isChrome()) {
			$mostrar = true;
		}		
	}
	// If browser is Opera
	if (in_array("opera", $devices)) {
		if($cur_device->isOpera()) {
			$mostrar = true;
		}		
	}
	// If browser is IE
	if (in_array("ie", $devices)) {
		if($cur_device->isIE()) {
			$mostrar = true;
		}		
	}
	// If browser is Firefox
	if (in_array("firefox", $devices)) {
		if($cur_device->isFirefox()) {
			$mostrar = true;
		}		
	}
	// If browser is Safari
	if (in_array("safari", $devices)) {
		if($cur_device->isSafari()) {
			$mostrar = true;
		}		
	}
	return $mostrar;
}


add_filter('body_class','browser_body_class');
function browser_body_class($classes = '') {
	global $cur_device;
	if($cur_device->isMobile() && ! $cur_device->isTablet()) {
		$classes[] = 'phone';
	}	
	if($cur_device->isTablet()) {
		$classes[] = 'tablet';
	}	
	if(!$cur_device->isTablet() && !$cur_device->isMobile()) {
		$classes[] = 'desktop';
	}	
	// If browser is Chrome	
	if($cur_device->isChrome()) {
		$classes[] = 'browser-chrome';
	}			
	// If browser is Opera	
	if($cur_device->isOpera()) {
		$classes[] = 'browser-opera';
	}
	// If browser is IE	
	if($cur_device->isIE()) {
		$classes[] = 'browser-ie';		
	}
	// If browser is Firefox	
	if($cur_device->isFirefox()) {
		$classes[] = 'browser-firefox';
	}			
	// If browser is Safari	
	if($cur_device->isSafari()) {
		$classes[] = 'browser-safari';		
	}
	// If device is iOs	
	if($cur_device->isiOS()) {
		$classes[] = 'device-ios';		
	}	
	// If device is Android	
	if($cur_device->isAndroidOS()) {
		$classes[] = 'device-android';				
	}
	return $classes;
}