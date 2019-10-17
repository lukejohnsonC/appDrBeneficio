@extends('estrutura.master') 

@section('conteudo')

@if ( Session::get('message') != '' )
      <div id="erro">{{ Session::get('message') }}</div>
@endif

<section id="vantagens" class="">
        <div class="container">
                <img src="{{asset('novo')}}/imgs/vidalink.png" alt="Logo Vidalink" style="margin: 0 auto;display: block;margin-bottom:15px;">
            <h1 style="text-align: center">Recebemos a sua solicitação.</h1>
            <p style="text-align: center">O seu cartão farmácia Vidalink estará liberado em: 

			<div id="countdown">
			  <div id='tiles'></div>
			  <div class="labels">
			    <li>Dia(s)</li>
			    <li>Horas</li>
			    <li>Minutos</li>
			    <li>Segundos</li>
			  </div>
			</div>

			<script>
				var target_date = new Date('{{$data_inicial}}').getTime() + (1000*3600*48); // set the countdown date
				var days, hours, minutes, seconds; // variables for time units

				var countdown = document.getElementById("tiles"); // get tag element

				getCountdown();

				setInterval(function () { getCountdown(); }, 1000);

				function getCountdown(){

					// find the amount of "seconds" between now and target
					var current_date = new Date().getTime();
					var seconds_left = (target_date - current_date) / 1000;

					days = pad( parseInt(seconds_left / 86400) );
					seconds_left = seconds_left % 86400;
						 
					hours = pad( parseInt(seconds_left / 3600) );
					seconds_left = seconds_left % 3600;
						  
					minutes = pad( parseInt(seconds_left / 60) );
					seconds = pad( parseInt( seconds_left % 60 ) );

					// format countdown string + set tag value
					countdown.innerHTML = "<span>" + days + "</span><span>" + hours + "</span><span>" + minutes + "</span><span>" + seconds + "</span>"; 
				}

				function pad(n) {
					return (n < 10 ? '0' : '') + n;
				}

			</script>

</section>
   
@endsection