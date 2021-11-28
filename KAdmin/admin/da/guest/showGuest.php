<?php
include("../../source/mysql_connecting.php");

$sqlGuest=mysql_query("SELECT * FROM guest_table, event_table, officer_table, ticket_table, table_table, seat_table, food_table WHERE guest_table.eventId=event_table.eventId AND guest_table.officerId=officer_table.officerId AND guest_table.ticketId=ticket_table.ticketId AND guest_table.tableId=table_table.tableId AND guest_table.seatId=seat_table.seatId AND guest_table.foodId=food_table.foodId AND guest_table.guestDelete='0' AND event_table.eventDelete='0' AND officer_table.officerDelete='0' AND ticket_table.ticketDelete='0' AND table_table.tableDelete='0' AND seat_table.seatDelete='0' AND food_table.foodDelete='0' ORDER BY guestId DESC");
if(mysql_num_rows($sqlGuest)>0)
{
	echo'<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			<thead>
			  <tr>
			  	<th style="width:40px !important;">Check in</th>
				<th style="width:40px !important;">Raffle</th>
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
				<th>Ticket Price</th>
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
		
		if($rowGuest["guestCheckIn"]==1)	
		{
			$checkIn='checked';
			$checkInStyle='style="background-color:#cff0c0;"';
		}
		else
		{ 
			$checkIn=0;
			$checkInStyle='';
		}
		
		if($rowGuest["guestRaffle"]==1)	$raffle='checked';
		else $raffle=0;
		
		
		echo'<tr id="guest_'.$rowGuest["guestId"].'" '.$checkInStyle.'>
				<td><input type="checkbox" name="checkIn[]" id="guestCheckIn_'.$rowGuest["guestId"].'" value="" data-parsley-mincheck="2" required class="flat" onClick="updateCheckIn('.$rowGuest["guestId"].');" '.$checkIn.' /></td>
				<td><input type="checkbox" name="raffle[]" id="guestRaffle_'.$rowGuest["guestId"].'" value="" data-parsley-mincheck="2" required class="flat" onClick="updateRaffle('.$rowGuest["guestId"].');" '.$raffle.' /></td>
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
				<td>'.$rowGuest["ticketPrice"].'</td>
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