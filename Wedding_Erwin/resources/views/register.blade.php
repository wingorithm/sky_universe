<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <title>Register</title>
    @vite(['resources\js\app.js'])
</head>
<body class="container">
    <h1>REGISTER</h1>
{{-- nanti tambahin erroe message --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-primary" role="alert">
            <p>{{session('success')}}</p>
            <a href="{{route('login')}}"> pindah ke login</a>
        </div>
    @endif
    <form class="row g-3" method="POST" action="{{route('register.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label for="name" class="form-label">your name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="your name" value="{{old('name')}}">
        </div>
        <div class="col-md-6">
            <label for="DT" class="form-label">your dating code</label>
            <input type="text" name="DT" class="form-control" id="DT" placeholder="000" value="{{old('DT')}}">
        </div>
        <div class="col-12">
            <label for="email" class="form-label">your email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="your email" value="{{old('email')}}">
        </div>
        <div class="col-12">
            <label for="password" class="form-label">your password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="your password" value="{{old('password')}}">
        </div>
        <div class="col-12">
            <label for="passwordinput_confirmation" class="form-label">your password confirmation</label>
            <input type="password" name="password_confirmation" class="form-control" id="passwordinput_confirmation" placeholder="your password confirmation">
        </div>
        <div class="col-12">
            <label for="birthday" class="form-label">Birthday</label>
            <input type="date" name="birthday" class="form-control" id="birthday" value="{{old('birthday')}}">
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" name="phone" class="form-control" id="phone" value="{{old('phone')}}" placeholder="your phone number">
        </div>
        <div class="col-md-6">
            <label for="gender" class="form-label">Gender</label>
            <select name="gender" class="form-select" id="gender">
                <option>Select Your</option>
                <option @if (old('gender') == 'male') selected @endif value="male">Male</option>
                <option @if (old('gender') == 'female') selected @endif value="female">Female</option>
            </select>
        </div>
        
        <div class="col-12 mb-4">
            <div class="row">
                <div class="col-md-6 text-center d-flex flex-column justify-content-center align-items-center">
                    <div class="alert alert-primary w-100">Your Magical Mirror</div>
                    <div class="mb-2" id="my_camera"></div>
                    <div>
                        <input type=button class="btn btn-primary" value="Open Camera" onClick="open_cam()">
                        <input type=button class="btn btn-primary" value="Take Snapshot" onClick="take_snapshot()">
                    </div>
                    <input type="hidden" name="image" class="image-tag">
                </div>
                <div class="col-md-6 text-center">
                    <div class="alert alert-primary">Your captured image result...</div>
                    <div id="results">No capture...</div>
                </div>
            </div>
            {{-- <label for="image" class="form-label">Image</label>
            <input name="image" type="file" class="form-control" id="image" accept="image/png, image/gif, image/jpeg"> --}}
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary" style="width : 12em">Sign in</button>
            <p>sudah punya akun? <a href="{{route('login')}}">login</a></p>
        </div>
    </form>     
        
    <script language="JavaScript">
        Webcam.set({
            width: 400,
            height: 400,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
    
        Webcam.attach( '#my_camera' );
        
        function take_snapshot() {
            Webcam.snap( function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
            } );
        }
    </script>
</body>
</html>