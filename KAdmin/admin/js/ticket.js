function loadEvent()
{
	$.ajax({
		cache:false,
		url:"da/ticket/loadEvent.php",
		data:{},
		success:function(result)
		{
			$("#loadEvent").html(result);
		}
	});
}


function loadOfficer()
{
	$.ajax({
		cache:false,
		url:"da/ticket/loadOfficer.php",
		data:{},
		success:function(result)
		{
			$("#loadOfficer").html(result);
		}
	});
}


function addTicket()
{
	if($("#ticketEvent").val()=='Select')
	{
		$("#ticketMessage").css("color","#C00");
		$("#ticketMessage").html("Select event");
		return;
	}
	
	var eventId=$('#ticketEvent').val();
	
	if($("#ticketOfficer").val()=='Select')
	{
		$("#ticketMessage").css("color","#C00");
		$("#ticketMessage").html("Select officer");
		return;
	}
	
	var officerId=$('#ticketOfficer').val();
	
	
	var ticketNumber=$("#ticketNumber").val();
	if(ticketNumber=="")
	{
		$("#ticketMessage").css("color","#C00");
		$("#ticketMessage").html("Enter ticket number");
		return;
	}
	
	var ticketPrice=$("#ticketPrice").val();
	if(ticketPrice=="")
	{
		$("#ticketMessage").css("color","#C00");
		$("#ticketMessage").html("Enter ticket price");
		return;
	}
	
	$.ajax({
		cache:false,
		url:"da/ticket/addTicket.php",
		data:{eventId:eventId, officerId:officerId, ticketNumber:ticketNumber, ticketPrice:ticketPrice},
		success:function(result)
		{
			if(result=='Duplicate')
			{
				$("#ticketMessage").css("color","#C00");
				$("#ticketMessage").html("Ticket number exist");
				return;
			}
			if(result=='yes')
			{
				$("#ticketMessage").css("color","#0C0");
				$("#ticketMessage").html("Successful");
				
				/*$("#ticketEvent").val("Select");
				$("#ticketOfficer").val("Select");
				$("#ticketNumber").val("");
				$("#ticketPrice").val("");*/
				
				showTicket();
				return;
			}
			else
			{
				$("#ticketMessage").css("color","#0C0");
				$("#ticketMessage").html("Error");
				return;
			}
			
		}
	});
}

function showTicket()
{
	$.ajax({
		cache:false,
		url:"da/ticket/showTicket.php",
		data:{},
		success:function(result)
		{
			$("#showTicket").html(result);
		}
	});
}


function editTicket(ticketId)
{
	$.ajax({
		cache:false,
		url:"da/ticket/editTicket.php",
		data:{ticketId:ticketId},
		success:function(result)
		{
			$("#ticket_"+ticketId).html(result);
		}
	});
}

function updateTicket(ticketId)
{
	var eventId=$("#ticketEventUpdate_"+ticketId).val();
	
	var officerId=$("#ticketOfficerUpdate_"+ticketId).val();
	
	
	var ticketNumber=$("#ticketNumberUpdate_"+ticketId).val();
	if(ticketNumber=="")
	{
		$("#ticketNumberUpdate_"+ticketId).css("border-color","#C00");
		return;
	}
	$("#ticketNumberUpdate_"+ticketId).css("border-color","#CCC");
	
	
	var ticketPrice=$("#ticketPriceUpdate_"+ticketId).val();
	if(ticketPrice=="")
	{
		$("#ticketPriceUpdate_"+ticketId).css("border-color","#C00");
		return;
	}
	$("#ticketPriceUpdate_"+ticketId).css("border-color","#CCC");
	
	$.ajax({
		cache:false,
		url:"da/ticket/updateTicket.php",
		data:{ticketId:ticketId, eventId:eventId, officerId:officerId, ticketNumber:ticketNumber, ticketPrice:ticketPrice},
		success:function(result)
		{
			if(result=='Duplicate')
			{
				alert("Ticket exist");
				return;
			}
			if(result=='yes')
			{
				cancelTicket(ticketId);
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


function cancelTicket(ticketId)
{
	$.ajax({
		cache:false,
		url:"da/ticket/cancelTicket.php",
		data:{ticketId:ticketId},
		success:function(result)
		{
			if(result!='Error')
				$("#ticket_"+ticketId).html(result);
			else
				alert("Error");
		}
	});
}


function deleteTicket(ticketId)
{
	var deleteResult=confirm('Are you sure for Delete?');
	if(deleteResult==true)
	{
		$.ajax({
			cache:false,
			url:"da/ticket/deleteTicket.php",
			data:{ticketId:ticketId},
			success:function(result)
			{
				if(result=="yes")
				{
					$("#ticket_"+ticketId).html("");
				}
				else
				{
					alert("Error");
				}
				
			}
		});
	}
}



function loadEventSearch()
{
	$.ajax({
		cache:false,
		url:"da/ticket/loadEventSearch.php",
		data:{},
		success:function(result)
		{
			$("#loadEventSearch").html(result);
		}
	});
}


function loadOfficerSearch()
{
	
	
	$.ajax({
		cache:false,
		url:"da/ticket/loadOfficerSearch.php",
		data:{},
		success:function(result)
		{
			$("#loadOfficerSearch").html(result);
		}
	});
}


function searchTicket()
{
	if($("#ticketEventSearch").val()!='Select')	var eventId=$('#ticketEventSearch').val();
	else 	var eventId=0;
	
	if($("#ticketOfficerSearch").val()!='Select')  var officerId=$('#ticketOfficerSearch').val();
	else 	var officerId=0;
	
	var ticketNumber=$('#ticketNumberSearch').val();
	
	if(eventId==0 && officerId==0 && ticketNumber=="")
	{
		$("#ticketMessageSearch").css("color","#C00");
		$("#ticketMessageSearch").html("Enter one field");
		return;
	}
	
	$.ajax({
		cache:false,
		url:"da/ticket/searchTicket.php",
		data:{eventId:eventId, officerId:officerId, ticketNumber:ticketNumber},
		success:function(result)
		{
			$("#showTicket").html(result);
		}
	});
}