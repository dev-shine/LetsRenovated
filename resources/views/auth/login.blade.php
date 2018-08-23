@extends('home')

@section('scripts')
<script type="text/javascript">
  
$(function(){
  app_engine.auth_page();
  $('#login-dailog').modal({
  	'backdrop':'static'
  });
});

</script>
@endsection