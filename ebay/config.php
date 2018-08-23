<?
$sitename = '';
$siteslogan = 'Shop eBay Home Improvement';
$path = 'http://www.letsrenovate.com/shophome/ebay';//path to script home folder - no trailing /


$campid = '5574670581';// ebay parter network campaign id
$limit = '200';// listing limit
$about ='eBay shopping module for all your home improvement needs.'; // no item found text
$error ='Your search did not match any results.'; // no item found text

// 16 Bootswatch.com Themes paper,slate,spacelab,flatly,superhero,united
$theme = "slate";


// NO NEED TO EDIT BELOW
$template = 'templates/template.html';// template.


$country = $_GET['country'];
$catid = $_GET['catid'];
$search = $_GET['search'];
$listType = $_GET['listType'];
$sort = $_GET['sort'];


if(!$country) $country = 'USA';
if(!$sort) $sort = 'BestMatch';
if(!$listType) $listType = 'All';
if(!$search) $search = 'All';

$c1 = array(" ");
$c2  = array("-");

$search = str_replace(" ", "_", $search);
$search = str_replace("%20", "_", $search);
$search = str_replace("-", "_", $search);
?>