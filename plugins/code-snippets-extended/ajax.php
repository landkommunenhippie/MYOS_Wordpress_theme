<?php
//
/**
 * 
 * Ajax обработчики модуля
 * 
 */

# Защита от мудаков
if (!defined( 'ABSPATH' )){
	header('HTTP/1.0 403 Forbidden');
	exit(__('Access Denied.', 'acs'));
}

class AftCCAjax{
	# Конструктор
	function __construct() {
		add_action( 'wp_ajax_aftcb_show_form', array($this, 'aftcb_show_form') );
		add_action( 'wp_ajax_test_code', array($this, 'test_code') );

	}

	function aftcb_show_form(){
		if(!is_admin()) die();
		
		// Всплывающую форму формируем тут.
		global $wpdb;
		$table_name = $wpdb->base_prefix.'aft_cc';
		
		$arr = $wpdb->get_results("SELECT * FROM ".$table_name." WHERE mode='on';", ARRAY_A);
		if(count($arr) == 0){ echo "<div class='white_popup'>" . __('Snippets not creted Yet.','acs') . "<p></div>"; die();
		}
		// Тут формирует html нашего iframe
		$res  = "<div class='white_popup'>";
		$res .= "<table class='widefat' cellspacing='0' border='0'>";
		$res .= "<tbody><tr><th>Snippet</th><th>Name</th><th>Insert snippet</th></tr>";
		foreach($arr as $snippet){
			$res .= "<tr>";
			$res .= "<td class='st_id'>[rsnippet id=\"".$snippet['id']."\" name=\"".htmlspecialchars_decode($snippet['title'])."\"]</td>";
			$res .= "<td class='st_title'>".$snippet['title']."</td>";
			$res .= "<td class='st_actions'><a id='select_snippet' class='button-primary' href='#''>".__('Select','acs'). "</a></td>";
			$res .= "</tr>";
		}

		$res .= "</tbody></table>";
		$res .= "</div>";

		die($res);
	}

	function test_code(){
		check_ajax_referer( 'FasdaEEr1123SAB><asdW', 'nonce', true );
		$code =stripslashes(htmlspecialchars_decode($_POST['code']));
		
		ob_start(); // Ловим вывод eval'а в основной буфер вывода
				/**
				 * 
				 * Если вдруг вас интересует - как работают вложенные друг в друга ob_start, то вот тема на стековерфлов -  
				 * http://stackoverflow.com/questions/10441410/what-happened-when-i-use-multi-ob-start-without-ob-end-clean-or-ob-end-flush
				 * 
				 */
		eval("?> ".trim($code). " <?");
		$res = ob_get_contents();
		ob_clean();
		ob_end_flush();
		
		echo $res;
		die();
	}
}

new AftCCAjax();
// end of file //