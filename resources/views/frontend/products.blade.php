
@extends('layouts.frontend')
@section('styles')
 
@endsection

@php
   $totalAmount = 0;
@endphp

@section('contents')

    <section class="bread_crumb bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <p class="mb-0 f-14 text-dark">You are here: <a href="{{url('/')}}" class="text-muted text-decoration-none"> Home </a> > <a href="{{url(strtolower($pageParent))}}" class="text-muted text-decoration-none">{{$pageParent}}</a> > {{$pageTitle}} </p>
                </div>
                <div class="col-6 text-end">
                </div>
            </div>
        </div>
    </section>
    
    <section class="shop py-5">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-6">
                    <h1 class="">{{$pageTitle}}</h1>
                </div>
                <div class="col-lg-6  text-end">
                     <span class="fw-bold text-dark">{{$products->total()}} Items</span>
                    <button class="btn btn-transparent border rounded-0 view-btn btn_grid_layout active">
                        <i class="bi bi-grid f-18"></i>
                    </button>
                    <button class="btn btn-transparent border view-btn rounded-0 ms-2 btn_list_layout">
                        <i class="bi bi-view-list f-18"></i>
                    </button>
                </div>
              
            </div>
        </div>
    </section>
    
    <section class="shop_layout pb-5">
        <div class="container">
            <div class="row layout_grid">
                @if($products->count() > 0)
                @foreach($products as $pitems)
                    <div class="col-12 col-md-3 mb-3 ">
                        <a class="text-decoration-none product_card" href="{{route('product-single',$pitems->slug)}}">
                            <div class="product_shop_hover position-relative">
                                <img src="{{asset('images/products/'.$pitems->thumbImages->first()->picture)}}"  data-bs-toggle="modal" data-bs-target=".zoom-modal" class="w-100 fixed-height" alt="">
                                <div
                                    class="position-absolute w-100 h-100 shop_layout_options align-items-center justify-content-center">
    
                                    <!--<button data-href="{{route('product-single',$pitems->slug)}}" class="bg-light btn border rounded-0 addTocart" title="Add to Cart">-->
                                    <!--    <i class="bi bi-cart f-15"></i></button>-->
                                    <!--<button class="bg-light btn border rounded-0 btn-whishlist" data-pid="{{$pitems->id}}" title="Add to Wishlist"><i-->
                                    <!--        class="bi bi-heart f-15"></i></button>-->
                                    <!--<button class="bg-light btn border rounded-0 btn-zoom"  data-pid="{{$pitems->id}}" data-bs-toggle="modal"-->
                                    <!--        data-bs-target="#zoomModal" title="Quick View"><i-->
                                    <!--        class="bi bi-eye f-15"></i></button>-->
                                    <!--<button class="bg-light btn border btn-compare rounded-0 compareModal" data-pid="{{$pitems->id}}" data-bs-toggle="modal"-->
                                    <!--        data-bs-target="#compareModal" title="Compare"><i-->
                                    <!--        class="bi bi-repeat f-15"></i></button>-->
        
                                </div>
                            </div>
                            <h5 class="fw-bold text-dark text-center my-3">{{$pitems->name}}</h5>
                            <h5 class="fw-bold text-primary-color text-center my-3">{{getPrice($pitems->MinPrice->price)}}</h5>
                        </a>
                    </div>
                @endforeach
                @else
                    <div class="col-12">
                        <h2 class="py-5 text-center">No Products Available</h2>
                    </div>
                @endif
            </div>
            
            <div class="row layout_list d-none">
                @if($products->count() > 0)
                    @foreach($products as $pitems)
                        <div class="col-12 col-md-6 mb-3">
                            <div class="row">
                                <div class="col-4">
                                    <img src="{{asset('images/products/'.$pitems->thumbImages->first()->picture)}}" class="w-75" alt="">
                                </div>
                                <div class="col-8">
                                    <h5 class="fw-bold text-dark">{{$pitems->name}}</h5>
                                    <h5 class="text-primary-color">{{getPrice($pitems->MinPrice->price)}}</h5>
                                    <div class="f-15 fw-300 mb-2" style="overflow:hidden; max-height:100%; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{!! $pitems->description !!}</div>
                                    <div class="d-flex">
                                        <a href="{{route('product-single',$pitems->slug)}}" class="btn layout_list_cart rounded-0 px-3"> <i
                                                class="bi bi-cart-fill f-18 me-2"></i> SELECT OPTIONS</a>
                                        <!--<button class="btn ms-1 layout_list_wish rounded-0"><i class="bi bi-heart"></i></button>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <h2 class="py-5 text-center">No Products Available</h2>
                    </div>
                @endif
            </div>
           
            {{ $products->withQueryString()->links() }}
        </div>
    </section>
 
               
      @include('frontend.components.side-cart')
            
            

@endsection


@section('scripts')
<script>
    
        
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
        
    
</script>
@endsection