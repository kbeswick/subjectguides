<?php
// $Id: node.tpl.php,v 1.7 2007/08/07 08:39:36 goba Exp $
?>
  <div class="node<?php if ($sticky) { print " sticky"; } ?><?php if (!$status) { print " node-unpublished"; } ?>">
    <h1>Database List</h1>

<?php

  global $language;

  /*  We want all nodes that are:
   *   1. Of the type library_database
   *   2. In the user's current language 
   *   3. Published
   */

  $result = db_query("SELECT n.created, n.title, n.nid, n.changed FROM {node} n WHERE n.type = 'library_database' AND (n.language = :language OR n.language = 'und') AND n.status = 1 ORDER BY n.title ASC", array(':language' => $language->language));
?>
<ul>
<?php

  foreach ($result as $i) {
    $nid = $i->nid;
    // Load the node contents for each database
    $cur_db_node = node_load($i->nid);
    // Grab the URL & description
    $cur_db_url = $cur_db_node->field_database_url['und'][0]['url'];
    $cur_db_desc = $cur_db_node->field_database_description['und'][0]['value'];
    $db_display = '';    
    $desc = '';

    if ($cur_db_desc) {

      $desc = '<p name="dbdesc_' . $nid . '" style="display:none;">';
      $desc .= '<span width="25%"><b>Description:</b></span>';
      $desc .= '<span>' . $cur_db_desc . '</span>';
      $desc .= '</p>';

      $db_display = "(<span onclick='jQuery(\"[name=\\\"dbdesc_$nid\\\"]\").toggle();' style='font-weight: bold'>?</span>)";

    }
?>

    <li><a href="<?php print $cur_db_url; ?>"><?php print render($i->title); ?></a> <?php print render($db_display); ?></li>
    <?php print render($desc); ?>

<?php
  }
?>
</div>
