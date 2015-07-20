WP Device Shortcode
===================
A WordPress plugin based on the PHP Mobile Detect class (Original author Victor Stanciu now maintained by Serban Ghita) add shortcodes and body class to show or hide content depending device (phone, tablet, desktop)

Installation
------------
* Download repository folder and upload to wp-content/plugins

How to use shortcode?
---------------------
* After installation you can use shortcode [wpshow on="phone"]
* [wpshow on="desktop"] Show content only for desktop
* [wpshow on="mobile"] Show content only for phones and tablets
* [wpshow on="phone"] Show content only for Android, iPhone or backberry
* [wpshow on="tablet"] Show content only for tablets
* [wpshow on="ios"] Show content only for iOs devices
* [wpshow on="iphone"] Show content only for iPhone
* [wpshow on="ipad"] Show content only for iPad
* [wpshow on="android"] Show content only for Android
* [wpshow on="windows"] Show content only for Windows Mobile
* [wpshow on="chrome"] Show content only for Chrome
* [wpshow on="opera"] Show content only for Opera
* [wpshow on="firefox"] Show content only for Firefox
* [wpshow on="ie] Show content only for Internet Explorer
* [wpshow on="safari] Show content only for Safari
* Also you can combine options for example [wpshow on="desktop,tablet"] or [wpshow on="chrome,safari"]

Is possible use as a function for themes development?
-----------------------------------------------------
The answer is YES, just active plugin and use the function wpds_showon() 
```
if(wpds_showon(array("desktop"))) {
   // This content will be visible only on desktop
} else {
   // This content will be visible only on phones and tablets
}
```
Also you can combine options
```
if(wpds_showon(array("desktop,tablet"))) {
   // This content will be visible only on desktop and tablets
} else {
   // This content will be visible only on phones
}
```

Body Classes
------------
Plugin also add automatically a class to body identify phone, tablet, browser-android, etc.

Author
------
Created by Miguel Manchego
www.miguelmanchego.com