
@extends('layouts.frontend')

@section('styles')
    <style>
      
    </style>
@endsection

@php
   $totalAmount = 0;
@endphp

@section('contents')
    <section class="bread_crumb bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-6">
                   {{-- <p class="mb-0 f-15 d-none">{!! capitalText($product->name) !!}</p>  --}}
                    <p class="mb-0 f-14 text-dark ">You are here: <a href="{{url('/')}}" class="text-dark">Home</a> > <a href="{{url('category')}}">Catergory</a> > {{$product->name}}</p>

                </div>
                <div class="col-6 text-end">
                                        <!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons text-end "></div><!-- ShareThis END -->

                </div>
            </div>
        </div>
    </section>
    @php
        $pdct_details = $product->product_variation->where('product_id',$product->id)->first();
         
        if($basket_items)
        {
            $serveDate = $basket_items->serve_date;
            $serveTime = $basket_items->serve_time;
        }
        elseif(session()->has('serve_date')){
            $serveDate = session('serve_date');
            $serveTime = session('serve_time');
        }
        else{
            $serveDate ='';
        }
    
    @endphp
    
    
<section class="product_single py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5">
                <div class="row">
                    <div class="col-10 order-0 order-lg-2">
                        <div class="main_img single-item">
                             @foreach($product->images ?? [] as $imgP)
                                <div class="">
                                    <img src="{!! $imgP->picture != '' ? asset('images/products/' . $imgP->picture) : asset('/assets/images/dummy-product.jpg') !!}" onerror="this.onerror=null;this.src='/assets/images/dummy-product.jpg';" class="w-100" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-2 p-0">
                        <ul class="image_nav p-0 m-0 list-unstyled d-flex mt-2 w-100 overflow-auto d-flex flex-column gap-1">
                            @foreach($product->images ?? [] as $key => $imgP)
                            <li  class="smallnav" role="button">
                                <img data-index="{{$key}}" src="{!! $imgP->picture != '' ? asset('images/products/' . $imgP->picture) : asset('/assets/images/dummy-product.jpg') !!}" onerror="this.onerror=null;this.src='/assets/images/dummy-product.jpg';" width="100%" alt="">
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    
                </div>
                
                
            </div>
            
            <div class="col-12 col-md-7">

                <h3 class="fw-bold text-dark mt-1">{!! capitalText($product->name) !!}</h3>
                
                <h3 class="text-primary-color product_price">{{getPrice($product->MinPrice->price)}}</h3>
                
                <div class="d-flex align-items-center justify-content-start d-none">
                    <span class="me-2 text-dark f-15 fw-bold ">SKU :</span>
                    
                    <span class="text-success ms-2 f-15 product_sku">@if($product->product_variation->count() == 1 ) {{$product->product_variation[0]->sku}} @endif</span>
                </div>
                
                @if($product->description != null  && strlen($product->description) >0)
                    <div class="product-detail  py-3 fw-300 f-14 d-none" > 
                        {!! Str::limit($product->description,100) !!}
                        @if(strlen($product->description) > 100)
                         <a href="#single_desc_tab" class=" text-decoration-none" role="button">Read More</a>
                        @endif
                    </div>
                @endif        
                
                @if($product->mark_stock_status == 0)
                    @if(session()->has('ordertype'))
                        @if( $product->product_type == 'both' || $product->product_type == session('ordertype'))
                            <div class="product__variations">
                                @if(count($product->option)>0 && ($product->has_variation == 1))
                                    @php
                                        $options = $product->optionList->groupBy('name');
                                      
                                        
                                    @endphp
                                    <div class="product__variations">
                                       
                                                @foreach($options as $key => $optionDiv)
                                                
                                                    <div class="row position-relative d-flex align-items-center w-100" >
                                                        <div class="col-12 d-none">
                                                            <h5 class="">Select {{titleText($key)}}</h5>
                                                        </div>
                                                        <!--/////////// Show {{$key}} Option ////////////////////-->  
                                                        
                                                       <div class="col-12">
                                                            <div class="row option-{{$key}} my-2" >
                                                            @foreach($optionDiv as $optionItmskey => $optionItms)
                                                               
                                                                @if(($key === $options->keys()->first()))
                                                                    @php
                                                                        $variation_data = App\Models\VariationKey::leftJoin('product_variations', 'variation_keys.variation_id', 'product_variations.id')
                                                                            ->where(function ($query) {
                                                                                return $query->where('product_variations.sku', '<>', '')->orWhere('product_variations.sku', '<>', null);
                                                                            })
                                                                            ->where('value', $optionItms->value)
                                                                            ->where('product_variations.product_id', $product->id)
                                                                            ->first();
                                                                    @endphp
                                                                    <div class="col-6 col-lg-4 text-center option_vals cursor-pointer mb-3">
                                                                        <div data-option="{{$optionItms->id}}" id="show_variations_{{$optionItms->id}}" data-checkbox="checkbox_option_rounded_{{$optionItms->id}}"  data-type="{{$key}}" role="button" class="@if($key === $options->keys()->last()) show_variations @else show_variations_parent  @endif  @if($optionItmskey == 0) active @endif card bg-light">
                                                                            <div class="round-checkbox position-absolute end-0 "> 
                                                                                <input type="radio" @if($key === $options->keys()->last()) name="single_selection" data-vname="{{$variation_data->variation}}" data-sku="{{$variation_data->sku}}" data-price="{{$variation_data->price}}" data-id="{{$variation_data->variation_id}}"  class="vari_checkbox " @else  data-next_div="{{$options->keys()->last()}}"  data-type_value="{{$optionItms->value}}" data-type="{{$key}}" name="single_selection_parent" class="vari_checkbox_parent"  @endif   @if($optionItmskey == 0) checked @endif  id="checkbox_option_rounded_{{$optionItms->id}}">
                                                                                <label for="checkbox_option_rounded_{{$optionItms->id}}" class="ms-5"></label>
                                                                            </div>
                                                                            <div class=" position-relative vari_type  justify-content-center py-2" >
                                                                                <div class="row">
                                                                                    
                                                                                    <div class="col-md-12">
                                                                                        <p class="card-price fw-bold text-capitalize p-0 m-0">{{$optionItms->value}} </p>
                                                                                        @if($key === $options->keys()->last())
                                                                                           <small class="py-1">({{getPrice($variation_data->price)}}) </small>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div> 
                                                                        </div>
                                                                    </div>
                                                               
                                                                @endif
                                                                        
                                                            
                                                            
                                                    @endforeach 
                                                                
                                                        <!--/////////// End  {{$key}} Option ////////////////////--> 
                                                    </div>
                                                        
                                                        </div>
                                                    </div>
                                                @endforeach
                                                
                                           
                                    </div>
                                @endif
                            </div>
                            
                            @include('frontend.components.recipient')
                        @else
                            <div class="col-lg-12 bg-danger-subtle bg-opacity-50 p-4 rounded mt-2 mb-2  d-flex flex-column">
                                <h2 class="text-danger  fw-bolder">Oops!</h2>
                                <h6 class="text-dark fw-bolder">
                                    This item  currently not available
                                </h6>    
                                <h6 class="text-dark">
                                    We are working on getting your favorite item to your area soon.
                                </h6>
                                <div class="form-group mt-2">
                                    <button class="btn btn-dark text-light rounded" data-bs-target="#DeliveryModalToggle" data-bs-toggle="modal" >@if(session('ordertype') == 'delivery') {{'Update'}} @else {{'Switch to' }} @endif Delivery City </button>
                                </div>
                            </div>
                        @endif
                    @endif
                    
                    <div class="">
                        <div class="row">
                            <div class="col-12">
                                <label for="" class="f-14 text-dark mb-2">Card Message</label>
                                <textarea class="form-control f-14 w-100" id="message" style="height: 100px;"></textarea>
                            </div>
                        </div>
                    </div>
    
                    <div class="text-center d-md-flex ">
                                <div role="button" class="py-3 d-none">
                                @if(session('ordertype') != 'pickup')
                                <img class="border" data-bs-toggle="modal" data-bs-target="#shippingDetailsModal" src="{{asset('assets/images/gift.png')}}" width="250" alt="">
                                @endif
                            </div>
                        <div class="d-flex pt-3  align-items-center ">
                            
                            <div class="d-flex align-items-center mx-3 my-3" style="flex:1"> 
                                <span class="f-15 fw-bold text-dark me-3">Quantity : </span> 
                                <input type="number" value="1"
                                    class="form-control rounded-0 w-25 f-14 py-1 text-center quantity">
                            </div>
                            <div>
                                <button  data-product="{{$pdct_details->id}}" data-sku="{{$pdct_details->sku}}" 
                                class="btn cart-button rounded-0 fs-5 primary-dark-bg fw-bold border-0 add-cart-btn px-lg-5 py-lg-3"> 
                                    ADD TO CART
                                </button>
                            </div>
                        </div>
                    </div>

                

                @else
                    <div class="product-price mt-3">
                        <span style="font-size:150%;font-weight:400;color:#ff0000;">Out of Stock</span>
                    </div>
                @endif

            </div>
        </div>

        <div class="row mt-4 single_desc_tab" id="single_desc_tab">
            <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active text-dark fw-500 border-0" id="productDescription-tab" data-bs-toggle="tab" data-bs-target="#productDescription"
                            type="button" role="tab" aria-controls="home" aria-selected="true"> Product Description </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link border-0 text-dark fw-500" id="deliveryPolicy-tab" data-bs-toggle="tab" data-bs-target="#deliveryPolicy"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Delivery Policy</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link border-0 text-dark fw-500" id="substitutionPolicy-tab" data-bs-toggle="tab" data-bs-target="#substitutionPolicy"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Substitution Policy</button>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active py-3 fw-300 f-14" id="productDescription" role="tabpanel" aria-labelledby="productDescription-tab">
                        {!!  $product->description !!}
                    </div>
                    <div class="tab-pane fade py-3 fw-300 f-14" id="deliveryPolicy" role="tabpanel" aria-labelledby="deliveryPolicy-tab">
                       The flowers or gift you selected will be delivered by UPS or FedEx Flowers will arrive carefully packaged in our signature shipping box, which is specially designed to ensure optimal freshness. See below for details. Food gifts and plants will arrive in a box specially designed to preserve freshness. Reasons to choose flowers fresh from our farms: A wider selection of flower arrangements and gifts. From rare flower varieties to unique pairings of the freshest blooms, many of our bouquets, plants and hand-crafted gift baskets are available exclusively through direct shipment. Added value. Many of our direct shipped fresh bouquets let you express yourself perfectly at a great value. Look for special offers and new deals every day, to help our customers send even more smiles. DIRECT SHIP Bouquets. From South America to Holland to right here in the United States, our direct shipment flowers are picked from select floral fields around the world and shipped to our distribution centers. Freshness Care The flowers go through our FRESHNESS CARE where they are cleaned, hydrated and quality tested before being shipped to your recipient. Each gift is carefully inspected to ensure that it meets our quality standards. Our floral is kept fresh and well hydrated to guarantee our flowers will last for 7 days. Some of our varieties will even last longer with proper care. Flowers shipped to your recipient may or may not come pre-arranged. Most bouquets will arrive pre-arranged, but will require some preparation before being placed in a vase. This includes unwrapping the bouquet, adding water and flower preservative (packets of which are included with every bouquet purchase) to the vase, removing foliage that may fall below the water line and cutting the stems at the bottom of the bouquet. In addition, some Bouquets will not arrive pre-arranged, and may require some creativity when placing stems in the vase. Additional Information: Condition of flowers upon arrival. Flowers and plants that come in a box arrive very fresh, and may appear to be in prior-to-peak condition. It's important to hydrate these flowers immediately by adding fresh water and flower preservative. Once hydrated, the flowers will begin to open, bloom and flourish. A complimentary care card may be included to provide care information and specific details on the type of flowers in the bouquet. Due to the perishable nature of flowers and plants, please ensure someone will be home on the requested delivery date. Drivers may leave the package at the door if your recipient is not at home. Same-Day Delivery is not available for gifts delivered by UPS or FedEx. For flowers and gifts that can be delivered today, view our Same-Day Flowers Collection.
                    </div> 
                    <div class="tab-pane fade py-3 fw-300 f-14" id="substitutionPolicy" role="tabpanel" aria-labelledby="substitutionPolicy-tab">
                        All items featured on this Web site represent the types of arrangements Flowers Canada.com offers and may vary depending upon availability in certain regions:

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

   <section class="related-products">
        <div class="container">
            <div class="row justify-content-center">
                @if($suggested_products->count() > 0) 
                    <div class="col-12 py-3">
                        <h1 class="text-center text-md-left mb-lg-4 h3">Suggested Products</h1>
                    </div>
                    @foreach($suggested_products as $rel_products)
                        @if($rel_products->products)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                <a href="{{route('product-single',$rel_products->products->slug)}}" class="cursor-pointer text-decoration-none">
                                    <div class="card border-0 rounded card-product-listing">
                                        <div class="d-flex align-items-center  position-relative">
                                            <img class="w-100 h-auto {{ $rel_products->products->mark_stock_status == 1 ? 'product-image out-of-stock' : ''}}" src="{!! ($rel_products->thumbImages->count()) != '' ? asset('images/products/' . $rel_products->thumbImages->first()->picture) : asset('/assets/images/dummy-product.jpg') !!}" onerror="this.onerror=null;this.src='/assets/images/dummy-product.jpg';" alt="" >
                                            <div class="stock-overlay">
                                                <p class="stock-text-overlay">Out of Stock</p>
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                           <h4 class="mb-0 fw-bold text-dark singleLinetext-d h6" >{!! capitalText($rel_products->products->name) !!}</h4>
                                        </div>
                                    </div>         
                                </a>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    
    
      @include('frontend.components.side-cart')

