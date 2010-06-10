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
	#subject_guide_body {
		/*width: 750px;*/
		width: 100%;
		height: 800px;
		/*margin: 0px auto;*/
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
		<li><a href="#firstTab"><span>One</span></a></li>
		<li><a href="#secondTab"><span>Two</span></a></li>
		<li><a href="#thirdTab"><span>Three</span></a></li>
	</ul>
	<div id="firstTab">
			<!--<?php print $field_sgp_text[0][value]; ?>-->
			<?php print node_view(node_load(20)); ?>
		</div>
	<div id="secondTab">
			<br />
			<?php 
				//need for each loop printing database info
				foreach ($field_rec_databases as $dbase_node)
				{
					$dbase = node_load($dbase_node['nid']);
					// START Output for database
					?>

						<table border="1" class="db_listing">
							<tr><td colspan="2" class="db_title"><h3><?php print $dbase->title; ?></h3></td></tr>
							<tr>
								<td width="25%" class="db_heading"><b>URL: </b></td>
								<td><a href="<?php print $dbase->field_database_url[0]["url"]; ?>"><?php print $dbase->field_database_url[0]["url"]; ?></a></td>
							</tr>
							<tr>
								<td width="25%" class="db_heading"><b>Database Description:</b></td>
								<td><?php print $dbase->field_database_description[0]["value"]; ?></td>
							</tr>
						</table>

					<?php
					// END Output for database
				}
			?>
		</div>
	<div id="thirdTab">
			<br />
			<?php
				//also need for each loop printing all links
				foreach ($field_resource_link as $link)
				{
					//START Output for link
					?>
					
						<table border="1" class="db_listing">
							<tr><td colspan="2" class="db_title"><h3><?php print $link["title"]; ?></h3></td></tr>
							<tr height="40px">
								<td width="25%" class="db_heading"><b>URL: </b></td>
								<td><a href="<?php print $link["url"]; ?>"><?php print $link["url"]; ?></a></td>
							</tr>
						</table>

					<?php
					//END output for link
				}
			?>
		</div>
	</div>
</div>
