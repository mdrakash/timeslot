<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>Appointment</title>
</head>

<body>
    <div class="container">
        <div class="row center">
            <form action="{{ route('business_hour.update') }}" method="POST">
                @csrf
                @foreach ($businessHours as $businessHour)
                    <div class="col s3">
                        <h4>
                            {{ $businessHour->day }}
                        </h4>
                    </div>
                    <input type="hidden" name="data[{{ $businessHour->day }}][day]" value="{{ $businessHour->day }}">
                    <div class="input-field col s3">
                        <input type="text" class="timepicker" value="{{ $businessHour->from }}"
                            name="data[{{ $businessHour->day }}][from]" placeholder="From">
                    </div>

                    <div class="input-field col s2">
                        <input type="text" class="timepicker" value="{{ $businessHour->to }}"
                            name="data[{{ $businessHour->day }}][to]" placeholder="To">
                    </div>
                    <div class="input-field col s1">
                        <input type="number" name="data[{{ $businessHour->day }}][step]"
                            value="{{ $businessHour->step }}" placeholder="Step">
                    </div>

                    <div class="input-field col s3">
                        <p>
                            <label>
                                <input value="true" name="data[{{ $businessHour->day }}][holiday]" class="filled-in"
                                    type="checkbox" @if($businessHour->holiday) '' @endif />
                                <span>OFF</span>
                            </label>
                        </p>
                    </div>
                @endforeach



                <div class="col s12">

                    <button class="waves-effect waves-light btn info darken-2" type="submit">
                        save
                    </button>
                </div>
            </form>
        </div>
    </div>

















    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.timepicker');
            var instances = M.Timepicker.init(elems, {
                twelveHour:false
            });
        });
    </script>
</body>

</html>
