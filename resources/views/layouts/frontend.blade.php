<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="token" content="{{csrf_token()}}">
  <title>@yield('title',$title)</title>
  <meta name="keywords" content="@yield('keywords',$keywords)">
  <meta name="description" content="@yield('description',$description)">
  <!--<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/images/Fav/apple-touch-icon.png') }}">-->
  <!--<link rel="icon" type="image/png"  href="{{ asset('assets/images/Fav/favicon-32x32.png') }}">-->
  <link rel="icon" type="image/png" href="{{ asset('assets/images/Fav/favicon.png') }}">
  <!--<link rel="manifest" href="{{ asset('assets/images/Fav/site.webmanifest') }}">-->
  <!--<link rel="mask-icon" href="{{ asset('assets/images/Fav/safari-pinned-tab.svg') }}" color="#5bbad5">-->
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v=2">


<style>

      /* Style for the overlay */
    .stock-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.8); /* Transparent white overlay */
        display: none; /* Initially hidden */
        justify-content: center;
        align-items: center;
    }
    
    /* Style for the overlay text */
    .stock-text-overlay {
        font-size: 18px;
        font-weight: bold;
        color: red; /* Customize the color as needed */
    }
    
    /* Style to show overlay when product is out of stock */
    .product-image.out-of-stock + .stock-overlay {
        display: flex; /* Show the overlay */
    }

    .pac-container{
        z-index:99999 !important;
    }
    a{
        text-decoration:none;
        color:#000000;
    }
    
    .element-error::after {
        content: attr(data-error);
        font-size: small;
        font-weight: 500;
        padding-left: 3px;
        color: #DD0000;
    }
    
    .btn-theme{
        padding: 8px 20px;
        background: var(--primary-dark-bg);
        color: #fff;
    }
    .cart-count{
            top: -5px;
            width: 20px;
            height: 20px;
            right: 0;
            background: #e86f9d;
            border-radius: 25px;
            font-size: 10px;
            padding: 2px;
            color: #fff;
            position: absolute;
    }
    
    /*/////////////////////////////////////////////////////////////////////////////////////////////////*/
        .calendar {
            display: flex;
            flex-direction: column;
        }
        
        #calendar-dropdown {
            z-index: 99999;
        }
        
        .month {
            margin-bottom: 10px;
        
        }
        
        .calender table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }
        
        th,
        td {
            padding: 0.5rem;
            vertical-align: middle;
            border: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        .date {
            display: inline-block;
            width: 2rem;
            height: 2rem;
            line-height: 2rem;
            text-align: center;
            border-radius: 50%;
            cursor: pointer;
            text-decoration: none;
            font-weight: 800;
            color: #000000;
        }
        
        .day {
            display: block;
            margin-top: 0.5rem;
        }
        
        .date.holiday {
            background-color: var(--primary);
            color: white;
            cursor: not-allowed;
        }
        
        .date.holiday-allow {
            background-color: var(--primary);
            color: white;
        }
        
        .valid_date:hover {
            background-color: gray;
            color: #fff;
        }
        
        .date.disabled {
            cursor: not-allowed;
            color: gray;
        }
        
        /* Custom styles for the select dropdown */
        .form-select {
            width: 100%;
            padding: 0.375rem 1.75rem 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        
        /* Custom styles for the select dropdown options */
        .form-select option {
            padding: 0.5rem;
        }
        
        /* Define the styles for the current date */
        .month .date.today {
            background-color: #fff;
            /* Example background color */
            color: var(--primary);
            /* Example text color */
            border: 1px solid var(--bs-danger-bg-subtle);
        }

        #date-dropdown-toggle,.show-more-dates{
            cursor:pointer;
        }
        .qty-input .qty-count--add:after {
            transform: rotate(90deg);
        }
        /*////////////////////////////////////////////////////////////////////////////////////////*/
          .round-checkbox input[type="checkbox"]:checked+label, .round-checkbox input[type="radio"]:checked+label, .round-radio input[type="radio"]:checked+label {
            background-color: #f591c1;
            border-color: #f591c1 !important;
        }
        
        .round-checkbox label, .round-radio label {
            /*background-color: #fff;*/
            /*border: 1px solid #ccc;*/
            border-radius: 50%;
            cursor: pointer;
            height: 28px;
            right: -10px;
            position: absolute;
            top: -10px;
            z-index: 9;
            width: 28px;
        }
        
        .round-checkbox input[type="checkbox"]:checked+label:after, .round-checkbox input[type="radio"]:checked+label:after, .round-radio input[type="radio"]:checked+label:after {
            opacity: 1;
        }
        
        .round-checkbox label:after, .round-radio label:after {
            border: 2px solid #fff;
            border-top: none;
            border-right: none;
            content: "";
            height: 6px;
            left: 7px;
            opacity: 0;
            position: absolute;
            top: 8px;
            transform: rotate(-45deg);
            width: 12px;
        }
        .round-checkbox input[type="checkbox"], .round-checkbox input[type="radio"], .round-radio input[type="radio"] {
                visibility: hidden;
            }
            .round-checkbox input[type="checkbox"], .round-checkbox input[type="radio"] {
                visibility: hidden;
            }
        #st-1{
            z-index:10 !important;
        }
        
        .product-detail p{
            padding:0 !important;
            overflow: hidden;
              width: 100%;
              display: -webkit-box;
              -webkit-line-clamp: 2;
              -webkit-box-orient: vertical;
        }
        
        .show_variations.active,.show_variations_parent.active{
            border:1px solid #e86f9d !important;
        }
        
        .float-button {
    position: fixed;
    top: 50%;
    right: 0;
    background-color: #f993c3;
    width: 50px;
    height: 50px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    z-index: 9999;
    display: flex;
    justify-content: center;
    align-items: center;
}
.float-button .cart-count {
    position: absolute;
    top: 2px;
    right: 13px;
    color: white;
    font-size: 12px;
    font-weight: 900;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    text-align: center;
    /* line-height: 20px; */
    background:transparent !important;
}

