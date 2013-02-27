<div class="profile">
 <?php print render($user_profile); ?> 
</div>

<?php

//Show owned content div only if a user is logged in
global $user;
if ($user->uid != null && arg(0) == 'user') {
?>

<div class="owned_content">
  <h1><a href="<?php print $base_url; ?>/research/databases/">A-Z List of Databases</a></h1>
  <h1>My 60 Most Recent Guides:</h1>
<?php
  $output = '';
  $uid = arg(1);
  $result = db_query("SELECT n.created, n.title, n.nid, n.changed FROM {node} n WHERE n.uid = :uid AND n.type = 'panels_sub_guide' ORDER BY n.changed DESC LIMIT 60", array(':uid' => $uid));
  $output .= '<div class="item-list"><ul>' . "\n";
  $output .= render(node_title_list($result));
  $output .= '</ul></div>';
  print $output;
?>
</div>

<div class="non_owned_content">
  <h1>Recent Guides By Other Users:</h1>
<?php
  $output = '';
  $uid = arg(1);
  $result = db_query("SELECT n.created, n.title, n.nid, n.changed FROM {node} n WHERE n.uid != :uid AND n.type = 'panels_sub_guide' ORDER BY n.changed DESC LIMIT 10", array(':uid' => $uid));
  $output .= '<div class="item-list"><ul>' . "\n";
  $output .= render(node_title_list($result));
  $output .= '</ul></div>';
  print $output;
?>
</div>

<div class="db_list_content">
   <h1>My Database Lists:</h1>
 <?php
   $output = '';
   $uid = arg(1);
   $result = db_query("SELECT n.created, n.title, n.nid, n.changed FROM {node} n WHERE n.uid = :uid AND n.type = 'database_list' ORDER BY n.changed DESC LIMIT 10", array(':uid' => $uid));
   $output .= '<div class="item-list"><ul>' . "\n";
   $output .= render(node_title_list($result));
   $output .= '</ul></div>';
   print $output;
 ?>
</div>

<?php } ?>
