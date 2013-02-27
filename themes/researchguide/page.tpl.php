<?php print render($page['page_top']); ?>
<table border="0" cellpadding="0" cellspacing="0" id="header">
  <tr>
    <td id="logo">
      <?php
        global $base_url;
        $logo = '/LU.png';
        $lu_home = 'http://laurentian.ca';
        if ($language->language == 'fr') {
            $logo = '/UL.png';
            $lu_home = 'http://laurentian.ca/fr';
        }
        if ($logo) {
            $logo = "$base_url/" . drupal_get_path('theme', 'researchguide') . $logo;
        ?><a href="<?php print $lu_home ?>" title="<?php print t('Home') ?>"><img src="<?php print $logo ?>" alt="<?php print t('Home') ?>" /></a>
        <?php }
      ?>
      <?php if ($site_name) { ?><h1 class='site-name'><a href="<?php print render($front_page) ?>" title="<?php print t('Home') ?>"><?php print render($site_name) ?></a></h1><?php } ?>
      <?php if ($site_slogan) { ?><div class='site-slogan'><?php print render($site_slogan); ?></div><?php } ?>
    </td>
    <td id="menu">
    </td>
  </tr>
  <tr>
    <td colspan="2"><div><?php print render($page['header']); ?></div></td>
  </tr>
</table>

<table border="0" cellpadding="0" cellspacing="0" id="content">
  <tr>
    <?php if ($page['sidebar_first']) { ?><td id="sidebar-first">
      <?php print render($page[sidebar_first]); ?>
    </td><?php } ?>
    <td valign="top">
      <?php if ($page['highlighted']) { ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php } ?>
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
        <?php print render($breadcrumb) ?>
        <div class="tabs"><?php print render($tabs) ?></div>
        <?php if ($show_messages) { print $messages; } ?>
        <?php print render($page['help']); ?>
        <?php print render($page['content']); ?>
        <?php print $feed_icons; ?>
      </div>
    </td>
    <?php if ($page['sidebar_second']) { ?><td id="sidebar-second">
      <?php print render($page['sidebar_second']); ?>
    </td><?php } ?>
  </tr>
</table>

<div id="footer">
  <?php print render($page['footer']); ?>
</div>
<?php print render($page['page_bottom']); ?>
</body>
</html>
