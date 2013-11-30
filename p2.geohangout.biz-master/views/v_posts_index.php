  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  
  
  <script src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=6.3">
</script>



<script type="text/javascript">
    var map = null;
    var pinPoint = null;
    var pinPixel = null;
 
    // All the following is only doable if we have geolocation support

    if (!navigator.geolocation) {
     alert("Geolocation API is not supported in your browser.");
     exit(0);
     }

   
    // Note this is the only thing that changes in between the Bing and Google Examples:

    function positionHandler (Position) {
        var latitude = Position.coords.latitude;
        var longitude = Position.coords.longitude;   
 
       
	// To specify coordinates, we provide latitude, longitude, and (optionally)
	// an altitudemode  - VELatLong(latitude, longitude, altitude, altitudemode)
        var myCoordinates = new VELatLong(latitude, longitude);
 
  

        // Map will be created in the DIV we specify by ID here

        map = new VEMap('mapContainer');


	// LoadMap(point, zoom, style, fixed, mode, showSwitch, tileBuffer)

        map.LoadMap(
                myCoordinates,   // Duh
                15,              // Zoom level
                VEMapStyle.Road, // Map Style - Road, Shaded, Aerial, Hybrid, Oblique, Birdseye, BirdseyeHybrid
                false,           // Static map? False means user can change
                VEMapMode.Mode2D,// 2D/3D
                true,            // showSwitch
                1                // tileBuffer
                );
 
        pinPoint = map.GetCenter();
        // Can also get exact pixel reference..
        // pinPixel = map.LatLongToPixel(pinPoint);
        var pin = map.AddPushpin(pinPoint);
        pin.SetTitle("This is the pin title");
	pin.SetDescription("This is the pin description");
	// can also set pin.SetCustomIcon
        pin.SetMoreInfoURL("http://technologeeks.com/e65/");

        };
 
    function errorHandler (err)
	{
		alert( err.message);
	}



try {
    navigator.geolocation.getCurrentPosition(positionHandler, errorHandler);
} catch (e) { alert (e);} 

function newDoc()
  {
  FB.logout(function(response) {
        // Person is now logged out
    });
  window.location.assign("http://test.geohangout.biz/facebooklogin.html")
  }

</script>
 <style > 
  #mapContainer {
    height: 30%  !important;
    width: 15% !important;
    border:5px solid black;
    position: absolute;
    top : 330px; left : 70px;
}
#logout{
	position: relative;
	top : 400px; left : 0px;
	
}
</style>
  
  <div id="mapContainer" ></div>
 
 
 
  
  
  
  <style>
    body { font-size: 62.5%; }
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
  </style>
  <script>
  $(function() {
    var 
      interest = $( "#interest" ),
      time=$ ('#time'),
      place = $( "#place" ),
      allFields = $( [] ).add(interest).add(time).add(place),
      tips = $( ".validateTips" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o, n, min, max ) {
      if ( o.val().length > max || o.val().length < min ) {
        o.addClass( "ui-state-error" );
        updateTips( "Length of " + n + " must be between " +
          min + " and " + max + "." );
        return false;
      } else {
        return true;
      }
    }
 
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }
 
    $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 400,
      width: 350,
      modal: true,
      buttons: {
        "Post": function() {
          var bValid = true;
          allFields.removeClass( "ui-state-error" );
 
          bValid = bValid && checkLength( interest, "interest", 0, 60 );
          bValid = bValid && checkLength( time, "time", 0, 80 );
          bValid = bValid && checkLength( place, "place", 0, 50 );
          
          if ( bValid ) {
			$("form#eventForm").submit();
            $( this ).dialog( "close" );
          }
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      },
      close: function() {
        allFields.val( "" ).removeClass( "ui-state-error" );
      }
    });
 
    $( "#create-user" )
      .button()
      .click(function() {
        $( "#dialog-form" ).dialog( "open" );
      });
  });
  </script>
