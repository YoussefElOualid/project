<style type="text/css">
	.jspContainer{
		    
		    overflow-y: auto !important;
	} </style>
<?php
	// Css and Js
	include 'content/include_top.php';

	// Left menu
	include 'content/left_menu.php';
	// Top menu
	include 'content/top_menu.php';

?>

<section class="page-content">
<div class="page-content-inner">
	<?php include $path.'/'.$page.'.php';?>
</div>
<?php
	include 'content/include_bottom.php';
?>