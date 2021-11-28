function loadEvent()
{
	$.ajax({
		cache:false,
		url:"da/seat/loadEvent.php",
		data:{},
		success:function(result)
		{
			$("#loadEvent").html(result);
			loadTable();
		}
	});
}


function loadTable()
{
	if($("#seatEvent").val()=='Select')
	{
		$("#loadTable").html('<select id="seatTable" class="form-control"><option>Select</option></select>');
		return;
	}
	
	var eventId=$('#seatEvent').val();
	
	$.ajax({
		cache:false,
		url:"da/seat/loadTable.php",
		data:{eventId:eventId},
		success:function(result)
		{
			$("#loadTable").html(result);
		}
	});
}

function loadTableUpdate(seatId)
{
	if($("#seatEventUpdate_"+seatId).val()=='Select')
	{
		$("#loadTableUpdate_"+seatId).html('<select id="seatEventUpdate_'+seatId+' class="form-control"><option>Select</option></select>');
		return;
	}
	
	var eventId=$("#seatEventUpdate_"+seatId).val();
	
	$.ajax({
		cache:false,
		url:"da/seat/loadTableUpdate.php",
		data:{eventId:eventId, seatId:seatId},
		success:function(result)
		{
			$("#loadTableUpdate_"+seatId).html(result);
			$("#seatTableUpdate_"+seatId).css("border-color","#CCC");
		}
	});
}


function addSeat()
{
	if($("#seatEvent").val()=='Select')
	{
		$("#seatMessage").css("color","#C00");
		$("#seatMessage").html("Select event");
		return;
	}
	
	var eventId=$('#seatEvent').val();
	
	if($("#seatTable").val()=='Select')
	{
		$("#seatMessage").css("color","#C00");
		$("#seatMessage").html("Select table");
		return;
	}
	
	var tableId=$('#seatTable').val();
	
	var seatName=$("#seatName").val();
	if(seatName=="")
	{
		$("#seatMessage").css("color","#C00");
		$("#seatMessage").html("Enter seat name");
		return;
	}
	
	
	$.ajax({
		cache:false,
		url:"da/seat/addSeat.php",
		data:{eventId:eventId, tableId:tableId, seatName:seatName},
		success:function(result)
		{
			if(result=='Duplicate')
			{
				$("#seatMessage").css("color","#C00");
				$("#seatMessage").html("Seat name exist");
				return;
			}
			if(result=='yes')
			{
				$("#seatMessage").css("color","#0C0");
				$("#seatMessage").html("Successful");
				
				$("#seatEvent").val("Select");
				$("#seatTable").val("Select");
				$("#seatName").val("");
				
				showSeat();
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

function showSeat()
{
	$.ajax({
		cache:false,
		url:"da/seat/showSeat.php",
		data:{},
		success:function(result)
		{
			$("#showSeat").html(result);
		}
	});
}


function editSeat(seatId)
{
	$.ajax({
		cache:false,
		url:"da/seat/editSeat.php",
		data:{seatId:seatId},
		success:function(result)
		{
			$("#seat_"+seatId).html(result);
		}
	});
}

function updateSeat(seatId)
{
	var eventId=$("#seatEventUpdate_"+seatId).val();
	
	if($("#seatTableUpdate_"+seatId).val()=='Select')
	{
		$("#seatTableUpdate_"+seatId).css("border-color","#C00");
		return;
	}
	$("#seatTableUpdate_"+seatId).css("border-color","#CCC");
	
	var tableId=$("#seatTableUpdate_"+seatId).val();
	
	var seatName=$("#seatNameUpdate_"+seatId).val();
	if(seatName=="")
	{
		$("#seatNameUpdate_"+seatId).css("border-color","#C00");
		return;
	}
	$("#seatNameUpdate_"+seatId).css("border-color","#CCC");
	
	$.ajax({
		cache:false,
		url:"da/seat/updateSeat.php",
		data:{seatId:seatId, eventId:eventId, tableId:tableId, seatName:seatName},
		success:function(result)
		{
			if(result=='Duplicate')
			{
				alert("Seat exist");
				return;
			}
			if(result=='yes')
			{
				cancelSeat(seatId);
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


function cancelSeat(seatId)
{
	$.ajax({
		cache:false,
		url:"da/seat/cancelSeat.php",
		data:{seatId:seatId},
		success:function(result)
		{
			if(result!='Error')
				$("#seat_"+seatId).html(result);
			else
				alert("Error");
		}
	});
}


function deleteSeat(seatId)
{
	var deleteResult=confirm('Are you sure for Delete?');
	if(deleteResult==true)
	{
		$.ajax({
			cache:false,
			url:"da/seat/deleteSeat.php",
			data:{seatId:seatId},
			success:function(result)
			{
				if(result=="yes")
				{
					$("#seat_"+seatId).html("");
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
		url:"da/seat/loadEventSearch.php",
		data:{},
		success:function(result)
		{
			$("#loadEventSearch").html(result);
			loadTableSearch();
		}
	});
}

function loadTableSearch()
{
	if($("#seatEventSearch").val()=='Select')
	{
		$("#loadTableSearch").html('<select id="seatTableSearch" class="form-control"><option>Select</option></select>');
		return;
	}
	
	var eventId=$('#seatEventSearch').val();
	
	
	$.ajax({
		cache:false,
		url:"da/seat/loadTableSearch.php",
		data:{eventId:eventId},
		success:function(result)
		{
			$("#loadTableSearch").html(result);
		}
	});
}

function searchSeat()
{
	if($("#seatEventSearch").val()!='Select')	var eventId=$('#seatEventSearch').val();
	else 	var eventId=0;
	
	if($("#seatTableSearch").val()!='Select')  var tableId=$('#seatTableSearch').val();
	else 	var tableId=0;

	var seatName=$("#seatNameSearch").val();
	
	
	if(eventId==0 && tableId==0  && seatName=="")
	{
		$("#seatMessageSearch").css("color","#C00");
		$("#seatMessageSearch").html("Enter one field");
		return;
	}
	
	
	
	$.ajax({
		cache:false,
		url:"da/seat/searchSeat.php",
		data:{eventId:eventId, tableId:tableId, seatName:seatName},
		success:function(result)
		{
			$("#showSeat").html(result);
		}
	});
}