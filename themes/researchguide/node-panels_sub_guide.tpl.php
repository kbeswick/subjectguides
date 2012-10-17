<style type="text/css">
	.float_right { float:right; margin:10px; }
	#subject_librarian { 
		background-color:#EDF1F3; 
		/*width: 700px; */
		width: 90%;
		height:150px; 
		padding:0px 3px;
		margin: 0px auto;
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
<script type="text/javascript">
	$(document).ready(function() {
		$("#tabs").tabs();
	});
</script>
<?php
	$subject_librarian = user_load($uid);
?>

<div id="subject_librarian">
	<img src="http://biblio-dev.laurentian.ca/subjectguides/<?php print $subject_librarian->picture; ?>" class="float_right" width="140px" height="130px">
	<h2>Subject Librarian</h2>
	<br />
	<table>
		<tr>
			<td><b>Name:</b></td>
			<td><?php print $subject_librarian->profile_name; ?></td>
		</tr>
		<tr>
			<td><b>Position Title:</b></td>
			<td><?php print $subject_librarian->profile_position_title; ?></td>
		</tr>
		<tr>
			<td><b>Email (at laurentian.ca):</b></td>
			<td><?php print $subject_librarian->profile_email; ?></td>
		</tr>
		<tr>
			<td><b>Office Location:</b></td>
			<td><?php print $subject_librarian->profile_office_location; ?></td>
		</tr>
		<tr>
			<td><b>Extension:</b></td>
			<td><?php print $subject_librarian->profile_extension; ?></td>
		</tr>
	</table>
</div>
<br />
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
				<?php print node_view($page); ?>
			</div>
	<?php
			$count++;
		}
	?>
</div>
