<?php
//global variables
$covid_state_data = array();
$covid_county_data = array();

/*
*Get state data
*/
function get_state_data() {
   $handle = curl_init();
 
$url = "https://raw.githubusercontent.com/nytimes/covid-19-data/master/us-states.csv";
 
// Set the url
curl_setopt($handle, CURLOPT_URL, $url);
// Set the result output to be a string.
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
 
$response = curl_exec($handle);
global $covid_state_data;
$covid_state_data = readResponse($response);
 
curl_close($handle);

}

/*
*Get county data
*/
function get_county_data() {
   $handle = curl_init();
 
$url = "https://raw.githubusercontent.com/nytimes/covid-19-data/master/us-counties.csv";
 
// Set the url
curl_setopt($handle, CURLOPT_URL, $url);
// Set the result output to be a string.
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
 
$response = curl_exec($handle);

global $covid_county_data;
$covid_county_data = readCountyData($response);
 
curl_close($handle);

}

/*Each state's info is returned in a comma delimited line. 
*This code splits the response and places the info in an
*associative array */
function readResponse($response) {
 
   $delimiter = ',';
   $datalines = preg_split("/\\r\\n|\\r|\\n/", $response);
   $datalines=array_slice($datalines, 1);
   
   $state_data = array();
   foreach ($datalines as $line) {        
      $splitcontents = explode($delimiter, $line);
          
      $aState = array();      
      $aState['date'] = $splitcontents[0];
      $aState['name'] = $splitcontents[1];
      $aState['fips'] = $splitcontents[2];
      $aState['cases'] = (int)$splitcontents[3];
      $aState['deaths'] = (int)$splitcontents[4];

      // add each date to array of state data
      if (array_key_exists($aState['name'], $state_data)) {
         $temp_array = array();
         $temp_array = $state_data[$aState['name']];        
         array_push($temp_array, $aState);
         $state_data[$aState['name']] = $temp_array;
      } else {
         $temp = array();
         $temp[0] = $aState;      
         $state_data[$aState['name']] = $temp;
      }
   }
   return $state_data; 
}

/*Each county's info is returned in a comma delimited line. 
*This code splits the response and places the info in an
*associative array */
function readCountyData($response) {
  
   $delimiter = ',';
   $datalines = preg_split("/\\r\\n|\\r|\\n/", $response);
   $datalines=array_slice($datalines, 1);
      
   $county_data = array();
   foreach ($datalines as $line) {  
     
      $splitcontents = explode($delimiter, $line);  
    
      $aCounty = array();
      $aCounty['date'] = $splitcontents[0];
      $aCounty['name'] = $splitcontents[1];
      $aCounty['state'] = $splitcontents[2];
      $aCounty['fips'] = $splitcontents[3];
      $aCounty['cases'] = (int)$splitcontents[4];
      $aCounty['deaths'] = (int)$splitcontents[5];

      //key is county name plus state
      if (array_key_exists($aCounty['name'] . $aCounty['state'], $county_data) ) {
         $temp_array = array();
         $temp_array = $county_data[$aCounty['name'] . $aCounty['state']];         
         array_push($temp_array, $aCounty);
         $county_data[$aCounty['name'] . $aCounty['state']] = $temp_array; 
             
      } else {
         $temp = array();
         $temp[0] = $aCounty; 
         $key = $aCounty['name'] . $aCounty['state'];     
         $county_data[$key] = $temp;
      }
      
   }
   return $county_data; 
}
?>