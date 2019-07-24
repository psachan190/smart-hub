<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="UTF-8">
    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title><?php if(!empty($title)) echo $title; ?> </title>
    <!--Share script start-->
     <meta property="og:url"     content="<?php if(!empty($sharedUrl)) echo $sharedUrl; ?>" />
     <meta property="og:type"          content="website" />
     <meta property="og:title"         content="<?php if(!empty($title)) echo $title; ?>" />
     <meta property="og:description"   content="<?php if(!empty($description)) echo $description; ?> <a href='kanpurize.com'>Click here</a>" />
     <meta property="og:image"  content="<?php if(!empty($imageUrl)) echo $imageUrl; ?>" />
</head>
<body>
<script>
      window.___gcfg = {
        lang: 'en-US',
        parsetags: 'onload'
      };
    </script>
<script src="https://apis.google.com/js/platform.js" async defer></script>

<?php 
$url = "https://kanpurize.com/kanpurize_market_shop/$shoprefID/$shopName";
//echo $url;exit;
 ?>
<script>
window.location.href="<?php echo $url; ?>";
</script>
</body>
</html>