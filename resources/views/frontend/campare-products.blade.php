<div class="compare-modal-content p-3">
    <span class="close" data-bs-dismiss="modal"> &times;</span>
   
    <section class="bread_crumb bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <p class="mb-0 f-15">Compare Products</p>
                </div>
            </div>
        </div>
    </section>

    <div class="col-12 p-1">
        <div class="row">
            <div class="col-12">
                <div class="row w-100 m-0 align-items-center">
                    @forelse($products as $items)
                        <div class="col text-center position-relative">
                            <table>
                                <tr>
                                    <td>
                                        <img class="w-75" src="{!! ($items->thumbImages->count()) != '' ? asset('images/products/' . $items->thumbImages->first()->picture) : asset('/assets/images/dummy-product.jpg') !!}" onerror="this.onerror=null;this.src='/assets/images/dummy-product.jpg';" alt="product">
                                        <i style="left:0;z-index:99;top: 0;" role="button" data-pid="{{$items->id}}" class="fa fa-times-circle text-danger position-absolute cursor-pointer removeCampaire"></i>
                                        <p class="mb-0 text-dark fw-bold f-14 mt-2">{{capitalText($items->name)}}</p>
                                    </td>
                                </tr>
                                
                               
                                <tr>
                                    <td>
                                        <p class="mb-0 text-dark fw-bold f-14 mb-2">$29.99</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                       <button class="btn btn-primary f-14 py-1 primary-dark-bg rounded-0 border-0">
                                           Add to Cart</button> 
                                    </td>
                                </tr>
                            </table>
                        </div>
                    @empty
                    <div class="col text-center position-relative">
                        <div colspan="4" class="text-center">
                              <p>No Items found!</p>
                        </div>
                    </div>
                    @endforelse
                    
                </div>
            </div>
        </div>
    </div>
</div>