<?php
session_start();

require 'libs/Smarty.class.php';

$smarty = new Smarty;

if (($_SESSION['jsonstring'] == null)) {
    $smarty->assign("json","\"\"");
} else {
    $smarty->assign("json", stripslashes($_SESSION['jsonstring']));
}

$smarty->display('index_raph.tpl');

?>