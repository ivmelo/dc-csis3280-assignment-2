<?php
	// Authors: Ivanilson Vieira de Melo Junior and Cicero Pereira Costa

	
	/* given array will remain untouched */
	$company = array(		"ms"=>"Microsoft" ,
					 "ibm"=>"International Business Machines",
					 "orc"=>"Oracle" ,
					 "ea" =>"Electronic Arts",
					 "in" =>"Intel",
					 "amd" =>"Advanced Micro Device",
					 "en" =>"Enron",
					 "ati" => "ATI Tech. Inc." 
		
		);
	
	// Verifies if the user inserted valid values
	if (isset($_POST['query']) && !empty($_POST['query']) 
		&& trim($_POST['query']) !== '') {
		
		// get the values between commas and dots and store into an array
		$terms = preg_split( "/[,|.]/", $_POST['query']);

		// if the array is not made entirely of blank spaces
		if(has_content($terms)) {

			// array to store the keys of the found items
			$keys_found = array();
			// array to store the not found terms
			$not_found = array();


			// loop through all the search terms
			foreach ($terms as $term) {	
				// if the search term is among the keys
				if (array_key_exists(strtolower(trim($term)), $company)) {
					// push the key into the $keys_found array
					array_push($keys_found, trim($term));

				// if the value exist as a value within the $company array
				} else if (in_array(ucwords(strtolower(trim($term))), $company)) {
					// will find the key correspondent to the value 
					// and push into the $keys_found array
					array_push($keys_found, 
						array_search(ucwords(strtolower(trim($term))), $company));
				// didn't find the word in the array
				} else {
					// will push the word into the $not_found array
					array_push($not_found, $term);
				}
			}

			// print results
			displayArray($company, $keys_found, $not_found);

		} else {
			// No valid data
			echo '<h3>You did not enter any valid names/abbreviations ' .
			'to search, PLEASE Re-Enter</h3>';
		}

	} else {
		// No data at all
		echo "<p><strong>You entering NOTHING, PLEASE Re-Enter</strong></p>";
	}

		

	
	// Print results
	function displayArray($companies, $found_keys, $not_found) {

		// Sort array
		ksort($companies);

		echo '===========================================<br />';

		// Loop through all companies
		foreach ($companies as $key => $value) {
			// If the current key is among the found keys
			if (in_array($key, $found_keys)) {
				echo "<b>****" . $key . ' ==> <em>' . $value . '</em></b><br />';
			} else {
				echo $key . ' ==> ' . $value . '<br />';
			}
		}

		echo '===========================================<br />';

		// If array has relevant content (anything but empty spaces)
		if (has_content($not_found)) {

			// order array in descendent order
			rsort($not_found);

			echo '====The following were NOT found (reverse order) =====<br />';

			foreach ($not_found as $not_found_term) {
				if (trim($not_found_term) !== '') {
					echo $not_found_term . '<br />';
				}
			}

			echo '===========================================<br />';
		}
	}

	// Verify if the array is not entirely composed of empty spaces
	function has_content($arr) {
		foreach ($arr as $val) {
			if(trim($val) !== '')
				return TRUE;
		}
		return FALSE;
	}
	
?>