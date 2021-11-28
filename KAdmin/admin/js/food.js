function loadEvent()
{
	$.ajax({
		cache:false,
		url:"da/food/loadEvent.php",
		data:{},
		success:function(result)
		{
			$("#loadEvent").html(result);
		}
	});
}




function addFood()
{
	if($("#foodEvent").val()=='Select')
	{
		$("#foodMessage").css("color","#C00");
		$("#foodMessage").html("Select event");
		return;
	}
	
	var eventId=$('#foodEvent').val();
	
	var foodName=$("#foodName").val();
	if(foodName=="")
	{
		$("#foodMessage").css("color","#C00");
		$("#foodMessage").html("Enter food name");
		return;
	}
	
	var foodComment=$("#foodComment").val();
	
	
	$.ajax({
		cache:false,
		url:"da/food/addFood.php",
		data:{eventId:eventId, foodName:foodName, foodComment:foodComment},
		success:function(result)
		{
			if(result=='Duplicate')
			{
				$("#foodMessage").css("color","#C00");
				$("#foodMessage").html("Food name exist");
				return;
			}
			if(result=='yes')
			{
				$("#foodMessage").css("color","#0C0");
				$("#foodMessage").html("Successful");
				
				$("#foodEvent").val("Select");
				$("#foodName").val("");
				$("#foodComment").val("");
				
				showFood();
				return;
			}
			else
			{
				$("#foodMessage").css("color","#0C0");
				$("#foodMessage").html("Error");
				return;
			}
			
		}
	});
}

function showFood()
{
	$.ajax({
		cache:false,
		url:"da/food/showFood.php",
		data:{},
		success:function(result)
		{
			$("#showFood").html(result);
		}
	});
}


function editFood(foodId)
{
	$.ajax({
		cache:false,
		url:"da/food/editFood.php",
		data:{foodId:foodId},
		success:function(result)
		{
			$("#food_"+foodId).html(result);
		}
	});
}

function updateFood(foodId)
{
	var eventId=$("#foodEventUpdate_"+foodId).val();
	
	var foodName=$("#foodNameUpdate_"+foodId).val();
	if(foodName=="")
	{
		$("#foodNameUpdate_"+foodId).css("border-color","#C00");
		return;
	}
	
	var foodComment=$("#foodCommentUpdate_"+foodId).val();
	
	
	
	$.ajax({
		cache:false,
		url:"da/food/updateFood.php",
		data:{foodId:foodId, eventId:eventId, foodName:foodName, foodComment:foodComment},
		success:function(result)
		{
			if(result=='Duplicate')
			{
				alert("Food exist");
				return;
			}
			if(result=='yes')
			{
				cancelFood(foodId);
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


function cancelFood(foodId)
{
	$.ajax({
		cache:false,
		url:"da/food/cancelFood.php",
		data:{foodId:foodId},
		success:function(result)
		{
			if(result!='Error')
				$("#food_"+foodId).html(result);
			else
				alert("Error");
		}
	});
}


function deleteFood(foodId)
{
	var deleteResult=confirm('Are you sure for Delete?');
	if(deleteResult==true)
	{
		$.ajax({
			cache:false,
			url:"da/food/deleteFood.php",
			data:{foodId:foodId},
			success:function(result)
			{
				if(result=="yes")
				{
					$("#food_"+foodId).html("");
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
		url:"da/food/loadEventSearch.php",
		data:{},
		success:function(result)
		{
			$("#loadEventSearch").html(result);
		}
	});
}


function searchFood()
{
	var eventId=$("#foodEventSearch").val();
	if(eventId=='Select')
	{
		$("#foodMessageSearch").css("color","#C00");
		$("#foodMessageSearch").html("Enter event name");
		return;
	}

	
	$.ajax({
		cache:false,
		url:"da/food/searchFood.php",
		data:{eventId:eventId},
		success:function(result)
		{
			$("#showFood").html(result);
		}
	});
}