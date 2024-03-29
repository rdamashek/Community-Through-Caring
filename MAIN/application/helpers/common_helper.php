<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('time_elapsed_string'))
{
	function time_elapsed_string($datetime, $full = false) {
		$now = new DateTime;
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);

		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;

		$string = array(
			'y' => 'year',
			'm' => 'month',
			'w' => 'week',
			'd' => 'day',
			'h' => 'hour',
			'i' => 'minute',
			's' => 'second',
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			} else {
				unset($string[$k]);
			}
		}

		if (!$full) $string = array_slice($string, 0, 1);
		return $string ? implode(', ', $string) . ' ago' : 'just now';
	}


}


if ( ! function_exists('get_setting_value'))
{
	function get_setting_value($val_name) {
		$CI = get_instance();

		return $CI->db->where('setting_name', $val_name)->get('general_settings')->result_array()[0]['value'];

	}


}

if ( ! function_exists('get_lang'))
{
	function get_lang($val_name) {
		$CI = get_instance();

		return $CI->db->where('lang_key', $val_name)->get('language')->result_array()[0]['lang_value'];

	}


}

if ( ! function_exists('get_email_template'))
{
	function get_email_template($template_name) {
		$CI = get_instance();

		return $CI->db->select('subject, body')->where('type', $template_name)->get('email_templates')->result_array()[0];

	}


}

if ( ! function_exists('clean'))
{
function clean($string) {
	$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
 
	return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
 }
}



if ( ! function_exists('doupload'))
{
	function doupload($file='file', $path='./assets/images/uploads/')
	{

ini_set('display_errors', 1);
		$config = array(
			'upload_path' => $path,
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => "20048000",
			'max_height' => "5768",
			'max_width' => "8024"
		);

		$config['encrypt_name'] = TRUE;
		$CI = get_instance();
		$CI->load->library('upload', $config);

		if(!$CI->upload->do_upload($file))
		{
			return    false;
		}
		else
		{
			$imageDetailArray = $CI->upload->data();


			$configer = array(
				'image_library' => 'gd2',
				'source_image' => './assets/images/uploads/' . $imageDetailArray['file_name'],
				'new_image' => './assets/images/uploads/thumb/',
				'maintain_ratio' => TRUE,
				'create_thumb' => FALSE,
				'thumb_marker' => '',
				'width' => 150,
				'height' => 150
			);
			$CI->load->library('image_lib');

			$CI->image_lib->initialize($configer);


			if (!$CI->image_lib->resize()) {
				echo $CI->image_lib->display_errors();
			}


			$CI->image_lib->clear();



			return $imageDetailArray['file_name'];
		}

	}


}
