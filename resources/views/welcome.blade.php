@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <!-- col 6 with card -->
        <div class="col-md-12 my-3">
            <div class="card p-4">
                <!-- card title -->
                <h1 class="card-title text-left mb-4">Fibonacci</h1>
                <!-- post to route /api/v1/fibonacci and display result -->
                <div id="fibonacci" class="form">
                    <!-- input number -->
                    <div class="mb-3">
                        <label for="number" class="form-label">Number</label>
                        <input type="number" id="number" name="number" class="form-control">
                    </div>
                    <!-- button to submit -->
                    <div class="d-flex justify-content-between align-items-center">
                        <button id="fibonacci-button" type="button" class="btn btn-primary">Submit</button>
                </div>
                <!-- text result -->
                <h1 class="mt-2 text-left">Result</h1>
                <div id="fibonacci-result"></div>
            </div>
        </div>
        <div class="col-md-12 my-3">
            <div class="card p-4">
                <!-- card title -->
                <h1 class="card-title text-left mb-4">Factorial</h1>
                <!-- post to route /api/v1/factorial and display result -->
                <div id="factorial" class="form">
                    <!-- input number -->
                    <div class="mb-3">
                        <label for="number" class="form-label">Number</label>
                        <input type="number" id="number" name="number" class="form-control">
                    </div>
                    <!-- button to submit -->
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-primary">Submit</button>

                </div>
                <!-- text result -->
                <h1 class="mt-2 text-left">Result</h1>
                <div id="factorial-result"></div>
            </div>
        </div>
        <div class="col-md-12 my-3">
            <div class="card p-4">
                <!-- card title -->
                <h1 class="card-title text-left mb-4">Palindrome</h1>
                <!-- post to route /api/v1/factorial and display result -->
                <div id="palindrome" class="form">
                    <!-- input number -->
                    <div class="mb-3">
                        <label for="text" class="form-label">String</label>
                        <input type="text" id="text" name="text" class="form-control">
                    </div>
                    <!-- button to submit -->
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-primary">Submit</button>

                </div>
                <!-- text result -->
                <h1 class="mt-2 text-left">Result</h1>
                <div id="palindrome-result"></div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(function () {
            $('#fibonacci-button').click(function () {
                $.ajax({
                    url: "{{ route('fibonacci') }}",
                    method: 'post',
                    data: {
                        number: $('#fibonacci #number').val(),
                    },
                    success: function (response) {
                        $('#fibonacci-result').html(response);
                    }
                });
            });

            $('#factorial button').click(function () {
                $.ajax({
                    url: "{{ route('factorial') }}",
                    method: 'post',
                    data: {
                        number: $('#factorial #number').val(),
                    },
                    success: function (response) {
                        $('#factorial-result').html(response);
                    }
                });
            });

            $('#palindrome button').click(function () {
                let word = $('#palindrome #text').val();
                $.ajax({
                    url: "{{ route('palindrome') }}",
                    method: 'post',
                    data: {
                        word: word,
                    },
                    success: function (response) {
                        // check true or false
                        if (response == 1) {
                            $('#palindrome-result').html("The word " + word + " is a palindrome.");
                        } else {
                            $('#palindrome-result').html("The word " + word + " is not a palindrome.");
                        }
                    }
                });
            });
        });
    </script>
@endpush
@endsection
