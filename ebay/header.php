<?
include 'config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php if($_GET['country'] != '') { ?>
<title><?php echo ucfirst($sort); ?> <?php echo ucfirst(str_replace("_", " ",$search)); ?> - <?php echo ucfirst($listType); ?> - <?php echo $_GET['country']; ?> - <?php echo $sitename; ?></title>
<?php } else { ?>
 <title><?php echo $sitename;?> - <?php echo $siteslogan;?></title>
<?php } ?>
<meta name=viewport content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/shophome/ebay/css/nouislider.min.css">

<link rel="shortcut icon" href="/favicon.ico" />
<meta name="description" content="Browse <?php echo ucfirst($listType); ?> - <?php echo ucfirst($sort); ?> <?php echo ucfirst(str_replace("_", " ",$search)); ?> Auctions <?php echo $_GET['country']; ?> on eBay <?php echo $_GET['country']; ?>" />
<meta name="keywords" content="<?php echo ucfirst($listType); ?> <?php echo ucfirst($sort); ?> <?php echo str_replace("_", " ",$search); ?> eBay,<?php echo ucfirst($listType); ?> <?php echo ucfirst($sort); ?> <?php echo str_replace("_", " ",$search); ?> Auctions, <?php echo ucfirst($listType); ?> <?php echo ucfirst($sort); ?> <?php echo $_GET['country']; ?> Auctions , <?php echo ucfirst($sort); ?> <?php echo str_replace("_", " ",$search); ?> eBay,<?php echo ucfirst($sort); ?> <?php echo str_replace("_", " ",$search); ?> Auctions,<?php echo str_replace("_", " ",$search); ?> eBay,<?php echo str_replace("_", " ",$search); ?> Auction"/>
<link rel="stylesheet" href="/shophome/ebay/css/themes/<?php echo $theme;?>.css">
<link href="<?  echo $path ?>/css/styles.css" rel="stylesheet" type="text/css" />


</head>
<body>





              <div class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?  echo $path ?>"><img src="/images/ebay.png" width="55" height="22" alt="<?php echo $sitename; ?>"> <i class="fa fa-gavel"></i><?php echo $siteslogan; ?></a>
                  </div>

                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
						<li><a rel="nofollow" href="<?  echo $path ?>/">Home</a></li>
                      <li class="<?php if($listType == 'All'){ echo 'active';} ?>"><a rel="nofollow" href="<?  echo $path ?>/<?php echo $country; ?>/<?php echo $search; ?>/All/<?php echo $sort; ?>/">All</a></li>
                      <li class="<?php if($listType == 'Auction'){ echo 'active';} ?>"><a  rel="nofollow" href="<?  echo $path ?>/<?php echo $country; ?>/<?php echo $search; ?>/Auction/<?php echo $sort; ?>/">Auction</a></li>
                      <li class="<?php if($listType == 'AuctionWithBIN'){ echo 'active';} ?>"><a  rel="nofollow" href="<?  echo $path ?>/<?php echo $country; ?>/<?php echo $search; ?>/AuctionWithBIN/<?php echo $sort; ?>/">Buy It Now</a></li>

                    </ul>




<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" rel="nofollow">More <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#About" data-toggle="modal" data-target="#About">About</a></li>
						<li role="presentation" class="divider"></li>
						<li role="presentation" class="dropdown-header">International Sites</li>
						<? include 'includes/countries.php' ?>
					</ul>
				</li>
			</ul>



                  </div>
                </div>
              </div>





<ul class="breadcrumb">
                <li><a href="<? echo $path ?>"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Latest</li>
</ul>



<div class="container">