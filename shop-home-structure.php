
 <?php
 session_start();

 if(isset($_GET['price']) && $_GET['price']!=''){
 foreach($_GET as $k=>$v){
 }

 }
   /* ---------------------------------------
      Include PopShops class
      ---------------------------------------
   */
  define("POPSHOPS_API_VERSION",'3');
  require 'popshops.php';

  error_reporting(E_ERROR);
  ini_set('display_errors',1);


  /* ---------------------------------------
     API keys
     ---------------------------------------
     Set the following api keys to those found in your account, and for the
     specific catalog you wish to access.
  */
  $accountApiKey = '8z30bzswmwq4it7whuk0cqaiv';
  $catalogApiKey = '33nlnm9w9un8oc15nvpd8lfch';


  /* ---------------------------------------
     Set parameter namespace
     ---------------------------------------
     The following namespace will be used to differentiate PopShops variables
     from variables within your site.  This can be changed to anything you would
     like, or can be set to a blank '' string.
  */
  $nameSpace = 'psps_';

  $pageBrowserTitle = 'Home Structure';
  $productsPerPage = 40;
  $productGridColumns = 3;
  $subid = 'flooring';
  $localRedirects = true;


   /* ---------------------------------------
      Custom categories
     ---------------------------------------
     If you want to create a custom category based navigation, you can create them
     as saved searches.  You can also set an individual category as a default search
     for when the page first loads.

     This is setup where each category has a name and a set of associated search options
     that will be passed to PopShops.
  */
  	 include 'includes/sidenav/kitchen/in-appliance.php';

  /* ---------------------------------------
   Set a default search
   ---------------------------------------
   Set a default search in case the search keywords are empty.
  */
  $defaultSearch = $categories[ 0 ][ 'search_options' ][ 'keywords' ];

  /* ---------------------------------------
    Request the products from PopShops
    ---------------------------------------
    This snippet includes a PopShops class containing code to interact with the
    PopShops API.  We're going to create an instance of the PopShops class and
    then find any products using parameters passed to the page.
  */

 //orionk added this function

if(isset($_GET['psps_keywords'])) {
$_SESSION['psps_keywords']=$_GET['psps_keywords'];
$defaultSearch=$_SESSION['psps_keywords'];
//echo $_SESSION['psps_keywords'];

}

$showTitle = preg_replace( '/-\w*/','',$defaultSearch);
 $showTitle = trim($showTitle );

 $popshops = new PopShops( array( 'api_key' => $accountApiKey,
 'catalog_key' => $catalogApiKey,
 'categories' => $categories,
 'defaultSearch' => $defaultSearch,
 'keyword' => $defaultSearch,
 'title' => $defaultSearch ) );


?>

<!DOCTYPE HTML>
<html lang = "en">
<!-- BEGIN head -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Shop Home Structure</title>
<META name="description" content="Shop and compare multiple home improvement merchants for home structure items for the exterior home, doors and windows, flooring, lighting, plumbing, home wiring, and other structural items.">
<META name="keywords" content="exterior home">
<!-- Meta tags -->
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=100%; initial-scale=1; minimum-scale=1;" />

		<!-- Favicon -->
		<link rel="shortcut icon" href="http://www.letsrenovate.com/favicon.ico" type="image/x-icon" />

		<!-- Styles -->
		<?php include "includes/assets-shop-home-index.html"; ?>

	<!-- END head -->
	</head>

<!-- BEGIN body -->
<body class="top">
	<div class="boxed">


<!-- INSERTION -->

	<header class="header">

        <div class="header-topmenu">
        <?php include "includes/navigation/top-menu.html"; ?>
        </div>

        <!-- BEGIN MASTHEAD .wrapper -->
        <div class="wrapper">
        <?php include "includes/header.html"; ?>
        <!-- END .wrapper -->
		</div>


		 <div class="clear-float"></div>

		        <!-- END .header -->
	    </header>


		 		<div class="main-body-color-mask"></div>
		<div class="lightbox"></div>


				<!-- BEGIN .main-body-wrapper -->
				<div class="main-body-wrapper home">

					<!-- BEGIN .main-header -->
					<header class="main-header clearfix">


		    <nav class="main-menu" id="begincontent">

    <?php include "includes/navigation/main-menu-structure.html"; ?>

			</nav>
				     <div class="clear-float"></div>

					<!-- END .main-header -->
			</header>


  <!-- *** SUB NAVIGATION ************************************ -->
  <div id="subcatframehome">
    <div class="colgroup">
    </div>
  </div>



<!-- BEGIN MOBILE VIEW - mobile consumption -->
<div class="paragraph-row column12 mobilecolumn view home">
	<div class="container-toggleshop">
	  <div class="drop-button">
		<div class="drop-btn view"> <a id="botLaunch2">View Hm Structure Menu</a></div>
	  </div>
	</div>
