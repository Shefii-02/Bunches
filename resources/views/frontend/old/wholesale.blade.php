@extends('layouts.frontend')
@section('contents')
    
<section class="product-listing-banner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Wholesale</h1>
            </div>
        </div>
    </div>
</section>

<main>
    <section id="wholesaleForm" class="page_section main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">
                    <h2>Wholesale Inquiry Form</h2>
                </div>
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="wholesle-under">
                  
                        <form class="wholesale-form"  data-classes="leadgenpro_form" action="{{route('wholesaleForm-send')}}" method="POST" novalidate>
                            @csrf()
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                        <input type="text" autocomplete="off" name="firstname" id="name" placeholder="First Name" class="form-control" required="">
                                </div>
                                <div class="col-md-6 mb-3">
                                        <input type="text" autocomplete="off" name="lastname" id="s-name" placeholder="Last Name" class="form-control" required="">
                                </div>
                            </div>  
                             <div class="row">
                                <div class="col-md-6 mb-3">
                                        <input type="text" autocomplete="off" name="phone" id="phone" max="14" placeholder="Phone Number" class="form-control no-spinners" required="">
                                </div>
                                <div class="col-md-6 mb-3">
                                        <input type="email" autocomplete="off" name="email" id="email" placeholder="Email Address" class="form-control" required="">
                                </div>
                            </div>  
                             <div class="row">
                                <div class="col-md-6 mb-3">
                                        <input type="text" autocomplete="off" name="company_name" id="company_name"  placeholder="Company Name" class="form-control" required="">
                                </div>
                                <div class="col-md-6 mb-3">
                                        <input type="text" autocomplete="off" name="position" id="position" placeholder="Job Title" class="form-control" required="">
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-6 mb-3">
                                        <input type="text" autocomplete="off" name="website" id="website"  placeholder="Website" class="form-control" required="">
                                </div>
                                <div class="col-md-6 mb-3">
                                        <select class="form-select" aria-label="Default select example" name="type_business">
                                          <option selected disabled>Type of Business</option>
                                            <option >Grocery</option>
                                            <option >Retail</option>
                                            <option >Restaurant</option> 
                                            <option >Coffee Shop</option>
                                            <option >Food Service</option>
                                            <option >Other</option>
                                        </select>
                                </div>
                            </div>
                                
                            <div class="w-interest">
                                <div class="form-control mb-3">
                                    <h6>Preferred Products</h6>

                                    <div class="row">
                                        <div class=" col-sm-6 mb-1">
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" name="interested[]" type="checkbox" value="Sweet Pies" id="inlineCheckbox1">
                                              <label class="form-check-label" for="inlineCheckbox1">
                                                Sweet Pies
                                              </label>
                                            </div>
                                        </div>
                                        <div class=" col-sm-6 mb-1">
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" name="interested[]" type="checkbox" value="Savory Pies" id="inlineCheckbox2">
                                              <label class="form-check-label" for="inlineCheckbox2">
                                                Savory Pies
                                              </label>
                                            </div>
                                        </div>
                                        <div class=" col-sm-6 mb-1">
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" name="interested[]" type="checkbox" value="Quiches" id="inlineCheckbox3">
                                              <label class="form-check-label" for="inlineCheckbox3">
                                                Quiches
                                              </label>
                                            </div>
                                        </div>
                                        <div class=" col-sm-6 mb-1">
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" name="interested[]" type="checkbox" value="Cookies" id="inlineCheckbox4">
                                              <label class="form-check-label" for="inlineCheckbox4">
                                                Cookies
                                              </label>
                                            </div>
                                        </div>
                                        <div class=" col-sm-6 mb-1">
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" name="interested[]" type="checkbox" value="Butter Tarts" id="inlineCheckbox5">
                                              <label class="form-check-label" for="inlineCheckbox5">
                                                Butter Tarts
                                              </label>
                                            </div>
                                        </div>
                                        <div class=" col-sm-6 mb-1">
                                            <div class="form-check form-check-inline col-sm-6 mb-3">
                                              <input class="form-check-input" name="interested[]" type="checkbox" value="Cake Jars" id="inlineCheckbox6">
                                              <label class="form-check-label" for="inlineCheckbox6">
                                                Cake Jars
                                              </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <textarea autocomplete="off" rows="5" name="message" id="message" placeholder="Tell us about your business" class="form-control" spellcheck="false"></textarea>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="d-flex justify-content-center">
                                        <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}" data-callback="enableBtn"></div>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                     <input type="hidden" name="success_url" >
                                    <button class="btn btn-primary" type="submit" >SEND INQUIRY</button>
                                </div>
    
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection