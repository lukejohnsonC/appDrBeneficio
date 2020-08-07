@extends('estrutura.master')

@section('conteudo')

<style>
    #menu, #allSections section {
        position: relative;
    }

    #allSections {
        float:left;
        width:100%;
    }

    #allSections sections {
        width:100%;
    }

</style>

<!-- MENU -->
<section id="menu">
    <nav>
        <ul>
          @foreach($menu as $m)

           <?php
           $url = $m->CONTEUDO;
           if($m->TIPO == "MODULO") {
              $url = route($m->CONTEUDO);
           }

           if($m->TIPO == "MODULOWL") {
              $url = route($m->CONTEUDO, $m->PARAM_WL);
           }

           if($m->TIPO == "HTML") {
                $url = route('verHTML', $m->ID_MENU);
           }

           if($m->TIPO == "CONTATO") {
                $url = route('verCONTATO', $m->ID_MENU);
           }

           if($m->TIPO == "FORM_DINAMICO") {
                $url = route('verFORM_DINAMICO', $m->ID_MENU);
            }

           ?>
            <a href="{{$url}}" @if($m->TIPO == "LINK") target="_blank" @endif>
              <li>
                <article>
                  <div class='icone'>{!!$m->ICONE!!}</div>
                  <span>{{$m->NOME}}</span>
                  <i class="fas fa-angle-right"></i>
                </article>
              </li>
            </a>
            @endforeach
        </ul>
    </nav>
    <div class="clear"></div>
</section>



<script>

function moverDIV(id, tipo, conteudo) {
var menu = $("#menu");
menu.animate({
          right: '100%',
      }, 500, function(){

          if(tipo == "HTML") {
              //var pag = $("#sectionHTML_" + id);
              //menu.hide();
              //pag.removeClass('dNone');
              //botoesTopoStatus2();
              window.location.href = conteudo;
          }

          if(tipo == "MODULO") {
           window.location.href = conteudo;
          }

      });
}

function mostraMenu() {
var menu = $("#menu");
var section_ativa = $("#allSections section:not(.dNone)");
section_ativa.animate({
          left: '100%',
      }, 500, function(){
        menu.show();
        menu.css('right','0');
        section_ativa.addClass('dNone');
        section_ativa.removeAttr('style');
        botoesTopoStatus1();
      });
}

function botoesTopoStatus1() {
    $("#button-menu").addClass('dNone');
    $("#turnoff").removeClass('dNone');
}

function botoesTopoStatus2() {
    $("#button-menu").removeClass('dNone');
    $("#turnoff").addClass('dNone');
}

</script>

{{--
<div id="allSections">

    CRIA AS DIVS COM CONTEÚDO HTML DO BANCO

    @foreach($menu as $m)
            @if($m->TIPO == 'HTML')
            <section id="sectionHTML_{{$m->ID_MENU}}" class='dNone'>
                {!!$m->CONTEUDO!!}
            </section>
            @endif
    @endforeach

</div>
--}}

@endsection
