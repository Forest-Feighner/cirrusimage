<?php
/**
 * indexRest file
 *
 * cirrusImage :: api index
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

define("IMG_DIR", getcwd() . '/image/');
define("IMG_URL", 'http://api.cirrusimage.net/image/');
define("IMG_IMG", 'http://api.cirrusimage.net/');
define("IMG_API", 'http://api.cirrusimage.net/');


if (!isset($_GET['context'])) $_GET['context'] = null;
if (isset($_GET['gallery']) && isset($_GET['image'])) {
    $imageResource = IMG_DIR  . $_GET['gallery'] . '/' .  $_GET['image'];
    $imageRelativeResource = $_GET['gallery'] . '/' .  $_GET['image'];
}

$title = null;
if (isset($_GET['gallery'])) {
    $title = str_replace('_',' ', $_GET['gallery']);
    $title = ucfirst(str_replace('-',' ', $title));
}
$dc_title = $title;
$dc_description = 'Drawing, Painting (Works on Paper) and Digital Works';
$description = 'Drawing, Painting (Works on Paper) and Digital Works';
$keywords = 'Current Work, works in progress, work on paper, drawing, painting, tw3k';




require_once 'Index.php';

foreach (new DirectoryIterator('content/') as $copy) {
    if($copy->isDot()) continue;
        $pages[] = $copy->getFilename();
}
$index = new Index($pages, $_GET);
$page = new Page($_GET);
$include = $page->contains($pages);
require_once getcwd() . '/content/' . $include['context'];

//echo '<pre>'; print_r($index); echo '</pre>';echo '<pre>'; print_r($page); echo '</pre>';
