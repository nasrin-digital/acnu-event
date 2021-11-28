function loadEvent()
{
	$.ajax({
		cache:false,
		url:"da/guest/loadEvent.php",
		data:{},
		success:function(result)
		{
			$("#loadEvent").html(result);
			loadOfficer();
			loadTable();
			loadFood();
		}
	});
}

function loadOfficer()
{
	$.ajax({
		cache:false,
		url:"da/guest/loadOfficer.php",
		data:{},
		success:function(result)
		{
			$("#loadOfficer").html(result);
			loadTicket();
		}
	});
}

function loadTicket()
{
	if($("#guestEvent").val()=='Select')
	{
		$("#loadTicket").html('<select id="guestTicket" class="form-control"><option>Select</option></select>');
		return;
	}
	var eventId=$('#guestEvent').val();
	
	
	if($("#guestOfficer").val()=='Select')	var officerId=0;
	else var officerId=$('#guestOfficer').val();
	
	
	$.ajax({
		cache:false,
		url:"da/guest/loadTicket.php",
		data:{eventId:eventId, officerId:officerId},
		success:function(result)
		{
			$("#loadTicket").html(result);
		}
	});
}

function loadTable()
{
	if($("#guestEvent").val()=='Select')
	{
		$("#loadTable").html('<select id="guestTable" class="form-control"><option>Select</option></select>');
		loadSeat();
		return;
	}
	var eventId=$('#guestEvent').val();
	
	$.ajax({
		cache:false,
		url:"da/guest/loadTable.php",
		data:{eventId:eventId},
		success:function(result)
		{
			$("#loadTable").html(result);
			loadSeat();
		}
	});
}



function loadSeat()
{
	if($("#guestTable").val()=='Select')
	{
		$("#loadSeat").html('<select id="guestSeat" class="form-control"><option>Select</option></select>');
		return;
	}
	var tableId=$('#guestTable').val();
	
	$.ajax({
		cache:false,
		url:"da/guest/loadSeat.php",
		data:{tableId:tableId},
		success:function(result)
		{
			$("#loadSeat").html(result);
		}
	});
}


function loadFood()
{
	if($("#guestEvent").val()=='Select')
	{
		$("#loadFood").html('<select id="guestTable" class="form-control"><option>Select</option></select>');
		return;
	}
	var eventId=$('#guestEvent').val();
	
	$.ajax({
		cache:false,
		url:"da/guest/loadFood.php",
		data:{eventId:eventId},
		success:function(result)
		{
			$("#loadFood").html(result);
		}
	});
}



