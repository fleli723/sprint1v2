<?php

require_once("../classes/Template.php");
require_once("const.php");

$page = new Template("Action Page");
$page->addHeadElement('<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">');
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();

print 	'<div class="topbar">
			<h1> CNMT 310 Sprint 1 Assignment</h1>
			<ul class="nav">
				<li><a href="index.php">Home</a></li>		
				<li><a href="survey.php">Survey</a></li>
				<li><a href="privacy.php">Privacy Policy</a></li>
				<li><a href="search.php">Search</a></li>
			</ul>
		</div>';
		
				//change this information to const.php
				$localhost = "cnmtsrv1.uwsp.edu";
				$username = "bubla_t_admin";
				$password = "xew56baz";
				$dbname = "bubla_t";
				$con = new mysqli($localhost, $username, $password, $dbname);
				//change this information to const.php

				if( $con->connect_error){
				die('Error: ' . $con->connect_error);} 
				$sql = "SELECT * FROM albums";
				
				//TABLE PRINTS ALL RESULTS, CHECK WHY
				if( isset($_GET['search']) ){
					$results = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
					$sql = "SELECT * FROM albums 
					WHERE albumArtist LIKE '%$results%' or AlbumTitle LIKE '%$results%'";
				}//end if
				$result = $con->query($sql);
				
				
				//ADD CODE TO LIST DURATION, UPDATE DB TABLE WITH DURATION OF ALBUMS
				print '<table id="t01">
				<caption><h2>Search Results:</h2></caption>
				<thead>
				<tr>
					<th>ID#</th>
					<th>Album Artist</th>
					<th>Album Title</th>
				</tr>
				</thead><tbody>
				<tbody>';
				
				while($row = $result->fetch_assoc()){
					
				print '<tr>
					<td width="75px">';echo $row["albumId"];              print '</td>';
					print ' <td width="200px">';echo $row["albumArtist"]; print'</td>';
					print ' <td width="300px">';echo $row["albumTitle"];  print' </td>';
					print' </tr>';
				
				}
				
				print '</tbody>
				</table><br>';
				
				if (mysqli_num_rows($result)==0) { 
					echo "No results match your query";
				}//end if
				
		
print $page->getBottomSection();

?>