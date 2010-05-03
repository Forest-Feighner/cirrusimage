<?php
/**
 * Page-level DocBlock
 * @package unfinished
 * @todo finish the functions on this page
 */

//require_once 'content/meta';

// echo '<pre>'; print_r($_GET); echo '</pre>';
class Image
{
    private $_content;
    private $_page = 0;
    public  $context = null;

    public function __construct(array $content, array $hit)
    {
        $this->_content = $content;
        return $this->context = $hit;
    }

}


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
