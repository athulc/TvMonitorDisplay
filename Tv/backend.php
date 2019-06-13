<?php
	
	include("db.php");

	$sql_tmain = "SELECT * FROM tmain;";
	$result_tmain = mysqli_query($conn,$sql_tmain);
	$page_tmain = array();

	while ($data = mysqli_fetch_assoc($result_tmain)) {
		
		if ($data['Active'] == "yes") {
			$page_tmain[] .= $data['Source'];
		}
		
	}

	$web = array();
	$msg = array();
	$fsize = array();
	$fstyle = array();
	$fclr = array();
	$bclr = array();
	$img = array();
	$bday = array();


	for ($i=0; $i < count($page_tmain) ; $i++) { 

		$sql = "SELECT * FROM $page_tmain[$i] ORDER BY Ordr;";
		$result = mysqli_query($conn,$sql);
		

		if (!$result) {
		    printf("Error: %s\n", mysqli_error($conn));
		    exit();
		}

		while ($data_sub_table = mysqli_fetch_assoc($result)) {
			if ($data_sub_table['Active'] == "yes") {

				if ($page_tmain[$i] == "twebpage") {
					$web[] .= $data_sub_table['Source'];
				}else if ($page_tmain[$i] == "tmessages") {
					$msg[] .= $data_sub_table['Source'];
					$fsize[] .= $data_sub_table['Size'];
					$fstyle[] .= $data_sub_table['Font'];
					$fclr[] .= $data_sub_table['Fcolor'];
					$bclr[] .= $data_sub_table['Bcolor'];

				}else{
					$img[] .= $data_sub_table['Source'];
				}

			}
		}
	}

	$sql_bday = "SELECT name,date_format(bdate,'%m-%d') as birthday FROM tbday;";
		$res_bday = mysqli_query($conn,$sql_bday);

		while ($data = mysqli_fetch_assoc($res_bday)) {
			if (date("m-d") == $data['birthday']) {
				$bday[] .= $data['name'];
			}
		}

		if (count($bday) >= 1) {
			$web[] .= "bday.php";
		}

?>