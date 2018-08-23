@extends('app')
@section('content')
<div class="column2 leftcolumn sidewidth mobile">
  @include('widgets.sidebar')
</div>
 <!-- BEGIN .shopping results -->
<div class="column10 rightcolumn sidelength">
  <div class="row h2header">
      <div class="col-xs-12">
        <h2>{!! $menuRow->name !!}</h2>
      </div>
  </div>
  @if(count($productsData) == 0)
    <div id="product-container">
      <div class="row afterh2">
          <div class="col-md-12">
            <h5>
              We couldn’t find any products matching your request - try different search …
            </h5>
          </div>
      </div>
    </div>
  @else
  <div class="row afterh2">
    <div class="col-xs-12">
      <div class="well" style="background-color: white !important;">
        <div class="col-xs-6"><?php if($total_count >= 10000){ $total_count=10000; } if($counting == null) $counting = 1; echo "Showing ".($total_count ==0 ? 0 : ($counting*40-39))."-".($total_count ==0 ? 0 : ((($counting*40)>=$total_count) ? $total_count : ($counting*40))). " of " .($total_count ==0 ? 0 : $total_count); ?></div>
        <div class="col-xs-6 ralign" style="word-spacing: 3px;">Price Sort <a id="id_asc"  style="cursor: pointer;">low -> high</a> - <a id="id_desc"  style="cursor: pointer;">high -> low</a></div>
      </div>
    </div>
  </div>
  <div id="product-container">
    <?php if(sizeof($productsData['attributes']['productResults'])<2) { echo "<h5>We couldn’t find any products matching your request - try different search …<h5>"; }  ?>
    @foreach(array_chunk($productsData['attributes']['productResults'], 3) as $chunked)
      <div class="row mobileproduct">
      @foreach($chunked as $product)
      <?php if(sizeof($product)<2) { $product=array(); $product = $productsData['attributes']['productResults']; }?>
        <div class="col-md-4">
          <div class="white-block product-box">
            <div class="white-block-media">

              <div class="embed-responsive embed-responsive-16by9">
                <img alt="deal" class="embed-responsive-item" src="{{ sizeof($product['image-url'])!=0?$product['image-url']:asset('images/na.jpg') }}">
              </div>
              <ul class="list-unstyled share-networks animation hide">
                <li>
                  <a target="_blank" class="share">
                      <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li>
                  <a target="_blank" class="share">
                      <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li>
                  <a target="_blank" class="share">
                      <i class="fa fa-google-plus"></i>
                  </a>
                </li>
              </ul>
              <a class="share open-share" href="javascript:;"><i class="fa fa-share-alt"></i></a>
            </div>

            <div class="white-block-content">
                <div class="store-price calign single"><strong>({!! sizeof($product['currency'])!=0?$product['currency']:'' !!}) {!! sizeof($product['price'])!=0?$product['price']:'' !!}</strong></div>
                <h3><a target="_blank" href="{{ $product['buy-url'] }}"  style="cursor: pointer;">{!! sizeof($product['name'])!=0?$product['name']:'' !!}</a></h3>
                @if(strlen($product['description']) > 125)
                <p class="psps-description">{!! sizeof($product['description'])!=0?substr($product['description'],0,125):'' !!}... <a href="{{ $product['buy-url'] }}">Read more</a></p>
                @else
                <p class="psps-description">{!! sizeof($product['description'])!=0?$product['description']:'' !!}</p>
                @endif
              <ul class="list-unstyled list-inline bottom-icon">
                <li>
                  <i class="fa fa-dot-circle-o icon-margin"></i>
                  <span class="mrg-r-10">Store:</span><a href="{{ $product['buy-url'] }}" style="cursor: pointer;">{!! sizeof($product['advertiser-name'])!=0?$product['advertiser-name']:'' !!}</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      @endforeach
      </div>
    @endforeach

  </div>

  <div class="row calign">
    <ul class="pagination">
      <li class="psps-search-current_First" style="cursor: pointer;"><span class="psps-search-current First">First</span></li>
      <li class="psps-search-current_Previous" style="cursor: pointer;"><span class="psps-search-current Previous">Previous</span></li>
      <?php
        if ($counting<6) {
          for($i=1;$i<7;$i++){
            echo '<li class="psps-search-current_'.($counting<3 ? $i : ($i-2)).'" style="cursor: pointer;"><span class="psps-search-current '.$i.'">'.$i.'</span></li>';
          }
        } else {
          for($i=$counting;$i<$counting+6;$i++){
            echo '<li class="psps-search-current_'.($counting<3 ? $i : ($i-2)).'" style="cursor: pointer;"><a class="psps-search-current '.($counting<3 ? $i : ($i-2)).'">'.($counting<3 ? $i : ($i-2)).'</a></li>';
          }
        }
      ?>
      <li class="psps-search-current_Next" style="cursor: pointer;"><span class="psps-search-current Next">Next</span></li>
      <li class="psps-search-current_Last" style="cursor: pointer;"><span class="psps-search-current Last">Last</span></li>
    </ul>
  </div>
    <?php
      $size = sizeof($productsData['attributes']['productResults']);
        for ($hoby=0;$hoby<(13-$size/3);$hoby++){
          echo '<div style="height:450px;"></div>';
        }
    ?>
  <div class="clear-float"></div>
  @endif
</div>
@endsection

@section('scripts')

