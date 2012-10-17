<?php 
	//need for each loop printing database info
	foreach ($field_databases as $dbase_node)
	{
		$dbase = node_load($dbase_node['nid']);
    //if the database is expired, do not show it
    if (isset($dbase->field_database_expiration_date[0]['value2']) && strtotime($dbase->field_database_expiration_date[0]['value2']) < strtotime(date('Y-m-d')))
      continue;

		// START Output for database
?>

		<table border="0" class="db_listing">
			<tr><td colspan="2"><a href="<?php print $dbase->field_database_url[0]['url']; ?>"><h3><?php print $dbase->title; ?></h3></a></td></tr>
				<tr>
					<td width="25%"><b>Database Description:</b></td>
					<td><?php print $dbase->field_database_description[0]["value"]; ?></td>
				</tr>
			</table>

<?php
		// END Output for database
	}
?>
