function loadEvent()
{
	$.ajax({
		cache:false,
		url:"da/table/loadEvent.php",
		data:{},
		success:function(result)
		{
			$("#loadEvent").html(result);
		}
	});
}




function addTable()
{
	if($("#tableEvent").val()=='Select')
	{
		$("#tableMessage").css("color","#C00");
		$("#tableMessage").html("Select event");
		return;
	}
	
	var eventId=$('#tableEvent').val();
	
	var tableName=$("#tableName").val();
	if(tableName=="")
	{
		$("#tableMessage").css("color","#C00");
		$("#tableMessage").html("Enter table name");
		return;
	}
	
	
	$.ajax({
		cache:false,
		url:"da/table/addTable.php",
		data:{eventId:eventId, tableName:tableName},
		success:function(result)
		{
			if(result=='Duplicate')
			{
				$("#tableMessage").css("color","#C00");
				$("#tableMessage").html("Table name exist");
				return;
			}
			if(result=='yes')
			{
				$("#tableMessage").css("color","#0C0");
				$("#tableMessage").html("Successful");
				
				$("#tableEvent").val("Select");
				$("#tableName").val("");
				
				showTable();
				return;
			}
			else
			{
				$("#tableMessage").css("color","#0C0");
				$("#tableMessage").html("Error");
				return;
			}
			
		}
	});
}

function showTable()
{
	$.ajax({
		cache:false,
		url:"da/table/showTable.php",
		data:{},
		success:function(result)
		{
			$("#showTable").html(result);
		}
	});
}


function editTable(tableId)
{
	$.ajax({
		cache:false,
		url:"da/table/editTable.php",
		data:{tableId:tableId},
		success:function(result)
		{
			$("#table_"+tableId).html(result);
		}
	});
}

function updateTable(tableId)
{
	var eventId=$("#tableEventUpdate_"+tableId).val();
	
	var tableName=$("#tableNameUpdate_"+tableId).val();
	if(tableName=="")
	{
		$("#tableNameUpdate_"+tableId).css("border-color","#C00");
		return;
	}
	
	$.ajax({
		cache:false,
		url:"da/table/updateTable.php",
		data:{tableId:tableId, eventId:eventId, tableName:tableName},
		success:function(result)
		{
			if(result=='Duplicate')
			{
				alert("Table exist");
				return;
			}
			if(result=='yes')
			{
				cancelTable(tableId);
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


function cancelTable(tableId)
{
	$.ajax({
		cache:false,
		url:"da/table/cancelTable.php",
		data:{tableId:tableId},
		success:function(result)
		{
			if(result!='Error')
				$("#table_"+tableId).html(result);
			else
				alert("Error");
		}
	});
}


function deleteTable(tableId)
{
	var deleteResult=confirm('Are you sure for Delete?');
	if(deleteResult==true)
	{
		$.ajax({
			cache:false,
			url:"da/table/deleteTable.php",
			data:{tableId:tableId},
			success:function(result)
			{
				if(result=="yes")
				{
					$("#table_"+tableId).html("");
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
		url:"da/table/loadEventSearch.php",
		data:{},
		success:function(result)
		{
			$("#loadEventSearch").html(result);
		}
	});
}

function searchTable()
{
	if($("#tableEventSearch").val()!='Select')	var eventId=$('#tableEventSearch').val();
	else 	var eventId=0;
	
	var tableName=$('#tableNameSearch').val();
	
	if(eventId==0  && tableName=="")
	{
		$("#tableMessageSearch").css("color","#C00");
		$("#tableMessageSearch").html("Enter one field");
		return;
	}
	
	$.ajax({
		cache:false,
		url:"da/table/searchTable.php",
		data:{eventId:eventId, tableName:tableName},
		success:function(result)
		{
			$("#showTable").html(result);
		}
	});
}