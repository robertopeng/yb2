<?php
	$return_data = NULL;
	if (isset($_POST['orginData']) && !empty($_POST['orginData']))
	{
		$file1 = print_r($_POST,TRUE);
		$fileno = file_put_contents("./test.txt",$file1);
		$return_data = 'test1';
	}else
	{
		$return_data = 'test2';
	}
	echo $return_data;

?>