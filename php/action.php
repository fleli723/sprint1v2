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
			
			
print		'<div class="content">
			<h2 class="action"> Thank you for submitting your answers! </h2>
			</div>';
			
			//ADD CODE TO ADD TO NEW DB

print $page->getBottomSection();

?>