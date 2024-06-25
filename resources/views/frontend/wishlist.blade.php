<div class="compare-modal-content p-3">
    <span class="close" data-bs-dismiss="modal"> &times;</span>
  
    <section class="bread_crumb bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <p class="mb-0 f-15">Wishlist Products</p>
                </div>
            </div>
        </div>
    </section>
    
    <div class="col-12 p-1">
        <div class="row">
            <table class="table">

    <thead>
        <tr>
	        <th class="product-remove"></th>
            <th class="product-thumbnail">Product Image</th>
            <th class="product-name">
                <span class="nobr">Product Name</span>
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $items)
            <tr>
        	    <td class="product-remove">
                    <div>
                        <a href="#" class="remove" title="Remove this product"><i class="bi bi-times"></i></a>
                    </div>
                </td>
                <td class="product-thumbnail">
                    <a href="#">
                        <img width="100" height="100" src="{!! ($items->thumbImages->count()) != '' ? asset('images/products/' . $items->thumbImages->first()->picture) : asset('/assets/images/dummy-product.jpg') !!}" onerror="this.onerror=null;this.src='/assets/images/dummy-product.jpg';" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" decoding="async" loading="lazy" srcset="https://www.bunches.ca/wp-content/uploads/2020/10/Bunches_Flowers_in_Canada_PASSION_FOR_PINK-300x300.jpg 300w, https://www.bunches.ca/wp-content/uploads/2020/10/Bunches_Flowers_in_Canada_PASSION_FOR_PINK-150x150.jpg 150w, https://www.bunches.ca/wp-content/uploads/2020/10/Bunches_Flowers_in_Canada_PASSION_FOR_PINK-220x220.jpg 220w, https://www.bunches.ca/wp-content/uploads/2020/10/Bunches_Flowers_in_Canada_PASSION_FOR_PINK-60x60.jpg 60w, https://www.bunches.ca/wp-content/uploads/2020/10/Bunches_Flowers_in_Canada_PASSION_FOR_PINK-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px">                            </a>
                        <i style="z-index:99;" role="button" data-pid="{{$items->id}}" class="fa fa-times-circle text-danger position-absolute cursor-pointer removewishList"></i>

                </td>
        
                <td class="product-name">
                     <p class="mb-3 text-dark fw-bold f-14 mt-2">{{capitalText($items->name)}}</p>
                     <p class="mb-3 text-dark fw-bold f-14 mb-2">$29.99</p>
                        <button class="btn btn-primary f-14 py-1 primary-dark-bg rounded-0 border-0">
                                           Add to Cart</button> 
                                     
                </td>
                <td>
                </td>
            </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">
                  <p>No Items found!</p>
            </td>
        </tr>
        @endforelse
    </tbody>
    </table>
        </div>
    </div>
</div>