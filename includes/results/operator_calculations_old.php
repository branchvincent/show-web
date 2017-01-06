<?php
/****************************************************************************
*																			*
*	File:		operator_calculations.php  									*
*																			*
*	Author:		Branch Vincent												*
*																			*
*	Date:		Sep 9, 2016													*
*																			*
*	Purpose:	This file calculates the workload counts for the specified 	*
*				operator.			    									*
*																			*
****************************************************************************/

//	Initialize session

    require_once('includes/session_management/init.php');

	$low_count_0 = $_SESSION['low_count_0'];
	$normal_count_0 = $_SESSION['normal_count_0'];
	$high_count_0 = $_SESSION['high_count_0'];

	if (!in_array('conductor', $_SESSION['parameters']['assistants'])) {
		$operator2Style = 'display:none; ';
		$low_count_1 = 0;
		$normal_count_1 = 0;
		$high_count_1 = 0;
	} else {
		$operator2Style = ' ';
		$low_count_1 = $_SESSION['low_count_1'];
		$normal_count_1 = $_SESSION['normal_count_1'];
		$high_count_1 = $_SESSION['high_count_1'];;
	}
?>

<style>
	#low_work_0 {
		color:
		<?php
			if(($low_count_0+$high_count_0)>$normal_count_0) {
				if($low_count_0>$high_count_0) {
					echo "red";
				} else {
					echo "black";
				}
			} else {
				echo "black";
			}
		?>;
	}
	#normal_work_0{
		color:
		<?php
			if(($low_count_0+$high_count_0)<$normal_count_0) {
				echo "green";
			} else {
				echo "black";
			}
		?>;
	}
	#high_work_0 {
		color:
		<?php
			if(($low_count_0+$high_count_0)>$normal_count_0) {
				if($high_count_0>$low_count_0) {
					echo "red";
				} else {
					echo "black";
				}
			} else {
				echo "black";
			}
		?>;
	}

	#low_work_1 {
		color:
		<?php
			if(($low_count_1+$high_count_1)>$normal_count_1) {
				if($low_count_1>$high_count_1) {
					echo "red";
				} else {
					echo "black";
				}
			} else {
				echo "black";
			}
		?>;
	}

	#normal_work_1 {
		color:
		<?php
			if(($low_count_1+$high_count_1)<$normal_count_1){
				echo "green";
			} else {
				echo "black";
			}
		?>;
	}

	#high_work_1 {
		color:
		<?php
			if(($low_count_1+$high_count_1)>$normal_count_1) {
				if($high_count_1>$low_count_1) {
					echo "red";
				} else {
					echo "black";
				}
			} else {
				echo "black";
			}
		?>;
	}
</style>