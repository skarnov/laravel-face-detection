@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
                @else
                <div class="alert alert-success">
                    You are logged in!
                </div>
                @endif

                <form method="POST" action="{{ route('webcam.capture') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div id="my_camera"></div>
                            <br />
                            <input type=button value="Take Snapshot" onClick="take_snapshot()">
                            <input type="hidden" name="image" class="image-tag">
                        </div>

                        <div class="col-md-6">
                            <div id="results">Your captured image will appear here...</div>
                        </div>

                        <div class="col-md-12 text-center">
                            <br />
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>

                <script language="JavaScript">
                    Webcam.set({
                        width: 490,
                        height: 350,
                        image_format: 'jpeg',
                        jpeg_quality: 90
                    });

                    Webcam.attach('#my_camera');

                    function take_snapshot() {
                        Webcam.snap(function(data_uri) {
                            $(".image-tag").val(data_uri);
                            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
                        });

                    }
                </script>
            </div>
        </div>
    </div>
</div>

@endsection