<!-- Modal -->
<div class="modal fade" id="shippingDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Shipped in a Gift Box</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p class="px-5" style="line-height:1.9">
            The flowers or gift you selected will be delivered by UPS or FedEx Flowers will arrive carefully packaged in our signature shipping box, which is specially designed to ensure optimal freshness. See below for details. Food gifts and plants will arrive in a box specially designed to preserve freshness. Reasons to choose flowers fresh from our farms: A wider selection of flower arrangements and gifts. From rare flower varieties to unique pairings of the freshest blooms, many of our bouquets, plants and hand-crafted gift baskets are available exclusively through direct shipment. Added value. Many of our direct shipped fresh bouquets let you express yourself perfectly at a great value. Look for special offers and new deals every day, to help our customers send even more smiles. DIRECT SHIP Bouquets. From South America to Holland to right here in the United States, our direct shipment flowers are picked from select floral fields around the world and shipped to our distribution centers. Freshness Care The flowers go through our FRESHNESS CARE where they are cleaned, hydrated and quality tested before being shipped to your recipient. Each gift is carefully inspected to ensure that it meets our quality standards. Our floral is kept fresh and well hydrated to guarantee our flowers will last for 7 days. Some of our varieties will even last longer with proper care. Flowers shipped to your recipient may or may not come pre-arranged. Most bouquets will arrive pre-arranged, but will require some preparation before being placed in a vase. This includes unwrapping the bouquet, adding water and flower preservative (packets of which are included with every bouquet purchase) to the vase, removing foliage that may fall below the water line and cutting the stems at the bottom of the bouquet. In addition, some Bouquets will not arrive pre-arranged, and may require some creativity when placing stems in the vase. Additional Information: Condition of flowers upon arrival. Flowers and plants that come in a box arrive very fresh, and may appear to be in prior-to-peak condition. It's important to hydrate these flowers immediately by adding fresh water and flower preservative. Once hydrated, the flowers will begin to open, bloom and flourish. A complimentary care card may be included to provide care information and specific details on the type of flowers in the bouquet. Due to the perishable nature of flowers and plants, please ensure someone will be home on the requested delivery date. Drivers may leave the package at the door if your recipient is not at home. Same-Day Delivery is not available for gifts delivered by UPS or FedEx. For flowers and gifts that can be delivered today, view our Same-Day Flowers Collection.
            </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-theme rounded-0" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>

