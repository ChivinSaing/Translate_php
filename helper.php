<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function __($key)
{
    // $curLang=$_GET['lang'];
    $curLang = isset($_GET['lang']) ? $_GET['lang'] : 'default'; // 'default' as fallback if not set

 
    // if($_SESSION['currLang'] != $curLang){
    //     $langs=include('locates/'.$curLang.'.php');

    //     $_SESSION['currLang'] = $curLang;
    //     $_SESSION['lang']=$langs;
    // }

    if (!isset($_SESSION['currLang']) || $_SESSION['currLang'] != $curLang) {
        $langs = include('locates/'.$curLang.'.php');
    
        $_SESSION['currLang'] = $curLang;
        $_SESSION['lang'] = $langs;
    }
    
    
	if(!empty($_SESSION['lang'][$key]))
	{
		return $_SESSION['lang'][$key];
	}

	return $key;

    
}