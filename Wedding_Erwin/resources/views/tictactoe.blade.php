<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tictactoe</title>
    @vite(['resources/js/app.js', 'resources/js/tictactoe.js', 'resources/css/tictactoe.css'])
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body class="container-fluid">
  <nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">SKY UNIVERSE Limited</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
        </ul>
        <form method="POST" action="{{route('logout')}}" class="d-flex">
            @csrf
          <button type="submit" class="btn btn-danger">Logout</button>
        </form>
      </div>
    </div>
  </nav>
  <div class="container mt-3 d-flex justify-content-between">
    <div>
      <h1> Welcome to Mak Comblang</h1>
      <div> 
        <h2 class="m-0 p-0"> ROOM number: {{$room}} </h2>
        <h2 class="m-0 p-0"> status: {{$status}} </h2>
      </div>
    </div>
    <div class="d-flex d-row justify-content-between align-items-center">
      <div class="loader"></div>
      <h2 class="mx-4 p-0">waiting for your wedding partner</h2>
    </div>
  </div>
  <div class="board" id="board">
      <div id="cell1" class="cell" data-cell></div>
      <div id="cell2" class="cell" data-cell></div>
      <div id="cell3" class="cell" data-cell></div>
      <div id="cell4" class="cell" data-cell></div>
      <div id="cell5" class="cell" data-cell></div>
      <div id="cell6" class="cell" data-cell></div>
      <div id="cell7" class="cell" data-cell></div>
      <div id="cell8" class="cell" data-cell></div>
      <div id="cell9" class="cell" data-cell></div>
  </div>
  <div class="winning-message" id="winningMessage">
      <div data-winning-message-text></div>
      <button id="restartButton">Restart</button>
  </div>

  <script>
      var dating_code = "{{ $dating_code }}"
      var symbol = "{{ $symbol }}"
  </script>
</body>

</html>