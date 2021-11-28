function addOfficer()
{
	var officerFirstName=$("#officerFirstName").val();
	if(officerFirstName=='')
	{
		$("#officerMessage").css("color","#C00");
		$("#officerMessage").html("Enter First Name");
		return;
	}
	
	var officerLastName=$("#officerLastName").val();
	if(officerLastName=='')
	{
		$("#officerMessage").css("color","#C00");
		$("#officerMessage").html("Enter Last Name");
		return;
	}
	
	var officerCellphone=$("#officerCellphone").val();
	
	var officerComment=$("#officerComment").val();
	
	$.ajax({
		cache:false,
		url:"da/officer/addOfficer.php",
		data:{officerFirstName:officerFirstName, officerLastName:officerLastName, officerCellphone:officerCellphone, officerComment:officerComment},
		success:function(result)
		{
			if(result=='Duplicate')
			{
				$("#officerMessage").css("color","#C00");
				$("#officerMessage").html("Officer exist");
				return;
			}
			if(result=='yes')
			{
				$("#officerMessage").css("color","#0C0");
				$("#officerMessage").html("Successful");
				
				$("#officerFirstName").val("");
				$("#officerLastName").val("");
				$("#officerCellphone").val("");
				$("#officerComment").val("");
				
				showOfficer();
				return;
			}
			else
			{
				$("#officerMessage").css("color","#0C0");
				$("#officerMessage").html("Error");
				return;
			}
			
		}
	});
}


function showOfficer()
{
	$.ajax({
		cache:false,
		url:"da/officer/showOfficer.php",
		data:{},
		success:function(result)
		{
			$("#showOfficer").html(result);
		}
	});
}


function editOfficer(officerId)
{
	$.ajax({
		cache:false,
		url:"da/officer/editOfficer.php",
		data:{officerId:officerId},
		success:function(result)
		{
			$("#officer_"+officerId).html(result);
		}
	});
}



function updateOfficer(officerId)
{
	var officerFirstName=$("#officerFirstNameUpdate_"+officerId).val();
	if(officerFirstName=='')
	{
		$("#officerFirstNameUpdate_"+officerId).css("border-color","#C00");
		return;
	}
	$("#officerFirstNameUpdate_"+officerId).css("border-color","#ccc");
	
	var officerLastName=$("#officerLastNameUpdate_"+officerId).val();
	if(officerLastName=='')
	{
		$("#officerLastNameUpdate_"+officerId).css("border-color","#C00");
		return;
	}
	$("#officerLastNameUpdate_"+officerId).css("border-color","#ccc");
	
	var officerCellphone=$("#officerCellphoneUpdate_"+officerId).val();
	var officerComment=$("#officerCommentUpdate_"+officerId).val();
	
	
	$.ajax({
		cache:false,
		url:"da/officer/updateOfficer.php",
		data:{officerId:officerId, officerFirstName:officerFirstName, officerLastName:officerLastName, officerCellphone:officerCellphone, officerComment:officerComment},
		success:function(result)
		{
			if(result=='Duplicate')
			{
				alert("Officer exist");
				return;
			}
			if(result=='yes')
			{
				cancelOfficer(officerId);
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

function cancelOfficer(officerId)
{
	$.ajax({
		cache:false,
		url:"da/officer/cancelOfficer.php",
		data:{officerId:officerId},
		success:function(result)
		{
			if(result!='Error')
				$("#officer_"+officerId).html(result);
			else
				alert("Error");
			
		}
	});
}


function deleteOfficer(officerId)
{
	var deleteResult=confirm('Are you sure for Delete?');
	if(deleteResult==true)
	{
		$.ajax({
			cache:false,
			url:"da/officer/deleteOfficer.php",
			data:{officerId:officerId},
			success:function(result)
			{
				if(result=="yes")
				{
					$("#officer_"+officerId).html("");
				}
				else
				{
					alert("Error");
				}
				
			}
		});
	}
}

function searchOfficer()
{
	var officerInfo=$("#officerInfoSearch").val();
	if(officerInfo=="")
	{
		$("#officerMessageSearch").css("color","#C00");
		$("#officerMessageSearch").html("Enter field");
		return;
	}
	
	$.ajax({
		cache:false,
		url:"da/officer/searchOfficer.php",
		data:{officerInfo:officerInfo},
		success:function(result)
		{
			$("#showOfficer").html(result);
		}
	});
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