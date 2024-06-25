<div class="zoom-modal-content position-relative">
        <span class="close px-2 border position-absolute border px-2 right-0" data-bs-dismiss="modal">&times;</span>
        <div class="row w-100 m-0">
            <div class="col-5 p-0">
                <img src="{!! ($product->thumbImages->count()) != '' ? asset('images/products/' . $product->thumbImages->first()->picture) : asset('/assets/images/dummy-product.jpg') !!}" onerror="this.onerror=null;this.src='/assets/images/dummy-product.jpg';"  class="w-75" alt="">
            </div>
            <div class="col-7 py-4">
                <h5 class="fw-bold text-dark mt-1">{{capitalText($product->name)}}</h5>
                <h6 class="text-primary-color mt-3">$22.99 - $33.99</h6>


                <div class="mt-3">
                    <a href="{{route('product-single',$product->slug)}}"
                    class="btn btn-primary rounded-0 f-14 primary-dark-bg fw-bold border-0"> Select Item</a></div>
            </div>
        </div>
    </div>