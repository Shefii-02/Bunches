
@extends('layouts.frontend')
@section('styles')
<style>
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        display: none;
    }
    
    .loading-container {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: none;
        z-index: 999;
    }
    
    .loading {
        background-color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
</style>


@endsection

@section('contents')

<section class="banner">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @php 
                $io = 0;
            @endphp
            @foreach($slider as $key => $item)
                @if($item->picture != '' &&  $item->picture != 'dummy.png')
                    @if($item->file_type == 'image')
                        <div class="carousel-item position-relative @if($io == 0) active @endif">
                            <img src="{{asset('images/banners/'.$item->picture)}}" class="d-block w-100" alt="slider-home">
                            <div
                                class="for-slider-content position-absolute top-0 h-100 w-100 d-flex align-items-center justify-content-center">
                                <div class="text-center">
                                    <h1 class="text-center text-white d-none"><i>Love and Romance</i></h1>
                                    <p class="text-center text-white f-26 d-none">FLOWER STARTING AT $29</p>
                                     @if($item->link != '')
                                        <div class="btn btn-theme border-0 py-2 px-4 rounded f-15 fw-bold text-white"> 
                                            <a  @if(session()->has('session_string')) href="{{$item->link}}" class="btn btn-primary"   @else data-bs-toggle="modal" data-bs-target="#order-btn" data-pid="0" data-href="{{$item->link}}" class="order_now d-none d-md-block btn btn-primary"  @endif >Shop Now</a> 
                                        </div>
                                    @endif
                                   
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="carousel-item position-relative @if($io == 0) active @endif">
                            <video class="img-fluid" autoplay loop muted>
                                <source src="{{asset('images/banners/'.$item->picture)}}" type="video/mp4" />
                            </video>
                        </div>
                    @endif
                    @php 
                        $io = $io+1;
                    @endphp 
                @endif
            @endforeach
           
        </div>
        <button class="carousel-control-prev justify-content-start" type="button"
            data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon for-slider-navigation" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next justify-content-end" type="button"
            data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon for-slider-navigation" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="offer-content py-3 primary-dark-bg d-none">
        <p class="text-center m-0 text-white f-20">
            Send the best Valentine’s Day flowers to Toronto to make her day
        </p>
    </div>
</section>


<!-- FOR MOBILE BANNER -->
<section class="banner for-mobile-banner">

  <div class="slick-banner-mobile">
       @php 
            $io = 0;
        @endphp
        @foreach($slider as $key => $item)
        @if($item->file_type == 'image')
            @if($item->picture_small != '' && $item->picture_small != 'dummy.png')
            <div>
              <img class="w-100" src="{{asset('images/banners/'.$item->picture_small)}}" alt="">
                @if($item->link != '')
               
                    <div class="banner-slick-button" style="position: absolute;bottom:10%; width:100%;text-align: center;"> 
                        <a @if(session()->has('session_string')) href="{{$item->link}}"  class="btn btn-primary"    @else data-bs-toggle="modal" data-bs-target="#order-btn" data-pid="0" data-href="{{$item->link}}" class="order_now   btn btn-primary"  @endif>ORDER NOW</a> 
                    </div>
                @endif
            </div>
            @endif
         @else
              <div>
               <video class="img-fluid" autoplay loop muted>
                <source src="{{asset('images/banners/'.$item->picture)}}" type="video/mp4" />
              </video>
              </div>
        @endif
         @php 
            $io = $io+1;
        @endphp 
        @endforeach
  </div>

</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cat-parent">
                  
                    @if(isset($tiles[0]))
                        <div class="cat-div cat-div1 position-relative" role="button">
                            <a href="{{$tiles[0]->link}}" class="text-decoration-none text-white">
                                <img class="w-100 object-fit-cover" src="{{asset('images/banners/'.$tiles[0]->picture)}}" alt="{{$tiles[0]->name}}">
                                <div class="position-absolute cat-content text-center">
                                        <h4 class="text-white">{{$tiles[0]->name}}</h4>
                                        <span >SHOP NOW <i class="bi bi-chevron-double-right"></i></span>
                                </div>
                            </a>
                        </div>
                    @endif
                    @if(isset($tiles[1]))
                    <div class="cat-div cat-div2 position-relative" role="button">
                        <a href="{{$tiles[1]->link}}" class="text-decoration-none text-white">
                            <img class="w-100 object-fit-cover" src="{{asset('images/banners/'.$tiles[1]->picture)}}" alt="{{$tiles[1]->name}}">
                            <div class="position-absolute cat-content text-center">
                                    <h4 class="text-white">{{$tiles[1]->name}}</h4>
                                        <span >SHOP NOW <i
                                        class="bi bi-chevron-double-right"></i></span>
                            </div>
                        </a>
                    </div>
                    @endif
                    @if(isset($tiles[2]))
                    <div class="cat-div cat-div3 position-relative" role="button">
                        <a href="{{$tiles[2]->link}}" class="text-decoration-none text-white">
                            <img class="w-100 object-fit-cover" src="{{asset('images/banners/'.$tiles[2]->picture)}}" alt="{{$tiles[2]->name}}">
                            <div class="position-absolute cat-content text-center">
                                
                                    <h4 class="text-white">{{$tiles[2]->name}}</h4>
                                    <span >SHOP NOW <i class="bi bi-chevron-double-right"></i></span>
                            </div>
                        </a>
                    </div>
                    @endif
                    @if(isset($tiles[3]))
                    <div class="cat-div cat-div4 position-relative" role="button">
                        <a href="{{$tiles[3]->link}}" class="text-decoration-none text-white">
                            <img class="w-100 object-fit-cover" src="{{asset('images/banners/'.$tiles[3]->picture)}}" alt="{{$tiles[3]->name}}">
                            <div class="position-absolute cat-content text-center">
                                <h4 class="text-white">{{$tiles[3]->name}}</h4>
                                <span >SHOP NOW <i
                                        class="bi bi-chevron-double-right"></i></span >
                            </div>
                        </a>
                    </div>
                    @endif
                    @if(isset($tiles[4]))
                    <div class="cat-div cat-div5 position-relative" role="button">
                        <a href="{{$tiles[4]->link}}" class="text-decoration-none text-white">
                            <img class="w-100 object-fit-cover" src="{{asset('images/banners/'.$tiles[4]->picture)}}" alt="{{$tiles[4]->name}}">
                            <div class="position-absolute cat-content text-center">
                                <h4 class="text-white">{{$tiles[4]->name}} </h4>
                                <span >SHOP NOW <i
                                        class="bi bi-chevron-double-right"></i></span>
                            </div>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<section class="featured pt-3">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h3 class="text-dark">{{isset($front_products) ? $front_products->title : ''}}</h2>
                <p class="mt-3"><i>{{isset($front_products) ? $front_products->short_desc : ''}}</i></p>
            </div>
            <div class="col-12 col-md-6">
                
            </div>
        </div>
        <div class="row py-4 w-100 m-0 justify-content-between">
            <div class="col-12 col-md-12">
                <div class="row pe-0 pe-lg-5">
                    @if(isset($front_products->product_list))
                        @foreach($front_products->product_list as $item)
                            @php
                                $product = App\Models\Product::where('master_id', $item->product_id)->first();
                            @endphp
                            @if($product)
                                <div class="col-6 col-md-3  mb-4 product-card" role="button">
                                    <a href="{{route('product-single',$product->slug)}}" class="text-decoration-none">
                                        <div class="product-image position-relative overflow-hidden">
                                            <img src="{!! ($product->thumbImages->count()) != '' ? asset('images/products/' . $product->thumbImages->first()->picture) : asset('/assets/images/dummy-product.jpg') !!}" onerror="this.onerror=null;this.src='/assets/images/dummy-product.jpg';" class="w-100 fixed-height image-sm" alt="" srcset="">
                                            <!--<button class="btn btn-transparent position-absolute btn-whishlist" data-pid="{{$product->id}}">-->
                                            <!--    <i class="bi bi-heart text-primary-color f-20"></i></button>-->
                                            <!--<button class="btn btn-transparent position-absolute btn-zoom" data-pid="{{$product->id}}" data-bs-toggle="modal"-->
                                            <!--    data-bs-target="#zoomModal"><i class="bi bi-zoom-in f-15"></i></button>-->
                                            <!--<button class="btn btn-transparent position-absolute btn-compare compareModal" data-pid="{{$product->id}}" data-bs-toggle="modal"-->
                                            <!--    data-bs-target="#compareModal"><i-->
                                            <!--        class="bi bi-arrows-angle-expand f-15"></i></i></button>-->
                                        </div>
                                        <div class="pro-content text-center border-product py-2">
                                            <p class="fw-bold m-0 f-14 text-dark">{!! capitalText($product->name) !!}</p>
                                            <p class="text-primary-color m-0 fw-bold d-none">$39</p>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
           
            
        </div>
    </div>
</section>

<section class="pb-md-5 pb-0 d-none">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 ceo_note text-center py-5 mb-md-0 mb-4"  onerror="this.onerror=null;this.src='/assets/images/dummy-product.jpg';"  style="background:url({{asset('assets/images/l5RgShTSxrgqAJ8DuUttyVMFU9QNIU.png')}}) !important;">
                <div class="content py-lg-5 py-md-1 px-md-1 px-lg-5">
                    <h2 class="fw-bold text-white">THE FLOWER</h2>
                    <p class="text-primary-color">SAME DAY DELIVERY</p>

                    <p class="text-white mt-5 fw-300">As Canada's leading online Florist, The Flower recognizes the
                        importance of offering our customers quality products at a fair price. We are frequently asked
                        how we can provide fresher flowers at better prices compared to our online and offline
                        competitors.</p>

                    <p class="text-white mt-5 fw-300">The Flower is committed to providing high-quality products at a
                        fair price. We take great pride in our customer service, both before and after the sale - we
                        appreciate your business and promise to never take it for granted. If you have any issues please
                        email wecare@theflower.com. We are proud to be a wholly owned and operated Canadian company.</p>

                    <img class="mt-5" src="assets/images/sign.png" alt="">

                    <p class="text-primary-color mb-0 mt-3 f-20 fw-300">CEO-HENRRY INN</p>
                </div>
            </div>

            <div class="col-12 col-md-6 px-2 ps-lg-5 pe-lg-0">
                <div class="cornered-div position-relative h-100 px-4 py-3">

                    <div>
                        <div class="corner-div-content pt-md-0 pt-md-5 pb-3">
                            <div class="d-flex justify-content-center">
                                <h1 class="text-primary-color text-center mt-5"><i>Customers</i></h1>
                            </div>
                        </div>

                        <p class="text-center fw-300 for-dash"> They trust us because we deserve it. Thank you for your
                            supporting </p>
                    </div>

                    <div class="brands pt-5">
                        <div class="row pt-2 pb-5  pt-lg-5">
                            <div class="col-6 col-lg-3 text-center mb-3">
                                <img class="w-75" src="{{asset('assets/images/sv.png')}}" alt="">
                            </div>
                            <div class="col-6 col-lg-3 text-center mb-3">
                                <img class="w-75" src="{{asset('assets/images/sv-1.png')}}" alt="">
                            </div>
                            <div class="col-6 col-lg-3 text-center mb-3">
                                <img class="w-75" src="{{asset('assets/images/sv-2.png')}}" alt="">
                            </div>
                            <div class="col-6 col-lg-3 text-center mb-3">
                                <img class="w-75" src="{{asset('assets/images/sv.png')}}" alt="">
                            </div>

                            <div class="col-6 col-lg-3 text-center mb-3">
                                <img class="w-75" src="{{asset('assets/images/sv-1.png')}}" alt="">
                            </div>
                            <div class="col-6 col-lg-3 text-center mb-3">
                                <img class="w-75" src="{{asset('assets/images/sv-2.png')}}" alt="">
                            </div>
                            <div class="col-6 col-lg-3 text-center mb-3">
                                <img class="w-75" src="{{asset('assets/images/sv.png')}}" alt="">
                            </div>
                            <div class="col-6 col-lg-3 text-center mb-3">
                                <img class="w-75" src="{{asset('assets/images/sv-1.png')}}" alt="">
                            </div>
                        </div>
                    </div>

                    <span class="top-left-round overflow-hidden"></span>
                    <span class="top-right-round overflow-hidden"></span>
                    <span class="bottom-left-round overflow-hidden"></span>
                    <span class="bottom-right-round overflow-hidden"></span>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="py-5  blog">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <h1> <i class="">Blogs</i> </h1>
                </div>
                <p class="text-center fw-300 mt-3">You can get many updated information through our upcoming blog</p>
            </div>

            <div class="col-12 mt-5">
                <!-- slider area -->
                <div class="blog-slider">
                    @foreach($blogs as $Bitem)
                        <div>
                            <div class="blog-content">
                                <img class="w-100" src="{{asset('images/blogs/'.$Bitem->picture)}}" alt="">
                                <h5 class="fw-500 text-uppercase mt-3 text-dark">{!!Str::limit($Bitem->name,'35')!!} </h5>
                                <p class="fw-300 f-15"> {!!Str::limit(str_replace('<p>&nbsp;</p>','',$Bitem->description),'50')!!}</p>
                                <a href="{{route('blog-single',$Bitem->slug)}}" class="btn blog-btn">Read More</a>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
                <!-- Slider Area -->
            </div>
        </div>
    </div>
</section>

@endsection


@section('scripts')
<script>
  document.getElementById("resume").addEventListener("change", function() {
    const fileName = this.files[0].name;
    document.getElementById("file-name").innerHTML = fileName;
  });
</script>
    <script>
    
    $(document).ready(function() {
        $('body').on('submit', '#form-career', function(event) {
                event.preventDefault();
        
                var form = $(this);
                var formData = new FormData(form[0]);
                $('.loading').show();
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if(response == 1){
                            var rtnMsg= `<span class="d-flex justify-content-center mb-5 mt-5 fw-bold text-dark">Successfully Submitted..</span>`;
                            $('.job-application-body').html(rtnMsg);
                             $('.loading').hide();
                        }
                        else
                        {
                            var rtnMsg= `<span class="d-flex justify-content-center mb-5 mt-5 fw-bold text-dark">Failed Attempt Try again..</span>`;
                            $('.job-application-body').html(rtnMsg);
                             $('.loading').hide();
                        }
                        // Handle the successful response here
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        // Handle the error here
                        console.error(error);
                    }
                });
            });
       
        
        $('#resume').change(function() {
            $('.file-error').text('');
            var fileInput = this;
            var file = fileInput.files[0];

            if (file && file.size > 5 * 1024 * 1024) {
                $('.file-error').text(' Please select a file with a maximum size of 5 MB.');
                // Optionally, you can reset the file input to allow the user to select another file
                $(fileInput).val('');
                $('#file-name').text('No file selected');
            }
        });
        $('body').on('change', '#store_location', function() {
            var store_id = $(this).val();
            var url      = `{{url('get_positions')}}`;
            $.ajax({
                url: url,
                type: "GET",
                data: {store_id : store_id},
                cache: false,
                success: function(html){

                    $("#available_position").html(html);
                }
            });
        });
    });
    </script>
@endsection


