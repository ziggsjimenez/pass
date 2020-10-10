{!! Form::model($pass,['route' => ['passes.update',$pass->id],'method'=>'put'],['class'=>'form']) !!}

<div class="form-group">
    {!! Form::label('firstname','Firstname') !!}
    {!! Form::text('firstname',null,['class'=>'form-control'. ( $errors->has('firstname') ? ' is-invalid' : '' ),'placeholder'=>'Type here...']) !!}
</div>

<div class="form-group">
    {!! Form::label('middlename','Middlename') !!}
    {!! Form::text('middlename',null,['class'=>'form-control'. ( $errors->has('middlename') ? ' is-invalid' : '' ),'placeholder'=>'Type here...']) !!}
</div>

<div class="form-group">
    {!! Form::label('lastname','Lastname') !!}
    {!! Form::text('lastname',null,['class'=>'form-control'. ( $errors->has('lastname') ? ' is-invalid' : '' ),'placeholder'=>'Type here...']) !!}
</div>

<div class="form-group">
    {!! Form::label('employer','Employer') !!}
    {!! Form::text('employer',null,['class'=>'form-control'. ( $errors->has('employer') ? ' is-invalid' : '' ),'placeholder'=>'Type here...']) !!}
</div>

<div class="form-group">
    {!! Form::label('fulladdress','Address') !!}
    {!! Form::text('fulladdress',null,['class'=>'form-control'. ( $errors->has('fulladdress') ? ' is-invalid' : '' ),'placeholder'=>'Type here...']) !!}
</div>

<div class="form-group">
    {!! Form::label('cellphone','Cellphone No.:') !!}
    {!! Form::number('cellphone',null,['class'=>'form-control'. ( $errors->has('cellphone') ? ' is-invalid' : '' ),'placeholder'=>'Type here...']) !!}
</div>

<div class="form-group">
    {!! Form::label('age','Age') !!}
    {!! Form::number('age',null,['class'=>'form-control'. ( $errors->has('age') ? ' is-invalid' : '' ),'placeholder'=>'Type here...']) !!}
</div>

<div class="form-group">
    {!! Form::label('sex','Sex') !!}
    {!! Form::select('sex',['Male' => 'Male', 'Female' => 'Female'],null,['class'=>'form-control'. ( $errors->has('sex') ? ' is-invalid' : '' ),'placeholder'=>'Select...']) !!}
</div>

<button title="Submit" type="submit" class="btn btn-primary btn-lg">Submit</button>

{!! Form::close() !!}