</head>
<body>
<br>
<br>
<div class="light">
<form>
	<input type="text" class="search rounded" style="margin-left:-60px;height:20px;width:180px;" placeholder="Search for movie,music"> <input type="text" class="search square" style="margin-top:-38px; margin-left:200px; height:20px;width:180px;" placeholder="Place: MA, for example"><input type="button" value="Search" style="margin-top:-40px; margin-left:450px; width:100px; height:35px;" >
</form>
</div>

 
<img src= "/uploads/<?=$user->picture;?>" style = "height:185px; width:200px; position:absolute; margin-top:-20px; margin-left:78px;"><br>
 
<!- pop up windows  >
<div id="dialog-form" title="Make an event">
  <p class="validateTips">All form fields are required.</p>
  <form name="eventForm" id="eventForm" method="post" action="/posts/p_add">
  <fieldset>
    <label for="interest">Interest</label>
    <input type="text" style="width:300px;" name="interest" id="interest" class="text ui-widget-content ui-corner-all">
    <label for="email">Time frame</label>
    <input type="text" style="width:300px;" name="Time" id="time" value="" class="text ui-widget-content ui-corner-all">
    <label for="password">Place</label>
    <input type="text" style="width:300px;" name="place" id="place" value="" class="text ui-widget-content ui-corner-all">
  </fieldset>
  </form>
</div>
 
<div id='profilemenu' >
   <div id size="fontsize" style="color:#c0ac0f; font-size:40px; position:absolute; flow:left; margin-left:50px;">
			<strong>   Spur!</strong>
		</div>
	<div id ="mainpage" >
        <!-- Menu for users who are logged in -->
        
        <?php if($user): ?>
            <a style="color:white; text-decoration:none; font-size:20px; float:right; margin-right:20px;" href='/users/logout'>Logout</a>
           
            <a style="color:white; text-decoration:none; font-size:20px; position:absolute; margin-left:410px;" href='/users/profile'>Profile</a>
            
			<button id ="create-user" style="padding:0px; position:absolute; margin-left:510px" >Add a post</button>
			<a style="color:white; text-decoration:none; font-size:20px; position:absolute; margin-left:630px" href='/posts/index'>View post<a>
			<a style="color:white; text-decoration:none; font-size:20px; position:absolute; margin-left:750px" href='/posts/users'>Users<a>
			<a style="color:white; text-decoration:none; font-size:20px; position:absolute; margin-left:830px;" href =''> About us			<a>
        <!-- Menu options for users who are not logged in -->
        <?php else: ?>

            <a href='/users/signup'>Sign up</a>
            <a href='/users/index'>Log in</a>
        <?php endif; ?>
     </div>
       
</div>

<div style= "position:absolute; height:150px; font-size:13px; background-color:white; width:220px;; margin-left:60px; margin-top:400px;">
<ul >
<li >Date </li>
<li > All Dates (756) </li>
<li> Today (11) </li>
<li> Tomorrow (7) </li>
<li>This Week (17)
<li>This Weekend (17)
<li>Next Week (136)
<li >Next Month (261)
</ul>
</div>

<br>
<!- bulletin board- >
<div id ='windows'>
<div id="users-contain" class="ui-widget">
  <h1>Existing Posts:</h1>
</div>
<br>
<?php foreach($posts as $post): ?>
<div id = "box" style="border: 1px solid black; font-size:14px; width:90%;">
<article>
   <img src= "/uploads/<?=$post['picture'];?>" style = "height:70px; width:70px;"><br> 
    <div style="position:absolute; margin-left:80px; margin-top:-70px;">   
    <strong style="color:#819FF7"><?=$post['first_name']?> <?=$post['last_name']?> posted: </strong>
    <?=$post['content']?><br>  
    Interest: <?=$post['interest']?><br>
    Time: <?=$post['time']?><br>
    Place: <?=$post['place']?> &nbsp;&nbsp;
    <time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
        <?=Time::display($post['created'])?>
    </time>
    </div>
</article>
</div>
<br>
<?php endforeach; ?>

</div>