<script type="text/javascript">

  $('ul.nav li.dropdown').hover(function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
  }, function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
  });


  function removeDuplicates(arr){
      let unique_array = []
      for(let i = 0;i < arr.length; i++){
          if(unique_array.indexOf(arr[i]) == -1){
              unique_array.push(arr[i])
          }
      }
      return unique_array
  }

  $(document).ready(function(){
      $("#view_2").hide();
      $("#see_more").click(function(){
        $("#view_2").show();
        $("#view_1").hide();
      });
      $("#see_less").click(function(){
        $("#view_1").show();
        $("#view_2").hide();
      });
      var page;
      if("{{ $total_count }}" == 0){
        for (var i=1;i<=251;i++){
          $( ".psps-search-current_" + i ).hide();
        }
        $( ".psps-search-current_Previous" ).hide();
        $( ".psps-search-current_First" ).hide();
        $( ".psps-search-current_Next" ).hide();
        $( ".psps-search-current_Last" ).hide();
        $( ".well" ).hide();
      }
      if ("{{ $total_count }}" % 40){
        page = parseInt("{{ $total_count }}" / 40)+1;
      } else {
        page = parseInt("{{ $total_count }}" / 40);
      }

      if("{{ $counting }}" == 1){
        $( ".psps-search-current_Previous" ).hide();
        $( ".psps-search-current_First" ).hide();
      }
      if(page == "{{ $counting }}"){
        $( ".psps-search-current_Next" ).hide();
        $( ".psps-search-current_Last" ).hide();
      }
      for (var i=page+1;i<=page+5;i++){
        $( ".psps-search-current_" + i ).hide();
      }


     if ("{{ $counting }}" > 5 || "{{ $counting }}" < 3){
       var counting = "{{ $counting }}";
     } else {
       var counting = "{{ $counting }}" - 2;
     }
     $('.psps-search-current_'+counting).addClass("disabled");

      $('.checkbox_see').change(function() {
          let ids = [];
          let $boxes = $('input[class=checkbox_see]:checked');
          $boxes.each(function(){
              ids.push($(this).attr('value'));
          });
          ids = removeDuplicates(ids);
          if(this.checked){
            this.checked = true;
          } else {
            this.checked = false;
            for (var i = 0; i < ids.length; i++)
            if (ids[i] === $(this).attr('value')) {
              ids.splice(i, 1);
                break;
            }
          }
          if(ids.length==0){ ids=0; }
          window.location = "/shophome/item/" + [ "{{ $keyword }}" ] + "/"+"1" + "/sort/" + ids;
          ids = [];
      });

      $(".checkbox_all").change(function(){
          let ids = [];
          let $boxes = $('input[class=checkbox_see]');
          $boxes.each(function(){
              ids.push($(this).attr('value'));
          });
          ids = removeDuplicates(ids);
          if(this.checked){
            $(".checkbox_see").prop('checked', true);
            window.location = "/shophome/item/" + [ "{{ $keyword }}" ] + "/"+"1" + "/sort/" + ids;
          } else {
            $(".checkbox_see").prop('checked', false);
            window.location = "/shophome/item/" + [ "{{ $keyword }}" ] + "/"+"1" + "/sort/" + "0";
          }
      });

     $(".psps-search-current").click(function(){
          var param;
          if ("{{ $counting }}" <= 1 && ($(this).attr("class")).split(' ')[1] == "Previous") {
            return;
          } else if(($(this).attr("class")).split(' ')[1] == "Next" && ("{{ $counting }}"*40 >= "{{ $total_count }}")){
            return;
          } else if(($(this).attr("class")).split(' ')[1] == "Previous"){
            param = "{{ $counting-1 }}";
          } else if (($(this).attr("class")).split(' ')[1] == "{{ $counting }}"){
            return;
          } else if($(this).attr("class").split(' ')[1] == "Next"){
            param = "{{ $counting+1 }}";
          } else if($(this).attr("class").split(' ')[1] == "First"){
            param = 1;

          } else if($(this).attr("class").split(' ')[1] == "Last"){
            param = page;
          } else {
            param = ($(this).attr("class")).split(' ')[1];
          }
          let ids = [];
          let $boxes = $('input[class=checkbox_see]:checked');
          $boxes.each(function(){
              ids.push($(this).attr('value'));
          });
          $.each(ids, function(i, el){
              if($.inArray(el, ids) === -1) ids.push(el);
          });
          ids = removeDuplicates(ids);
          if(ids.length==0){ ids=0; }
          window.location = "/shophome/item/" + [ "{{ $keyword }}" ] + "/" + param + '/sort/' + ids;
          ids = [];
      });
      $("#id_asc").click(function(){
          let ids = [];
          let $boxes = $('input[class=checkbox_see]:checked');
          $boxes.each(function(){
              ids.push($(this).attr('value'));
          });
          ids = removeDuplicates(ids);
          if(ids.length==0){ ids=0; }
          window.location = "/shophome/item/" + [ "{{ $keyword }}" ] + "/"+"{{ $counting }}" + "/asc/" + ids;
          ids = [];
      });
      $("#id_desc").click(function(){
          let ids = [];
          let $boxes = $('input[class=checkbox_see]:checked');
          $boxes.each(function(){
              ids.push($(this).attr('value'));
          });
          ids = removeDuplicates(ids);
          if(ids.length==0){ ids=0; }
          window.location = "/shophome/item/" + [ "{{ $keyword }}" ] + "/"+"{{ $counting }}" + "/desc/" + ids;
          ids = [];
      });
  });

</script>
@endsection
