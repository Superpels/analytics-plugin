<?php
/**
* Plugin Name:	Google Analytics
* Plugin URI: 	http://sauco-web.com/
* Description: 	Para activar Google Analytics. Simplemente deja el plugin activo y Google Analytics recibirá datos
* Version:	1.0
* Author: 	Antonio García-Saúco Iglesias
* Author URI: 	http://sauco-web.com/
*/

// ==============================================
//  Prevent Direct Access of this file
// ==============================================

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if this file is accessed directly

// ==============================================
//  The plugin
// ==============================================

add_action( 'wp_head', 'sauco_web_ga_script' );
function sauco_web_ga_script() {
	
	if ( !is_user_logged_in() ) { //Solo coge datos si el usuario NO está logueado
	?>
	<script type="text/javascript">
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	
	ga('create', 'UA-XXXXXXXX-X', 'auto'); //Cambiar UA-XXXXXXXX-X por tu código de Google
	ga('send', 'pageview');
	</script>
	<?php
	}
}
