<div id='profilemenu'>
   <div id size="fontsize" style="color:#c0ac0f; font-size:40px; position:absolute; flow:left; margin-left:50px;">
			<strong>   Spur!</strong>
		</div>
	<div id ="mainpage">
        <!-- Menu for users who are logged in -->
        <?php if($user): ?>
            <a style="color:white; text-decoration:none;" href='/users/logout'>Logout</a>
            <a style="color:white; text-decoration:none;" href='/users/profile'>Profile</a>
			<button id ="create-user" style="padding:5px;">Add a post</button>
			<a style="color:white; text-decoration:none;" href='/posts/index'>View post<a>
			<a style="color:white; text-decoration:none;" href='/posts/users'>Users<a>
        <!-- Menu options for users who are not logged in -->
        <?php else: ?>

            <a href='/users/signup'>Sign up</a>
            <a href='/users/index'>Log in</a>
        <?php endif; ?>
     </div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div id ='windows'>
<br>

<?php foreach($users as $user): ?>
	<div id = "following" style ="background-color: #abcedf; height:25px;">
    <!-- Print this user's name -->
    <?=$user['first_name']?> <?=$user['last_name']?>

	<div id= "layout" style="padding-left:90%; postion:relative; margin-top: -20px;">
    <!-- If there exists a connection with this user, show a unfollow link -->
    <?php if(isset($connections[$user['user_id']])): ?>
        <a href='/posts/unfollow/<?=$user['user_id']?>'>
        <input type='Submit' value='Unfollow' style= "background:orange;"></a>
		
    <!-- Otherwise, show the follow link -->
    <?php else: ?>
        <a href='/posts/follow/<?=$user['user_id']?>'><input type='submit' value='Follow' style= "background:orange;"></a>
    <?php endif; ?>
    </div>
    </div>
    <br>

<?php endforeach; ?>

</div>