
<style>
    .qr{
        border:1px solid black;
        width:102px;
        padding:2px;
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
                height: 40px;
                padding-bottom: 10px;
        }

</style>
<?php $count=1; ?>


@foreach ($passes as $pass)

<div class="holder">

        <div class="fullname">
                <br/>
                <p>{{$pass->fullname()}}</p>

        </div>


        <div class="qr">

                {!! QrCode::size(100)->generate('Name:'.$pass->fullname().' Employer: '.$pass->employer.' Contact: '.$pass->cellphone.' Age: '.$pass->age.' Sex: '.$pass->sex.' Address: '.$pass->fulladdress.' Code: '.$pass->code)!!}
{{--        {!! QrCode::size(200)->generate('http://pass.manolofortich.gov.ph/'.$pass->code)!!}--}}
        </div>

        @if($count==36)
                <div style="page-break-before: always;"></div>
                <div style="page-break-after: always;"> </div>
                {{--<p >&nbsp;</p>--}}
                {{--<p style="page-break-before: always;">&nbsp;</p>--}}
<?php $count=0;?>
                @endif
        <?php $count++;?>
</div>

@endforeach

