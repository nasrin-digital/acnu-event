function addEvent()
{
	
	var eventName=$("#eventName").val();
	if(eventName=='')
	{
		$("#eventMessage").css("color","#C00");
		$("#eventMessage").html("Enter event Name");
		return;
	}
	
	var eventDate=$("#single_cal3").val();
	if(eventDate=='')
	{
		$("#eventMessage").css("color","#C00");
		$("#eventMessage").html("Enter event date");
		return;
	}
	
	var eventAddress=$("#eventAddress").val();
	
	
	$.ajax({
		cache:false,
		url:"da/event/addEvent.php",
		data:{eventName:eventName, eventDate:eventDate, eventAddress:eventAddress},
		success:function(result)
		{
			if(result=='Duplicate')
			{
				$("#eventMessage").css("color","#C00");
				$("#eventMessage").html("Name and date exist");
				return;
			}
			if(result=='yes')
			{
				$("#eventMessage").css("color","#0C0");
				$("#eventMessage").html("Successful");
				
				$("#eventName").val("");
				$("#eventDate").val("");
				$("#eventAddress").val("");
				
				showEvent();
				return;
			}
			else
			{
				$("#eventMessage").css("color","#0C0");
				$("#eventMessage").html("Error");
				return;
			}
			
		}
	});
}


function showEvent()
{
	$.ajax({
		cache:false,
		url:"da/event/showEvent.php",
		data:{},
		success:function(result)
		{
			$("#showEvent").html(result);
		}
	});
}


function editEvent(eventId)
{
	$.ajax({
		cache:false,
		url:"da/event/editEvent.php",
		data:{eventId:eventId},
		success:function(result)
		{
			$("#event_"+eventId).html(result);
		}
	});
}

function cancelEvent(eventId)
{
	$.ajax({
		cache:false,
		url:"da/event/cancelEvent.php",
		data:{eventId:eventId},
		success:function(result)
		{
			if(result!='Error')
				$("#event_"+eventId).html(result);
			else
				alert("Error");
			
		}
	});
}


function updateEvent(eventId)
{
	var eventName=$("#eventNameUpdate_"+eventId).val(); 
	if(eventName=='')
	{
		$("#eventNameUpdate_"+eventId).css("border-color","#C00");
		return;
	}
	$("#eventNameUpdate_"+eventId).css("border-color","#ccc");
	
	var eventDate=$("#eventDateUpdate_"+eventId).val();
	if(eventDate=='')
	{
		$("#eventDateUpdate_"+eventId).css("border-color","#C00");
		return;
	}
	
	if(!isValidDate(eventDate))
	{
		$("#eventDateUpdate_"+eventId).css("border-color","#C00");
		return;
	}
	$("#eventDateUpdate_"+eventId).css("border-color","#ccc");
	
	var eventAddress=$("#eventAddressUpdate_"+eventId).val();
	
	
	$.ajax({
		cache:false,
		url:"da/event/updateEvent.php",
		data:{eventId:eventId, eventName:eventName, eventDate:eventDate, eventAddress:eventAddress},
		success:function(result)
		{
			if(result=='Duplicate')
			{
				alert("Name and date exist");
				return;
			}
			if(result=='yes')
			{
				cancelEvent(eventId);
				return;
			}
			else
			{
				alert("Error");
				return;
			}
			
		}
	});
}

function deleteEvent(eventId)
{
	var deleteResult=confirm('Are you sure for Delete?');
	if(deleteResult==true)
	{
		$.ajax({
			cache:false,
			url:"da/event/deleteEvent.php",
			data:{eventId:eventId},
			success:function(result)
			{
				if(result=="yes")
				{
					$("#event_"+eventId).html("");
				}
				else
				{
					alert("Error");
				}
				
			}
		});
	}
}

function isValidDate(dateString)
{
    // First check for the pattern
    if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString))
        return false;

    // Parse the date parts to integers
    var parts = dateString.split("/");
    var day = parseInt(parts[1], 10);
    var month = parseInt(parts[0], 10);
    var year = parseInt(parts[2], 10);

    // Check the ranges of month and year
    if(year < 1000 || year > 3000 || month == 0 || month > 12)
        return false;

    var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

    // Adjust for leap years
    if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
        monthLength[1] = 29;

    // Check the range of the day
    return day > 0 && day <= monthLength[month - 1];
}