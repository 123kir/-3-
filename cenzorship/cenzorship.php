<?php

/*
Plugin Name: Cenzorship
Description: Автоматическая_фильтрация_текста_сайта_от_нецензурных_высказываниях.
Version: 1.2
Author: 123_rjwq
*/

define('CENZORSHIP_DIR', plugin_dir_path(__FILE__));


function cenzorship_filter_the_content($the_content)
{
	static $badwords = array();

	if ( empty($badwords))
		{
			$badwords = explode (',', file_get_contents(CENZORSHIP_DIR . 'badwords.txt'));
		}
		for ( $i = 0, $c = count($badwords); $i < $c; $i++ )
			{
				$the_content = preg_replace('#'.$badwords[$i].'#iu', '***', $the_content);
			}
			return $the_content;
}
add_filter('the_content','cenzorship_filter_the_content');
