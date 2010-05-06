<?php

require_once getcwd() . '/content/meta';

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $title?></title>
        <link rel="Shortcut Icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="home" href="http://tw3k.net" title="tw3k.net" />
        <link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />
        <meta name="ICBM" content="42.26370, -84.55470" />
        <meta name="DC.title" content="<?php echo $dc_title?>" />
        <meta name="DC.description" content="<?php echo $dc_description?>" />
        <meta name="DC.publisher" content="tw3k" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="Content-Language" content="en" />
        <meta name="ROBOTS" content="ALL" />
        <meta name="Copyright" content="Copyright (c) 2010, Forest Dean Feighner ~tw3k" />
        <meta name="author" content="Forest Dean Feighner ~tw3k" />
        <meta name="description" content="<?php echo $description?>" />
        <meta name="keywords" content="<?php echo $keywords?>" />
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <link type="text/css" href="http://jqueryui-0.tw3k.com/css/jquery-ui-bird.css" rel="stylesheet" />
        <link type="text/css" href="http://jqueryui-1.tw3k.com/css/custom-theme/jquery-ui-1.8.custom.css" rel="stylesheet" />
        <script type="text/javascript" src="http://jqueryui-0.tw3k.com/js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="http://jqueryui-1.tw3k.com/js/jquery-ui-1.8.custom.min.js"></script>
        <script type="text/javascript" src="http://jqueryui-0.tw3k.com/js/jquery-ui-bird.js"></script>
        <link type="text/css" href="http://jqueryui-1.tw3k.com/css/jquery.zrssfeed.css" rel="stylesheet" />
        <script type="text/javascript" src="http://jqueryui-0.tw3k.com/js/jquery.zrssfeed.min.js"></script>
    </head>
    <body>
        <div id="Logo" style="top:-6px;left:1px;width:183px;height:66px; background: transparent url('http://cirrusimage.net/img/cirrusImage-logo.png') center center no-repeat;" onclick="location.href='http://cirrusimage.net'"></div>
        <ul class="ui-menu" style="float:right">
            <li class="ui-menu-item"><a href='http://cirrusimage.net' title='cirrusImage'>cirrusImage</a></li>
            <li class="ui-menu-item"><a href='http://gallery.cirrusimage.net' title='Gallery'>Gallery</a></li>
            <li class="ui-menu-item"><a href='http://apps.cirrusimage.net' title='Google Apps, GMail and Documents'>GApps</a></li>
            <li class="ui-menu-item-hit"><a href='http://api.cirrusimage.net' title='API dot cirrusimage dot net'>API</a></li>
        </ul>
        <div class="content">
<?php //echo '<pre>'; print_r($_ENV); echo '</pre>';

@require_once 'Index.php';

foreach (new DirectoryIterator('content/') as $copy) {
    if($copy->isDot()) continue;
        $pages[] = $copy->getFilename();
}
sort($pages);
$index = new Index($pages, $_GET);
$page = new Page($_GET);
$include = $page->contains($pages);
require_once getcwd() . '/content/' . $include['context'];

//echo '<pre>'; print_r($index); echo '</pre>';echo '<pre>'; print_r($page); echo '</pre>';
?>
        </div>
        <div style="color:#ccc;text-align:right;">
            <a style="color:#ccc;margin-top: 75%" href="http://tw3k.net">A product of tw3k.net</a>
        </div>
        <div style="text-align:right;">
            <a style="color:#ccc;margin-top: 75%" href="http://validator.w3.org/check/referer">Valid XHTML 1.0 Strict!</a>
        </div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-7650077-1");
pageTracker._setDomainName(".tw3k.net");
pageTracker._trackPageview();
} catch(err) {}</script>
    </body>
</html>
