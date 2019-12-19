@extends('estrutura.master')

@section('conteudo')

<style>
/*
html, body {
  overflow: hidden;
} */
</style>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
$( document ).ready(function() {
  if( navigator.userAgent.toLowerCase().indexOf('firefox') > -1 ){
      $("#frame1").remove();
         Swal.fire({
         title: '<strong><u>Dr. Benefício informa:</u></strong>',
         type: 'info',
         html:
           'Esta funcionalidade não está habilitada no navegador Firefox. Por favor, utilize outro navegador.',
         showCloseButton: true,
         showCancelButton: false,
         focusConfirm: false,
         confirmButtonText:
           '<i class="fa fa-thumbs-up"></i>',
       }).then((result) => {
          if (result.value) {
              window.location = "{{route('clubedevantagens.index')}}";
          }
  })
}
});

function iframeCarregado() {
 var myFrame = $("#frame1").contents().find('body');
 console.log(myFrame);
 //var textareaValue = $("textarea").val();
 //myFrame.html(textareaValue);
}
</script>



<section id="consultas">
    <iframe id="frame1" src="{{$iframe}}" onload="iframeCarregado()" frameborder="0" style="overflow:hidden;height:calc(100vh - 131.2px);width:100vw" height="100%" width="100%">
    </iframe>
</section>

@endsection
