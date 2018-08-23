@extends('app')

@section('content')

<div class="row registration">
{!! Form::open(['class'=>'form-horizontal with-pad validate frm-register']) !!}
  <h2>Getting Started - Personal Information</h2>
  <div class="row">
    <div class="dump-message"></div>
  </div>
  <div class="col-md-12">
     <div class="col-md-6 reg-block">
       <h4>Name</h4>
       <p>Please enter your full name</p>
       <div class="form-group">
         <label for="txt-first" class="col-sm-3 control-label">First Name</label>
         <div class="col-sm-9">{!! Form::text('first_name',null,['class'=>'form-control validate[required]']) !!}</div>
       </div>
       <div class="form-group">
         <label for="txt-first" class="col-sm-3 control-label">Middle Name</label>
         <div class="col-sm-9">{!! Form::text('middle_name',null,['class'=>'form-control','placholder'=>'Optional']) !!}</div>
       </div>
       <div class="form-group">
         <label for="txt-first" class="col-sm-3 control-label">Last Name</label>
         <div class="col-sm-9">{!! Form::text('last_name',null,['class'=>'form-control validate[required]']) !!}</div>
       </div>
     </div>

     <div class="col-md-6 reg-block">
       <h4>Wasp ID and Password</h4>
       <p>Please enter your primary email address as your Wasp ID. This will be used as the contact email address for your account.</p>
       <div class="form-group">
         <label for="txt-first" class="col-sm-3 control-label">Primary WASP ID</label>
         <div class="col-sm-9">{!! Form::text('email',null,['class'=>'form-control validate[required,custom[email]]']) !!}</div>
       </div>
       <div class="form-group">
         <label for="txt-first" class="col-sm-3 control-label">Password</label>
         <div class="col-sm-9">{!! Form::password('password',['id'=>'txt_password','class'=>'form-control validate[required]']) !!}</div>
       </div>
       <div class="form-group">
         <label for="txt-first" class="col-sm-3 control-label">Confirm Password</label>
         <div class="col-sm-9">{!! Form::password('password_confirmation',['class'=>'form-control validate[required,equals[txt_password]]']) !!}</div>
       </div>
     </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      
      <div class="col-md-6 reg-block">
       <h4>Address/Phone Number</h4>
       <p>Please enter you full address and contact numbers.</p>
       <div class="form-group">
         <label for="txt-first" class="col-sm-3 control-label">Address</label>
         <div class="col-sm-9">{!! Form::text('address',null,['class'=>'form-control validate[required]']) !!}</div>
       </div>
       <div class="form-group">
         <label for="txt-first" class="col-sm-3 control-label">City</label>
         <div class="col-sm-9">{!! Form::text('city_state',null,['class'=>'form-control validate[required]']) !!}</div>
       </div>
       <div class="form-group">
         <label for="txt-first" class="col-sm-3 control-label">State</label>
         <div class="col-sm-9">{!! Form::text('province',null,['class'=>'form-control validate[required]']) !!}</div>
       </div>
       <div class="form-group">
         <label for="txt-first" class="col-sm-3 control-label">Postal Code</label>
         <div class="col-sm-9">{!! Form::text('postal_code',null,['class'=>'form-control validate[required]']) !!}</div>
       </div>
       <div class="form-group">
         <label for="txt-first" class="col-sm-3 control-label">Contact Phone 1</label>
         <div class="col-sm-9">{!! Form::text('phone_1',null,['class'=>'form-control validate[required]']) !!}</div>
       </div>
       <div class="form-group">
         <label for="txt-first" class="col-sm-3 control-label">Contact Phone 2</label>
         <div class="col-sm-9">{!! Form::text('phone_2',null,['class'=>'form-control','placeholder'=>'Optional']) !!}</div>
       </div>
      </div>

      <div class="col-md-6 reg-block">
        <h4>Security Questions</h4>
        <p>Please select security questions below. These question will help us verify your identity should you forget your password.</p>
        <div class="form-group">
         <label for="txt-first" class="col-sm-3 control-label">Security Question 1</label>
         <div class="col-sm-9">
           {!! Form::select('question_1', $questions,null,['class'=>'form-control validate[required]']) !!}
         </div>
        </div>
        <div class="form-group">
         <label for="txt-first" class="col-sm-3 control-label">Answer</label>
         <div class="col-sm-9">{!! Form::text('answer_1',null,['class'=>'form-control validate[required]']) !!}</div>
        </div>
        <div class="form-group">
         <label for="txt-first" class="col-sm-3 control-label">Security Question 2</label>
         <div class="col-sm-9">
           {!! Form::select('question_2', $questions,null,['class'=>'form-control validate[required]']) !!}
         </div>
        </div>
        <div class="form-group">
         <label for="txt-first" class="col-sm-3 control-label">Answer</label>
         <div class="col-sm-9">{!! Form::text('answer_2',null,['class'=>'form-control validate[required]']) !!}</div>
        </div>
      </div>

    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="g-recaptcha" data-sitekey="6LcgTwcTAAAAALLsaHi4YjdN-ymhzINTxzvIgWS3"></div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 calign mrg-t-30">
      <button class="btn btn-primary" id="btn-reg-submit" type="button" data-loading-text="Submitting ...">Create WASP ID</button>
    </div>
  </div>

  {!! Form::close() !!}

  @if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Whoops!</strong> There were some problems with your input.<br><br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
</div>
@endsection


@section('scripts')

<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript">
  
$(function(){
  app_engine.auth_page();
});

</script>
@endsection