function addGuest()
{
	if($("#guestEvent").val()=='Select')
	{
		$("#guestMessage").css("color","#C00");
		$("#guestMessage").html("Select event");
		return;
	}
	
	var eventId=$('#guestEvent').val();
	
	if($("#guestOfficer").val()=='Select')	var officerId=0;
	else	var officerId=$('#guestOfficer').val(); 
	
	if($("#guestTicket").val()=='Select')
	{
		$("#guestMessage").css("color","#C00");
		$("#guestMessage").html("Select ticket");
		return;
	}
	var ticketId=$('#guestTicket').val();
	
	if($("#guestTable").val()=='Select')
	{
		$("#guestMessage").css("color","#C00");
		$("#guestMessage").html("Select table");
		return;
	}
	var tableId=$('#guestTable').val();
	
	if($("#guestSeat").val()=='Select')
	{
		$("#guestMessage").css("color","#C00");
		$("#guestMessage").html("Select seat");
		return;
	}
	var seatId=$('#guestSeat').val();
	
	if($("#guestFood").val()=='Select')
	{
		$("#guestMessage").css("color","#C00");
		$("#guestMessage").html("Select food");
		return;
	}
	var foodId=$('#guestFood').val();
	
	if($("#guestDishSize").val()=='Select')
	{
		$("#guestMessage").css("color","#C00");
		$("#guestMessage").html("Select dish size");
		return;
	}
	var guestDishSize=$('#guestDishSize').val();
	
	var guestFirstName=$("#guestFirstName").val();
	if(guestFirstName=="")
	{
		$("#guestMessage").css("color","#C00");
		$("#guestMessage").html("Enter guest first name");
		return;
	}
	
	var guestLastName=$("#guestLastName").val();
	if(guestLastName=="")
	{
		$("#guestMessage").css("color","#C00");
		$("#guestMessage").html("Enter guest last name");
		return;
	}
	
	var guestCellphone=$("#guestCellphone").val();
	if($("#guestPayment").val()=='Select')
	{
		$("#guestMessage").css("color","#C00");
		$("#guestMessage").html("Select payment");
		return;
	}
	
	var guestPayment=$('#guestPayment').val();
	
	var guestComment=$('#guestComment').val();
	
	$.ajax({
		cache:false,
		url:"da/guest/addGuest.php",
		data:{eventId:eventId, officerId:officerId, ticketId:ticketId, tableId:tableId, seatId:seatId, foodId:foodId, guestDishSize:guestDishSize, guestFirstName:guestFirstName, guestLastName:guestLastName, guestCellphone:guestCellphone, guestPayment:guestPayment, guestComment:guestComment},
		success:function(result)
		{
			if(result=='Duplicate')
			{
				$("#guestMessage").css("color","#C00");
				$("#guestMessage").html("Guest name exist");
				return;
			}
			if(result=='yes')
			{
				$("#guestMessage").css("color","#0C0");
				$("#guestMessage").html("Successful");
				
				//$("#guestEvent").val("Select");
				//$("#guestTable").val("Select");
				
				
				showGuest();
				return;
			}
			else
			{
				$("#seatMessage").css("color","#0C0");
				$("#seatMessage").html("Error");
				return;
			}
			
		}
	});
}


function showGuest()
{
	$.ajax({
		cache:false,
		url:"da/guest/showGuest.php",
		data:{},
		success:function(result)
		{
			$("#showGuest").html(result);
		}
	});
}


function loadEventUpdate(eventId)
{
	$.ajax({
		cache:false,
		url:"da/guest/loadEventUpdate.php",
		data:{eventId:eventId},
		success:function(result)
		{
			$("#loadEvent").html(result);
		}
	});
}

function loadOfficerUpdate(officerId)
{
	$.ajax({
		cache:false,
		url:"da/guest/loadOfficerUpdate.php",
		data:{officerId:officerId},
		success:function(result)
		{
			$("#loadOfficer").html(result);
		}
	});
}

function loadTicketUpdate(eventId, officerId, ticketId)
{	
	$.ajax({
		cache:false,
		url:"da/guest/loadTicketUpdate.php",
		data:{eventId:eventId, officerId:officerId, ticketId:ticketId},
		success:function(result)
		{
			$("#loadTicket").html(result);
		}
	});
}

function loadTableUpdate(eventId, tableId)
{
	
	$.ajax({
		cache:false,
		url:"da/guest/loadTableUpdate.php",
		data:{eventId:eventId, tableId:tableId},
		success:function(result)
		{
			$("#loadTable").html(result);
		}
	});
}



function loadSeatUpdate(tableId, seatId)
{
	
	$.ajax({
		cache:false,
		url:"da/guest/loadSeatUpdate.php",
		data:{tableId:tableId, seatId:seatId},
		success:function(result)
		{
			$("#loadSeat").html(result);
		}
	});
}


function loadFoodUpdate(eventId, foodId)
{
	
	$.ajax({
		cache:false,
		url:"da/guest/loadFoodUpdate.php",
		data:{eventId:eventId, foodId:foodId},
		success:function(result)
		{
			$("#loadFood").html(result);
		}
	});
}

