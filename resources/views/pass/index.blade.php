@extends('layouts.app')

@section('customStyles')

    <link rel="stylesheet" type="text/css" href="{{asset('public/datatables/datatables.css')}}"/>
<style>
    button, input[type="submit"], input[type="reset"] {
    background: none;
    color: inherit;
    border: none;
    padding: 0;
    font: inherit;
    cursor: pointer;
    outline: inherit;
    }
</style>
    @endsection

@section('content')

    <div class="row">
        <div class="col">

            @include('pass.form.create')

        </div>

        <div id="passes" class="col">

            <table id="passtable" class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Sex</th>
                    <th>Age</th>
                    <th>Contact No.:</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($passes as $pass)

                    <tr>
                        <td>{{$pass->fullname()}}</td>
                        <td>{{$pass->fulladdress}}</td>
                        <td>{{$pass->sex}}</td>
                        <td>{{$pass->age}}</td>
                        <td>{{$pass->cellphone}}</td>
                        <td>
                            <a href="{{route('passes.edit',$pass->id)}}"><i class="fas fa-pen fa-2x"></i></a>
                            <button class="delbtn" value="{{$pass->id}}"><i class="fas fa-trash fa-2x"></i></button>
                            <i class="fas fa-print fa-2x"></i>
                            <input type="checkbox" class="checkprint" value="{{$pass->id}}" @if($pass->printpass==1) checked @endif>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>

        <div class="col">

            <div class="row">
                <div class="col">
                    <div id="printpass"></div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="{{route('printpass')}}" class="btn btn-primary">Print</a>
                </div>
            </div>



        </div>
    </div>



@endsection

@section('customScripts')

    <script src="{{asset('public/js/jquery.js')}}"></script>


    <script src="{{asset('public/datatables/datatables.min.js')}}"></script>

    <script>

        $(document).ready(function () {

            $('#passtable').DataTable();


            loadqrprint();

            $(".editbtn").on('click', function (event) {

                alert($(this).val());

            });

            $(".delbtn").on('click', function (event) {

                alert($(this).val());

            });

            function loadqrprint(){

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({

                    url: '{{route('pass.loadprint')}}',
                    type: 'POST',

                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',

                    success: function (data) {

                        $('#printpass').html(data['view']);

                    }
                });

            }


            $(".checkprint").on('click', function (event) {

                if($(this).prop('checked')==true){

                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({

                        url: '{{route('pass.addtoprint')}}',
                        type: 'POST',

                        data: {_token: CSRF_TOKEN, id:$(this).val()},
                        dataType: 'JSON',

                        success: function (data) {

                            loadqrprint();

                        }
                    });
                }

                if($(this).prop('checked')==false){

                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({

                        url: '{{route('pass.removetoprint')}}',
                        type: 'POST',

                        data: {_token: CSRF_TOKEN, id:$(this).val()},
                        dataType: 'JSON',

                        success: function (data) {

                            loadqrprint();

                        }
                    });
                }


            });


        });

    </script>

    @endsection