.cart-icon {
    display: flex;
    line-height: 0;
    flex-direction: column-reverse;
    align-items: center;
}
.cart-icon {
    position: relative;
    /* display: inline-block; */
    color:#fff;
    font-size: 20px;
}
.float-button i {
    color: var(--white) !important;
}

.cart-item, .product-detail-slider .cart-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
}
.cart-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 5px;
}
.cart-item-image, .product-detail-slider .cart-item-image {
    width: 40px;
    height: 40px;
    background-color: #eee;
    margin-right: 10px;
}
.cart-item-image {
    width: 40px;
    height: 40px;
    background-color: #eee;
    margin-right: 10px;
}
.cart-item-image img {
    width: 100%;
    border-radius: 50%;
}
.cart-item .item-count-addon {
    position: absolute;
    top: -20px;
    right: -10px;
    background-color: var(--primary-bg-color) ;
    color: white;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    text-align: center;
    font-size: 12px;
}
.cart-item-details {
    flex-grow: 1;
    margin-right: 10px;
}
 .cart-item-title, .product-detail-slider .cart-item-title {
    font-size: 14px;
    color: #333;
    margin-bottom: 3px;
}
.cart-item-price, .product-detail-slider .cart-item-price {
    font-size: 12px;
    color: #666;
}
 .delete-btn {
    background:transparent;
  
    border:0px !important;
}
.delete-btn i {
    color: red;
    font-size: 18px;
}
 .subtotal {
    margin-top: 10px;
    font-weight: bold;
}
div.sub-checkout {
 
    padding: 5px 0;
}

    .sub-checkout {
        position: absolute;
        bottom: 0;
        width: 100%;
        background: #f5f5f5;
        display: flex;
        justify-content: center;
        padding-bottom: 5px;
    }

div.sub-checkout a {
    font-weight: 500;
    color: var(--white) !important;
    text-decoration: none;
}

.valid_date2{
    position:relative;
}
.valid_date2.active{
      margin-top: 26px;
}
.valid_date2.active label{
    color:#fff;
    background-color: var(--primary-bg-color);
    border-color: #f591c1 !important;
    border-radius: 50%;
    cursor: pointer;
    height: 28px;
    right: 0px;
    position: absolute;
    top: -10px;
    z-index: 9;
    width: 28px;
}

.valid_date2.active label:after {
    border: 2px solid #fff;
    border-top: none;
    border-right: none;
    content: "";
    height: 6px;
    left: 7px;
    position: absolute;
    top: 8px;
    transform: rotate(-45deg);
    width: 12px;
    opacity: 1;
}

.swal2-icon.swal2-success [class^=swal2-success-line]{
        background-color: #e86f9d !important;
}

.swal2-icon.swal2-success .swal2-success-ring{
    border: .25em solid #e86f9d !important;
}
.pickupStores:hover .map-info{
    display:block;
}
.map-info {
    display: none;
    z-index: 99;
    top: -160px;
    height: 160px;
    min-width: 300px;
    left: 50%;
    transform: translate(-50%, 0);
}
.map-info .map::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translate(-50%, 0%);
    width: 0;
    border-top: 20px solid white;
    border-left: 20px solid transparent;
    border-right: 20px solid transparent;
}

