<!--
# PHP Developer #
name: 조재상
email: oralol@naver.com
blog: http://oralol.blog.me
-->
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=medium-dpi'/>
<title>Contact</title>
<link rel="stylesheet" href="style.css" type="text/css">
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.form.js"></script>
</head>
<body>

<table>
<tr>
<td valign="top">
<center><h1>Contact</h1></center></p>
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#888">
<form id="form1" name="form1" method="post">
<input type="hidden" name="mode" value="send">
<tr bgcolor="white"> 
<td width="25%" height="22" align="center" bgcolor="#FECBCB">Name </td>
<td width="75%"><input id="name" name="name" type="text" size="10" maxlength="40"> <font color='red'>*</font></td>
</tr>

<tr bgcolor="white"> 
<td height="22" align="center" bgcolor="#FECBCB">Phone </td>
<input name="hp2" type="text" size="4" maxlength="4">-
<input name="hp2" type="text" size="4" maxlength="4">-
<input name="hp3" type="text" size="4" maxlength="4"></td>
</tr>

<tr bgcolor="white"> 
<td height="22"  align="center" bgcolor="#FECBCB">e-mail </td>
<td><input name="email" type="text" style="width:200px" maxlength="100"> <font color='red'>*</font></td>
</tr>

<tr bgcolor="white"> 
<td height="22" align="center" bgcolor="#FECBCB">Area </td>
<td><input name="areaname" type="text"  style="width:200px" maxlength="100"> <font color='red'>*</font><br>
</td>
</tr>

<tr bgcolor="white"> 
<td height="22" align="center" bgcolor="#FECBCB">Question Type </td>
<td>
<input type="radio" name="questype" value="Product">Product
<input type="radio" name="questype" value="Store">Store
<input type="radio" name="questype" value="Others">Others  <font color='red'>*</font>
</td>
</tr>

<tr bgcolor="white"> 
<td height="22" align="center" bgcolor="#FECBCB">File Attachment </td>
<td>#1 <input type="file" name="userfile1" value="file1" style="width:200px;"><br>
#2 <input type="file" name="userfile2" value="file2" style="width:200px;"><br>
#3 <input type="file" name="userfile3" value="file3" style="width:200px;">
</td>
</tr>

<tr bgcolor="white"> 
<td height="22" align="center" bgcolor="#FECBCB">Comment</td>
<td><textarea name="content" cols="70" rows="12" style="width:100%;"></textarea></td>
</tr>
</table>
<p align="center">
<input type="button" id="submit" class="btn_red" value=" send " onclick="form_Check();" style="cursor:hand;"> <span id="result"></span>
</p>
</td>
</tr>
</table>
<p>
<font color="red">

</form>
</body>
</html>

<script>
$("#name").focus(function() {
	$('#result').html("");
	$('#submit').show();
});

function form_Check(){
	if(form1.name.value == ''){
		alert("Input Name");
		form1.name.focus();
		return;
	}
	if(form1.hp1.value == ''){
		alert("Input Phone Number");
		form1.hp1.focus();
		return;
	}
	if(form1.hp2.value == ''){
		alert("Input Phone Number");
		form1.hp2.focus();
		return;
	}
	if(form1.hp3.value == ''){
		alert("Input Phone Number");
		form1.hp3.focus();
		return;
	}
	if(form1.email.value == ''){
		alert("Input E-mail");
		form1.email.focus();
		return;
	}
	if(form1.areaname.value == ''){
		alert("Input Area");
		form1.areaname.focus();
		return;
	}
	if(form1.questype[0].checked == false && form1.questype[1].checked == false && form1.questype[2].checked == false){
		alert("Input Question");
		form1.questype[0].focus();
		return;
	}
	if(!confirm('Send E-mail?')) return;
	//form1.submit();

	//Ajax Send Start
	$('#submit').hide();
	$('#result').html("<img src='indicator.gif' align='absmiddle'> <font color='blue'>Sending. Please Wait...</font>");
	var form = $("form")[0];
	var formData = new FormData(form);
	$.ajax({
		url: "form_send.php",
		processData: false,
		contentType: false,
		data: formData,
		type: "POST",
		cache: false,
		success: function(args) {
			$('#result').html(args);
			$('#form1').trigger("reset");
			//$('#submit').show();
		},
		error: function(args) {
			$('#result').html("<font color='red'>Form Mail Failed</font>");
			$('#form1').trigger("reset");
			//$('#submit').show();
		},
	})
	//Ajax Sent.
}

</script>