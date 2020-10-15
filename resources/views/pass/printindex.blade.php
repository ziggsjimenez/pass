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

        <div id="passes" class="col">

            <table id="passtable" class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Sex</th>
                    <th>Age</th>
                    <th>Employer</th>
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
                        <td>{{$pass->employer}}</td>
                        <td>{{$pass->cellphone}}</td>
                        <td>
                            <a href="{{route('passes.edit',$pass->id)}}"><i class="fas fa-pen fa-2x"></i></a>
                            <button class="delbtn" value="{{$pass->id}}"><i class="fas fa-trash fa-2x text-danger"></i></button>
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
                    <a href="{{route('printpass')}}" target="_blank" class="btn btn-primary">Print</a>
                    <button id="clearprint" class="btn btn-primary">Clear Print Table</button>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div id="printpass"></div>
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

            $('#passtable').DataTable({
                "paging": false
            });

            $("#clearprint").on('click', function (event) {

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({

                    url: '{{route('clearprintpass')}}',
                    type: 'POST',

                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',

                    success: function (data) {

                        console.log(data['msg']);
                        loadqrprint();

                    }
                });

            });


            $('#passtable tbody').on( 'click', 'button', function () {

                var r = confirm("Delete record?");

                if (r === true) {

                    $(this).parents('tr').remove();

                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({

                        url: '{{route('deletepass')}}',
                        type: 'POST',

                        data: {_token: CSRF_TOKEN,id:$(this).val()},
                        dataType: 'JSON',

                        success: function (data) {

                        }
                    });

                }


            } );



            function loadpasses(){

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({

                    url: '{{route('passes.loadpasses')}}',

                    type: 'POST',

                    data: {_token: CSRF_TOKEN},

                    dataType: 'JSON',

                    success: function (data) {

                        $('#passes').html(data['view']);

                    }

                });
            }


            loadqrprint();

            $(".editbtn").on('click', function (event) {

                alert($(this).val());

            });




            {{--$(".delbtn").on('click', function (event) {--}}



            {{--var r = confirm("Delete record?");--}}

            {{--if (r == true) {--}}
            {{--var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}

            {{--$.ajax({--}}

            {{--url: '{{route('deletepass')}}',--}}
            {{--type: 'POST',--}}

            {{--data: {_token: CSRF_TOKEN,id:$(this).val()},--}}
            {{--dataType: 'JSON',--}}

            {{--success: function (data) {--}}
            {{--//                            $(this).closest('tr').remove();--}}
            {{--//                            alert();--}}

            {{--table.row( $(this).parents('tr') )--}}
            {{--.remove();--}}
            {{--}--}}
            {{--});--}}

            {{--} else {--}}
            {{--return false;--}}
            {{--}--}}



            {{--});--}}

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