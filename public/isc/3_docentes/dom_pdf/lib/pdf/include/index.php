<?php

/*
* Include the necessary files */
include_once 'inc/functions.inc.php'; 
include_once 'inc/db.inc.php';

// Open a database connection
$db = new PDO(DB_INFO, DB_USER, DB_PASS);

/*
* Figure out what page is being requested (default is blog)
* Perform basic sanitization on the variable as well
*/

// Figure out what page is being requested (default is blog)
	if(isset($_GET['page']))
	{
		$page = htmlentities(strip_tags($_GET['page']));
	}
	else
	{
		$page = 'blog';
	}

	// Determine if an entry URL was passed
	$url = (isset($_GET['url'])) ? $_GET['url'] : NULL;

	// Load the entries
	$e = retrieveEntries($db, $page, $url);

	// Get the fulldisp flag and remove it from the array
	$fulldisp = array_pop($e);

	// Sanitize the entry data
	$e = sanitizeData($e);

?>



<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="Content-Type"
	content="text/html;charset=utf-8" />
<link rel="stylesheet" href="/cap_6/default.css" type="text/css" /> 
<title> Simple Blog </title>
</head> 

<body>
	<h1> Simple Blog Application </h1> 
	<ul id="menu">
		<li><a href="/cap_6/blog/">Blog</a></li>
		<li><a href="/cap_6/about/">About the Author</a></li>
	</ul>
	
	<div id="entries">
	
	<?php
	// If the full display flag is set, show the entry 
	if($fulldisp==1)
	{
		// Get the URL if one wasn't passed
		$url = (isset($url)) ? $url : $e['url'];
		
		// Build the admin links
		$admin = adminLinks($page, $url);
		
	?>
		
		<h2> <?php echo $e['title'] ?> </h2> 
		<p> <?php echo $e['entry'] ?> </p> 
		<p>
			<?php echo $admin['edit'] ?>
			<?php if($page=='blog') echo $admin['delete'] ?> 
		</p>
		
		<?php if($page=='blog'): ?>
			<p class="backlink">
				<a href="./">Back to Latest Entries</a> 
			</p>
		<?php endif; ?>
	<?php
	} // End the if statement 
	
	// If the full display flag is 0, format linked entry titles 
	else
	{
	// Loop through each entry 
	foreach($e as $entry) {
	?>
		<p>
			<a href="/cap_6/<?php echo $entry['page'] ?>/<?php echo $entry['url'] ?>">
				<?php echo $entry['title'] ?>
			</a> 
		</p>
	<?php
					} // End the foreach loop 
	} // End the else

	?>
	
	<p class="backlink">
	<?php if($page=='blog'): ?>
	
	<a href="/cap_6/admin/<?php echo $page ?>">
	Post a New Entry 
	</a>
	<?php endif; ?>
	</p>
	</div>
</body> 

</html>