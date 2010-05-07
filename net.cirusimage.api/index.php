<?php
/**
 * index file
 *
 * cirrusImage :: website index
 *
 * PHP 5
 *
 * LICENSE:
 *
 * Copyright (c) 2010, Forest Feighner
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 *  - Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 *  - Redistributions in binary form must reproduce the above copyright notice,
 *    this list of conditions and the following disclaimer in the documentation
 *    and/or other materials provided with the distribution.
 *  - Neither the name of the cirrusImage nor the names of its contributors may
 *    be used to endorse or promote products derived from this software without
 *    specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE
 * FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
 * DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY,
 * OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE. *
 *
 * @package   cirrusImage
 * @author    Forest Feighner <forest@cirrusimage.net>
 * @copyright 2010 Forest Feighner
 * @license   http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @version   svn revision: $Id:$
 * @version   svn revision: $Date:$
 * @version   svn revision: $Rev:$
 * @link      http://cirrusImage.net
 * @link      http://api.cirrusImage.net
 * @since     0.1
 * @filesource
 * @todo      general clean up and recoding
 */

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
        <link type="text/css" href="http://jqueryui-1.tw3k.com/css/custom-theme/jquery-ui-1.8.custom.css" rel="stylesheet" />
        <link type="text/css" href="http://jqueryui-0.tw3k.com/css/jquery-ui-cirrus.css" rel="stylesheet" />
        <script type="text/javascript" src="http://jqueryui-0.tw3k.com/js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="http://jqueryui-1.tw3k.com/js/jquery-ui-1.8.custom.min.js"></script>
        <script type="text/javascript" src="http://jqueryui-0.tw3k.com/js/jquery-ui-cirrus.js"></script>
        <link type="text/css" href="http://jqueryui-1.tw3k.com/css/jquery.zrssfeed.css" rel="stylesheet" />
        <script type="text/javascript" src="http://jqueryui-0.tw3k.com/js/jquery.zrssfeed.min.js"></script>
    </head>
    <body>
        <div id="Logo" style="top:-6px;left:1px;width:183px;height:66px;" onclick="location.href='http://cirrusimage.net'"></div>
        <ul class="ui-menu" style="float:right">
            <li class="ui-menu-item"><a href='http://cirrusimage.net' title='cirrusImage'>cirrusImage</a></li>
            <li class="ui-menu-item"><a href='http://gallery.cirrusimage.net' title='Gallery'>Gallery</a></li>
            <li class="ui-menu-item"><a href='http://apps.cirrusimage.net' title='Google Apps, GMail and Documents'>GApps</a></li>
            <li class="ui-menu-item-hit"><a href='http://api.cirrusimage.net' title='cirrusImage API'>API</a></li>
            <li class="ui-menu-item"><a href='http://api.cirrusimage.net/docs/' title='cirrusImage PHP Documentation'>Docs</a></li>
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
var pageTracker = _gat._getTracker("UA-16248236-1");
pageTracker._setDomainName(".cirrusimage.net");
pageTracker._trackPageview();
} catch(err) {}</script>
    </body>
</html>
