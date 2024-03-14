<html>
	<head>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('admin/config/configure.php');

$school_info="SELECT * FROM ".PREFIX."school_info";
$info_school=mysqli_query($conn,$school_info);
while($info=mysqli_fetch_assoc($info_school)){
	$school_data=$info;
}
?>
	<meta name="viewport" content="width=device-width" />
	<meta name="robots" content="noindex,nofollow">
<link rel="stylesheet" href="admin/css/bootstrap.css">

<style>
html {
height: 100%;
}
body {
 background: url('../../../f/img/<?php echo $schoolInfo['background_pic']; ?>');
  background-size: 100% 100%;
  background-repeat: no-repeat;
  background-position: center center;
  position: fixed;
  width: 100%;
} 

.input-group-addon{color: #00c2df;background-color: #fff;border: 1px solid #00c1df;}
.form-control{border: 1px solid #00c1df !important;}

@media screen and (min-width: 480px) {
  .loginform{margin-top: 40%;}
 
}
@media screen and (min-width: 1000px) {
  .loginform{margin-top: 8%;}
  input[type=radio] + label>img {
  border: 1px dashed #444;
  border-radius: 50%;
  width: 50px;
  height: 50px;
  transition: 500ms all;
}
}

.schoolname{height:63px;}
@media(max-width: 750px){
	.loginform{margin-top: 8%;}
h1{font-size: 17px;}
.schoolname{height:42px;}
.mainform{margin-top:10%;}
}
.footer {
  position: fixed;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 35px;
 border-top: solid 2px #e7e7e7;
   background-color: #f8f8f8; 
}
.footer > .container {
  padding-right: 15px;
  padding-left: 15px;
   border-color: #e7e7e7;
}
#login{background: linear-gradient(90deg, #00aee0 0%, #00fedc 100%);
    color: #000;}
	.alert {
    padding: 6px;
    margin-bottom: 7px;
    margin-top: 7px;
	}
	@font-face {
  font-family: Algerian;
  src: url(admin/fonts/Algerian.ttf);
}
	h1{ font-family: Algerian;margin-top: 10px;
    margin-bottom: 10px;letter-spacing: 2px;}
</style>
	</head>
	
<body>
<div style="height:100%;">

<div class="row" style="background-image: url(https://dsisfbd.accevate.com/f/img/images.jpg);margin:0px;">
	<div class="col-md-12 schoolname" >
		<!--<img src="<?php echo BASEURL.LOGO_PATH; ?>" class="hidden-xs" style="width: 200px;margin-left: 2%;position: absolute;filter: drop-shadow(2px 3px 7px #115f8f);">-->
		<center><h1 style="font-family: Baskerville Old Face;color:#fff; font-size:52px"><?php echo $school_data['school_name']; ?></h1></center>
	</div>	
</div>
<div class="container">
<div class="row" valign="middle">
<div class="col-md-4 col-md-offset-4 col-xs-12 loginform" >
	<div class="col-md-10 col-xs-10 col-xs-offset-1" style="border: 2px solid #00b0e0;background: #ffffffb3;border-radius:10px;box-shadow: 0px 0px 70px 14px rgb(0, 0, 0);">	
	<div class="col-md-12">
	<center><img src="../../../f/img/<?php echo $schoolInfo['school_logo'];?>" class="hidden-xs" style="width: 40%;margin-top: 0%;"></center>
	</div>
	<br>
	<br>
	<br>
		<span  id="errorMessage" style="color:#FF0000; font-weight:bold"></span> 
		<div class="col-md-12 input-group">
		  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		  <input type="text" class="form-control" name="login" id="username" placeholder="User Name" autocomplete="off">
		</div>
		<br>
		<div class="col-md-12 input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		  <input type="password" class="form-control" name="password" id="password" placeholder="Password" onblur="hidePassword()" onfocus="showPassword()"  autocomplete="off">
		  <span class="glyphicon glyphicon-eye-open input-group-addon toggle-password" toggle="#password" style="top: 0px;background-color: #fff;border:1px solid #00c1df;border-left: none;"></span>
		</div>
		<br>
		<div class="col-md-12 col-xs-12 input-group">
			<!--<select class="form-control" id="school_ses" style="border-radius: 4px;width:100%">				
					<option value="2020-2021" selected >2020-2021</option>
			</select>--->
                    <select  class="form-control" id="school_ses" name="school_ses" style="border-radius: 4px;width:100%">
				<?php
				  $n=1;
				  $sql="SELECT * FROM ".PREFIX."session  where status=1 and session != '2021-2022' and session != '2022-2023'";
				  $result=mysqli_query($sql);
				  while($rows=mysqli_fetch_array($result)){
				?>  
				<option value="<?php echo $rows['session']; ?>" <?php if($rows['session']=='2023-2024') {echo "selected";} ?>><?php echo $rows['session']; ?></option>
				<?php
				  }
				// $y = date('Y');
				// if(date('m')<=3){
				// 	$cu_session = ($y).'-'.($y+1);
				// }else{
				// 	$cu_session =  $y.'-'.($y+1);
				// }
				?>
				<!-- <option value="<?php echo $cu_session; ?>" selected><?php echo $cu_session; ?></option> -->
			</select>
		</div>	

		<br>
		<center style="background: #ffffffbd;">
		<input type="radio" name="emotion" id="sad" class="input-hidden" value="STUDENT" />
		<label for="sad" style="color:brown;font-size: 15px;" title="STUDENT"><b>STUDENT</b></label>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="radio" name="emotion" id="happy" class="input-hidden" value="TEACHER"/>
		<label for="happy" style="color:brown;font-size: 15px;" title="TEACHER"><b>TEACHER</b></label>
		</center>
		<span id='error' style="font-size: 12px;font-weight: bold;"><br></span>
		<div class="col-md-12">		
		  <center><input type="submit" style="width: 70%;" name="Submit" id="login" value="SIGN IN" class="btn btn-info">
		  </center>
		</div>
		<br><br>
		<center><p style="color: red;"><b>Forgot Password?</b></p></center>
		<center><p style="color: red;"><b>Contact Us</b></p></center>
	
	<div class="col-xs-6 col-md-6">
		<center><a href="https://play.google.com/store/apps/details?id=com.accevate" target="_blank"><img src="admin/img/play.png" style="width: 100%;"/></a></center>
	</div>
	<div class="col-xs-6 col-md-6">
		<center><a href="https://apps.apple.com/in/app/accevate-accretion-student/id1275977952" target="_blank"><img src="admin/img/appStore.png" style="width: 100%;"/></a></center>
	</div>
	<p>&nbsp;</p>
	</div>

</div>
</div>
</div>
<footer class="footer" style="height: 25px;text-align:right;">
      <div class="container-fluid">
        <p class="text-muted" style="margin: 3px;font-size: 13px;"><strong>Powered by <img src="admin/img/company-logo.png" style="width: 32px;position: relative;">ccevate Technologies</strong></p>
      </div>
    </footer>
</div>
<script src="js/jquery.min.js"></script>
<script>
$(".toggle-password").click(function() {

  $(this).toggleClass("glyphicon-eye-close");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
<script>
			$(document).ready(function() {
			
			$('#login').click(function()
			{
				 setPasswordBack();
			var username=$("#username").val();
			var password=$("#password").val();
			var accesto=$( "input:checked" ).val();
			var school_ses=$('#school_ses :selected').val();
		    var dataString = 'username='+username+'&password='+password+'&radios='+accesto+'&school_ses='+school_ses;
			if($.trim(username).length>0 && $.trim(password).length>0)
			{
			$.ajax({
            type: "POST",
            url: "ajaxLogin",
            data: dataString,
            cache: false,
            beforeSend: function(){ $("#login").val('Connecting...');},
            success: function(result){
            	var result1 = $.trim(result);
			if(result1=='TEACHER_ACCESS')
            {
            window.location='staff_new/';
            }
			else if(result1=='STUDENT_ACCESS')
            {
            window.location='HTML/index.php';
            }
			else if(result1=='NONE')
            {
            $("#login").val('SIGN IN')
			$("#error").html("<div class='alert alert-danger' role='alert'><span style='color:#cc0000'>Error:</span> Please Select ! Who are you ? </div>");
            }
            else
            {
			$("#login").val('SIGN IN')
			$("#error").html("<div class='alert alert-danger' role='alert'><span style='color:#cc0000'>Error:</span> Invalid Username OR Password. </div>");
            }
            }
            });
			
			}
			else { $("#login").val('SIGN IN')
			$("#error").html("<div class='alert alert-danger' role='alert'><span style='color:#cc0000'>Error:</span> Please Fill Username And Password. </div>"); }
			return false;
			});
		});
		
		</script>
		 <script>
password = '';
function setPasswordBack(){
  showPassword();
}
function hidePassword(){
  p = document.getElementById('password');
  password = p.value;
  p.value = '*********';
}
function showPassword(){
  p = document.getElementById('password');  
  p.type= "password"; 
  p.value = password;
}
</script>		
<script type="text/javascript">
$(document).bind("contextmenu",function(e){
  return false;
    });
document.onkeydown = function(e) {
  if(event.keyCode == 123) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
     return false;
  }
   if(e.ctrlKey && e.keyCode == 'C'.charCodeAt(0)) {
     return false;
  }

}
</script>
</body>
</html>
