<!DOCTYPE HTML>
<!-- BEGIN html -->
<html lang = "en">
<!-- BEGIN head -->
<head>
  <title>{{  (isset($forced_search) && $forced_search)?$forced_search:((isset($search) && $search)?$keyword:'Shop Kitchen Appliances') }}</title>
  <!-- Meta Tags -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <META name="description" content="Shop kitchen appliances, ovens, stoves, dishwashers and counter-top appliances.">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ SITE_URL.'images/favicon.ico' }}" type="image/x-icon" />
  <!-- Stylesheets -->
  <link type="text/css" rel="stylesheet" href="{{ SITE_URL.'css/reset.css' }}" />
  <link type="text/css" rel="stylesheet" href="{{ SITE_URL.'css/font-awesome.min.css' }}" />
  <link type="text/css" rel="stylesheet" href="{{ SITE_URL.'css/main-stylesheet.css' }}" />
  <link type="text/css" rel="stylesheet" href="{{ SITE_URL.'css/lightbox.css' }}" />
  <link type="text/css" rel="stylesheet" href="{{ SITE_URL.'css/shortcodes.css' }}" />
  <link type="text/css" rel="stylesheet" href="{{ SITE_URL.'css/custom-fonts.css' }}" />
  <link type="text/css" rel="stylesheet" href="{{ SITE_URL.'css/custom-colors.css' }}" />
  <link type="text/css" rel="stylesheet" href="{{ SITE_URL.'css/common.css' }}" />
  <link type="text/css" rel="stylesheet" href="{{ SITE_URL.'css/PumaSideBar.css' }}" id="mainStyle" media="screen" />
  <link type="text/css" rel="stylesheet" href="{{ SITE_URL.'css/bootstrap.min.css' }}" />
  <link type="text/css" rel="stylesheet" href="{{ SITE_URL.'css/app.css' }}" />
  <link type="text/css" rel="stylesheet" href="{{ SITE_URL.'css/responsive.css' }}" />
  <!--[if lte IE 8]>
  <link type="text/css" rel="stylesheet" href="{{ SITE_URL.'/css/ie-ancient.css' }}" />
  <![endif]-->
  <!-- Google Feed Script - Banners - jQ -->
  <!-- <script src="https://www.google.com/jsapi"></script> -->
  <script type="text/javascript" src="{{ SITE_URL.'jscript/jquery.min.js' }}"></script>
  <script type="text/javascript" src="{{ SITE_URL.'jscript/randomcontent.js' }}"></script>
  <script type="text/javascript">
        var SITE_URL = '<?php echo SITE_URL ?>',
            sidemenu = <?php echo json_encode($sidemenu);?>;
  </script>
