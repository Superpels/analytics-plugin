<?php
/**
* Plugin Name:	Google Analytics por Saúco Web
* Plugin URI: 	http://sauco-web.com/
* Description: 	Para activar Google Analytics. Entra en el menú Ajustes -> Google Analytics e introduce tu código
* Version:	1.1
* Author: 	Antonio García-Saúco Iglesias
* Author URI: 	http://sauco-web.com/
*/

// ==============================================
//  Prevent Direct Access of this file
// ==============================================

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if this file is accessed directly

// ==============================================
//  Creando el menú de la página
// ==============================================

add_action('admin_menu', 'analytics_page');
function analytics_page() {
    
    $parent_slug	= 'options-general.php';
    $page_title 	= 'Google Analytics';
    $menu_title 	= 'Google Analytics';
    $capability 	= 'edit_posts';
    $menu_slug 		= 'sauco_analytics';
    $function		= 'analytics_page_display';
    
    add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function); 
}

// ==============================================
//  Construyendo la página en el backend
// ==============================================

function analytics_page_display() {
    if (isset($_POST['awesome_text'])) {
        update_option('awesome_text', $_POST['awesome_text']);
        $value = $_POST['awesome_text'];
    } 

    $value = get_option('awesome_text', 'UA-XXXXXXXX-X');
    if (is_admin()){
    	include 'form-file.php';
    }

// ==============================================
//  Insertando el código de Analytics en la web
// ==============================================
    
    if ( !is_user_logged_in() ) { //Solo coge datos si el usuario NO está logueado
	?>		
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	
	  ga('create', '<?php echo $value;?>', 'auto');
	  ga('send', 'pageview');
	
	</script>
	<?php
	}
}
add_action( 'wp_head', 'analytics_page_display' );
