<?php

require_once("../classes/Template.php");
require_once("../classes/searchValidation.php");

$page = new Template("Search Page");
$page->addHeadElement('<script src="../js/validateUserSearch2.js"></script>');

$page->addHeadElement('<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">');
$page->finalizeTopSection();
$page->finalizeBottomSection();

print $page->getTopSection();

print	'
<div class="topbar">
	<h1> CNMT 310 Sprint 1 Assignment</h1>
	<ul class="nav">
		<li><a href="index.php">Home</a></li>		
		<li><a href="survey.php">Survey</a></li>
		<li><a href="privacy.php">Privacy Policy</a></li>
		<li><a href="search.php">Search</a></li>
	</ul>
</div>
';

print	'
<div class="content">
	<form name="userSearchBarForm" action="result.php"  method="post">
	
		<div class="formboxes">
			<span>Search: </span><br><br>
			<input type="text" id="txtSearchBar" name="Search_Bar_Name" placeholder="Title or Artist Name...">
			<br>
		</div>
			
		<br>	
		<input class="button" type="submit" value="Submit" id="BtnSubmit" onclick="validateForm()" >
		
	</form>
</div>	
';

print $page->getBottomSection();

?>