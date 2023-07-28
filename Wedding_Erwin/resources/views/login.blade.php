<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources\js\app.js'])
</head>
<body class="container">
    <h1>LOGIN</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('status'))
        <div class="alert alert-danger" role="alert">
            <p>{{session('status')}}</p>
        </div>
    @endif


    <form method="POST" action="{{route('login.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="text" name='login' class="form-control" id="email">
          </div>
        </div>
        <div class="row mb-3">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" name="password" class="form-control" id="password">
          </div>
        </div>
        <button type="submit" class="btn btn-primary" style="12em">Login</button>
    </form>
</body>
</html>