.dropdown:hover>.dropdown-menu{
		display: block;
	}
.bg-theme{
     background-color: var(--primary-bg-color);
     color:#fff;
}
</style>


@yield('styles')
</head>

<body>
    <header>
        <div class="header-top primary-bg py-2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6">
                        <ul class="social-icons d-flex m-0 p-0 list-unstyled">
                            
                            {!! getSocialmedia() !!}
                        </ul>
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-end top-login">
                            
                            <div>
                                <a href="#" class="text-decoration-none text-white f-15 @if(session('ordertype') == 'delivery' ) DeliveryModalBtn @endif d-flex" @if(session('ordertype') == 'delivery' ) data-bs-target="#DeliveryModalToggle" data-bs-toggle="modal" @elseif(session('ordertype') == 'pickup' ) data-bs-target="#PickupModalToggle" data-bs-toggle="modal" @endif>
                                    @if(session('ordertype') == 'pickup' )
                                        <i class="bi bi-shop me-1" ></i>
                                        <span class="d-none d-md-block ms-2" title="{{session('identity_place')}}">Pickup to : {{Str::limit(session('identity_place'), 10);}}</span>
                                    @elseif(session('ordertype') == 'delivery' )
                                            <i class="bi bi-truck me-1" ></i> 
                                        @if(session()->has('session_string'))
                                            <span class="d-none d-md-block ms-2" title="{{session('identity_place')}}">Delivery to : {{Str::limit(session('identity_place'), 10);}} </span>
                                        @else 
                                            <span class="d-none d-md-block ms-2">Select City </span>
                                        @endif
                                    @else
                                            <span class="d-none d-md-block ms-2"  data-bs-target="#shoppingMethod" data-bs-toggle="modal" ><i class="bi bi-geo-alt"></i> Order Now </span>
                                    @endif
                                   
                                </a>
                            </div>
                            
                            @if(session('ordertype') == 'delivery' )
                                <a href="#" class="text-light ms-3 switch_To_Pickup d-flex"><i class="bi bi-toggle-off"></i> <span class="d-none d-md-block ms-2">Switch to Pickup</span></a>
                            @elseif(session('ordertype') == 'pickup' )
                                <a href="#" class="text-light ms-3 switch_To_Delivery d-flex"><i class="bi bi-toggle-off"></i> <span class="d-none d-md-block ms-2">Switch to Delivery</span></a>
                            @endif
                            <div class="ms-3">
                               @if(auth()->user())
                                  <a class="dropdown-toggle text-white f-15" id="dropdownMenuButton" data-bs-toggle="dropdown" href="{{url('myaccount')}}"><i class="bi bi-person-circle"></i> My Account</a>
                                  <div class="dropdown-menu" style="width: auto; padding: 10px;">
                                    <a class="dropdown-item float-start fs-6 fw-medium " href="{{url('myaccount')}}"><i class="bi bi-person"></i> My Account</a>
                                    <a class="dropdown-item float-start fs-6 fw-medium" href="{{url('signout')}}"><i class="bi bi-box-arrow-in-left"></i> Logout</a>
                                  </div>
                                @else
                                 <a href="{{url('sign-in')}}" class="text-decoration-none text-white f-15"><i class="bi bi-box-arrow-in-right me-1"></i>Login</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom bg-white">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-lg bg-white py-0">
                        <div class="container-fluid">
                            <a class="navbar-brand py-0" href="/"> <img src="{{asset('assets/images/logo.png')}}" class="py-4" width="250" alt="" srcset=""> </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
                                    {!! getMenu('main-menu') !!}
                                </ul>
                                
                                <div class="d-flex position-relative" role="search">
                                    <button class="btn border-0 bg-transparent" data-bs-target="#productSearchModal" title="Search Product" data-bs-toggle="modal"  >
                                        <i class="bi bi-search text-primary-bg"></i>
                                    </button>
                                    <!--<a class="btn border-0 bg-transparent wishList" href="#" data-bs-target="#wishlistModal" title="My Wishlist" data-bs-toggle="modal" >-->
                                    <!--    <i class="bi bi-heart text-primary-bg"></i> -->
                                    <!--</a>-->
                                  
                                    <a class="btn border-0 bg-transparent position-relative" href="{{url('cart')}}" title="Cart">
                                        <span class="cart-count">{{getCartCount()}}</span>
                                        <i class="bi bi-cart3 text-primary-bg"></i> 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
  @yield('contents')

  


