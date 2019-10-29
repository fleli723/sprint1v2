<?php

require_once("../classes/Template.php");
require_once("const.php");

$page = new Template("Action Page");
$page->addHeadElement('<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">');
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();
extract($_REQUEST);
print_r($_REQUEST);
include("topNavBar.php");
			
			
print		'<div class="content">
			<h2 class="action"> Thank you for submitting your answers! </h2>';
			
			
				
				// Check connection
				if( $con->connect_error){
					die('Error: ' . $con->connect_error); 
				}//endif
				 
				//Consistency check for the major checboxes
				$major1 = (isset($major[0])) ? 1 : 0;				
				$major2 = (isset($major[1])) ? 1 : 0;
				$major3 = (isset($major[2])) ? 1 : 0;
				$major4 = (isset($major[3])) ? 1 : 0;
				$major5 = (isset($major[4])) ? 1 : 0;
				$major6 = (isset($major[5])) ? 1 : 0;
				
				
				
				//Get the IP address of the Client
				if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
					$clientIP = $_SERVER['HTTP_CLIENT_IP'];
				} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
					$clientIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
				} else {
					$clientIP = $_SERVER['REMOTE_ADDR'];
				}//endif
				$insertTime = date_create()->format('Y-m-d H:i:s');
				
				$sql = "INSERT into surveys (email, major1, major2, major3, major4, major5, major6, grade, pizzaTopping, insertTime, clientIP) VALUES
					(?,?,?,?,?,?,?,?,?,?,?)";
					
				if($stmt = $con->prepare($sql)){
					// Bind variables to the prepared statement as parameters
					$stmt->bind_param("sssssssssss", $email, $major1, $major2, $major3, $major4, $major5, $major6, $grade, $pizzaTopping, $insertTime, $clientIP);
					
					// Attempt to execute the prepared statement
					if($stmt->execute()){
						echo "Records inserted successfully.";
					} else{
						echo "ERROR: Could not execute query: $sql. " . $con->error;
					}//endif
				} else{
					echo "ERROR: Could not prepare query: $sql. " . $con->error;
				}//endif
				 
				// Close statement
				$stmt->close();
				 
				// Close connection
				$con->close();
			print '</div>';
			
			//ADD CODE TO ADD TO NEW DB

print $page->getBottomSection();

?>