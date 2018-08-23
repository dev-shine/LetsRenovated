
<script>
  var $iW = $(window).innerWidth();
  if ($iW < 992){
     $('.rightcolumn').insertBefore('.leftcolumn');
  }else{
     $('.rightcolumn').insertAfter('.leftcolumn');
  }
</script>