<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- 列表 -->
    <link href="../css/proList.css" type="text/css" rel="stylesheet" />
    <title>车迷频道-公司介绍</title>
</head>

<body>
<!--cont start-->
<div class="introduction-box">
    <h3><?php echo $info['company_name'];?></h3>
    <div class="sjLogo_box"><img src="<?php echo $info['company_img']; ?>" width="200px"/></div>
    <p>
        <?php echo $info['company_intro']; ?>
    </p>
    <p>公司地址:<?php echo $info['company_address']; ?></p>
</div>
<!--cont end-->
</body>
</html>
