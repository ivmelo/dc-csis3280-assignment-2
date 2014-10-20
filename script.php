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

		$result_companies = array();
		$not_found = array();

		//print_r($terms);

		echo '===========================================<br />';
		foreach ($terms as $term) {	
			if (array_key_exists(strtolower(trim($term)), $company)) {
				// found key
				echo $term . '====</br> ';
			} else if (in_array(ucwords(trim($term)), $company)) {
				// found value
				echo $term . '====</br> ';
			} else {
				// not found
			}
		}
		echo '===========================================<br />';

		/*foreach ($company as $key => $value) {

			if(array_key_exists('ati', search))

			/*foreach ($terms as $term) {

				/*if (strtolower(trim($term)) === strtolower($key) || strtolower(trim($term)) === strtolower($value)) {

					$result_companies['****' . $key] = $value;
					//echo '***FOUND_DEBUG=' . $key . '==>' . $value . '==>' . $term . ' <br/>';
					
				} else {

					if (array_key_exists('****' . $key, $result_companies)) {

					} else {
						$result_companies[$key] = $value;
					}
					
					//echo 'DEBUG=' . $key . '==>' . $value . '==>' . $term . ' <br/>';
				}*/
			//}
		//}

		/*print_r($result_companies);*/
		/*print_r($not_found);*/

		/*foreach ($terms as $term) {
			echo trim($term) . '<br/>';
		}

		foreach ($result_companies as $key => $value) {
			echo $key . ' ==> ' . $value . '<br/>';
		}

		

		/*foreach ($company as $sigla => $nome) {
			if (strpos(strtolower($terms), strtolower($sigla)) !== FALSE) {
				echo $sigla . '</br>';
			} else {

			}
		}*/



	} else {
		echo "<p><strong>You entering NOTHING, PLEASE Re-Enter</strong></p>";
	}

	function get_terms($array) {
		$terms = array();
		return $terms;
	}

	function search() {
		$result = arrat();
		return $result;
	}


?>