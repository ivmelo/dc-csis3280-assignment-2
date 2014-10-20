<?php
	
	$company = array(
		'ms'=>'Microsoft' ,
		'ibm'=>'International Business Machines',
		'orc'=>'Oracle' ,
		'ea' =>'Electronic Arts',
		'in' =>'Intel',
		'amd' =>'Advanced Micro Device',
		'en' =>'Enron',
		'ati' => 'ATI Tech. Inc.' 
	);


	if (isset($_POST['query']) || !empty($_POST['query'])) {
		
		// get the values separated by comma or dot and store into an array
		$terms = preg_split( "/[,|.]/", $_POST['query']);

		// array to store the keys of the found items
		$keys_found = array();

		// array to store the not found terms
		$not_found = array();


		// loop through all the search terms
		foreach ($terms as $term) {	
			// if the key exist within the keys
			if (array_key_exists(strtolower(trim($term)), $company)) {
				// push the key into the $keys_found array
				array_push($keys_found, trim($term));

			// if the value exist within the $company array
			} else if (in_array(ucwords(trim($term)), $company)) {
				// will found the key correspondent to the value and push into the array
				array_push($keys_found, array_search(ucwords(trim($term)), $company));
			// didn't found the word in the array
			} else {
				// will push the word into the $not_found array
				array_push($not_found, $term);
			}
		}

		// print results
		print_list_array($company, $keys_found, $not_found);


	} else {
		echo "<p><strong>You entering NOTHING, PLEASE Re-Enter</strong></p>";
	}

	/*
	* Print results
	*/
	function print_list_array($companies, $found_keys, $not_found) {

		ksort($companies);

		echo '===========================================<br />';

		foreach ($companies as $key => $value) {
			if (in_array($key, $found_keys)) {
				echo "<b>****" . $key . ' ==> <i>' . $value . '</i></b><br />';
			} else {
				echo $key . ' ==> ' . $value . '<br />';
			}
		}

		echo '===========================================<br />';

		if (!empty($not_found)) {

			rsort($not_found);

			echo '====The following were NOT found (reverse order) =====<br />';

			foreach ($not_found as $not_found_term) {
				echo $not_found_term . '<br />';
			}

			echo '===========================================<br />';
		}
	}

?>