@endsection


@section('scripts')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
   
     $(document).ready(function () {
        $('.read-more-link').click(function () {
            const description = $(this).prev('p');
            description.css('webkit-line-clamp', 'unset');
            $(this).hide();
            $(this).siblings('.show-less-link').show();
        });

        $('.show-less-link').click(function () {
            const description = $(this).prevAll('p');
            description.css('webkit-line-clamp', '1');
            $(this).hide();
            $(this).siblings('.read-more-link').show();
        });
        
        /////////////////////////////////////////////////////////////////////////////////////////////////////////
                            // without location choosed 
        //////////////////////////////////////////////////////////////////////////////////////////////////////
        
        @if(session()->has('session_string'))
        @else
            $('#shoppingMethod').attr('data-bs-backdrop', 'static')
                .attr('data-bs-keyboard', 'false')
                .modal('show');
        @endif
        
         $('input[name="single_selection"]').trigger('change')
         
         
         $('.single-item').slick();
   
        
        
    });
    
            $(document).on("click",".smallnav img",function(){
                 var di = $(this).data("index");
                 
                 $( '.single-item' ).slick('slickGoTo', di);

            })
  
    
                            // image slider
    ////////////////////////////////////////////////////////////////////////////////////////////// 
       
      
        $('#ChangeDeliveryModalToggle').on('hidden.bs.modal', function () {
                window.location.href = '';
        });
        
      /////////////////////////////////////////////////////////////////////////////////////////////////////////
                            // add to cart
    ////////////////////////////////////////////////////////////////////////////////////////////// 
        $('body').on('click', '.show_variations', async function () {
            var checkbox = $(this).data('checkbox');
            $('#'+checkbox).prop('checked', true);
            $('input[name="single_selection"]').trigger('change')
            
            $('.show_variations').removeClass('active');
            $(this).addClass('active')
            
        });
        
         $('body').on('click', '.show_variations_parent', async function () {
            var checkbox = $(this).data('checkbox');
            $('#'+checkbox).prop('checked', true);
            $('input[name="single_selection_parent"]').trigger('change')
            
            $('.show_variations_parent').removeClass('active');
            $(this).addClass('active')
        });
        
        
        
        $('body').on('change click', 'input[name="single_selection"]', async function () {
            var price   = parseFloat($('.vari_checkbox:checked').data('price'));
            var sku     = $('.vari_checkbox:checked').data('sku');
            var vari_id = $('.vari_checkbox:checked').data('id');
            
            $('.product_price').text("$" + price.toFixed(2))
            $('.product_sku').text(sku)
            $('.add-cart-btn').attr('data-product',vari_id);
            $('.add-cart-btn').attr('data-sku',sku);
            
        }); 
        
        
        
        $('body').on('click', '.add-cart-btn', function() {
            var product_id = $(this).data('product');
            var quantity   = $('.quantity').val();
            var message    = $('#message').val();
            
            var selDate    = $('#pickup_date').val();
            var selTime    = $('#pickup_time').val() ?? '';
            var postalCode = $('#postal').val();
            var locType    = $('#location_type').val();
            
            $.ajax({
                url: '{{url('basket/add')}}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: { product_id : product_id, quantity : quantity, message : message,selDate : selDate, selTime : selTime, postalCode : postalCode, locType : locType},
                success: function(response) {
                   if(response.result == 1){
                        $('.cart-icon .cart-count').html(response.cart_count);
                        Swal.fire({
                            icon: 'success',
                            html: '<h1 class="main-h1"> Thank you </h1>' + '<p class="main-h2"> Item successfully added to the cart </p>',
                            showCancelButton: true,
                            cancelButtonText: 'Continue Shopping',
                            confirmButtonText: 'Go to Cart',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/cart';
                            } 
                             else {
                                window.location.href = '/products';
                            }
                        });
                        
                        var addToCartData = response.addToCartData;
                        console.log(addToCartData);
                        // gtag("event", "add_to_cart", addToCartData);
                        
                    }
                    else {
                        alert('Error');
                    }
                }
            });
        });
        
        $(document).ready(function () {
            $('input[name="single_selection_parent"]').trigger('change')
           });
           
           
            $('body').on('change click', 'input[name="single_selection_parent"]', async function () {
                
                var type_value   = $('.vari_checkbox_parent:checked').data('type_value');
                var type = $('.vari_checkbox_parent:checked').data('type');
                var next_div = $('.vari_checkbox_parent:checked').data('next_div');
                console.log(type_value,type,next_div)
                varitionBasedList(type_value,type,next_div);
                
            }); 
        
        
        function varitionBasedList(type_value = '',type = '',next_div = ''){
            
            var product_id = `{{$product->id}}`;
            $.ajax({
                url: '{{route('product-variations')}}',
                type: 'GET',
                data: { 'product_id' : product_id,'type_value' : type_value,'type' : type,'nextDiv' : next_div},
                success: function(response) {
                    $('.option-'+next_div).html(response);
                        $('input[name="single_selection"]').trigger('change')
                }
            });
        }
  
        
        
          $(".delete-btn").click(async function() {
                var item = $(this).closest('.cart-item');
                var quantity = $(this).val();
                var product_sku = $(this).data('psku');
                var product_id  = $(this).data('pid');
                var product_price = $(this).data('price');
                
                await update_products(product_sku,product_id,product_price,0);
                var totalAmount = 0;
                      $(this).closest(".cart-item").remove();
                $('.Item_total').each(function() {
                    totalAmount += parseFloat($(this).text().replace('$', ''));
                });
                
                $('#total-amount').text('Total: $' + totalAmount.toFixed(2));
          
                if ($('.cart-item').length === 0 || preorder == 1) {
                    // All items have been deleted, refresh the page
                    location.reload();
                }
            });
            
            
              const body = $('body');
        function update_products(product_sku,product_id,product_price,quantity) {
            body.append(`<div class="product-loading"><i class="bi bi-arrow-clockwise"></i></div>`);
            $.ajax({
                url: '/cart/productadd', 
                method: 'GET', 
                dataType: 'json',
                data: {'product_sku': product_sku,'product_id': product_id,'quantity': quantity,'price'   : product_price},
                success: function(response) {
                    $('.cart-icon .cart-count,.float-button .cart-count').html(response.cart_count)
                    body.find('.product-loading').remove();
                },
                error: function(xhr, status, error) {
                     alert('something went wrong please try again')
                    // body.find('.product-loading').remove();
                }
            });
        }
        
        
        
           $(document).ready(function() {               
            // Toggle calendar dropdown on button click
          
            $('body').on('click','#date-dropdown-toggle,#calendar-icon', function() {
                $('#calendar-dropdown').toggleClass('d-none');
            });
            
            $(document).click(function(event) {
                var target = $(event.target);
                if (!target.closest('#calendar-dropdown').length && !target.is('#date-dropdown-toggle')) {
                  $('#calendar-dropdown').addClass('d-none');
                  $('.month-1').addClass('d-none');
                  $(".show-more-dates").text('More dates');
                }
            });

            $('body').on('click','.valid_date,.valid_date2', function(e) {
                e.preventDefault();
                var selectedDate     =  $(this).data('date');
                var availableTime_on =  $(this).data('start');
                var availableTime_to =  $(this).data('end');
              
                $('.month-1').addClass('d-none');$(".show-more-dates").text('More dates');
                
                 // Format the date using Moment.js
                var formattedDate = moment(selectedDate).format('MMMM D, YYYY');
        
                $('.date-input').text(formattedDate);
                
                $('#pickup_date').val(selectedDate);
                $('#calendar-dropdown').addClass('d-none');
                
                pickuptimeListing(availableTime_on,availableTime_to);
                
              
            });
            
            $('body').on('click','.valid_date2', function(e) {
                $('.valid_date2').removeClass('active')
                $(this).addClass('active')
            });
            
            
             if($('#pickup_date').val() == ''){
         
               $('.valid_date:first').click();
            }
            else
            {
            
                var dateBase = $('#pickup_date').val();
                $('.valid_date').each(function() {
                    var selectedDate     =  $(this).data('date');
                    if( selectedDate == dateBase){
                        var availableTime_on =  $(this).data('start');
                        var availableTime_to =  $(this).data('end');
                        
                        pickuptimeListing(availableTime_on,availableTime_to);
                    }
                });
                    
            }
            
            
            
            
        
            $(".show-more-dates").click(function(e) {

                $('.month-1').toggleClass('d-none');
                e.preventDefault();
    
               
                var text = $(this).text();
    
               if (text === 'Less dates') { 
                    $(this).text('More dates'); 
                } else {
                    $(this).text('Less dates'); 
                }
            })
            
           
           var validDateSpans = $("td span, td a");

            var dates      = [];
            var startTime  = [];
            var endTime    = [];
            
        
            
            // Iterate through the first 5 elements
            validDateSpans.each(function(index, element) {
                // Check if the current element has the "valid_date" class
                if ($(element).hasClass('valid_date')) {
                    var date = $(element).data("date");
                    var stime = $(element).data("start");
                    var etime = $(element).data("end");
                    dates.push(date);
                    startTime.push(stime);
                    endTime.push(etime);
                    
                    if (dates.length === 5) {
                        return false;
                    }
                }
            });
            
            var datesVal = '';
            // Iterate over the dates array
            dates.forEach(function(element, index) {
                datesVal += `<div class="col-lg-2 col-6 pe-0 valid_date2 "  data-date="${element}" data-start="${startTime[index]}" data-end="${endTime[index]}">
                                <label></label>
                                <div role="button" class="card bg-light text-dark  p-2 d-flex flex-column gap-3 text-center">
                                    <strong>${moment(element).format('ddd')}</strong>
                                    <span>${moment(element).format('D MMMM')}</span>
                                </div>
                            </div>`;
            });
            
            $('#EarliestDates').html(datesVal);
            
            
            
             
            function convert12HourTo24Hour(time12Hour) {
                return moment(time12Hour, 'hh:mm A').format('HH:mm');
            }
            
            function pickuptimeListing(startTime, endTime) {
            
                var interval = 15; // 15 minutes
                var options = '';
            
                // Parse the start and end times using Moment.js
                var startDate = moment(startTime, 'HH:mm');
                var endDate = moment(endTime, 'HH:mm');
                
                if(startDate <= endDate){
                    while (startDate <= endDate) {
                        var time12Hour = startDate.format('hh:mm A'); // Format as 12-hour time with AM/PM
                        var time24Hour = convert12HourTo24Hour(time12Hour); // Convert to 24-hour format
                
                        options += '<option value="' + time24Hour + '">' + time12Hour + '</option>';
                
                        // Increment time by 15 minutes
                        startDate.add(interval, 'minutes');
                    }
                }
                else
                {
                    $('.time_exceeded').html('Time exceeded please choose another date');
                }
                
                $('#pickup_time').html(options);
                
            }
            
            function earliest(){
                $('.valid_date2').removeClass('active');
                $('.valid_date2').each(function() {
                    if($(this).attr('data-date') == $('#pickup_date').val()){
                        $(this).addClass('active');
                    }
                });
            }
            
            $('body').on('click','.valid_date', function(e) { 
                earliest();
            });
            
            earliest();
            
            @if($basket_items && $basket_items->serve_time != NULL)
               
                var time = moment(`{{$serveTime}}`, 'HH:mm').format('HH:mm');
                 console.log(`{{$serveTime}}`)
                $('#pickup_time').val(time)
            @elseif(session()->has('serve_time'))
           
                var time = moment(`{{$serveTime}}`, 'HH:mm').format('HH:mm');
                $('#pickup_time').val(time)
            @endif
    
            
            
        });
        
        
        
        
    
    </script>
    
@endsection
