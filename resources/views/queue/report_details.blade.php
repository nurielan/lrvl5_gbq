@extends('queue.index')

@section('title', 'Main')

@section('content')
		<div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
			<div class="row">
				<div class="antrian">
					<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
						<p class="data-per">Data Per: {{ $tanggal1 }} - {{ $tanggal2 }}</p>
					</div>
					<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
						<div class="nomor-antrian">
							<h1 class="nomor-panggil">{{ $terpanggil }}</h1>
							<h1>Terpanggil</h1>
						</div>
					</div>

					<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
						<div class="nomor-antrian">
							<h1 class="nomor-panggil">{{ $tidak_terpanggil }}</h1>
							<h1>Tidak Terpanggil</h1>
						</div>
					</div>

					<div class="tombol" id="tombol-antrian">
						{!! Form::button('Print Report', ['class' => 'btn btn-default', 'name' => 'print']) !!}
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
@endsection