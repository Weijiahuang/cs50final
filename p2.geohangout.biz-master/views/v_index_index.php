<div id ="header">
<div id="logo">
Spur !
</div>
<div id="signin">
Email 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Password
<br>
<form method ='POST' action = '/users/p_login'>
  <input type="text" name="email1" style="width:200px; height:20px;" placeholder="Email">
  <input type="password" name="password1" style="width:200px; height:20px;"placeholder="Password"> &nbsp;&nbsp;
  <input type="Submit" value="Log in" style="width:60px; height:30px;" background-color="green;">
  <br>
   
   <?php if(isset($error)): ?>	
		<div class='error'>
            Login failed. Please double check your email and password
        </div>        
    <?php endif; ?>
    
  <input type="checkbox" name="vehicle" value="Car"> Remember<span style="color:blue;font-weight:bold">
  
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a href="" style="text-decoration:none">Forget? </a></span>
</form>
</div>
</div>
<h1 id ="head1">
Connect with friends and the world around you in the real world.
</h1>

<div id ="picture">
</div>

<div id="signupbox">
<h2> Get Started - it's free and will always be free </h2>
<form method = 'POST' action = '/users/p_signup'>
	First Name <input type = 'text' name = 'first_name' style="width:200px; height:20px;" placeholder="First name"> <br> <br>
	Last Name <input type ='text' name = 'last_name' style="width:200px; height:20px;" placeholder="Last name"><br><br>
	Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type ='text' name = 'email' style="width:200px; height:20px;" placeholder="Email"><br><br>
	Password &nbsp; <input type ='password' name = 'password' style="width:200px; height:20px;"  placeholder="Passwords">

	<p >
	By clicking Join Now, you agree to Geocatchup's User <br>Agreement, Privacy Policy and Cookie Policy.
	</p>
<?php if(isset($uniqueness)): ?>
		<div class = "error">
			Signup failed, you already have an account.
		</div>			
<?php endif; ?>	

<?php if(isset($blankness)):?>
		<div class = "error">
			Please fill in the blank filed(s).
		</div>			
<?php endif; ?>	

<br/>
	<input type = 'submit' value = 'Join now' style="width:300px; height:30px;"> <br>
</form>
<div>
