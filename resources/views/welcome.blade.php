@extends('layouts.app')

@section('content')



    <div class="container">

        {!! Form::open(['route' => 'generateqr']) !!}

        <div class="form-group">
       {!! Form::label('From', 'E-Mail Address', ['class' => 'label']) !!}
        {!! Form::number('from',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('to', 'To', ['class' => 'label']) !!}
            {!! Form::number('to',null,['class'=>'form-control']) !!}
        </div>


        {!! Form::close() !!}


    </div>


        @for ($i = 0; $i < 1000; $i++)

            <div class="qr">
                {!! QrCode::size(200)->generate('http://pass.manolofortich.gov.ph/'.$i) !!}
            </div>

        @endfor




@endsection
