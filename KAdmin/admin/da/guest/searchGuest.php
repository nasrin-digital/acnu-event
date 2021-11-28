<?php
$eventId=$_REQUEST["eventId"];
$officerId=$_REQUEST["officerId"];
$guestPayment=$_REQUEST["guestPayment"];
$guestInfo=$_REQUEST["guestInfo"];

include("../../source/mysql_connecting.php");

$searchField="";
if($eventId!=0)	$searchField=" AND event_table.eventId='$eventId'";
if($officerId!=0)	$searchField.=" AND officer_table.officerId='$officerId'";
if($guestPayment!=0)	$searchField.=" AND guest_table.guestPayment='$guestPayment'";
if($guestInfo!="")	$searchField.=" AND ( guest_table.guestFirstName LIKE '%$guestInfo%' OR guest_table.guestLastName LIKE '%$guestInfo%' OR guest_table.guestCellphone LIKE '%$guestInfo%' OR ticket_table.ticketNumber LIKE '%$guestInfo%')";



$sqlGuest=mysql_query("SELECT * FROM guest_table, event_table, officer_table, ticket_table, table_table, seat_table, food_table WHERE guest_table.eventId=event_table.eventId AND guest_table.officerId=officer_table.officerId AND guest_table.ticketId=ticket_table.ticketId AND guest_table.tableId=table_table.tableId AND guest_table.seatId=seat_table.seatId AND guest_table.foodId=food_table.foodId AND guest_table.guestDelete='0' AND event_table.eventDelete='0' AND officer_table.officerDelete='0' AND ticket_table.ticketDelete='0' AND table_table.tableDelete='0' AND seat_table.seatDelete='0' AND food_table.foodDelete='0' $searchField ORDER BY guestId DESC");

if(mysql_num_rows($sqlGuest)>0)
{
	echo'<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			<thead>
			  <tr>
				<th class="col-xs-1">First Name</th>
				<th class="col-xs-1">Last Name</th>
				<th class="col-xs-1">Cellphone</th>
				<th class="col-xs-1">Event Name</th>
				<th class="col-xs-1">Officer Name</th>
				<th style="width:89px !important;">Ticket Number</th>
				<th style="width:89px !important;">table Name</th>
				<th style="width:89px !important;">Seat Name</th>
				<th>Food Name</th>
				<th>Dish Size</th>
				<th style="width:89px !important;">Payment</th>
				<th >Comment</th>
				<th style="width:100px !important;"></th>
			  </tr>
			</thead>
			<tbody>';
	while($rowGuest=mysql_fetch_assoc($sqlGuest))
	{
		if($rowGuest["guestDishSize"]==1)	$guestDishSize="Kid";
		else if($rowGuest["guestDishSize"]==2)	$guestDishSize="Adult";
		else if($rowGuest["guestDishSize"]==0)	$guestDishSize="";
		else $guestDishSize="";
		
		
		if($rowGuest["guestPayment"]==1)	$guestPayment="Unpaid";
		else if($rowGuest["guestPayment"]==2)	$guestPayment="Paid";
		else if($rowGuest["guestPayment"]==0)	$guestPayment="";
		else $guestPayment="";
		
		echo'<tr id="guest_'.$rowGuest["guestId"].'">
				<td>'.$rowGuest["guestFirstName"].'</td>
				<td>'.$rowGuest["guestLastName"].'</td>
				<td>'.$rowGuest["guestCellphone"].'</td>
				<td>'.$rowGuest["eventName"].' '.$rowGuest["eventDate"].'</td>
				<td>'.$rowGuest["officerFirstName"].' '.$rowGuest["officerLastName"].'</td>
				<td>'.$rowGuest["ticketNumber"].'</td>
				<td>'.$rowGuest["tableName"].'</td>
				<td>'.$rowGuest["seatName"].'</td>
				<td>'.$rowGuest["foodName"].'</td>
				<td>'.$guestDishSize.'</td>
				<td>'.$guestPayment.'</td>
				<td>'.$rowGuest["guestComment"].'</td>
				<td style="text-align:center;">
					<div class="btn-group">
					  <button type="button" class="btn btn-danger btn-xs">Action</button>
					  <button type="button" class="btn btn-danger dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
						<span class="caret"></span>
						<span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <ul class="dropdown-menu" role="menu">
						<li><a href="editGuest.html?guest='.$rowGuest["guestId"].'" target="_blank" onclick="editGuest('.$rowGuest["guestId"].');">Edit</a></li>
						<li><a href="#" onclick="deleteGuest('.$rowGuest["guestId"].');">Delete</a></li>
					   </ul>
					 </div>
				</td>
			</tr>';
	}
	
		echo'</tbody>
        </table>';
	
}
else
{
	echo'<p style="text-align:center; color:#C00; margin-top:20px; font-size:16px;">There is not any seat to show </p>';
	exit;
}
?>