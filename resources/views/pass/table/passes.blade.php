

<script>



    loadpasses();

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


    function loadprint(){

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({

            url: '{{route('pass.loadprint')}}',
            type: 'POST',

            data: {_token: CSRF_TOKEN},
            dataType: 'JSON',

            success: function (data) {

                loadqrprint();

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

        alert();

    });


</script>