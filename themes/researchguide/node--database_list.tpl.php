<?php 
    //need for each loop printing database info
    foreach ($field_databases as $dbase_node)
    {
        $nid = $dbase_node['nid'];
        $dbase = node_load($nid);
        //if the database is expired, do not show it
        if (isset($dbase->field_database_expiration_date[0]['value2']) && strtotime($dbase->field_database_expiration_date[0]['value2']) < strtotime(date('Y-m-d')))
            continue;

        $dburl = $dbase->field_database_url['und'][0]['url'];
        $desc = $dbase->field_database_description['und'][0]["value"];

        // Proxy 'em if you got 'em
        $cur_db_proxy = $dbase->field_proxied['und'][0]['value'];
        if ($cur_db_proxy) {
            $dburl = "http://librweb.laurentian.ca/login?url=$dburl";
        }

        $db_display = '';

        if ($desc) {
            $desc = <<<HERE
                <tr name="dbdesc_$nid" style="display:none;">
                    <td width="25%"><b>Description:</b></td>
                    <td>$desc</td>
                </tr>
HERE;
            $db_display = "<sup onclick='jQuery(\"[name=\\\"dbdesc_$nid\\\"]\").toggle();' style='text-decoration:underline;'>(?)</sup>";
        }
        // START Output for database
?>

        <table border="0" class="db_listing">
            <tr><td colspan="2"><h3><a href="<?php print $dburl; ?>"><?php print render($dbase->title); ?></a> <?php print render($db_display); ?></h3></td></tr>
            <?php print render($desc); ?>
        </table>

<?php
        // END Output for database
    }
?>
