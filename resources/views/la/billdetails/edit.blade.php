@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/billdetails') }}">BillDetail</a> :
@endsection
@section("contentheader_description", $billdetail->$view_col)
@section("section", "BillDetails")
@section("section_url", url(config('laraadmin.adminRoute') . '/billdetails'))
@section("sub_section", "Edit")

@section("htmlheader_title", "BillDetails Edit : ".$billdetail->$view_col)

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
				{!! Form::model($billdetail, ['route' => [config('laraadmin.adminRoute') . '.billdetails.update', $billdetail->id ], 'method'=>'PUT', 'id' => 'billdetail-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'id_bill')
					@la_input($module, 'id_product')
					@la_input($module, 'quantity')
					@la_input($module, 'unit_price')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/billdetails') }}">Cancel</a></button>
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
	$("#billdetail-edit-form").validate({
		
	});
});
</script>
@endpush