</head>
<body>
<div class="boxed">
  <header class="header">
    <div class="header-topmenu">
      <div class="wrapper">
        <ul class="le-first">
			<li><a href="https://www.letsrenovate.com">Home</a></li>
			<li><a href="https://www.letsrenovate.com/magazine/">Magazine</a></li>
			<li><a href="https://www.letsrenovate.com/ideas/">Photo Remodeling</a></li>
			<li><a href="https://www.letsrenovate.com/remodeling-guide/">Home Remodeling Guide</a></li>
		    <li><a href="https://www.letsrenovate.com/gallery/index.html">Gallery</a></li>
			<li class="active"><a href="https://www.letsrenovate.com/shop">Shop</a></li>
			<li class="active2"><a href="https://www.letsrenovate.com/shopamazon/">Shop Amazon</a></li>
			<li><a href="https://www.letsrenovate.com/homeimprovement/">Directory</a></li>
			<li><a href="https://www.letsrenovate.com/services/index.html">Services</a></li>
			<li><a href="https://www.letsrenovate.com/finance/index.html">Finance</a></li>
			<li><a href="https://www.letsrenovate.com/sf/index.html">Tools</a></li>
			<li><a href="https://www.letsrenovate.com/travel/">Travel</a></li>
			<!-- li><a href="http://www.letsrenovate.com/travel/">Let&#039;s Travel</a></li -->
          <li class="imagechild"><a href="#begincontent" class="anchorLink2" data-atr="#begincontent"><img src="{{ URL::asset('images/scroll.png') }}" border="0" /></a></li>
        </ul>
      </div>
    </div>
    <div class="wrapper">
      <div class="header-block" >
        <div class="header-logo">
          <a href="/shop/index.php"><img src="/shophome/images/header-logo.png" alt="" /></a>
          <!--a href="index.php"><img src="{{ SITE_URL.('images/header-logo.png') }}" alt="" /></a -->
        </div>
        <div class="search-block">
            <input type="text" class="search-value" id='search-value' value="{{  (isset($forced_search) && $forced_search)?$forced_search:((isset($search) && $search)?$keyword:'') }}"  />
            <input type="submit" id="btn-search-button" class="search-button" value="" />
        </div>
      </div>
    </div>
    <div class="clear-float"></div>
	</header>

	<!-- BEGIN .main-body-wrapper -->
	<header class="main-header clearfix">
    <nav class="main-menu" id="begincontent">
      <div class="wrapper">
        <ul class="menu">
          <li class="toggleimage"><input type="image" src="{{ SITE_URL.('images/navigation.png') }}" id="botLaunch"></li>
          <!-- BATH  -->
          @foreach ($menu as $items)
          <li>
            @if($items->relative_url)
            <a href="{{ $items->relative_url.$items->url }}">{{ $items->name }}</a>
            @else
            <a href="{{ SITE_URL.('item/'.$items->url) }}">{{ $items->name }}</a>
            @endif
            <ul class="sub-menu">
                    @foreach ($items->childs as $child)
                    @if($child->relative_url)
                    <li><a href="{{ $child->relative_url.$child->url }}">{{ $child->name }}</a></li>
                    @else
                    <li><a href="{{ SITE_URL.('item/'.$child->url) }}">{{ $child->name }}</a></li>
                    @endif
                    @endforeach
            </ul>
          </li>
          @endforeach
        </ul>
      </div>
    </nav>
    <div class="clear-float"></div>
  </header>
  <!-- *** SUB NAVIGATION ************************************ -->
  <div class="subcatframehome">
  </div>
  <section class="content">
  <div class="wrapper wide">
    <div class="main-content">
      <div class="panel">
        <!-- BEGIN MOBILE VIEW - mobile consumption - will not view on desktop - need the ability to edit this section -->
        <div class="paragraph-row column12 mobilecolumn view">
            <div class="container-toggleshop">
              <div class="drop-button">
                <div class="drop-btn view"> <a id="botLaunch3" href="">Full Shopping Menu</a> </div>
              </div>
            </div>
          </div>
        <!-- END mobile consumption -->

        <!-- BEGIN MOBILE VIEW - mobile consumption -->
		<div class="paragraph-row column12 mobilecolumn scroll">
		  <div class="container-toggleshop">
			<div class="drop-button">
			  <div class="drop-btn scroll"> <a href="" onclick="scrollToElement('#mobilenav',500); return false;" class="anchorLink2" data-atr="#mobilenav">Select Product Type</a> </div>
			</div>
		</div>
		</div>
		<!-- END mobile consumption -->
        <div class="paragraph-row">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
  </section>
  <footer class="footer">
    <div class="wrapper">
      <div class="footer-widgets">
        @include('footer/widget-success')
        @include('footer/widget-feed')
        @include('footer/widget-finance')
      </div>
    </div>
    <div class="footer-bottom">
      @include('footer/footer-bottom') </div>
  </footer>
  <footer class="bottom-line">
    <div class="clear-float"></div>
    <div class="wrapper"> </div>
  </footer>
</div>

<div class="ending">&nbsp;</div>
<div class="clear-float"></div>

<script type="text/javascript" src="{{ URL::asset('jscript/jquery-latest.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('jscript/theme-script.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('jscript/lightbox.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('jscript/PumaSideBar.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('jscript/jquery.ui.totop.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('jscript/app.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('jscript/scrolltag.js') }}"></script>

<script type="text/javascript">
		$(document).ready(function() {
			$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>

<script>
  var $iW = $(window).innerWidth();
  if ($iW < 992){
     $('.rightcolumn').insertBefore('.leftcolumn');
  }else{
     $('.rightcolumn').insertAfter('.leftcolumn');
  }
</script>

<!-- <script type="text/javascript" src="http://www.google.com/jsapi?key=ABQIAAAAB1ftfdr-ZkgIsUzcXHIn3xTQA9OBc3ABrEq5i3_kGl-dTOKheBT9U_VJJgoD2HCrDX1ps5QYr5TjgA"></script> -->
@yield('scripts')

<!-- END body -->
</body>
<!-- END html -->
</html>