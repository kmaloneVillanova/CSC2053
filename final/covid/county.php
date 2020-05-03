<?php include 'includes/utilities.php';
if($covid_county_data==null) {
    get_county_data();
}
?>
<html lang="en">
<head>
<title>COVID-19</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">
<link rel="stylesheet" href="css/styles.css">
<script src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
<script src="https://code.getmdl.io/1.1.3/material.min.js"></script>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['county'])) {
      $requestedCounty = $_GET['county'];
      $requestedState = $_GET['state'];
    }
}
  echo "<h2>" . $requestedCounty . " County Daily Cases </h2>";
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
/*TO DO: Display the date, cases, daily new cases and deaths for each
date in chosen county.
The $dates associative array holds each date's cases and deaths. 
You'll have to calculate daily new cases. Iterate through $dates
and display for each date.*/

$dates = $covid_county_data[$requestedCounty . $requestedState];
  echo '<tr>';
  echo '<td class="mdl-data-table__cell--non-numeric">2020-03-24</td>';
  echo '<td>1</td>';
  echo '<td>1</td>';
  echo '<td>0</td>';   
  echo '</tr>';
?>

</tbody>
</table>
<p>Data Source: <a href="https://github.com/nytimes/covid-19-data">The New York Times</a> </p>
</body>
</html>
