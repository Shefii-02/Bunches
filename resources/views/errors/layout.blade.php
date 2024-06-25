
@extends('layouts.only-logo')
  
    @section('styles')
  <style>
    *{
      font-family: 'Montserrat', sans-serif;
    }
    :root{
      --primary: #e29843;
      --white: #fff;
    }
    .oops{
      height: 70vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-size: cover;
      /*background: url('https://cdn.dribbble.com/users/332742/screenshots/10537181/media/f3ceac170109ffe733535ec7fe85916b.gif');*/
    }
    .oops .col-12{
      text-align: center;
    }
    .oops h1 {
      font-weight: 700;
      font-size: 35px;
    }
    .oops a{
      padding: 10px 30px;
      background: var(--primary);
      color: var(--white);
      font-size: 14px;
      font-weight: 600;
      text-decoration: none;
      border-radius: 30px;
    }
  </style>
@endsection
    @section('contents')
  
      <section class="oops">
        <div class="container">
          <div class="row">
            <div class="col-12">   <h1>Oops!</h1>
            


              <h1 class="text-center"> The page are looking for is not available or has been removed!</h1>
              <p class="text-center">Try going to HOME PAGE by using the button below</p>
              <a href="/">BACK HOME</a>
            </div>
          </div>
        </div>
      </section>
    @endsection