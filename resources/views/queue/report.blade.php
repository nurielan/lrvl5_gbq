@extends('queue.index')

@section('title', 'Ticket')

@section('content')
		<div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
			<div class="row">
				<div class="antrian cetak">
					<div class="icon-download">
						<span class="glyphicon glyphicon-calendar"></span>
					</div>
					<div class="tombol" id="tombol-antrian">
						{!! Form::open(['action' => 'QueueController@getReportDetails']) !!}
						<div class="form-group">
							{!! Form::input('text', 'date_1', null, ['required', 'class' => 'form-control tanggal' ,'placeholder' => 'First Date', 'id' =>'date1']) !!}
						</div>

						<div class="form-group">
							{!! Form::input('text', 'date_2', null, ['required', 'class' => 'form-control tanggal' ,'placeholder' => 'Last Date', 'id' =>'date2']) !!}
						</div>
						
						{!! Form::button('Get Report', ['class' => 'btn btn-default', 'name' => 'report', 'type' => 'submit']) !!}
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
@endsection