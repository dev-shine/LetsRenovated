$(document).ready(function(){






	// dropdown navigation
	$(".wrapper ul:first-child li").hover(
		function(){

			$this = $(this);
			h = $(".wrapper ul li").height();

			//$this.find(" > a").not("ul ul li a").delay(200).addClass("current");
			$("#" + $this.find(" > a").attr("rel")).css("top", h + "px").delay(1500).slideDown(500);

			},
		function(){

			$this = $(this);

			$("#" + $this.find(" > a").attr("rel")).clearQueue().fadeOut(200);
			//$this.find(" > a").not("ul ul li a").removeClass("current");

			});

	// add subnavigation indicator
	$("ul.menu li:has(div.drop-navigation)").find("> a")
	  .css("padding-right","7px")
	  .click(function () {
			// return false;
			})
	  .append("<span class=\"hasChildren\"></span>");
	$("a.sect-hdr")
	  .click(function () {
			return false;
			});

  });
