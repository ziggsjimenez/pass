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
                <button class="delbtn" value="{{$pass->id}}"><i class="fas fa-trash fa-2x"></i></button>
                <i class="fas fa-print fa-2x"></i>
                <input type="checkbox" class="checkprint" value="{{$pass->id}}" @if($pass->printpass==1) checked @endif>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>




{{--<script>--}}



    {{--loadpasses();--}}

    {{--function loadpasses(){--}}

        {{--var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}

        {{--$.ajax({--}}

            {{--url: '{{route('passes.loadpasses')}}',--}}

            {{--type: 'POST',--}}

            {{--data: {_token: CSRF_TOKEN},--}}

            {{--dataType: 'JSON',--}}

            {{--success: function (data) {--}}

                {{--$('#passes').html(data['view']);--}}

            {{--}--}}

        {{--});--}}
    {{--}--}}


    {{--function loadprint(){--}}

        {{--var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}

        {{--$.ajax({--}}

            {{--url: '{{route('pass.loadprint')}}',--}}
            {{--type: 'POST',--}}

            {{--data: {_token: CSRF_TOKEN},--}}
            {{--dataType: 'JSON',--}}

            {{--success: function (data) {--}}

                {{--loadqrprint();--}}

            {{--}--}}
        {{--});--}}

    {{--}--}}


    {{--$(".checkprint").on('click', function (event) {--}}

        {{--if($(this).prop('checked')==true){--}}

            {{--var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}

            {{--$.ajax({--}}

                {{--url: '{{route('pass.addtoprint')}}',--}}
                {{--type: 'POST',--}}

                {{--data: {_token: CSRF_TOKEN, id:$(this).val()},--}}
                {{--dataType: 'JSON',--}}

                {{--success: function (data) {--}}

                    {{--loadqrprint();--}}

                {{--}--}}
            {{--});--}}
        {{--}--}}

        {{--alert();--}}

    {{--});--}}


{{--</script>--}}