<!DOCTYPE HTML>
<!-- BEGIN html -->
<html lang = "en">
<!-- BEGIN head -->
<head>
  <title>Shop Kitchen Appliances</title>
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
  <link type="text/css" rel="stylesheet" href="{{ SITE_URL.'css/responsive.css' }}" />
  <link type="text/css" rel="stylesheet" href="{{ SITE_URL.'css/bootstrap.min.css' }}" />
  <link type="text/css" rel="stylesheet" href="{{ SITE_URL.'css/app.css' }}" />
  <!--[if lte IE 8]>
  <link type="text/css" rel="stylesheet" href="{{ SITE_URL.'/css/ie-ancient.css' }}" />
  <![endif]-->
  <!-- Google Feed Script - Banners - jQ -->
  <!-- <script src="https://www.google.com/jsapi"></script> -->
  <script type="text/javascript" src="{{ SITE_URL.'jscript/jquery.min.js' }}"></script>
  <script type="text/javascript" src="{{ URL::asset('jscript/randomcontent.js') }}"></script>
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
		                    <li><a href="http://www.letsrenovate.com">Home</a></li>
		                    <li><a href="http://www.letsrenovate.com/magazine/">Home Improvement Magazine</a></li>
		                    <li><a href="http://www.letsrenovate.com/remodeling-guide/">Home Remodeling Guide</a></li>
		                    <li class="active"><a href="http://www.letsrenovate.com/shophome">Shop</a></li>
		                    <li><a href="http://www.letsrenovate.com/gallery/index.html">Gallery</a></li>
		                    <li><a href="http://www.letsrenovate.com/homeimprovement/">Ideas Directory</a></li>
		                    <li><a href="http://www.letsrenovate.com/services/index.html">Services</a></li>
		                    <li><a href="http://www.letsrenovate.com/finance/index.html">Finance</a></li>
                    		<li><a href="http://www.letsrenovate.com/sf/index.html">Tools</a></li>
		                    <li><a href="http://www.letsrenovate.com/letstravel/">Let&#039;s Travel</a></li>
          <li class="imagechild"><a href="#begincontent" class="anchorLink2" data-atr="#begincontent"><img src="{{ URL::asset('images/scroll.png') }}" border="0" /></a></li>
        </ul>
      </div>
    </div>
    <div class="wrapper">
      <div class="header-block" >
        <div class="header-logo">
          <a href="index.html"><img src="{{ SITE_URL.('images/header-logo.png') }}" alt="" /></a>
        </div>
        <div class="search-block">
            <input type="text" class="search-value" id='search-value' value="{{ (isset($search) && $search)?$keyword:'' }}"  />
            <input type="submit" id="btn-search-button" class="search-button" value="" />
        </div>
      </div>
    </div>
    <nav class="main-menu" id="begincontent">
      <div class="wrapper">
        <ul class="menu">
          <li class="toggleimage"><input type="image" src="{{ SITE_URL.('images/navigation.png') }}" id="botLaunch"></li>
          <!-- BATH  -->
          @foreach ($menu as $items)
          <li class="mega-menu-full">
            @if($items->relative_url)
            <a href="{{ $items->relative_url.$items->url }}">{{ $items->name }}</a>
            @else
            <a href="{{ SITE_URL.('item/'.$items->url) }}">{{ $items->name }}</a>
            @endif
            <ul class="sub-menu">
              <li class="menu-block column12">
                <div class="shopmenu-bottommenu">
                  <div class="wrapper">
                    <ul class="le-firstsub">
                    @foreach ($items->childs as $child)
                    @if($child->relative_url)
                    <li><a href="{{ $child->relative_url.$child->url }}">{{ $child->name }}</a></li>
                    @else
                    <li><a href="{{ SITE_URL.('item/'.$child->url) }}">{{ $child->name }}</a></li>
                    @endif
                    @endforeach
                    </ul>
                  </div>
                </div>
              </li>
            </ul>
          </li>
          @endforeach
        </ul>
      </div>
      <div class="clear-float"></div>
    </nav>
    <div class="clear-float"></div>
  </header>
  <section class="content">
  <div class="wrapper wide">
    <div class="main-content">
      <div class="panel">
        <!-- BEGIN MOBILE VIEW - mobile consumption - will not view on desktop - need the ability to edit this section -->
        <div class="paragraph-row mobilecolumn">
          <div class="column12">
            <div class="container-toggleshop">
              <div class="drop-button">
                <div class="drop-btn"> <a id="botLaunch3" href="">Full Kitchen Menu</a> </div>
              </div>
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
<script type="text/javascript" src="{{ URL::asset('jscript/jquery.ui.totop.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('jscript/PumaSideBar.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('jscript/jquery.ui.totop.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('jscript/app.js') }}"></script>

<script type="text/javascript">
		$(document).ready(function() {
			$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>


<!-- <script type="text/javascript" src="http://www.google.com/jsapi?key=ABQIAAAAB1ftfdr-ZkgIsUzcXHIn3xTQA9OBc3ABrEq5i3_kGl-dTOKheBT9U_VJJgoD2HCrDX1ps5QYr5TjgA"></script> -->
@yield('scripts')

<!-- END body -->
</body>
<!-- END html -->
</html>