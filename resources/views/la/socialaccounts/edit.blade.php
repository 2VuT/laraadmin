@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/socialaccounts') }}">SocialAccount</a> :
@endsection
@section("contentheader_description", $socialaccount->$view_col)
@section("section", "SocialAccounts")
@section("section_url", url(config('laraadmin.adminRoute') . '/socialaccounts'))
@section("sub_section", "Edit")

@section("htmlheader_title", "SocialAccounts Edit : ".$socialaccount->$view_col)

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
				{!! Form::model($socialaccount, ['route' => [config('laraadmin.adminRoute') . '.socialaccounts.update', $socialaccount->id ], 'method'=>'PUT', 'id' => 'socialaccount-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'provider_user_id')
					@la_input($module, 'provider')
					@la_input($module, 'user_id')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/socialaccounts') }}">Cancel</a></button>
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
	$("#socialaccount-edit-form").validate({
		
	});
});
</script>
@endpush
