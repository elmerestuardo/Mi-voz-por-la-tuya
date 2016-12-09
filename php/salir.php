<?php
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
session_start();
session_unset();
$r =1;

echo json_encode(array("resultado"=>$r));
}else{
header("Location: /");
}
?>
