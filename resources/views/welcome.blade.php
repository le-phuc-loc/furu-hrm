<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <meta name="_token"> --}}

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            #map {
                width: 500px;
                height: 100%;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif


            <div class="content">
                <div class="title m-b-md">
                    Mage
                </div>


                <form action="" method="post">
                    @csrf
                    <input id="lat" type="number" step=any name="lat">
                    <input id="lng" type="number" step=any name="lng">
                    <input type="time" name="" id="">
                    <button type="" id="btn-test">
                        test
                    </button>
                </form>




                <div class="lat">
                    <p>lat</p>
                </div>
                <div class="lng">
                    <p>lng</p>
                </div>
            </div>
        </div>



        {{-- <script>
            // Note: This example requires that you consent to location sharing when
            // prompted by your browser. If you see the error "The Geolocation service
            // failed.", it means you probably did not give permission for the browser to
            // locate you.
            var timeCheckin, timeCheckout, locCheckin, locCheckout, projectUserId, content;
            function initMap() {

                // Try HTML5 geolocation.
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        locCheckin = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };
                    });
                }
            }



            $('#btn-test').click(function() {
                $('')
            });


          </script> --}}

          {{-- <script>
            // e.preventDefault();
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            //     }
            // });
            // $.ajax({
            //     type: 'GET',

            //     url:"{{ route('employee.info', ['id' => $emp->id]) }}",
            //     data: {department_id: department_id},
            //     success:function(result) {

            //         console.log(result.dept);
            //         $("input[name='department_name']").val(result.dept.department_name);
            //         $("input#department-from-date").val(result.dept.department_from_date);
            //         $("input#department-to-date").val(result.dept.department_to_date);
            //         // $('#department-name').val() = data.department;
            //     }
            // });
          </script> --}}

          <script>


            $(document).ready(function() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        lat = position.coords.latitude;
                        lng = position.coords.longitude;
                        $("input#lat").val(position.coords.latitude);
                        $("input#lng").val(position.coords.longitude);
                    });
                }

            })





          </script>
          <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcQ8aJDgCEdlPz5MPuWkXfjQMKwAULO-k&callback=initMap">
          </script>
    </body>
</html>
