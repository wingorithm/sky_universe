<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dress Marketplace</title>
    
    @vite(['resources\js\app.js'])
</head>
<body>
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
  <div class="container">
    <div class="row mb-0">
      <div class="col-md-12 text-center">
          <div class="alert alert-primary mb-0">YOUR WEDDING PARTNER:</div>
      </div>
    </div>

      <div class="row d-flex justify-content-center">
        <div class="card m-0 p-0" style="width:max-content">
          <img src="{{asset('storage')}}/profiles/{{$partner->image}}" class="card-img" alt="..." style="max-height: 25em; max-width: 25em;">
          <div class="card-img-overlay">
            <h3 class="card-title text-light">{{$partner->name}} ({{$partner->gender}})</h3>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-md-12 text-center">
            <div class="alert alert-primary">Wedding Suit You</div>
        </div>
      </div>
    
    <select class="form-select mb-3" aria-label="Default select example" onchange="showDiv(this)">
      <option value="1" id="1s" onclick="show(1)" selected>Vintage</option>
      <option value="2" id="2s" onclick="show(2)">Romantic</option>
      <option value="3" id="3s" onclick="show(3)">Fantasy</option>
    </select>

    <div class="d-flex flex-row justify-content-between" id="1">
      @foreach ($data as $d)
        <div class="card" style="width: 25rem;">
          <img src="{{$d->picture}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$d->suitName}}</h5>
            <p class="card-text">{{$d->store}}</p>
            <p class="card-text">{{$d->location}}</p>
            <p class="card-text">{{$d->harga}}</p>
            <a class="btn btn-primary" href="{{route('checkout', 1)}}">Check Out</a>
          </div>
        </div> 
      @endforeach
    </div>
    <div class="d-flex flex-row justify-content-between visually-hidden" id="2">
      @foreach ($data2 as $d)
        <div class="card" style="width: 25rem;">
          <img src="{{$d->picture}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$d->suitName}}</h5>
            <p class="card-text">{{$d->store}}</p>
            <p class="card-text">{{$d->location}}</p>
            <p class="card-text">{{$d->harga}}</p>
            <a class="btn btn-primary" href="{{route('checkout', 2)}}">Check Out</a>
          </div>
        </div> 
      @endforeach
    </div>
    <div class="d-flex flex-row justify-content-between visually-hidden" id="3">
      @foreach ($data3 as $d)
        <div class="card" style="width: 25rem;">
          <img src="{{$d->picture}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$d->suitName}}</h5>
            <p class="card-text">{{$d->store}}</p>
            <p class="card-text">{{$d->location}}</p>
            <p class="card-text">{{$d->harga}}</p>
            <a class="btn btn-primary" href="{{route('checkout', 3)}}">Check Out</a>
          </div>
        </div> 
      @endforeach
    </div>

    
  </div>

  <script>
    // let placeholder1 = document.querySelector(`#1`);
    // let placeholder2 = document.querySelector(`#2`);
    // let placeholder3 = document.querySelector(`#3`);
    // let select1 = document.querySelector(`#1s`);
    // let select2 = document.querySelector(`#2s`);
    // let select3 = document.querySelector(`#3s`);

    // select1.addEventListener('selected', function (e) {
    //   placeholder1.classList.toggle('visually-hidden');
    // });
    // select2.addEventListener('selected', function (e) {
    //   placeholder2.classList.toggle('visually-hidden');
    // });
    // select3.addEventListener('selected', function (e) {
    //   placeholder3.classList.toggle('visually-hidden');
    // });

  function showDiv(selectElement) {
    let selectedValue = selectElement.value;
    let divToShow = document.getElementById(selectedValue);
    
    let allDivs = document.querySelectorAll('.d-flex');
    allDivs.forEach((div) => {
      div.classList.add('visually-hidden');
    });

    divToShow.classList.remove('visually-hidden');
  }
  </script>
</body>
</html>