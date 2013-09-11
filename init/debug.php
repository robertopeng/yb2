<?php
/**
 * 写文件函数
 * @param string $filename 文件名
 * @param string $text 要写入的文本字符串
 * @param string $openmod 文本写入模式（'w':覆盖重写，'a':文本追加）
 * @return boolean
 */
if (!function_exists('write_file')) {
	function write_file($filename, $text, $openmod = 'w') {
		if (@$fp = fopen($filename, $openmod)) {
			flock($fp, 2);
			fwrite($fp, $text);
			fclose($fp);
			return true;
		} else {
			return false;
		}
	}
}

/**
 * 写对象（包括 数字、字符串、数组）
 * @param string $text 要写入的文本字符串
 * @param string $type 文本写入类型（'w':覆盖重写，'a':文本追加）
 */
function write($text, $type = 'a') {

	if (is_dir('c:/php/xampp/htdocs')) {
		$filename = 'c:/php/xampp/htdocs/write.txt';
	} else {
		$filename = SITE_PATH . '/write.txt';
	}

	$text = "\r\n++++++++++++++++++++++++++++++++++++++++++\r\n"
			. date('Y-m-d H:i:s') . "\r\n"
			. print_r($text, true);
	write_file($filename, $text, $type);
}

/**
 * 页面输出调试
 */
function wjb($obj, $die = 1) {
	print_r($obj);
	$die && die();
}