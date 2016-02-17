@extends('queue.index')

@section('title', 'Ticket')

@section('content')
		<div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
			<div class="row">
				<div class="antrian cetak">
					<div class="nomor-antrian" id="kode-antrian">
						<h1>Nomor Urut</h1>
						<h1 class="nomor"></h1>
					</div>

					<div class="tombol" id="tombol-antrian">
						{!! Form::open(['name' => 'form_ticket']) !!}
						{!! Form::hidden('number') !!}

						
						{!! Form::button('Print', ['class' => 'btn btn-default', 'name' => 'print']) !!}
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
@endsection