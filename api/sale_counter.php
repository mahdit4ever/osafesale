<?php 
include "db.php";

if(get_magic_quotes_gpc()){
	$appoinment_id = mysqli_real_escape_string($connection, stripslashes($_REQUEST[appoinment_id]));
	
}
else{
	$appoinment_id = mysqli_real_escape_string($connection, $_REQUEST[appoinment_id]);
	
}

?>
<?php
    
    $sql = "SELECT * FROM `order` WHERE `appoinment_id`='$appoinment_id'";
    
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
?>
<?php
    //create an array
    $emparray[] = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
?>
<?php 
    $temp = htmlspecialchars(json_encode($emparray), ENT_NOQUOTES);
    echo str_replace(array("\\r\\n","\\r","\\n"),"<br/>",$temp);
?>