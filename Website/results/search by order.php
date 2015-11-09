	switch($OrderSearch){
		case"RH":
			$search_sql = "SELECT * FROM $dbName WHERE Project_Name LIKE '%$Search%' ORDER BY "Rating_Total" DESC";
			break;
		case"RL":
			$search_sql = "SELECT * FROM $dbName WHERE Project_Name LIKE '%$Search%' ORDER BY "Rating_Total" ASC";
			break;
		case"LH":
			$search_sql = "SELECT * FROM $dbName WHERE Project_Name LIKE '%$Search%' ORDER BY "Recommended_Grade_Level" DESC";
			break;
		case"LL":
			$search_sql = "SELECT * FROM $dbName WHERE Project_Name LIKE '%$Search%' ORDER BY "Recommended_Grade_Level" ASC";
			break;
		case"VH":
			$search_sql = "SELECT * FROM $dbName WHERE Project_Name LIKE '%$Search%'";//add view later
			break;
		case"VL":
			$search_sql = "SELECT * FROM $dbName WHERE Project_Name LIKE '%$Search%'";//add view later
			break;
		case"DH":
			$search_sql = "SELECT * FROM $dbName WHERE Project_Name LIKE '%$Search%' ORDER BY "Date_Uploaded" DESC";
			break;
		case"DL":
			$search_sql = "SELECT * FROM $dbName WHERE Project_Name LIKE '%$Search%' ORDER BY "Date_Uploaded" ASC";
			break;
		default:
			//!$OrderSearch
			$search_sql = "SELECT * FROM $dbName WHERE Project_Name LIKE '%$Search%'";
	}