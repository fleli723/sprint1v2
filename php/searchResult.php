<?php

require_once("../classes/DB.class.php");
require_once("../classes/Template.php");



$page = new Template("Action Page");
$page->addHeadElement('<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">');
$page->addHeadElement('<link rel="stylesheet" type="text/css" href="../css/searchResultTables.css">');
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();
extract($_POST);
include("topNavBar.php");
				//Check connection to the DB
				$db = new DB();
				if(!$db->getConnStatus()) //if no connection
				{				
					print "Not connected to the database";
					exit;
				} 
				else //if there is a connection to the DB
				{
					$sql = "SELECT * FROM albums";
					if(isset($_POST['Search_Bar_Name'])) //and the search variable is set
					{
						$result = $db->dbCall($sql);
						$sql = "SELECT * FROM albums WHERE albums.albumArtist LIKE '%$results%' or albums.AlbumTitle LIKE '%$results%'";
						
						
						//$results = mysqli_real_escape_string($db, htmlspecialchars($_POST['Search_Bar_Name']));
						//$results = mysqli_real_escape_string($db);
						//$results = ($db,($_POST['Search_Bar_Name']));
						//$link->real_escape_string($_POST['Search_Bar_Name']);
						//$results = $link->real_escape_string($_POST['Search_Bar_Name']);
						var_dump($results);
						//$results = $db->dbESC($_POST['Search_Bar_Name']);
						//$sql = "SELECT * FROM albums 
						//WHERE albums.albumArtist LIKE '%$results%' or albums.AlbumTitle LIKE '%$results%'";
						//$result = $db->dbCall($sql);
						if (mysqli_num_rows($result)==0) //if there is no return data
						{ 
							echo "No results match your query";
						}
						else //if there is return data
						{							
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
							while($row = $result->fetch_assoc())
							{								
								print '<tr>
									<td class = "r1">';echo $row["albumId"];              print '</td>';
									print ' <td class = "r2">';echo $row["albumArtist"]; print'</td>';
									print ' <td class = "r3">';echo $row["albumTitle"];  print' </td>';
									print ' <td class = "r4">';echo $row["duration"];  print' </td>';
									print' </tr>';							
							}//end while
							
							print '</tbody>
							</table><br>';
						}//end if
					}//end if
				}//end if		
print $page->getBottomSection();
?>