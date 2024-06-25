
    @foreach($variation as $optionItmskey => $variation_data)
        <div class="col-6 col-lg-4 text-center option_vals cursor-pointer mb-3">
            <div data-option="{{$variation_data->id}}" id="show_variations_{{$variation_data->id}}" data-checkbox="checkbox_option_rounded_{{$variation_data->id}}"  data-type="" role="button" class="show_variations @if($optionItmskey == 0) active @endif card bg-light border-0">
                <div class="round-checkbox position-absolute end-0 "> 
                    <input type="radio" name="single_selection" @if($optionItmskey == 0) checked @endif id="checkbox_option_rounded_{{$variation_data->id}}" data-vname="{{$variation_data->variation}}" data-sku="{{$variation_data->sku}}" data-price="{{$variation_data->price}}" data-id="{{$variation_data->variation_id}}"  class="vari_checkbox ">
                    <label for="checkbox_option_rounded_{{$variation_data->id}}" class="ms-5"></label>
                </div>
                <div class=" position-relative vari_type border-0 justify-content-center  py-2" >
                    <div class="row">
                        <div class="col-md-12">
                            <p class="card-price fw-bold text-capitalize p-0 m-0">{{$variation_data->value}} </p>
                    
                               <small class="py-1">({{getPrice($variation_data->price)}}) </small>
                     
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    @endforeach