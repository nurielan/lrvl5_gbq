@extends('queue.index')

@section('title', 'Main')

@section('content')
		<div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
			<div class="row">
				<div class="antrian">
					<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
						<div class="nomor-antrian">
							<h1>Nomor Urut</h1>
							<h1 class="nomor">0</h1>
						</div>
					</div>

					<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
						<div class="tombol">
							<div class="row">
								{!! Form::open(['name' => 'form_main']) !!}
								{!! Form::hidden('number', 0) !!}

								<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
									{!! Form::button('Occupied', ['class' => 'btn btn-default disabled', 'name' => 'occupied', 'type' => 'submit']) !!}
								</div>

								<!--div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
									<button class="btn btn-default">Reset</button>
								</div-->

								<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
									{!! Form::button('Skip', ['class' => 'btn btn-default disabled', 'name' => 'skip', 'type' => 'submit']) !!}
								</div>

								<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
									{!! Form::button('Call', ['class' => 'btn btn-default disabled', 'name' => 'call', 'type' => 'submit']) !!}
								</div>
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<audio id="audio-0"><source src="{!! asset('assets/audio/nomor-urut.wav') !!}"></audio>

		<div id="wav"></div>
@endsection