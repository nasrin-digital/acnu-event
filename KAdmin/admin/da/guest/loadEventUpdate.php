<?php
$eventId=$_REQUEST["eventId"];

include("../../source/mysql_connecting.php");

$sqlEvent=mysql_query("SELECT * FROM event_table WHERE eventDelete='0' ORDER BY eventId DESC");
if(mysql_num_rows($sqlEvent)>0)
{
	echo'<select id="guestEvent" class="form-control" onChange="loadTicket(); loadOfficer(); loadTable(); loadFood();">';
	while($rowEvent=mysql_fetch_assoc($sqlEvent))
	{
		if($rowEvent["eventId"]==$eventId)	
			echo'<option value="'.$rowEvent["eventId"].'" selected>'.$rowEvent["eventName"].' '.$rowEvent["eventDate"].'</option>';
		else 	
			echo'<option value="'.$rowEvent["eventId"].'">'.$rowEvent["eventName"].' '.$rowEvent["eventDate"].'</option>';
	}
	
	echo'</select>';
	
}
else
{
	echo'<select id="guestEvent" class="form-control"><option>Select</option></select>';
	exit;
}
?>