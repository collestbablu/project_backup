<?php 

$invoice=$this->db->query("select * from tbl_user_service where id='$user_id'");
$inviceres=$invoice->row();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Gline Networks Pvt Ltd</title>
 
   </head>
   
   <style type="text/css">
   
table {
  border-collapse: separate;
  border-spacing: 0;
  color: #4a4a4d;
  font: 14px/1.4 "Helvetica Neue", Helvetica, Arial, sans-serif;
}
th,
td {
  padding: 10px 15px;
  vertical-align: middle;
}
thead {
  background: #288feb;
  color: #fff;
}
th:first-child {
  text-align: left;
}
tbody tr:nth-child(even) {
  background: #dde7f0;
}
td {
  border-bottom: 1px solid #5187b7;
  border-right: 1px solid #5187b7;
}
td:first-child {
  border-left: 1px solid #5187b7;
}
.book-title {
  color: #395870;
  display: block;
}
.item-stock,
.item-qty {
  text-align: center;
}
.item-price {
  text-align: right;
}
.item-multiple {
  display: block;
}
tfoot {
  text-align: right;
}
tfoot tr:last-child {
  background: #dde7f0;
}

</style>

   <body style="background:#f9f9f9;">
      


<table width="850" border="0" align="center" cellpadding="0" cellspacing="0" style="border:solid 2px #247cca">
     <tr>
	 <td>Welcome To Gline Networks</td>
	 
	 </tr>
	 
	 
	 <tr>
	 <td>Your Service Activation Link</td>
	 <td>http://glinenetworks.com/site/service_act</td>
	 
	 </tr>
	 <tr>
	 <td>User Details</td>
	 <td></td>
	 
	 </tr>
	 <tr>
	 <td>User Name</td>
	 <td><?=$inviceres->username;?></td>
	 
	 </tr>
	 <tr>
	 <td>Password</td>
	 <td><?=$inviceres->password;?></td>
	 
	 </tr>
	 <tr>
	 <td>You will shortly get a call from our customer care executive within 4 business working hours.
 
In case of any further queries or services, you can connect with us on info@glinenetworks.com
</td>
	 
	 
	 </tr>
	 
	  </table>
   </body>

</html>