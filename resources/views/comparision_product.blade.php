@extends('app')


@section('content')
<div class="column2 leftcolumn">
  @include('widgets.compare-sidebar')
</div>
 <!-- BEGIN .shopping results -->
<div class="column10 rightcolumn">
  <div class="row">
    <div class="col-xs-12">
      <div class="well">
        <div class="col-xs-6"><?php echo $popshops->renderProductPaginationSummary(); ?></div>
        <div class="col-xs-6 ralign"><?php echo $popshops->renderPriceSorting(); ?></div>
      </div>
    </div>
  </div>
  <div id="product-container" class="row">
    @foreach($productsData as $product)
    	<?php //dd($product) ?>
      <div class="col-md-4">
        <div class="white-block product-box">
          <div class="white-block-media">
            <div class="embed-responsive embed-responsive-16by9">
              <img alt="deal" class="embed-responsive-item" src="{!! $product->image_url_large !!}">
            </div>
          </div>

          <div class="white-block-content">
          	<h3><a target="_blank" href="{!! $product->url !!}">{{ $product->name }}</a></h3>
            <div class="store-price calign"><strong>${!! $product->price_merchant !!}</strong></div>
            @if(strlen($product->description) > 125)
            <p class="psps-description">{!! substr($product->description,0,125) !!}... <a href="{!! $product->url !!}">Read more</a></p>
            @else
            <p class="psps-description">{!! $product->description !!}</p>
            @endif
            <ul class="list-unstyled list-inline bottom-icon">
              <li>
                <i class="fa fa-dot-circle-o icon-margin"></i> 
                <span class="mrg-r-10">Store:</span>{!! $popshops->offerStoreName($product) !!}
              </li>
            </ul>
          </div>
        </div>
      </div>
    @endforeach  
  </div>
  <div class="row calign">
    <?php echo $popshops->renderProductPaginationLinks() ?>
  </div>
  <div class="clear-float"></div>
</div>
@endsection



@section('scripts')

<script type="text/javascript">
  $(function(){
    
  });
</script>
@endsection