<footer class="">
    <div class="footer-top py-5">
        <div class="container">
            <div class="row pb-3">
                <div class="col-12 col-md-3 mb-3">
                    <h5 class="text-light fw-500 mb-3">ABOUT US</h5>
                    <P class="fw-500 f-14 pe-3">Bunches bring natural beauty close to you and hope get what we give.</P>
                    <ul class="social-icons d-flex m-0 p-0 list-unstyled">
                        
                        {!! getSocialmedia() !!}
                    </ul>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <h5 class="text-light mb-3 fw-500">OUR SERVICES</h5>
                    <ul class="p-0 m-0 list-unstyled">
                         {!! getMenu('our-services') !!}
                    </ul>
                </div>
                <div class="col-12 col-md-3 mb-3 ">
                    <h5 class="text-light mb-3 fw-500">NEWS LETTER</h5>
                    <P class="fw-500 f-14 pe-3">Do you want to receive our marketing campaign to get more value from Flower?</P>
                 
                       <form action="#" method="POST" id="_form_subscription_" class="validated not-ajax"> 
                       <div class="d-flex position-relative w-75">
                        @csrf
                        <input type="email" autocomplete="off" name="email" required class="form-control rounded-0 bg-transparent text-light">
                        <button type="submit" class="btn border-0 right-0"><i class="bi bi-send"></i></button>
                    </div>
                        </form>
                </div>
                <div class="col-12 col-md-3 text-center">
                    
                    <img src="{{asset('assets/images/footer.jpg')}}"  class="w-md-100 w-75" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer1 primary-bg py-4">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center text-md-start col-md-4">
                    <p class=" text-light mb-md-0 mb-2 f-14">© {{date('Y',time()).'-'.date('Y',time()+(60*60*24*366))}} Bunches. All rights reserved</p>
                </div>
                <div class="col-12 col-md-4 text-center text-md-end">
                    <ul class="social-icons d-flex m-0 p-0 list-unstyled justify-content-center">
                        {!! getSocialmedia() !!}
                    </ul>
                </div>
                <div class="col-12 col-md-4 text-center text-md-end">
                    <img src="{{asset('assets/images/payment.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</footer>

    <div class="modal fade" id="DeliveryModalToggle" aria-hidden="true" aria-labelledby="DeliveryToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="col-lg-12 p-2">
                   <button class="btn btn-light" data-bs-target="#PickupModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="bi bi-arrow-left"></i> Switch to Pickup</button>
               </div>
                <div class="modal-body py-5">
                    <div class="custom-model-wrap">
                           
                            <div class="pop-up-content-wrap my-4 px-3 text-center">
                              <h3 style="line-height: 1.5;" class="h5">SELECT YOUR CITY FOR DELIVERY</h3>
                            </div>
                            <form method="GET" action="{{url('select-location')}}" class="selected_city  validated not-ajax" id="selected_city">
                                @csrf()
                                <input  form="selected_city" type="hidden" id="ordertype" name="ordertype" value="delivery">
                                <div class="form-group px-3">
                                    <input form="selected_city" value="@if(session()->has('session_string')){{session('autocomplete')}}@endif" type="text" required name="autocomplete" id="autocomplete"  class="form-control select_city" placeholder="Enter your address">
                                </div>
                                <div class="text-danger city_error px-4"></div>
                                <input  form="selected_city" type="hidden" class="postalcode" id="postal" name="postal" value="@if(session()->has('session_string')){{session('postalcode')}}@endif">
                                <input  form="selected_city" type="hidden" id="city" name="city" value="@if(session()->has('session_string')){{session('city')}}@endif">
                                <input  form="selected_city" type="hidden" id="country" name="country" value="@if(session()->has('session_string')){{'CA'}}@endif">
                                <input  form="selected_city" type="hidden" id="street_address" name="street_address" value="@if(session()->has('session_string')){{session('shipping_location')}}@endif">
                                <input  form="selected_city" type="hidden" id="province" name="province" value="@if(session()->has('session_string')){{session('province')}}@endif">
                                <input  type="hidden"  form="selected_city" name="redirect" class="redirect_url" >
                                <input  type="hidden"  form="selected_city" name="product_Id" class="product_Id" >
                                <div class="form-group text-center mt-4">
                                    <button form="selected_city" class="btn btn-theme btn-sm border choose_place" type="submit"   >SELECT</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="modal fade" id="PickupModalToggle" aria-hidden="true" aria-labelledby="PickupModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="col-lg-12 p-2">
                    <button class="btn btn-light" data-bs-target="#DeliveryModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="bi bi-arrow-left"></i> Switch to Delivery</button>
                </div>
                <div class="modal-body py-5">
                    <div class="custom-model-wrap">
                        
                        <div class="pop-up-content-wrap my-4 px-3 text-center">
                              <h3 style="line-height: 1.5;" class="h5">CHOOSE A PICKUP LOCATION?</h3>
                        </div>
                      
                        <form method="GET" action="{{url('select-location')}}" class="selected_store choose_place validated not-ajax" id="selected_store">
                            <input form="selected_store" type="hidden" name="ordertype" value="pickup">
                        </form>
                        <div class="form-group">
                          <div class="for-scroll" id="style-4">
                            <div class="row">
                              @php
                              $checked = true;
                              @endphp
                              @foreach(App\Models\Store::where('status',1)->get() as $stores_list)
                              <div class="col-12 col-md-6 col-lg-6 pickupStores mb-3 position-relative bg-white"  data-checkbox="pickup-{{$stores_list->id}}" role="button">
                                 <div class="border border-1 border-light map-info p-1 rounded-3 shadow-sm position-absolute bg-white">
                                     <div class="map position-relative w-100 h-100">
                                         <iframe src="https://www.google.com/maps?q={{$stores_list->name}},{{$stores_list->address}}, 
                                                {{$stores_list->postal_code}}, 
                                                {{$stores_list->city}}&output=embed"></iframe>
                                     </div>
                                 </div>
                                <div class="bg-light card h-100  rounded-2 selected"  data-id="{{$stores_list->id}}">
                                    <a class="show-map mb-0" data-id="{{$stores_list->id}}" href="#">
                                        
                                        <div class="col-lg-12 ">
                                            <div class=" text-center p-2 round-checkbox"> 
                                                <i class="bi bi-shop-window fs-1"></i><br>
                                                <strong>{{$stores_list->name}}</strong><br>
                                                <i class="small">{{$stores_list->address}}, 
                                                {{$stores_list->postal_code}}, 
                                                {{$stores_list->city}} </i>
                                                <input  form="selected_store" type="radio" @if(session()->has('session_string')) {{ $stores_list->id == session('pickup_id') ? 'checked' : ''}} @else @if ($checked) @php echo 'checked'; $checked = false; @endphp @endif @endif name="pickup_store" class="me-1" value="{{$stores_list->id}}" data-city="{{$stores_list->city}}" data-postal="{{$stores_list->postal_code}}" data-strname="{{$stores_list->name}}" data-address="{{$stores_list->address}}" id="pickup-{{$stores_list->id}}">
                                                <label for="pickup-{{$stores_list->id}}"></label>
                                            </div>
                                        </div>
                                           
                                    </a>
                                </div>
                              </div>
                              @endforeach
                            </div>
                          </div>
                        </div>
                        <div class="form-group mt-3 text-center">
                            <button type="submit" form="selected_store" class="btn btn-theme btn-sm border">SELECT</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    

    <div class="modal fade" id="productSearchModal" tabindex="-1" role="dialog" aria-labelledby="nutrition_infoModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered nutrition-info-modal" role="document">
            <div class="modal-content">
              
              <div class="modal-body ">
                    <div class="pop-up-content-wrap my-4 px-3 text-center">
                      <h3 class="">FIND YOUR FAVORITE FLOWER</h3>
                    </div>
                    <div class="form-group px-3">
                        <input  type="search"  name="searching_products" id="searching-products" autocomplete="off" class="form-control" placeholder="">
                    </div>
                    <div class=" px-4" >
                        <ul class="list-unstyled searchingProductsList">
                            
                        </ul>
                    </div>
              </div>
              
            </div>
        </div>
    </div>
    
    
    <div class="modal fade" id="zoomModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
              
              <div class="modal-body zoom-modal">
                
              </div>
              
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="wishlistModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
              
                <div class="modal-body wishlist-modal">
                    
                </div>
              
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="shoppingMethod" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              
              <div class="modal-body bg-body-secondary rounded-3">
                <div class="col-lg-12">
                    <div class="pop-up-content-wrap my-4 px-2 text-center">
                      <h3 style="line-height: 1.5;" class="h5">What kind of order would you like to place ?</h3>
                    </div>
                    <div class="justify-content-center my-4 row ">
                        <div class="col-6 col-lg-4 text-center  cursor-pointer ">
                            <div role="button" class="shipping_variations card bg-light border-0" data-checkbox="checkbox_option_rounded_pickup">
                                <div class="round-checkbox"> 
                                    <input type="radio"  name="methodShipping" value="pickup" checked="" id="checkbox_option_rounded_pickup">
                                    <label for="checkbox_option_rounded_pickup" class="ms-5"></label>
                                </div>
                                <h4 class="text-center my-4">Pickup</h4>
                            </div>
                        </div>
                        <div class="col-6 col-lg-4 text-center  cursor-pointer ">
                            <div role="button" class="shipping_variations card bg-light border-0" data-checkbox="checkbox_option_rounded_delivery">
                                <div class="round-checkbox"> 
                                    <input type="radio" value="delivery" name="methodShipping" id="checkbox_option_rounded_delivery">
                                    <label for="checkbox_option_rounded_delivery" class="ms-5"></label>
                                </div>
                                 <h4 class="text-center my-4">Delivery</h4>
                            </div>
                        </div>
                        
                        <div class="my-4 text-center">
                            <button class="btn btn-theme selectMethodShipping">Select</button>
                        </div>
                    </div>
                </div>
                    
              </div>
              
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="compareModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              
                <div class="modal-body compare-modal">
                    
                </div>
              
            </div>
        </div>
    </div>
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap&libraries=places,geometry&v=weekly" defer></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
<script src="{{ asset('assets/js/autofilldata.js?v=1.4') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
    
