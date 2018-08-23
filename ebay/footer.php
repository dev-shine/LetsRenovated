</div>


<hr>
      <footer>
        
          <div class="col-lg-12">

            <ul class="list-unstyled">
              <li class="pull-right"><a href="#top" class="btn btn-transparent"><i class="fa fa-angle-up"></i> Back to top</a></li>
              <li><a href="/">Home</a></li>

            </ul>
            <p>
				Copyright 2015 <?php echo $sitename; ?> 
			</p>

          </div>

      </footer>


<!-- Modal -->
<div class="modal fade" id="About" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">About</h4>
      </div>
      <div class="modal-body">
        <p><?php echo $about; ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

//	$(".browse h3:first").addClass("active");
	
//	$(".browse div:not(:first)").hide();

	$(".browse h3").click(function(){
		$(this).next("div").slideToggle("fast")
		.siblings("div:visible").slideUp("fast");
		$(this).toggleClass("active");
		$(this).siblings("h3").removeClass("active");
	});

	$(".browse h3").eq(0).removeClass("active");
});
$(window).load(function() {
	$('#loading-image').hide();
});
</script>



<img style="text-decoration:none;border:0;padding:0;margin:0;" src="http://rover.ebay.com/roverimp/1/711-53200-19255-0/1?pub=5574665384&toolid=10039&campid=<?php echo $campid;?>&mpt=[CACHEBUSTER]">