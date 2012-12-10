<?php
// $Id: page.tpl.php,v 1.28.2.1 2009/04/30 00:13:31 goba Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

<head>
  <?php print $head ?>
  <title><?php print $head_title ?></title>
  <?php print $styles ?>
  <?php print $scripts ?>
  <?php 
    drupal_add_js(drupal_get_path('theme', 'researchguide') . 'js/jquery-1.4.2.min.js');
    drupal_add_js(drupal_get_path('theme', 'researchguide') . 'js/jquery-ui-1.8.1.custom.min.js');
    drupal_add_css(drupal_get_path('theme', 'researchguide') . 'css/redmond/jquery-ui-1.8.1.custom.css');
  ?>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>
</head>

<body>

<table border="0" cellpadding="0" cellspacing="0" id="header">
  <tr>
    <td id="logo">
      <?php
        global $base_url;
        $logo = '/LU.png';
        if ($language->language == 'fr') {
            $logo = '/UL.png';
        }
        if ($logo) {
            $logo = "$base_url/" . drupal_get_path('theme', 'researchguide') . $logo;
        ?><a href="<?php print $front_page ?>" title="<?php print t('Home') ?>"><img src="<?php print $logo ?>" alt="<?php print t('Home') ?>" /></a>
        <?php }
      ?>
      <?php if ($site_name) { ?><h1 class='site-name'><a href="<?php print $front_page ?>" title="<?php print t('Home') ?>"><?php print $site_name ?></a></h1><?php } ?>
      <?php if ($site_slogan) { ?><div class='site-slogan'><?php print $site_slogan ?></div><?php } ?>
    </td>
    <td id="menu">
      <?php print $search_box ?>
    </td>
  </tr>
  <tr>
    <td colspan="2"><div><?php print $header ?></div></td>
  </tr>
</table>

<table border="0" cellpadding="0" cellspacing="0" id="content">
  <tr>
    <?php if ($left) { ?><td id="sidebar-left">
      <?php print $left ?>
    </td><?php } ?>
    <td valign="top">
      <?php if ($mission) { ?><div id="mission"><?php print $mission ?></div><?php } ?>
      <div class="lib-nav-wrapper">
      <?php if ($language->language == 'fr') { ?>
        <a href="https://laurentienne.concat.ca">Catalogue</a>
        <a href="http://sfx.scholarsportal.info/laurentian/az?lang=fre">Périodiques électroniques (A-Z)</a>
        <a href="http://laurentian.ca/fr/content/archives">Archives</a>
        <a href="http://biblio.laurentian.ca/reserves/">Liste de Réserves</a>
        <a href="mailto:reference@laurentian.ca">Vos réactions</a>
      <?php } else { ?>
        <a href="https://laurentian.concat.ca">Catalogue</a>
        <a href="http://sfx.scholarsportal.info/laurentian/az?lang=eng">Electronic Journals (A-Z)</a>
        <a href="http://laurentian.ca/node/2110">Archives</a>
        <a href="http://biblio.laurentian.ca/reserves/">Course Reserves</a>
        <a href="mailto:reference@laurentian.ca">Feedback</a>
      <?php } ?>
      </div>
      <div id="main">
        <?php print $breadcrumb ?>
        <div class="tabs"><?php print $tabs ?></div>
        <?php if ($show_messages) { print $messages; } ?>
        <?php print $help ?>
        <?php print $content; ?>
        <?php print $feed_icons; ?>
      </div>
    </td>
    <?php if ($right) { ?><td id="sidebar-right">
      <?php print $right ?>
    </td><?php } ?>
  </tr>
</table>

<div id="footer">
  <?php print $footer_message ?>
  <?php print $footer ?>
</div>
<?php print $closure ?>
</body>
</html>