<script>

        
        function initMap() {
            const input = document.getElementById("autocomplete");
    
            const options = {
                strictBounds: false,
                types: ['address'],
                // types: ['(cities)'],
                componentRestrictions: { country: 'CA' } 
            };

            const autocomplete = new google.maps.places.Autocomplete(input, options);

            autocomplete.addListener("place_changed", () => {
         
                const place = autocomplete.getPlace();
                
                if (!place.geometry || !place.geometry.location) {
    
                window.alert("No details available for input: '" + place.name + "'");
                return;
                }
                // Get city, postal code, and country from the place details
                var city = '';
                var postalCode = '';
                var country = '';
                var region="";
                var street_address="";
                var province = "";
                for (var i = 0; i < place.address_components.length; i++) {
                    var component = place.address_components[i];
                    var componentType = component.types[0];
        
                    
                    if (componentType === 'sublocality' || componentType === 'sublocality_level_1') {
                        city = component.long_name;
                    }
                    
                    if (componentType === 'administrative_area_level_1') {
                        province = component.long_name;
                    }
                    
                    if(city == ''){
                        if (componentType === 'locality') {
                            city = component.long_name;
                        }
                    }
                    
                    if (componentType === 'postal_code_prefix') {
                        postalCode = component.long_name;
                    }
                    
                    if(postalCode == ''){
                        if (componentType === 'postal_code') {
                            postalCode = component.long_name;
                        }
                    }
                    
                    if (componentType === 'country') {
                        country = component.long_name;
                    }
                    street_address = place.name;
                    
                }
                
                console.log(city)
                console.log(street_address)
                console.log(province)
                console.log(postalCode)
                console.log(place)
                
                if(postalCode != ''){
                $('.postalcode').val(postalCode);
                }
                $('#city').val(city);
                $('#country').val(country);
                $('#street_address').val(street_address);
                $('#order_type').val('delivery');
                $('#province').val(province);

             
            });
          
        }
      
        window.initMap = initMap;
 
    </script>
 
