<?php
	require_once("../config.php");
	$res= new PDO($mysql_server,$mysql_user,$mysql_pass);
	

	require("../../codebase/grid_connector.php");
	$grid = new GridConnector($res, "PDO");
	
	
	$config = new GridConfiguration();

	$config->setHeader("Item,#cspan");
	$config->attachHeader("Item Name,Item CD");
	$config->setColIds("col1,col2");
	$config->setInitWidths('120,*');
	$config->setColSorting("connector,connector");
	$config->setColColor(",#dddddd");
	$config->setColHidden("false,false");
	$config->setColTypes("ro,ed");
	$config->setColAlign('center,center');
	$config->setColVAlign('bottom,middle');

	$grid->set_config($config);

	$grid->dynamic_loading(100);
	$grid->render_table("grid50000","item_id","item_nm,item_cd");
?>