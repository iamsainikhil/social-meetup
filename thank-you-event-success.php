// This function will run within each post array including multi-dimensional arrays 
function ExtendedAddslash(&$params)
{ 
        foreach ($params as &$var) {
            // check if $var is an array. If yes, it will start another ExtendedAddslash() function to loop to each key inside.
            is_array($var) ? ExtendedAddslash($var) : $var=addslashes($var);
            unset($var);
        }
} 

// Initialize ExtendedAddslash() function for every $_POST variable
ExtendedAddslash($_POST);      

$submission_id = $_POST['submission_id']; 
$formID = $_POST['formID'];
$IP = $_POST['IP'];
$event_name = $_POST['Event Name'];
$event_location = $_POST['Location'];
$org_name = $_POST['organization'];
$date_time = $_POST['Date'];
$email = $_POST['Email'];
$phone = $_POST['phonenumber13'][0] ."-". $_POST['phonenumber13'][1];
$description = $_POST['description7'];
$url = $_POST['url'];

$db_host = 'sql103.ezyro.com';
$db_username = 'ezyro_19437283';
$db_password = 'sainikhil12';
$db_name = 'ezyro_19437283_meetup';

mysql_connect( $db_host, $db_username, $db_password) or die(mysql_error());
mysql_select_db($db_name); 

// search submission ID

$query = "SELECT * FROM 'events' WHERE `submission_id` = '$submission_id'";
$sqlsearch = mysql_query($query);
$resultcount = mysql_numrows($sqlsearch);

if ($resultcount > 0) {
 
    mysql_query("UPDATE 'events' SET 
                                'event_name' = '$event_name',
                                'event_location' = '$event_location',
                                'date' = '$date_time',
                                'org_name' = '$org_name',
                                'date' = '$date_time',
                                'email' = '$email',
                                'phone' = '$phone',
                                'description' = '$description',
                                 'url' = '$url',      
                             WHERE `submission_id` = '$submission_id'") 
     or die(mysql_error());
    
} else {

    mysql_query("INSERT INTO 'events' (submission_id, formID, IP, 
                                                                         event_name, event_location, date, org_name, email, phone, description, url) 
                               VALUES ('$submission_id', '$formID', '$ip', '$event_name', '$event_location', '$date', '$org_name', '$email', '$phone', '$description', 
                                             '$url'  ) ") 
    or die(mysql_error());  

}
?>
<h1>Event created successfully!</h1>