<?php echo doctype();?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title><?php echo $site_title;?></title>
  <?php echo meta($meta);?>
  <base href="<?php echo base_url();?>" />
  <?php echo Operations::getAssetFileHTML($assets); ?>
</head>
<body>
    <div class="header">
      <h1><?php echo isset($user_information['greet']) ? $user_information['greet'] : "";?></h1>
    </div>

    <div class="content">
      <?php echo $layout_content;?>
    </div>

    <div class="footer">
      
    </div>
</body>
</html>