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

					if(isset($_POST['Search_Bar_Name'])) //and the search variable is set
					{
						$db = new DB();
						//Check connection to the DB
						
						if(!$db->getConnStatus()) //if no connection
						{				
							print "Not connected to the database";
							exit;
						} 
						
						else 
						{
							$search = $_POST['Search_Bar_Name'];
							$search = $db->dbEsc($search);
							$query = "SELECT * FROM albums WHERE albums.albumArtist LIKE '%$search%' or albums.AlbumTitle LIKE '%$search%'";
							$result = $db->dbCall($query);
							
							//var_dump($result);
							
										//$sql = "SELECT * FROM albums";
										//$results = mysqli_real_escape_string($db, htmlspecialchars($_POST['Search_Bar_Name']));
										//$results = mysqli_real_escape_string($db);
										//$results = ($db,($_POST['Search_Bar_Name']));
										//$link->real_escape_string($_POST['Search_Bar_Name']);
										//$results = $link->real_escape_string($_POST['Search_Bar_Name']);
										//$results = $db->dbESC($_POST['Search_Bar_Name']);
										//$sql = "SELECT * FROM albums 
										//WHERE albums.albumArtist LIKE '%$results%' or albums.AlbumTitle LIKE '%$results%'";
										//$result = $db->dbCall($sql);
										
									
							if (!$result) //if there is no return data
							{ 
								print "No results match your query";
							}
							else //if there is return data
							{							
								print '<table id="t01">
								<caption><h2>Search Results:</h2></caption>
								<thead>
								<tr>
									<th class = "r2">ID#</th>
									<th class = "r2">Album Artist</th>
									<th class = "r2">Album Title</th>
									<th class = "r2">Album Duration</th>								
								</tr>
								</thead><tbody>
								<tbody>';						
								foreach($result as $key => $value)
								{
									print "<tr>";
									foreach($value as $_key => $_value)
									{
										print '<td class = "r2">'.$_value.'</td>';
									}
									print "</tr>";
													
													//print '<tr>
													//	<td class = "r1">';echo $key[$value];              print '</td>';
													//	print ' <td class = "r2">';echo $key[$value]; print'</td>';
													//	print ' <td class = "r3">';echo $key[$value];  print' </td>';
													//	print ' <td class = "r4">';echo $key[$value];  print' </td>';
													//	print' </tr>';		
								}//end while
								
								print '</tbody> </table><br>';
							}//end if
						}//end if
					}//end if	
print $page->getBottomSection();
?>