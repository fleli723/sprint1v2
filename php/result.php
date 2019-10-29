<?php

require_once("../classes/Template.php");
require_once("const.php");


$page = new Template("Action Page");
$page->addHeadElement('<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">');
$page->addHeadElement('<link rel="stylesheet" type="text/css" href="../css/searchResultTables.css">');
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();
extract($_POST);
include("topNavBar.php");
				if( $con->connect_error){
				die('Error: ' . $con->connect_error);} 
				$sql = "SELECT * FROM albums";
				
				//TABLE PRINTS ALL RESULTS, CHECK WHY
				if( isset($_POST['Search_Bar_Name']) ){
					$results = mysqli_real_escape_string($con, htmlspecialchars($_POST['Search_Bar_Name']));
					$sql = "SELECT * FROM albums 
					WHERE albums.albumArtist LIKE '%$results%' or albums.AlbumTitle LIKE '%$results%'";
				}//end if
				$result = $con->query($sql);
				
				
				//ADD CODE TO LIST DURATION, UPDATE DB TABLE WITH DURATION OF ALBUMS
				print '<table id="t01">
				<caption><h2>Search Results:</h2></caption>
				<thead>
				<tr>
					<th class = "r1">ID#</th>
					<th class = "r2">Album Artist</th>
					<th class = "r3">Album Title</th>
					<th class = "r4">Album Duration</th>
					
				</tr>
				</thead><tbody>
				<tbody>';
				
				while($row = $result->fetch_assoc()){
					
				print '<tr>
					<td class = "r1">';echo $row["albumId"];              print '</td>';
					print ' <td class = "r2">';echo $row["albumArtist"]; print'</td>';
					print ' <td class = "r3">';echo $row["albumTitle"];  print' </td>';
					print ' <td class = "r4">';echo $row["duration"];  print' </td>';
					print' </tr>';
				
				}
				
				print '</tbody>
				</table><br>';
				
				if (mysqli_num_rows($result)==0) { 
					echo "No results match your query";
				}//end if
				
		
print $page->getBottomSection();

?>