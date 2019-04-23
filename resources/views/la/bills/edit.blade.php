@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/bills') }}">Bill</a> :
@endsection
@section("contentheader_description", $bill->$view_col)
@section("section", "Bills")
@section("section_url", url(config('laraadmin.adminRoute') . '/bills'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Bills Edit : ".$bill->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($bill, ['route' => [config('laraadmin.adminRoute') . '.bills.update', $bill->id ], 'method'=>'PUT', 'id' => 'bill-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'id_customer')
					@la_input($module, 'date_order')
					@la_input($module, 'total')
					@la_input($module, 'payment')
					@la_input($module, 'note')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/bills') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#bill-edit-form").validate({
		
	});
});
</script>
@endpush