<script>

      // Initially check at least one radio button
      checkAtLeastOneChecked();
  
  $('.show-map').on('click', function() {
        var atr_id = $(this).data('id');
        $('#pickup-' + atr_id).prop('checked', !$('#pickup-' + atr_id).prop('checked'));
        checkAtLeastOneChecked();
        $('.pickuploc').removeClass('selected');
        $(this).closest('.pickuploc').addClass('selected');
        return false;
  });
  
    
    function checkAtLeastOneChecked() {
      var radioGroup = $('input[name="pickup_store"]');
      var checkedCount = radioGroup.filter(':checked').length;
    
      if (checkedCount === 0) {
        radioGroup.first().prop('checked', true);
      }
    
      $('.pickuploc').removeClass('selected');
      $('input[name="pickup_store"]:checked').closest('.pickuploc').addClass('selected');
    }
      
    
    
    $('.form-btn').on('click', function () {
        $(".form-model-main").addClass('form-open');
    });
    $('.form-close, .bg-form').click(function () {
        $('.form-model-main').removeClass('form-open')
    });

    $('.franch-btn').on('click', function () {
        $(".form-model-main.franch").addClass('form-open');
    });
    $('.form-close, .bg-form').click(function () {
        $('.form-model-main.franch').removeClass('form-open')
    });