</div>

  <!-- *** SLIDER ************************************ -->
  <section class="main-slider">

				<div id="hompage-slider_content">

					<!-- BEGIN .item -->
					<div class="item" style="background-image: url(/shopamazon/images/photos/photo-19.jpg);">
					  <div class="title-wrapper clearfix">
					    <div class="title">
					      <p class="clearfix menubot"><a href="#" id="botLaunch2" class="element-button  primary"><img src="/shopamazon/images/image_6.png" alt="" />Home Structure Directory</a></p>
					      <p class="clearfix"><a href="/shophome/item/home-flooring" class="headline">Thinking of remodeling?</a></p>
					      <p class="clearfix"><a href="/shophome/item/home-flooring" class="intro">So whether you are taking out a wall or adding new flooring or windows, we got you covered with a simple repair to major additions</a></p>
				        </div>
				      </div>
					  <img src="/shopamazon/images/blank.png" alt="" />
					  <!-- END .item -->
				  </div>
				</div>

			<!-- END .main-slider -->
			</section>

  <!-- *** CONTENT AREA ************************************************ -->

  <section class="main-content-wrapper clearfix">

				<!-- BEGIN .welcome-message-1 -->
				<div class="welcome-message-1c">
					<h2>Shop n' Compare Multiple Merchants in<br>
					Home Structure &amp; Remodeling</h2>
				<!-- END .welcome-message-1 -->
				</div>

				<!-- BEGIN .featured-items -->
				<div class="featured-items clearfix">

                  <div class="items clearfix">

                  <!-- BEGIN .quick-shop #1 -->

                    <div class="item-block-1 _collection-item">

						<div class="image-wrapper">
							<div class="image">
								<div class="overlay">
									<div class="position">
										<div>
											<p>attic insulation &bull; attic stairs &bull; basement structure &bull; ventilation &bull; stellar view</p>
											<a href="/shophome/item/attic" class="quickshop _quick-shop-launcher">View Bestsellers</a>
										</div>
									</div>
								</div>
								<a href="/shopamazon/shop-structure-attic.php"><img class="image-collection-item" src="/shopamazon/images/photos/photo-8-basement.jpg" style="margin: -27.5px 0 0 0;" alt="" /></a>
							</div>
						</div>
						<h2><a href="/shopamazon/shop-structure-attic.php">Attic &amp; Basement</a></h2>
					</div>



                    <!-- BEGIN .quick-shop #2 -->


                    <div class="item-block-1 _collection-item">

						<div class="image-wrapper">
							<div class="image">
								<div class="overlay">
									<div class="position">
										<div>
											<p>doors &bull; chimes & locks &bull; knobs and hardware &bull; windows &bull; window wells</p>
											<a href="/shophome/item/door-window" class="quickshop _quick-shop-launcher">View Bestsellers</a>
										</div>
									</div>
								</div>
								<a href="/shophome/item/door-window"><img class="image-collection-item" src="/shopamazon/images/photos/photo-8-window.jpg" style="margin: -27.5px 0 0 0;" alt="" /></a>
							</div>
						</div>
						<h2><a href="/shophome/item/door-window">Doors and Windows</a></h2>
					</div>


                      <!-- BEGIN .quick-shop #3 -->

                    <div class="item-block-1 _collection-item">

						<div class="image-wrapper">
							<div class="image">
								<div class="overlay">
									<div class="position">
										<div>
											<p>carpeting &bull; hardwood &bull; laminate &bull; rugs &bull; tile &bull; vinyl &bull; underfloor heating</p>
										  <a href="/shophome/item/home-flooring" class="quickshop _quick-shop-launcher">View Bestsellers</a></div>
									</div>
								</div>
								<a href="/shophome/item/home-flooring"><img class="image-collection-item" src="/shopamazon/images/photos/photo-8-flooring.jpg" style="margin: -27.5px 0 0 0;" alt="" /></a>
							</div>
						</div>
						<h2><a href="/shophome/item/home-flooring">Flooring</a></h2>
					</div>

                    <!-- BEGIN .quick-shop #4 -->

                    <div class="item-block-1 _collection-item">

						<div class="image-wrapper">
							<div class="image">
								<div class="overlay">
									<div class="position">
										<div>
											<p>garage doors &bull; door openers &bull; charging station &bull; storage &bull; workbench</p>
											<a href="/shophome/item/garage" class="quickshop _quick-shop-launcher">View Bestsellers</a>
										</div>
									</div>
								</div>
								<a href="/shophome/item/garage"><img class="image-collection-item" src="/shopamazon/images/photos/photo-8garage.jpg" style="margin: -27.5px 0 0 0;" alt="" /></a>
							</div>
						</div>
						<h2><a href="/shophome/item/garage">Garage</a></h2>

						<!-- END ROW 1 -->
					</div>

                    <!-- end .items -->
                </div>

                <!-- BEGOM ROW 2 -->

                <div class="items clearfix" style="margin-top: 50px">

                  <!-- BEGIN .quick-shop #5 --><!-- BEGIN .quick-shop #6 -->
                    <div class="item-block-1 _collection-item">
                      <div class="image-wrapper">
                        <div class="image">
                          <div class="overlay">
                            <div class="position">
                              <div>
                                <p>driveways &bull; foundation &bull; gutters &bull; home entry &bull; siding &bull; porches &bull; roof</p>
                                <a href="/shophome/item/exterior-home" class="quickshop _quick-shop-launcher">View Bestsellers</a></div>
                            </div>
                          </div>
                          <a href="/shophome/item/exterior-home"><img class="image-collection-item" src="/shopamazon/images/photos/photo-8exhm.jpg" style="margin: -27.5px 0 0 0;" alt="" /></a> </div>
                      </div>
                      <h2><a href="/shophome/item/exterior-home">Home Exterior</a></h2>
                    </div>
                    <!-- BEGIN .quick-shop #7 -->

                    <div class="item-block-1 _collection-item">

						<div class="image-wrapper">
							<div class="image">
								<div class="overlay">
									<div class="position">
										<div>
											<p>bath lighting &bull; ceiling fans &bull; ceiling lights &bull; lamps &bull; track &bull; wall lighting</p>
										  <a href="/shophome/item/home-lighting" class="quickshop _quick-shop-launcher">View Bestsellers</a>
										</div>
									</div>
								</div>
								<a href="/shophome/item/home-lighting"><img class="image-collection-item" src="/shopamazon/images/photos/photo-8-lighting.jpg" style="margin: -27.5px 0 0 0;" alt="" /></a>
							</div>
						</div>
						<h2><a href="/shophome/item/home-lighting">Lighting</a></h2>
					</div>

                    <!-- BEGIN .quick-shop #8 -->

                    <div class="item-block-1 _collection-item">

						<div class="image-wrapper">
							<div class="image">
								<div class="overlay">
									<div class="position">
										<div>
											<p>piping &bull; drain pipes &bull; plumbing valves &bull; electrical wiring &bull; switches, plates</p>
											<a href="/shophome/item/plumbing" class="quickshop _quick-shop-launcher">View Bestsellers</a>
										</div>
									</div>
								</div>
								<a href="/shophome/item/plumbing"><img class="image-collection-item" src="/shopamazon/images/photos/photo-8.jpg" style="margin: -27.5px 0 0 0;" alt="" /></a>
							</div>
						</div>
						<h2><a href="/shophome/item/plumbing">Plumbing &amp; Wiring</a></h2>

						<!-- END ROW 2 -->
					</div>

                    <!-- BEGIN .quick-shop #9 -->

                    <div class="item-block-1 _collection-item">

						<div class="image-wrapper">
							<div class="image">
								<div class="overlay">
									<div class="position">
										<div>
											<p>ceiling &bull; drywall &bull; interior paint &bull; moldings &bull; wallpaper &bull; paneling &bull; tile</p>
											<a href="/shophome/item/wall-drywall" class="quickshop _quick-shop-launcher">View Bestsellers</a>
										</div>
									</div>
								</div>
								<a href="/shophome/item/wall-drywall"><img class="image-collection-item" src="/shopamazon/images/photos/photo-8-walls.jpg" style="margin: -27.5px 0 0 0;" alt="" /></a>
							</div>
						</div>
						<h2><a href="/shophome/item/wall-drywall">Walls &amp; Ceiling</a></h2>

						<!-- END ROW 3 -->
					</div>

                    <!-- end .items -->
                </div>

                 <!-- end .featured-items -->
                </div>



 <!-- END section content -->
          </section>






          <!-- BEGIN .footer -->
		  		 		      <footer class="footer">
		  		 		        <!-- BEGIN .wrapper -->
		  		 		        <div class="wrapper" style="margin-top: 100px">
		  		 		          <!-- BEGIN .footer-widgets -->
		  		 		          <div class="footer-widgets">
		  		 		            <!-- BEGIN .widget SUCCESS - need ability to edit -->
		  		 		            <?php include "includes/footer/widget-success.html"; ?>

		  		 		            <!-- BEGIN .widget ARTICLES - need ability to edit -->
		  		 		            <?php include "includes/footer/widget-feed.html"; ?>

		  		 		            <!-- BEGIN .widget - need ability to edit -->
		  		 		            <?php include "includes/footer/widget-finance.html"; ?>

		  		 		            <!-- END .footer-widgets -->
		  		 	              </div>
		  		 		          <!-- END .wrapper -->
		  		 	            </div>

		  		 		        <div class="footer-bottom">
		  		 		          <!-- BEGIN .toggle code - need ability to edit -->
		  		 		          <?php include "includes/footer/footer-bottom.html"; ?>
		  		 	            </div>
		  		 		        <!-- END .footer -->
		  		 	          </footer>

		  		 		      <footer class="bottom-line">
		  		 		        <!-- BEGIN .wrapper -->
		  		 		            <div class="clear-float"></div>
		  		 		        <div class="wrapper">
		  		 		          <!-- END .wrapper -->
		  		 	            </div>
		  		 		        <!-- END .footer -->
		  		 	          </footer>
		  		 		      <!-- END .boxed -->

		  		 			        <!-- BEGIN .toggle menu -->
		  		 		            <?php include "includes/toggle/shopping-structure.html"; ?>


		  		 	</div>

		  		         

		  		 	<!-- END body boxed -->
</div>
		  	</body>

		  <!-- END html -->
</html>
