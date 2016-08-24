<?php
	session_start();
	// print_r($_SESSION['taskSerPms']);

//	Loop through each task type

	// echo $_SESSION['numTasks'];

	for ($i = 0; $i < $_SESSION['numTasks']; $i++)
	{
		// echo "starting ".$i." ...";
	// 	Store task names

		$_SESSION['taskNames'][$i]=$_POST["t".$i."_name"];
		// echo $_SESSION['taskNames'][$i];

	// 	Store priorities

		$_SESSION['taskPrty'][]=array(
			(int)$_POST["t".$i."_priority_p1"],
			(int)$_POST["t".$i."_priority_p2"],
			(int)$_POST["t".$i."_priority_p3"]);

		// echo $_SESSION['taskPrty'][$i][0]." ";
		// echo $_SESSION['taskPrty'][$i][1]." ";
		// echo $_SESSION['taskPrty'][$i][2]." ";

		// for ($k = 0; $k < sizeof($_SESSION['taskPrty'][$i])) {
		// 	echo $_SESSION['taskPrty'][$i][$k]." ";
		// }

	// 	Store arrival distribution type

		$_SESSION['taskArrDist'][]="E";

	// 	Store arrival distribution parameters

		$_SESSION['taskArrPms'][]=array(
			(float)$_POST["t".$i."_arrTime_p1"],
			(float)$_POST["t".$i."_arrTime_p2"],
			(float)$_POST["t".$i."_arrTime_p3"]);

		// echo $_SESSION['taskArrPms'][$i][0]." ";
		// echo $_SESSION['taskArrPms'][$i][1]." ";
		// echo $_SESSION['taskArrPms'][$i][2]." ";

	// 	Store service distribution type

		$_SESSION['taskSerDist'][$i]=$_POST["t".$i."_serTimeDist"];

		// echo $_SESSION['taskSerDist'][$i];

		// Store service distribution parameters

		$_SESSION['taskSerPms'][$i]= array(
			(float)$_POST["t".$i."_serTime_0"],
			(float)$_POST["t".$i."_serTime_1"]);

		// echo $_SESSION['taskSerPms'][$i][0]." ";
		// echo $_SESSION['taskSerPms'][$i][1]." ";

	// 	Store exponential distribution type

	//	Store exponential distribution parameters (lo + hi)

	// 	Store affected by traffic

		$_SESSION['taskAffByTraff'][$i]=array(
			(int)$_POST["t".$i."_affByTraff_p0"],
			(int)$_POST["t".$i."_affByTraff_p1"],
			(int)$_POST["t".$i."_affByTraff_p2"]);

			// echo $_SESSION['taskAffByTraff'][$i][0]." ";
			// echo $_SESSION['taskAffByTraff'][$i][1]." ";
			// echo $_SESSION['taskAffByTraff'][$i][2]." ";

	// 	Store associated operators

		$_SESSION['taskAssocOps'][$i] = array();

		for ($j = 0; $j < 5; $j++) {
			if(isset($_POST["t".$i."_op".$j])) {
				$_SESSION['taskAssocOps'][]=(int)$_POST["t".$i."_op".$j];
			}
		}

		// echo $_SESSION['taskAssocOps'][$i][0]." ";
		// echo $_SESSION['taskAssocOps'][$i][1]." ";
		// echo $_SESSION['taskAssocOps'][$i][2]." ";
		// echo $_SESSION['taskAssocOps'][$i][3]." ";
		// echo $_SESSION['taskAssocOps'][$i][4]." ";
		// echo $_SESSION['taskAssocOps'][$i][5]." ";
		// echo $_SESSION['taskAssocOps'][$i][6]." ";
		// echo $_SESSION['taskAssocOps'][$i][7]." ";
		//

		// echo "<br>";
	}

		// echo "Done.";
		// for ($i = 0; $i < sizeof($_SESSION['taskAssocOps']); $i++) {
		// 	for ($j = 0; $j < sizeof($_SESSION['taskAssocOps'][$i]); $j++) {
		// 		echo $_SESSION['taskAssocOps'][$i][$j]." ";
		// 	}
		// 	echo "<br>";
		// }
		//
		// for ($j = 0; $j < sizeof($_SESSION['taskNames']); $j++) {
		// 	echo $_SESSION['taskNames'][$j]."<br>";
		// }
		// for($j = 0; $j < 5; $j++) {
		// 	echo $_SESSION['taskAssocOps'];
	// }

	include_once("runSim.php");

	// echo "Hello";
	// var_dump($_SESSION);
	// print_r($_SESSION);
	// print_r($_SESSION['taskNames']);

	// require_once("runSim.php");
?>
