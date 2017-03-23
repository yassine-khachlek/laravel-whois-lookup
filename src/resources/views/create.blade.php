@extends('layouts.app')

@section('content')
<form action="" method="POST">
	{{ method_field('POST') }}
	{{ csrf_field() }}
	<div class="form-group{{ $errors->has('domain') ? ' has-error' : '' }}">
		<label for="domain">Domain</label>
		<input name="domain" type="text" value="{{ old('domain') }}" class="form-control" placeholder="Domain name">
        @if ($errors->has('domain'))
            <span class="help-block">
                <strong>{{ $errors->first('domain') }}</strong>
            </span>
        @endif
	</div>
	<button type="submit" class="btn btn-default btn-block btn-lg">Search</button>
</form>

<br>

<div id="response"></div>
@append

@section('scripts')
<script type="text/javascript">
$(function() {
	$( "form" ).on( "submit", function( event ) {
		event.preventDefault();

		var request = $.ajax({
			url: $( this ).attr('action'),
			method: $( this ).attr('method'),
			data: $( this ).serialize(),
			dataType: "html"
		});

		request.done(function( response ) {
			$('#response').html('<pre>' + response + '</pre>');
		});

		request.fail(function( jqXHR, textStatus ) {
			alert( "Request failed: " + textStatus );
		});
	});
});
</script>
@append