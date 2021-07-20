<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'encoding.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'db/conn.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'db/jsonResponse.php');
	session_start();

	
	$sqlAttr = array();
	
	
	$sqlAttr['id']=$_POST['id'];
	$sqlAttr['f_note']=$_POST['note'];
	$sqlAttr['f_handletime'] = date("Y-m-d H:i:s");
	$sqlAttr['f_status'] = '处理';
	
	$place = "WHERE `t_consult`.`id` = ".$_POST['id'];
	$conn->update('t_consult', $sqlAttr, $place);
	
	$resp = array('state'=>'success');
	echo json_encode($resp, JSON_UNESCAPED_UNICODE);
	exit;
?>