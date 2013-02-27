<style type="text/css">
	.float_right { float:right; margin:10px; }
	#subject_librarian { 
		background-color:#EDF1F3; 
		/*width: 700px; */
		width: 90%;
		height:150px; 
		padding:0px 3px;
		margin: 0px auto;
        display: none;
	}
	.db_listing {
		width: 90%;
		margin: 0px auto;
	}
	.db_title {
		background-color: #6699CC;
		color: #FFFFFF;
	}
	.db_heading {
		background-color: #777777;
		color: #FFFFFF;
	}
	.db_title_link A:link { color: white; }
	.db_title_link A:hover { color: gray; text-decoration: underline; }
	.db_title_link A:visited { color: white; }
</style>
<?php drupal_add_library('system', 'ui.tabs'); ?>
<?php drupal_add_js('jQuery(document).ready(function(){
jQuery("#tabs").tabs();
});
', 'inline');
?>

<br />

<div class="node">
<div id="tabs">
	<ul>
		<?php
			$count = 1;
			foreach ($field_subjg_page as $page_ref)
			{
				$page = node_load($page_ref['nid']);
		?>
				<li><a href="#tab<?php print $count; ?>"><span><?php print $page->title; ?></span></a></li>
		<?php
				$count++;
			}
		?>
	</ul>

	<?php
		$count = 1;
		foreach ($field_subjg_page as $page_ref)
		{
			$page = node_load($page_ref['nid']);
	?>
			<div id="tab<?php print $count; ?>">
				<?php print render(node_view($page)); ?>
			</div>
	<?php
			$count++;
		}
	?>
</div>
</div>
