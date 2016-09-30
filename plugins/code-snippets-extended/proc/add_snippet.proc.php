<?php
//
/**
 * 
 * Обработчик добавления сниппета
 * 
 */

# Защита от мудаков
if (!defined( 'AFTCC__MAIN_FILE' )){
	header('HTTP/1.0 403 Forbidden');
	exit(__('Access Denied.', 'acs'));
}


class AddSnippetProc{

	public $title 	= ""; 		//Значения полей по умолчанию
	public $code 	= "";
	public $p_msg 	= "";
	public $is_edit = 0;		//1 - режим редактирования
	public $id 		= null;
	public $mode	= "on";

	function __construct(){
		// При созранении
		if(isset($_POST['submit'])){
			$this->add_snippet_proc();
		}

		// Режим редактирования
		if( (isset($_GET['action']) && $_GET['action'] == "edit") || isset($_REQUEST['snippet_id'])){
			global $wpdb;
			$this->id = intval($_REQUEST['snippet_id']);
			$table_name = $wpdb->base_prefix.'aft_cc';
			$query = $wpdb->prepare("SELECT * FROM {$table_name}
											WHERE `id` = '%d'", 
												array(
													$this->id,
												)
											);
			$data = $wpdb->get_results($query, ARRAY_A);
			if($data){
				$this->title = $data[0]['title'];
				$this->code = base64_decode($data[0]['code']);
				$this->mode = $data[0]['mode'];
			}else{
				$this->p_msg = __("Error, plugin can't edit this","acs" ); 
			}
		}

	}

	# Добавляем сниппет в базу
	function add_snippet_proc(){
		// save ode in database. I encode your snippets using base64_encode to protcet your database from wrong code
		$this->code = base64_encode(htmlspecialchars_decode(stripslashes($_POST['snippet_code'])));
		$this->title = htmlspecialchars(urldecode(trim($_POST['title'])));
		$this->mode = htmlspecialchars(trim($_POST['mode']));

		if(empty($this->title)){ 
			$this->p_msg = __('Error: Please set snippet name before save.', 'acs' );
			return;
		}

		if(empty($this->code)){ 
			$this->p_msg = __('Error: Snippet code not exist', 'acs' );
			return;
		}

		global $wpdb;
		$table_name = $wpdb->base_prefix . "aft_cc";

		$ret = false;
		
		$cnt = 0;
		$i = 0;
		if(!isset($_REQUEST['snippet_id'])) do{
			if($i != 0)
				$this->title = $this->title."_".$i;

			$query = $wpdb->prepare("SELECT COUNT(*) FROM {$table_name}
									WHERE `title` = '%s' AND `mode`='on'", 
									array(htmlspecialchars($this->title))
									);
			$i++;
			$cnt = $wpdb->get_var($query);
		}while($cnt !=0);

		

		if(!isset($_REQUEST['snippet_id'])){ // Сохранение нового сниппета

			$ret = $wpdb->insert( 
				$table_name, 
				array( 
					'id'			=> NULL, 
					'title'			=> $this->title,
					'mode'			=> $this->mode,
					'code'			=> $this->code
					)
				);
			$this->id = $wpdb->insert_id;
		}else{ // Редактирование уже существующего сниппета

			$this->id = intval($_REQUEST['snippet_id']);
			$ret = $wpdb->update( 
				$table_name, 
				array( 
					'title'			=> $this->title,
					'code'			=> $this->code,
					'mode'			=> $this->mode
					),
				array('id'=>$this->id)
				);
		}
		$this->code = base64_decode($this->code);
		if($ret != false || $this->id != null) $this->p_msg = __('Successful!','acs');
		else $this->p_msg = __('Unfortunately we cannot save this snippet. Some problems with database.','acs');

	}

}

$snipp = new AddSnippetProc();
// end of file //