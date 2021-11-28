<?php
include("../../source/mysql_connecting.php");

$sqlEvent=mysql_query("SELECT * FROM event_table WHERE eventDelete='0' ORDER BY eventId DESC");
if(mysql_num_rows($sqlEvent)>0)
{
	echo'<select id="guestEventSearch" class="form-control">
			<option>Select</option>';
	while($rowEvent=mysql_fetch_assoc($sqlEvent))
	{
		echo'<option value="'.$rowEvent["eventId"].'">'.$rowEvent["eventName"].' '.$rowEvent["eventDate"].'</option>';
	}
	
	echo'</select>';
	
}
else
{
	echo'<select id="guestEventSearch" class="form-control"><option>Select</option></select>';
	exit;
}
?>