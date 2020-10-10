
<style>
    .qr{
        border:1px solid black;
        width:102px;
        padding:1px;
            background-repeat: no-repeat;
            display: inline-flex;

    }
        .holder{

                border:1px solid black;
                width:110px;
                padding:1px;
                float:left;
        }

        .fullname{

                font-size: 10px;
        }

</style>
@foreach ($passes as $pass)

<div class="holder">
        <div class="qr">

                {!! QrCode::size(100)->generate('Name:'.$pass->fullname().' Contact: '.$pass->cellphone.' Age: '.$pass->age.' Sex: '.$pass->sex.' Address: '.$pass->fulladdress)!!}
{{--        {!! QrCode::size(200)->generate('http://pass.manolofortich.gov.ph/'.$pass->code)!!}--}}
        </div>

<span class="fullname">{{$pass->fullname()}}</span>
</div>




@endforeach