</script>
<script>
  

    
    function city_availabilityCheck(city,province) {
        return new Promise(function (resolve, reject) {
            $.ajax({
                url: `{{url('check-available-city')}}`,
                data: { city: city,province : province },
                cache: false,
                success: function (html) {
                    if (html == 0) {
                        $('.city_error').html(`<p class="fw-bolder">This site currently not available in this City<br>
                        We are working on getting your favorite item to your area soon.</p>`);
                        resolve(0);
                    } else {
                        resolve(1);
                    }
                },
                error: function (error) {
                    reject(error);
                }
            });
        });
    }
    
    $('body').on('click', '.choose_place', async function (e) {
        e.preventDefault();
        $('.city_error').html('');
        var _this = $(this);
        var ordertypeValue = 'delivery';
        var city = $('#city').val();
        var province = $('#province').val(); 
        if (ordertypeValue == 'delivery') {
            var cityavailabilty = await city_availabilityCheck(city,province);
            if (cityavailabilty == 0) {
                return;
            }
        }

        @if(session()->has('ordertype'))
            try {
                var already_ordertype = `{{session('ordertype') ?? ''}}`;
                if (ordertypeValue == already_ordertype) {
                    // _this.submit();
                     $('#selected_city').trigger('submit')
                } else {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'Are you sure? the cart will be emptied!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes switch to ' + ordertypeValue
                    }).then((result) => {
                        if (result.isConfirmed) {
                            console.log(12)
                            // _this.submit(); // Submit the form
                            $('#selected_city').trigger('submit')
                        }
                    });
    
                    return false; // Prevent form submission
                }
            } catch (error) {
                console.error(error);
            }
        @else
        console.log(1)
            $('#selected_city').trigger('submit')
            // _this.submit(); // Submit the form
        @endif
    
    });

    $('body').on('click', '.order_now', function () {
        $('.redirect_url').val($(this).data('href'));
        $('.product_Id').val($(this).data('pid'))
    });
    
