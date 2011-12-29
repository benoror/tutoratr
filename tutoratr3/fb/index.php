<?php

require_once 'facebook.php';

$appapikey = '4ba14807f76b6a844c0ad9c430ea1328';
$appsecret = 'f40a7e04fdbf6ed6a3fdd5a49816b9b3';
$facebook = new Facebook($appapikey, $appsecret);
$user_id = $facebook->require_login();

/*
// Greet the currently logged-in user!
echo "<p>Hello, <fb:name uid=\"$user_id\" useyou=\"false\" />!</p>";

// Print out at most 25 of the logged-in user's friends,
// using the friends.get API method
echo "<p>Friends:";
$friends = $facebook->api_client->friends_get();
$friends = array_slice($friends, 0, 25);
foreach ($friends as $friend) {
  echo "<fb:name uid=\"$friend\" useyou=\"false\" /> | ";
}
echo "</p>";*/

/*************
* Profile Box
*************/

// include the setup script
include('../libs/setup.php');

// create tutoratr object
$tutoratr =& new Tutoratr;

$facebook->api_client->profile_setFBML( $tutoratr->fetchTop10_fbprofile($tutoratr->getTop10()), $user_id );

// Get list of friends who already have this app installed.
$friends = $facebook->api_client->friends_getAppUsers();
$friends = is_array($friends) ? implode(',', $friends) : '';

// Where the add URL should lead.
$url = $facebook->get_add_url().'&next=&refuid='.$user;

// Build the invitation FBML.
$fbml = <<<FBML
<fb:name uid="$user" firstnameonly="true" shownetwork="false"/> te invita a calificar a los Profesores del TEC!
<fb:req-choice url="$url" label="Agregar ProfesoresTEC a tu perfil!"/>
FBML;

?>

<fb:request-form type="ProfesoresTEC" action="fb3.php" content="<?php echo htmlentities($fbml);?>" invite="true">
<fb:multi-friend-selector max="20" actiontext="Tienes amigos que no han agregado ProfesoresTEC a su perfil. Invitalos para que califiquen a sus profesores!" showborder="true" rows="5" exclude_ids="<?php echo $friends;?>">
</fb:request-form>
