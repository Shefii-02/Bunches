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
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


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
                                <a href="#" class="text-decoration-none text-white f-15 DeliveryModalBtn" data-bs-target="#DeliveryModalToggle" data-bs-toggle="modal">
                                    <i class="bi bi-box me-1"></i>
                                    @if(session()->has('session_string'))
                                        {{Str::limit(session('identity_place'), 10);}} 
                                    @else 
                                        City 
                                    @endif
                                </a>
                            </div>
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
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-3">
                                    {!! getMenu('main-menu') !!}
                                </ul>
                                
                                <div class="d-flex position-relative" role="search">
                                    <button class="btn border-0 bg-transparent" data-bs-target="#productSearchModal" title="Search Product" data-bs-toggle="modal"  >
                                        <i class="bi bi-search text-primary-bg"></i>
                                    </button>
                                    <!--<a class="btn border-0 bg-transparent wishList" href="#" data-bs-target="#wishlistModal" title="My Wishlist" data-bs-toggle="modal" >-->
                                    <!--    <i class="bi bi-heart text-primary-bg"></i> -->
                                    <!--</a>-->
                                  
                                    <a class="btn border-0 bg-transparent" href="{{url('cart')}}" title="Cart">
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

  
@include('frontend.subscriptions-form')

<footer class="">
    <div class="footer-top py-5">
        <div class="container">
            <div class="row pb-3">
                <div class="col-12 col-md-3 mb-3">
                    <h5 class="text-light fw-500 mb-3">ABOUT US</h5>
                    <P class="fw-500 f-14 pe-3">Flower is the best shop since 1992. We bring natural beauty close to you and hope get what we give.</P>
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
                    <div class="d-flex position-relative w-75">
                        <input type="text" class="form-control rounded-0 bg-transparent">
                        <button class="btn border-0 right-0"><i class="bi bi-send"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-3 text-center">
                    
                    <img src="{{asset('assets/images/footer.jpg')}}"  class="w-md-100 w-75" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer py-4">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center text-md-start col-md-6">
                    <p class="mb-md-0 mb-2 f-14">© {{date('Y',time()).'-'.date('Y',time()+(60*60*24*366))}} Bunches. All rights reserved</p>
                </div>
                <div class="col-12 col-md-6 text-center text-md-end">
                    <img src="{{asset('assets/images/payment.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</footer>

    <div class="modal fade" id="DeliveryModalToggle" aria-hidden="true" aria-labelledby="DeliveryToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                
                <div class="modal-body p-0">
                        
                    <div class="custom-model-wrap">
                           
                            <div class="pop-up-content-wrap my-4 px-3 text-center">
                              <h3 class="h6">PLEASE ENTER THE NAME OF YOUR CITY FOR DELIVERY</h3>
                            </div>
                            <form method="GET" action="{{url('select-location')}}" class="selected_city choose_place validated not-ajax" id="selected_city">
                                @csrf()
                                <input  form="selected_city" type="hidden" id="ordertype" name="ordertype" value="delivery">
                                <div class="form-group px-3">
                                    <input form="selected_city" value="@if(session()->has('session_string')){{session('autocomplete')}}@endif" type="text" required name="autocomplete" id="autocomplete"  class="form-control select_city" placeholder="Enter your address">
                                </div>
                                <div class="text-danger city_error px-4"></div>
                                <input  form="selected_city" type="hidden" id="postal" name="postal">
                                <input  form="selected_city" type="hidden" id="city" name="city">
                                <input  form="selected_city" type="hidden" id="country" name="country">
                                <input  form="selected_city" type="hidden" id="street_address" name="street_address">
                                <input type="hidden"  form="selected_city" name="redirect" class="redirect_url" >
                                <input type="hidden"  form="selected_city" name="product_Id" class="product_Id" >
                                <div class="form-group text-center my-3">
                                    <button form="selected_city" class="btn primary-btn btn-sm border" type="submit"   >SELECT</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="productSearchModal" tabindex="-1" role="dialog" aria-labelledby="nutrition_infoModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered nutrition-info-modal" role="document">
            <div class="modal-content">
              
              <div class="modal-body">
                    <div class="pop-up-content-wrap my-4 px-3 text-center">
                      <h3 class="h6">FIND YOUR FAVORITE FLOWER</h3>
                    </div>
                    <div class="form-group px-3">
                        <input  type="search"  name="" id=""  class="form-control" placeholder="">
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
                // types: ['address'],
                types: ['(cities)'],
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
                for (var i = 0; i < place.address_components.length; i++) {
                    var component = place.address_components[i];
                    var componentType = component.types[0];
        
                    
                    if (componentType === 'sublocality' || componentType === 'sublocality_level_1') {
                        city = component.long_name;
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
                
                console.log(place.geometry['location'].lat())
                console.log(place.geometry['location'].lng())
                console.log(postalCode)
                console.log(city)
                console.log(street_address)
                console.log(place)
                
                
                $('#postal').val(postalCode);
                $('#city').val(city);
                $('#country').val(country);
                $('#street_address').val(street_address);
                $('#order_type').val('delivery');

             
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
  
    function city_availabilityCheck(city) {
        return new Promise(function (resolve, reject) {
            $.ajax({
                url: `{{url('check-available-city')}}`,
                data: { city: city },
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
    
    $('body').on('submit', '.choose_place', async function (e) {
      
        $('.city_error').html('');
        var _this = $(this);
        var ordertypeValue = $(this).find('input[name="ordertype"]').val();
        var city = $('#city').val();

        var cityavailabilty = await city_availabilityCheck(city);
        console.log(cityavailabilty)
        if (cityavailabilty == 0) {
            return;  
            e.preventDefault();
        }
        
        // _this.submit();
    
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