</script>
 <script>
        $('body').on('submit', '#_form_subscription_', function (event) {
   
              event.preventDefault(); 
            // Get the form data
            var formData = $(this).serialize();
            // Submit the form asynchronously using AJAX
            $.ajax({
              url: `{{url('subscription-submit')}}`,
              type: 'POST',
              data: formData,
              success: function(response) {
                // Handle the successful response
                    if(response['type'] == 'success'){
                        $('.subEmail').val('');
                      }
                  Swal.fire(response['message'],'',response['type'])  
                  
              },
              error: function(xhr, status, error) {
                // Handle the error response
                console.log(xhr.responseText);
              }
            });
          });
   
        var whishlistInfo = localStorage.getItem('whishlistInfo');
        
        var whishlist = whishlistInfo ? JSON.parse(whishlistInfo) : [];


        $('body').on('click', '.btn-zoom', function (event) { 
             var id = $(this).data('pid');
            $.ajax({
                url: `{{route('zoom-product')}}`,
                cache: false,
                data:{'product_id' : id},
                success: function(response){
                    $("#zoomModal .modal-body").html(response);
                }
                
            });
        });
        
        $('body').on('click', '.btn-whishlist', function (event) {
            var pId = $(this).data('pid');
            if (!whishlist.includes(pId)) {
                whishlist.push(pId);
                localStorage.setItem('whishlistInfo', JSON.stringify(whishlist));
                
                alertJsFunction("Item Successfully Added", 'success');
            }
            else {
               alertJsFunction("Item already exists in wishlist", 'error');
            }
            
            
            
        });
        
        
         $('body').on('click', '.wishList', function (event) {
             whishlistInfo = localStorage.getItem('whishlistInfo');
             $.ajax({
                url: `{{route('wishlist-products')}}`,
                cache: false,
                data:{'productData' : whishlistInfo},
                success: function(response){
                    $("#wishlistModal .modal-body").html(response);
                }
                
            });
         });
        
        $('body').on('click', '.switch_To_Pickup', async function (e) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'Are you sure? the cart will be emptied!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes switch to Pickup'
                    }).then((result) => {
                        if (result.isConfirmed) {
                              $('#PickupModalToggle').modal('show');
                            
                        }
                    });
        });
        
        $('body').on('click', '.switch_To_Delivery', async function (e) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'Are you sure? the cart will be emptied!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes switch to Delivery'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#DeliveryModalToggle').modal('show')
                        }
                    });
            
        });
        
        
        $('body').on('click', '.selectMethodShipping', async function (e) {
            
            $('#shoppingMethod').modal('hide')
            
            if($('input[name="methodShipping"]:checked').val() == 'delivery'){
                 $('#DeliveryModalToggle').attr('data-bs-backdrop', 'static')
                    .attr('data-bs-keyboard', 'false')
                    .modal('show');
            }
            else{
                $('#PickupModalToggle').attr('data-bs-backdrop', 'static')
                    .attr('data-bs-keyboard', 'false')
                    .modal('show');
            }
            
        });
        
         $('body').on('click', '.shipping_variations', async function () {
            var checkbox2 = $(this).data('checkbox');

            $('input[name="methodShipping"]').removeAttr('checked', 'checked')
            $('#'+checkbox2).attr('checked', 'checked');
            
        });
        
        
        $('body').on('click', '.pickupStores', async function () {
            var checkbox2 = $(this).data('checkbox');

            $('input[name="pickup_store"]').removeAttr('checked', 'checked')
            $('#'+checkbox2).attr('checked', 'checked');
            
        });
        


        
        
        var compareInfo = localStorage.getItem('compareInfo');
        
        var compare = compareInfo ? JSON.parse(compareInfo) : [];

       
        
        
        $('body').on('click', '.compareModal', function (e) {
            var pId = $(this).data('pid')
            if (!compare.includes(pId)) {
                compare.push(pId);
                localStorage.setItem('compareInfo', JSON.stringify(compare));
                compareInfo = localStorage.getItem('compareInfo');
            }
         
            $.ajax({
                url: `{{route('campare-products')}}`,
                cache: false,
                data:{'productData' : compareInfo},
                success: function(response){
                    $("#compareModal .modal-body").html(response);
                }
            });
        });
        
        
        $('body').on('click', '.removeCampaire', function (e) {
            var removePdct = $(this).data('pid');
        
            const index = compare.indexOf(removePdct);
            if (index > -1) { 
                compare.splice(index, 1);
            }
        
            localStorage.setItem('compareInfo', JSON.stringify(compare));
            compareInfo = localStorage.getItem('compareInfo');
            $.ajax({
                url: `{{route('campare-products')}}`,
                cache: false,
                data:{'productData' : compareInfo},
                success: function(response){
                    $("#compareModal .modal-body").html(response);
                }
            });
        });
        
         $('body').on('click', '.removewishList', function (e) {
            var removePdct = $(this).data('pid');
        
            const index1 = whishlist.indexOf(removePdct);
            if (index1 > -1) { 
                whishlist.splice(index1, 1);
            }
        
            localStorage.setItem('whishlistInfo', JSON.stringify(whishlist));
            whishlistInfo = localStorage.getItem('whishlistInfo');
             $.ajax({
                url: `{{route('wishlist-products')}}`,
                cache: false,
                data:{'productData' : whishlistInfo},
                success: function(response){
                    $("#wishlistModal .modal-body").html(response);
                }
                
            });
        });
        
        $('body').on('click', '.addTocart', function (e) {
            var redirection = $(this).data('href');
        
            window.location=redirection;
        });
        
    
        $('body').on('input', '#searching-products', function (e) {
            var search = $(this).val();
            $.ajax({
                url: `{{route('searching-products')}}`,
                cache: false,
                data:{'search' : search},
                success: function(response){
                    $(".searchingProductsList").html(response);
                }
                
            });
        
        });
        
        
        
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>

    
<script src="{{ asset('assets/js/mask.js')}}"></script>

<script src="{{ asset('assets/js/script.js')}}"></script>
<script src="{{ asset('assets/js/formsubmit.js')}}"></script>



<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=64c2121860781a00121c8026&product=sop' async='async'></script>
 
@yield('scripts')

    <script>
        function alertJsFunction($message,$type){
            Swal.fire($message,'',$type)    
        }
    </script>
    @if (\Session::has('failed'))
    <script>
        alertJsFunction("{!! \Session::get('failed') !!}", 'error');
    </script>
    @elseif (\Session::has('error'))
    <script>
        alertJsFunction("{!! \Session::get('error') !!}", 'error');
    </script>
    @elseif (\Session::has('success'))
    <script>
        alertJsFunction("{!! \Session::get('success') !!}", 'success');
    </script>
    @elseif (\Session::has('warning'))
    <script>
        alertJsFunction("{!! \Session::get('warning') !!}", 'warning');
    </script>
    @elseif (\Session::has('status'))
    <script>
        alertJsFunction("{!! \Session::get('status') !!}", 'success');
    </script>
    @endif
</body>

</html>
