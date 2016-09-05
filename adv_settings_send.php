<?php
	session_start();

//	Save replications

	$_SESSION['numReps']=(int)$_POST["num_reps"];
	// echo $_SESSION['numReps'];

//	Loop through each task type

	for ($i = 0; $i < $_SESSION['numTaskTypes']; $i++) {
	// 	Store task names

		$_SESSION['taskNames'][$i]=$_POST["t".$i."_name"];
		// echo $_SESSION['taskNames'][$i];

	// 	Store priorities

		$_SESSION['taskPrty'][$i]=array(
			(int)$_POST["t".$i."_priority_p0"],
			(int)$_POST["t".$i."_priority_p1"],
			(int)$_POST["t".$i."_priority_p2"]);

		// for ($k = 0; $k < sizeof($_SESSION['taskPrty'][$i])) {
		// 	echo $_SESSION['taskPrty'][$i][$k]." ";
		// }

	// 	Store arrival distribution type

		$_SESSION['taskArrDist'][$i]="E";

	// 	Store arrival distribution parameters

		$_SESSION['taskArrPms'][$i]=array(
			(float)$_POST["t".$i."_arrTime_p0"],
			(float)$_POST["t".$i."_arrTime_p1"],
			(float)$_POST["t".$i."_arrTime_p2"]);

		for ($k = 0; $k < sizeof($_SESSION['taskArrPms'][$i]); $k++) {
			if ($_SESSION['taskArrPms'][$i][$k] != 0) {
				$_SESSION['taskArrPms'][$i][$k] = 1/$_SESSION['taskArrPms'][$i][$k];
			}
		}
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
				$_SESSION['taskAssocOps'][$i][]=(int)$_POST["t".$i."_op".$j];
			}
		}
	}
		// for ($i = 0; $i < sizeof($_SESSION['taskAssocOps']); $i++) {
		// 	for ($j = 0; $j < sizeof($_SESSION['taskAssocOps'][$i]); $j++) {
		// 		echo $_SESSION['taskAssocOps'][$i][$j]." ";
		// 	}
		// 	echo "<br>";
		// }

	header("Location: run_sim.php");

	// var_dump($_SESSION);
	// print_r($_SESSION);
?>