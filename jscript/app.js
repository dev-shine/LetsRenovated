var eventType = 'click';
var app_engine = {};


(function($){
	
	var app_engine = {
		initialize: function() {

			var url_break = window.location.pathname.split('/');

			if(url_break.length > 3) {

				if(url_break[url_break.length - 2] == 'item') {

					var keyword = url_break[url_break.length - 1];
					
					//add css to top menu
					$('.header-topmenu a').each(function() { 

						var href = this.getAttribute('href').split('/');
						href = href[href.length - 1];
						if(keyword == href) {
							$(this).parent().addClass('active');
							return false;
						}
					});
					//main menu
					$('.menu a').each(function() { 

						var href = this.getAttribute('href').split('/');
						href = href[href.length - 1];
						if(keyword == href) {
							$parent = $(this).parent();
							$parent.addClass('active');
							if($parent.parent().hasClass('le-firstsub')) {
								$($parent).parents('.mega-menu-full').addClass('active');
							}
							return false;
						}
					});
				}
			}

			$("#botLaunch,#botLaunch2,#botLaunch3").bind("click",function(){
				//call the left pan
				$.PumaSideBar({
					open: true,
					position: "left",  // Position
					label: "Menu", // Initial label
					movebody: true, // if you want to push or not your page
					avatar: "", // Initial avatar.
					items: sidemenu //level one ends
				});

			});


			/*------------------------Navigation Menu Ends-------------------------------*/
			/* ---------------------------SearhBox Function-------------------------*/
			document.getElementById("search-value").addEventListener("keydown", function(e) {
				if (!e) { var e = window.event; }

				var query = document.getElementById('search-value').value;

				if (query.length > 0 && e.keyCode == 13) { 	
					window.location.href = SITE_URL+'search/'+query;
				}
			}, false);

			$('#btn-search-button').bind('click',function(e){

				var query = document.getElementById('search-value').value;

				if (query.length > 0) { 	
					window.location.href = SITE_URL+'search/'+query;
				}
			});
			/* ---------------------------SearhBox Function ends-------------------------*/

			//Side Navigation
			//if active
			// initialize and display button drop nav
			/*$(".side-nav-group ul>li:has(ul) a").not(".side-nav-group ul li ul li a").click(function(){

				$CAT = $(this).parent().find(">ul,>div");

				if($CAT.is(":visible")) {
					$CAT.slideUp(100);
					$(this).removeClass("open");
				}
				else {
					$(".side-nav-group ul>li>ul,.side-nav-group ul>li>div").hide();
					$(".side-nav-group ul>li a").removeClass("open");
					$CAT.slideDown(500);
					$(this).addClass("open");
				}
				return false;
			});

		    $(".side-nav-group ul>li:first-child ul:first").show().parent().find("a:first").addClass("open");
			// hide sidebar options on page load -- KS 09/27/13
			$('.sidebarOpt').next().hide();*/

			//if active
			if($('.brand-filter > li.active').length) {
				$('.brand-filter').parent().show();
				$('#brand-filter').prev().addClass('open');
				if($('.brand-filter.more > li.active').length) {
					$('.brand-filter.less .more-trigger').parent().hide();
					$('.brand-filter').show();
				}
				else
					$('.brand-filter.less').show();
			}

			//if active
			if($('.merchant-filter > li.active').length) {
				$('.merchant-filter').parent().show();
				$('#merchant-filter').prev().addClass('open');
				if($('.merchant-filter.more > li.active').length) {
					$('.merchant-filter.less .more-trigger').parent().hide();
					$('.merchant-filter').show();
				}
				else
					$('.merchant-filter.less').show();
			}

			if($('.discount-filter > li.active').length) {
				$('.discount-filter').parent().show();
				$('#discount-filter').prev().addClass('open');
				if($('.discount-filter.more > li.active').length) {
					$('.discount-filter.less .more-trigger').parent().hide();
					$('.discount-filter').show();
				}
				else
					$('.discount-filter.less').show();
			}

			if($('.price-filter > li.active').length) {
				$('.price-filter').parent().show();
				$('#price-filter').prev().addClass('open');
				if($('.price-filter.more > li.active').length) {
					$('.price-filter.less .more-trigger').parent().hide();
					$('.price-filter').show();
				}
				else
					$('.price-filter.less').show();
			}

			//less and more
			$('.brand-filter input[type="checkbox"],.merchant-filter input[type="checkbox"]').click(function(){
	            window.location = $(this).parent().find('a').attr('href');
	        });

	        $(".more-trigger").click(function(event){
	          event.preventDefault();
	          $target = $(event.target);
	          $parent = $target.parents($target.attr("href"));

	          if ($target.attr("title") == "Less") {
	            $parent.find(".less .more-trigger").parent().show();
	            $parent.find(".more .more-trigger").parent().show();
	          }
	          else
	            $target.parent().hide(); 
	          
	          $parent.find(".more").slideToggle("fast",function(){

	          });
	          
	        });
		} //end initialize
	};


	app_engine.initialize();
	











})(jQuery);

