<?php include 'includes/utilities.php';
if($covid_state_data==null) {
//call the get_state_data to populate the
//$covid_state_data array
    get_state_data();
}
?>
<html lang="en">
<head>
<title>COVID-19 Tracker</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">
<link rel="stylesheet" href="css/styles.css">
<body>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['state'])) {
      $requestedState = $_GET['state'];
    }
}
  echo "<h2>" . $requestedState . " Daily Cases </h2>";
  echo '<p><a href="counties.php?state=' . $requestedState . '">Click here</a> to see cases by county</p>';
?>
<table class="mdl-data-table  mdl-shadow--2dp">
  <thead>  
  <tr>
    <th class="mdl-data-table__cell--non-numeric">Date</th>
    <th class="mdl-data-table__cell--non-numeric">Total Cases</th>
    <th class="mdl-data-table__cell--non-numeric">New Cases</th>
    <th class="mdl-data-table__cell--non-numeric">Total Deaths</th>
    </tr>
  </thead>
<tbody>
<?php
  /*TO DO: complete the table with the date, cases daily new cases
  and deaths on each day in chosen state */
  //$dates is an associative array of each date with associated
  //cases and deaths. You'll have to calculate daily new cases.
  //Use print_r($dates) to view the contents of $dates
  //Iterate through $dates to display each date, cases, daily new casses
  // and deaths on each day in chose state
  $dates = $covid_state_data[$requestedState];
      echo '<tr>';
      echo '<td class="mdl-data-table__cell--non-numeric">2020-03-13</td>';
      echo '<td>6</td>';
      echo '<td>6</td>';
      echo '<td>0</td>';   
      echo '</tr>';
?>
</tbody>
</table>
<p>Data Source: <a href="https://github.com/nytimes/covid-19-data">The New York Times</a> </p>
</body>
</html>