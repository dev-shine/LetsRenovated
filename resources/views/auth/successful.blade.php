@extends('app')

@section('content')
<div align="center" class="wrapper">
    <div class="form_container" style="min-height:390px">
    	<h1>{{ $title }}</h1>
            <div id="accordion">
                <p>{{ $message }}<br /><br />
                <a href="/profile/insurance">Click Here to Continue</a></p>
            </div>
    </div>
</div>
@endsection