function editGuest()
{
	var getUrl=document.URL;
	var brUrl=getUrl.split('=');
	if(!brUrl[1])
	{
		window.location='guest.html';
		return;
	}
	if(/#/.test(brUrl[1]) == false) 
	{
		var guestId=brUrl[1];
    	
	}
	else
	{
		var brUrlSplit=brUrl[1].split('#');
		var guestId=brUrlSplit[0];
	}
	
	$.ajax({
		cache:false,
		url:"da/guest/editGuest.php",
		data:{guestId:guestId},
		success:function(result)
		{
			if(result=='Error')
			{
				window.location='guest.html';
				return;
			}
			else
			{
				var resultExp=result.split('/*Kasandan*/');
				var eventId=resultExp[0];
				var officerId=resultExp[1];
				var ticketId=resultExp[2];
				var tableId=resultExp[3];
				var seatId=resultExp[4];
				var foodId=resultExp[5];
				var guestDishSize=resultExp[6];
				var guestFirstName=resultExp[7];
				var guestLastName=resultExp[8];
				var guestCellphone=resultExp[9];
				var guestPayment=resultExp[10];
				var guestComment=resultExp[11];
				
				loadEventUpdate(eventId);
				loadOfficerUpdate(officerId);
				loadTicketUpdate(eventId, officerId, ticketId);
				loadTableUpdate(eventId, tableId);
				loadSeatUpdate(tableId, seatId);
				loadFoodUpdate(eventId, foodId);
				$("#guestDishSize").val(guestDishSize);
				$("#guestFirstName").val(guestFirstName);
				$("#guestLastName").val(guestLastName);
				$("#guestCellphone").val(guestCellphone);
				$("#guestPayment").val(guestPayment);
				$("#guestComment").val(guestComment);
				
			}
		}
	});
}



function updateGuest()
{
	var getUrl=document.URL;
	var brUrl=getUrl.split('=');
	if(!brUrl[1])
	{
		window.location='guest.html';
		return;
	}
	if(/#/.test(brUrl[1]) == false) 
	{
		var guestId=brUrl[1];
    	
	}
	else
	{
		var brUrlSplit=brUrl[1].split('#');
		var guestId=brUrlSplit[0];
	}
	
	
	if($("#guestEvent").val()=='Select')
	{
		$("#guestMessage").css("color","#C00");
		$("#guestMessage").html("Select event");
		return;
	}
	
	var eventId=$('#guestEvent').val();
	
	if($("#guestOfficer").val()=='Select')	var officerId=0;
	else	var officerId=$('#guestOfficer').val();  //
	
	if($("#guestTicket").val()=='Select')
	{
		$("#guestMessage").css("color","#C00");
		$("#guestMessage").html("Select ticket");
		return;
	}
	var ticketId=$('#guestTicket').val();
	
	if($("#guestTable").val()=='Select')
	{
		$("#guestMessage").css("color","#C00");
		$("#guestMessage").html("Select table");
		return;
	}
	var tableId=$('#guestTable').val();
	
	if($("#guestSeat").val()=='Select')
	{
		$("#guestMessage").css("color","#C00");
		$("#guestMessage").html("Select seat");
		return;
	}
	var seatId=$('#guestSeat').val();
	
	if($("#guestFood").val()=='Select')
	{
		$("#guestMessage").css("color","#C00");
		$("#guestMessage").html("Select food");
		return;
	}
	var foodId=$('#guestFood').val();
	
	if($("#guestDishSize").val()=='Select')
	{
		$("#guestMessage").css("color","#C00");
		$("#guestMessage").html("Select dish size");
		return;
	}
	var guestDishSize=$('#guestDishSize').val();
	
	var guestFirstName=$("#guestFirstName").val();
	if(guestFirstName=="")
	{
		$("#guestMessage").css("color","#C00");
		$("#guestMessage").html("Enter guest first name");
		return;
	}
	
	var guestLastName=$("#guestLastName").val();
	if(guestLastName=="")
	{
		$("#guestMessage").css("color","#C00");
		$("#guestMessage").html("Enter guest last name");
		return;
	}
	
	var guestCellphone=$("#guestCellphone").val();
	if($("#guestPayment").val()=='Select')
	{
		$("#guestMessage").css("color","#C00");
		$("#guestMessage").html("Select payment");
		return;
	}
	
	var guestPayment=$('#guestPayment').val();
	
	var guestComment=$('#guestComment').val();
	
	$.ajax({
		cache:false,
		url:"da/guest/updateGuest.php",
		data:{guestId:guestId, eventId:eventId, officerId:officerId, ticketId:ticketId, tableId:tableId, seatId:seatId, foodId:foodId, guestDishSize:guestDishSize, guestFirstName:guestFirstName, guestLastName:guestLastName, guestCellphone:guestCellphone, guestPayment:guestPayment, guestComment:guestComment},
		success:function(result)
		{
			if(result=='Duplicate')
			{
				$("#guestMessage").css("color","#C00");
				$("#guestMessage").html("Guest name exist");
				return;
			}
			if(result=='yes')
			{
				$("#guestMessage").css("color","#0C0");
				$("#guestMessage").html("Successful");
				return;
			}
			else
			{
				$("#seatMessage").css("color","#0C0");
				$("#seatMessage").html("Error");
				return;
			}
			
		}
	});
}


function updateCheckIn(guestId)
{
	if($('#guestCheckIn_'+guestId).is(":checked"))
	{
		var guestCheckIn=1;
		$("#guest_"+guestId).css("background-color","#cff0c0");
	}
	else
	{
		var guestCheckIn=0; 
		$("#guest_"+guestId).css("background-color","#fff");
	}
	
	$.ajax({
		cache:false,
		url:"da/guest/updateCheckIn.php",
		data:{guestId:guestId, guestCheckIn:guestCheckIn},
		success:function(result)
		{
		}
	});
}

function updateRaffle(guestId)
{
	if($('#guestRaffle_'+guestId).is(":checked"))	var guestRaffle=1;
	else	var guestRaffle=0; 
	
	$.ajax({
		cache:false,
		url:"da/guest/updateRaffle.php",
		data:{guestId:guestId, guestRaffle:guestRaffle},
		success:function(result)
		{
		}
	});
}

function deleteGuest(guestId)
{
	var deleteResult=confirm('Are you sure for Delete?');
	if(deleteResult==true)
	{
		$.ajax({
			cache:false,
			url:"da/guest/deleteGuest.php",
			data:{guestId:guestId},
			success:function(result)
			{
				if(result=="yes")
				{
					$("#guest_"+guestId).html("");
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
		url:"da/guest/loadEventSearch.php",
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
		url:"da/guest/loadOfficerSearch.php",
		data:{},
		success:function(result)
		{
			$("#loadOfficerSearch").html(result);
		}
	});
}


function searchGuest()
{
	if($("#guestEventSearch").val()!='Select')	var eventId=$('#guestEventSearch').val();
	else 	var eventId=0;
	
	if($("#guestOfficerSearch").val()!='Select')  var officerId=$('#guestOfficerSearch').val();
	else 	var officerId=0;
	
	if($("#guestPaymentSearch").val()!='Select')  var officerId=$('#guestPaymentSearch').val();
	else 	var guestPayment=0;
	
	var guestInfo=$('#guestInfoSearch').val();
	
	if(eventId==0 && officerId==0 && guestPayment==0 && guestInfo=="")
	{
		$("#guestMessageSearch").css("color","#C00");
		$("#guestMessageSearch").html("Enter one field");
		return;
	}
	
	
	$.ajax({
		cache:false,
		url:"da/guest/searchGuest.php",
		data:{eventId:eventId, officerId:officerId, guestPayment:guestPayment, guestInfo:guestInfo},
		success:function(result)
		{
			$("#showGuest").html(result);
		}
	});
	
}



