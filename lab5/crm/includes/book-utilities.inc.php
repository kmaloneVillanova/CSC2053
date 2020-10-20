<?php
function readCustomers($filename) {
   // read the file into memory; if there is an error then stop processing
   $arr = file($filename) or die('ERROR: Cannot find file');

   // our data is semicolon-delimited
   $delimiter = ';';

   // loop through each line of the file
   foreach ($arr as $line) {  
      // returns an array of strings where each element in the array
      // corresponds to each substring between the delimiters
      $splitcontents = explode($delimiter, $line);
      
      $aCustomer = array();
      
      $aCustomer['id'] = $splitcontents[0];
      $aCustomer['name'] = utf8_encode($splitcontents[1] . ' ' . $splitcontents[2]);
      $aCustomer['email'] = utf8_encode($splitcontents[3]);
      $aCustomer['university'] = utf8_encode($splitcontents[4]);
      $aCustomer['address'] = utf8_encode($splitcontents[5]);
      $aCustomer['city'] = utf8_encode($splitcontents[6]);
      $aCustomer['country'] = utf8_encode($splitcontents[8]);
      $aCustomer['sales'] = utf8_encode($splitcontents[11]);

      // add customer to array of customers
      $customers[$aCustomer['id']] = $aCustomer;
   }
   return $customers;
}


function readOrders($customer, $filename) {
   $arr = file($filename) or die('ERROR: Cannot find file');

   // our data is comma-delimited
   $delimiter = ',';

   // loop through each line of the file
   foreach ($arr as $line) {  
      $splitcontents = explode($delimiter, $line);
      
      $anOrder = array();      
      $anOrder['id'] = $splitcontents[0];
      $anOrder['customer'] = $splitcontents[1];
      $anOrder['isbn'] = $splitcontents[2];
      $anOrder['title'] = $splitcontents[3];
      $anOrder['category'] = $splitcontents[4];

      $orders[] = $anOrder;    
   }
   
   foreach ($orders as $ord) {
      if ($ord['customer'] == $customer) $filtered[] = $ord;
   }
   
   if (isset($filtered) )
      return $filtered;
   else
      return null;

}
?>