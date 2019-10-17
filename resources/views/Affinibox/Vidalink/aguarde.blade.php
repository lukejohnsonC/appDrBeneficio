@extends('estrutura.master') 

@section('conteudo')

@if ( Session::get('message') != '' )
      <div id="erro">{{ Session::get('message') }}</div>
@endif

<section id="vantagens" class="">
        <div class="container">
                <img src="{{asset('novo')}}/imgs/vidalink.png" alt="Logo Vidalink" style="margin: 0 auto;display: block;margin-bottom:15px;">
            <h1 style="text-align: center">Recebemos a sua solicitação.</h1>
            <p style="text-align: center">O seu cartão farmácia Vidalink estará liberado em {{$horas_restantes}} horas.</p>


				<div class="container">
				  <ul>
				    <li><span id="days"></span>days</li>
				    <li><span id="hours"></span>Hours</li>
				    <li><span id="minutes"></span>Minutes</li>
				    <li><span id="seconds"></span>Seconds</li>
				  </ul>
				</div>

			<script>
			
const second = 1000,
      minute = second * 60,
      hour = minute * 60,
      day = hour * 24;

let countDown = new Date($data_final).getTime(),
    x = setInterval(function() {

      let now = new Date().getTime(),
          distance = countDown - now;

     	document.getElementById('days').innerText = Math.floor(distance / (day)),
        document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
        document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
        document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);
      
      //do something later when date is reached
      //if (distance < 0) {
      //  clearInterval(x);
      //  'IT'S MY BIRTHDAY!;
      //}

    }, second)

			</script>

			<script>
				alert({{$}});
			</script>
</section>
   
@endsection