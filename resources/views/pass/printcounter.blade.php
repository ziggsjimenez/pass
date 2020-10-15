<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="refresh" content="5">

    <title>{{ config('app.name', 'Laravel') }}</title>





</head>
<body>

{{$passes->count()}}




<script src="{{asset('public/js/jquery.js')}}"></script>


<script src="{{asset('public/datatables/datatables.min.js')}}"></script>

<script>

    $(document).ready(function () {

        var temp = '{{$passes->count()}}';
        if(temp==10)
        {
        var url = '{{route('printpass')}}';
        var printWindow = window.open(url, '_blank');
        printWindow.onload = function() {
            var isIE = /(MSIE|Trident\/|Edge\/)/i.test(navigator.userAgent);
            if (isIE) {

                printWindow.print();
                setTimeout(function () { printWindow.close(); }, 100);

            } else {

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({

                    url: '{{route('clearprintpass')}}',
                    type: 'POST',

                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',

                    success: function (data) {
                        console.log(data['msg']);

                    }
                });

                setTimeout(function () {
                    printWindow.print();
                    var ival = setInterval(function() {
                        printWindow.close();
                        clearInterval(ival);
                        location.reload();
                    }, 200);
                }, 500);
            }
        }
        }
    });
</script>

</body>
</html>







