<?php
$guestId=$_REQUEST["guestId"];

include("../../source/mysql_connecting.php");

$sqlGuest=mysql_query("SELECT * FROM guest_table, event_table, officer_table, ticket_table, table_table, seat_table, food_table WHERE guest_table.eventId=event_table.eventId AND guest_table.officerId=officer_table.officerId AND guest_table.ticketId=ticket_table.ticketId AND guest_table.tableId=table_table.tableId AND guest_table.seatId=seat_table.seatId AND guest_table.foodId=food_table.foodId AND guest_table.guestDelete='0' AND event_table.eventDelete='0' AND officer_table.officerDelete='0' AND ticket_table.ticketDelete='0' AND table_table.tableDelete='0' AND seat_table.seatDelete='0' AND food_table.foodDelete='0' AND guestId='$guestId'");
if(mysql_num_rows($sqlGuest)==1)
{
	$rowGuest=mysql_fetch_assoc($sqlGuest);
	
	echo $rowGuest["eventId"].'/*Kasandan*/'.$rowGuest["officerId"].'/*Kasandan*/'.$rowGuest["ticketId"].'/*Kasandan*/'.$rowGuest["tableId"].'/*Kasandan*/'.$rowGuest["seatId"].'/*Kasandan*/'.$rowGuest["foodId"].'/*Kasandan*/'.$rowGuest["guestDishSize"].'/*Kasandan*/'.$rowGuest["guestFirstName"].'/*Kasandan*/'.$rowGuest["guestLastName"].'/*Kasandan*/'.$rowGuest["guestCellphone"].'/*Kasandan*/'.$rowGuest["guestPayment"].'/*Kasandan*/'.$rowGuest["guestPayment"];
	
}
else
{
	echo'Error';
	exit;
}
?>