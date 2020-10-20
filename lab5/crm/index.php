<?php include 'includes/book-utilities.inc.php';
$customers = readCustomers('data/customers.txt');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>CRM</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">
<link rel="stylesheet" href="css/styles.css">
<script src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
<script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
<script src="js/jquery.sparkline.2.1.2.js"></script>
<script type="text/javascript">
$(function() {
/** This code runs when everything has been loaded on the page */
/* Inline sparklines take their values from the contents of the tag */
  $('.inlinesparkline').sparkline('html', {
  type: 'bar',
  barColor: '#6200EA'
  });
});
</script>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

<?php include 'includes/header.inc.php'; ?>
<?php include 'includes/left-nav.inc.php'; ?>

<main class="mdl-layout__content mdl-color--grey-50">
<section class="page-content">
<div class="mdl-grid">
<!-- mdl-cell + mdl-card -->
<div class="mdl-cell mdl-cell--7-col card-lesson mdl-card  mdl-shadow--2dp">
<div class="mdl-card__title mdl-color--orange">
<h2 class="mdl-card__title-text">Customers</h2>
</div>
<div class="mdl-card__supporting-text">
<table class="mdl-data-table  mdl-shadow--2dp">
  <thead>
  <tr>
    <th class="mdl-data-table__cell--non-numeric">Name</th>
    <th class="mdl-data-table__cell--non-numeric">University</th>
    <th class="mdl-data-table__cell--non-numeric">City</th>
    <th>Sales</th>
  </tr>
  </thead>
<tbody>
<?php
/******************* TO DO ***************************/
/*Table displays only the first customer found in customers.txt
AND the html is hard coded. Developer mentioned she needs to update 
it to use a foreach loop to create a <tr> and <td> for each customer
I would suggest printing out the contents of the $customers array
that contains all of the customer data found in data.txt.
foreach ($customers as $cust) {
foreach($cust as $key=>$val) {
  echo "key is $key and val is $val  <br>";
}
}
Once you know what's in the array place it in the table.
See the order table below for some more hints.
*/
echo '<tr>';
echo '<td class="mdl-data-table__cell--non-numeric"><a href="index.php?customer=2">Leonie Kholer</a></td>';
echo '<td class="mdl-data-table__cell--non-numeric">University of Stuttgart</td>';
echo '<td class="mdl-data-table__cell--non-numeric">Stuttgart</td>';
echo '<td><span class="inlinesparkline">1,4,4,7,5,9,10,10,10,12,11,9</span></td>';
echo '</tr>';
?>
</tbody>
</table>
</div>
</div> <!-- / mdl-cell + mdl-card -->
<div class="mdl-grid mdl-cell--5-col">
<?php
/**********************TO DO ************************* */
/*See the URL that is created above for when the customer name is clicked.
It contains a query string like customer=ID
The code below checks if the request method is GET and if so it then
checks for the customer value set in the query string of the URL */
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['customer'])) {
    $requestedCustomer = $customers[$_GET['customer']];
?>
<!-- mdl-cell + mdl-card -->
<div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
<div class="mdl-card__title mdl-color--deep-purple mdl-color-text--white">
<h2 class="mdl-card__title-text">Customer Details</h2>
</div>
<div class="mdl-card__supporting-text">

<!--Add the customer information here-->
<!--Again the customer information is hard coded. You must change
this so that the customer that is clicked is the customer details
that show below -->
<h4><?php echo "Leonie Kohler" ?></h4>
<?php echo "Univesity of Stuggart" ?><br>
<?php echo "Theodor-Heuss-Strasse 34" ?><br>
<?php echo "Stuttgart, Germany" ?>

</div>
</div> <!-- / mdl-cell + mdl-card -->

<!-- mdl-cell + mdl-card -->
<div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
<div class="mdl-card__title mdl-color--deep-purple mdl-color-text--white">
<h2 class="mdl-card__title-text">Order Details</h2>
</div>
<div class="mdl-card__supporting-text">
<?php
/*This code creates the order table
This code is complete and does not need to be modified */
    $orders = readOrders($_GET['customer'], 'data/orders.txt');
    if (is_null($orders)) {
      echo 'No orders for ' . $requestedCustomer['name'];
    } else {
      ?>

  <table class="mdl-data-table  mdl-shadow--2dp">
    <thead>
      <tr>
        <th class="mdl-data-table__cell--non-numeric">Cover</th>
        <th class="mdl-data-table__cell--non-numeric">ISBN</th>
        <th class="mdl-data-table__cell--non-numeric">Title</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($orders as $ord) {
              echo '<tr>';
              echo '<td><img src="images/tinysquare/' . $ord['isbn'] . '.jpg"></td>';
              echo '<td>' . $ord['isbn'] . '</td>';
              echo '<td class="mdl-data-table__cell--non-numeric">' . $ord['isbn'] . $ord['title'] . '</td>';
              echo '</tr>    ';
            } ?>

    </tbody>
  </table>
<?php  } ?>
</div>
</div> <!-- / mdl-cell + mdl-card -->
<?php
}
} ?>
</div>
</div> <!-- / mdl-grid -->
</section>
</main>
</div> <!-- / mdl-layout -->
</body>
</html>