<?php
	require_once('header.php');
	$curr_page='detailedAnalysisPage';
	$page_title='Detailed Analysis';
	require_once("side_navigation.php");
	require_once('graph_conductor.php');
	require_once('graph_calculations.php');
	graphText('sessions/Conductor_stats.csv');
	require_once('footer.php');
?>