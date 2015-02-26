<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="icon" type="image/jpg" href="<?php echo URL_PATH_TEMPLATE_MEDIA; ?>/favicon.jpg" />
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo URL_PATH_TEMPLATE_CSS; ?>/global.css" rel="stylesheet" type="text/css" media="screen" />
        <!--<link href="<?php // echo URL_PATH_TEMPLATE_CSS; ?>/knacss.css" rel="stylesheet" type="text/css" media="screen" />-->
    </head>
    <body>
        <div id="header" class="line">
            {header}
        </div>
        <div id="main" class="line">
            <div id="col2" class="left w20 ">
                {col2}
            </div>
            <div id="content" class="w80 mod">
                {content}
            </div>
        </div>
        <div id="footer" class="line">
            {footer}
        </div>
    </body>
</html>