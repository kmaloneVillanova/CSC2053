<?php include 'includes/utilities.php';
//call the get_state_data to populate the
//$covid_state_data array
get_state_data();
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
</head>
<body>
<h2>COVID-19 Tracker  </h2>
<table class="mdl-data-table  mdl-shadow--2dp">
  <thead>
  <tr>
    <th class="mdl-data-table__cell--non-numeric">State</th>
    <th class="mdl-data-table__cell--non-numeric">Total Cases</th>
    <th class="mdl-data-table__cell--non-numeric">Total Deaths</th>
    <th class="mdl-data-table__cell--non-numeric">Cases Last 14 Days</th> 
    </tr>
  </thead>
<tbody>
<?php
ksort($covid_state_data);
foreach($covid_state_data as $state=>$dates) {
    $last_date=$dates[count($dates)-1];
    $total_cases = $last_date['cases'];
    $total_deaths = $last_date['deaths'];
    $count=0;
    $prev_count=0;
    $prev_new_cases=0;
    $cases_last_14days=0;
    foreach($dates as $aDate) { 
        $new_cases=$aDate['cases'] - $prev_count;
        if($count > count($dates)-15) {
            $cases_last_14days+=$new_cases;
        }
        $count++;
        $prev_count = $aDate['cases'];
    }
    echo '<tr>';
    echo '<td class="mdl-data-table__cell--non-numeric"><a href="state.php?state=' . $state. '">' . $state . '</a></td>';
    echo '<td>' . number_format($total_cases) . '</td>';
    echo '<td>' . number_format($total_deaths) . '</td>';  
    echo '<td>' . number_format($cases_last_14days) . '</td>';  
    echo '</tr>    ';
}
?>
</tbody>
</table>
<p>Data Source: <a href="https://github.com/nytimes/covid-19-data">The New York Times</a> </p>
</body>
</html>