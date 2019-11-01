<?php
/****************************************************************
* This class is used to connect to the db and Insert the        *
* survey results into the DB for CNMT-310 Sprint 1              *
*                                                               *
* @author Tim, Filip and Corbin                                 *
* @FileName: surveyResults.php                                  *
*                                                               *
* Changelog:                                                    *
* 20190926 - Original code constructed                          *
* 20191031 - included the DB Class, connection error checking,  *
*            sanitization, Isset search variable                *
* 20191101 - Added Session Variables                            *
*                                                               *
****************************************************************/
session_start();
require_once("../classes/DB.class.php");
require_once("../classes/Template.php");
$page = new Template("Survey Results Page");
$page->addHeadElement('<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">');
$page->finalizeTopSection();
$page->finalizeBottomSection();
print $page->getTopSection();
//convert the session variables to a $_POST
foreach ($_SESSION as $key => $value) {
			${$key} = $value;
			$_POST[$key] = $value;
		}//end if
session_destroy(); //destroys the Session
extract($_POST); //needed to extract the $_POST for the checkbox consistency check to boolean values
include("topNavBar.php");
	if(isset($_POST['email'])) { //and the email variable is set
		//New datbase connection
			$con = new DB(); 
		//Check the connection
			if (!$con->getConnStatus()) {
			  print "\n\nAn error has occurred with connection\n";
			  exit;
			}else{
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
				//Get the insert Time for the record
					$insertTime = date_create()->format('Y-m-d H:i:s');					
				//Sanitize the user input 
					$emailS = $con->dbESC($_POST['email']);
					$emailS = filter_var($emailS, FILTER_SANITIZE_EMAIL);
					$major1S = $con->dbESC($major1);					
					$major2S = $con->dbESC($major2);
					$major3S = $con->dbESC($major3);
					$major4S = $con->dbESC($major4);
					$major5S = $con->dbESC($major5);
					$major6S = $con->dbESC($major6);
					$gradeS = $con->dbESC($_POST['grade']);
					$pizzaToppingS = $con->dbESC($_POST['pizzaTopping']);
					$clientIPS = $con->dbESC($clientIP);
					$clientIPS =filter_var($clientIPS, FILTER_VALIDATE_IP);
					$insertTimeS = $con->dbESC($insertTime);
				//Insert Record into the DB	
					$query = "INSERT into surveys (email, major1, major2, major3, major4, major5, major6, grade, pizzaTopping, insertTime, clientIP) 
						VALUES ('{$emailS}', '{$major1S}', '{$major2S}', '{$major3S}', '{$major4S}', '{$major5S}', '{$major6S}', '{$gradeS}', '{$pizzaToppingS}', '{$insertTime}', '{$clientIPS}')";
					$result = $con->dbCall($query);
				//Check for DB Insert Errors
					if (!$result) {
					  print 'There was an Error processing your survey<br>Please contact the Website Admin';
					}else{
					  print	'<div class="content">
								<h3 class="action"> Thank you for submitting your survey answers! </h3><br>
								1 record successfully submitted. 
							</div>';
					  $result = false;//Reset result when done with it to prevent interfering with later calls.
					}//end if
			}// end if
	}// end isset				
	print $page->getBottomSection();
?>