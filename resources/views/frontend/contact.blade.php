@extends('layouts.frontend')
@section('styles')
    <style>
    
        input::placeholder, textarea::placeholder {
            color: #bbb !important;
            font-size:90%;
        }
    
        h2 {
            font-weight: bolder;
        }
        
 
        
        .page_section {
            padding: 50px 0
        }
        
        .page_section h2 {
            margin-bottom: 30px;
        }
    
        #stores_list {
           background: #EEE; 
           
        }
       
       .store_button {
           background: #333;
           color: #CCC;
           border-radius: 30px;
           padding: 5px 15px;
           font-size: 80%;
           margin: 0 1px 0 1px;
           min-width: 50px;
           text-decoration: none;
       }
       
       .store_button:hover {
           text-decoration: none;
           background: var(--primary);
           color:#FFF;
       }
       
       .contact_store {

       }
       
        .directions-map{
            padding: 10px 0;st
        }
        .directions-map a{
            padding: 5px;
            background: #f993c3;
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 30px;
            outline: none !important;
            box-shadow: none !important;
            
         }
         
        .directions-map button{
            border: none;
            padding: 5px;
            background: #f993c3;
            color: #fff;
             padding: 5px 10px;
            border-radius: 30px;
        }
        .gm-style-iw-d span{
            font-weight: 400;
            font-size: 16px;
            line-height: 1.8;
            font-style: italic;
        }
        .gm-style-iw-d p{
            font-weight: 400;
            font-size: 14px;
            line-height: 1.8;
            margin-bottom: 0;
        }
        .row.map-section{
            width: 100%;
        }
        .gm-style .gm-style-iw-c{
            border: 4px solid #000;
            border-radius: 20px;
        }
        button.gm-ui-hover-effect{
            top: 0 !important;
            right: 0 !important;
        }
        
  
        
        
        @media(max-width: 1368px){
            .map-section .col-lg-8{
                 position: sticky;
                 height: 75vh;
                 top: 85px;
                 bottom: 10px;
            }
        }
        @media(max-width: 769px){
            .row.map-section .col-lg-8{
                height: 500px;
                padding: 0;
                margin: 10px 0;
            }
            .row.map-section{
                flex-direction: column-reverse;
                margin: 0;
            }
        }
        
        .gm-style-iw.gm-style-iw-c {
            max-width: 345px !important;
        }
        .store-name{
            cursor:pointer;
            padding: 5px 10px;
            
        }
        .active-store-name{
            background-color: #f993c3;
            color: #fff;
        }
        .store-box-border{
            border: 1px solid var(--primary);
        }
    </style>
@endsection
@section('contents')


   <section class="bread_crumb bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <p class="mb-0 f-15">Contact</p>
                </div>
                <div class="col-6 text-end">
                    <p class="mb-0 f-14 text-dark ">You are here: Bunches > Contact</p>
                </div>
            </div>
        </div>
    </section>
       
    <section id="contact_message" class="page_section main">
        
         <div class="col-lg-12 py-2">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d184552.67562564815!2d-79.54320942795175!3d43.718122309404215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d4cb90d7c63ba5%3A0x323555502ab4c477!2sToronto%2C%20ON%2C%20Canada!5e0!3m2!1sen!2sin!4v1713962838626!5m2!1sen!2sin" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>   
                    </div>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-12 col-lg-4"></div>
                <div class="col-12 col-lg-8">
                    <!--<h2 class="text-center text-dark">Talk To Us</h2>-->
                </div>
                <div class="col-12 col-lg-4">
                    <div class="form-group">

                        <div class="mb-3 d-flex">
                            <span class="bi bi-geo-alt-fill f-26 text-dark"></span>
                            <div class="mx-2">
                                 <span class="mb-1 ">
                                    15 Sweet Love Street,           
                                </span><br>
                                <span class="mb-1">
                                    Pyanama, Maryland, 
                                </span><br>
                                <span class="mb-1">
                                    12345, CA.
                                </span><br>
                                
                            </div>
                           
                        </div>
                      
                        <div class="mb-3">
                            <span class="bi bi-telephone-outbound-fill f-26 text-dark"></span>
                            <span class="mx-2">
                                +3215441600            
                            </span>
                        
                        </div>
                        <div class="mb-3">
                            <span class="bi bi-printer-fill f-26 text-dark"></span>
                            <span class="mx-2">
                                +321 5441601            
                            </span>
                        </div>
                        <div class="mb-3">
                            <span class="bi bi-envelope-fill f-26 text-dark"></span>
                            <span class="mx-2">
                                netbaseteam.com            
                            </span>
                            
                        </div>
                    </div>
                   
                </div>
                <div class="col-12 col-lg-8 ">
                        <div class="col-12">
                            <h1 class="fw-bold text-center mb-4 text-dark contact-head">Talk to us</h1>
                        </div>
                    
                        @if($errors->any())
                          {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                        @endif
                        
                        
                        <form class="contact_form" data-classes="leadgenpro_form" action="{{route('contact-send')}}" method="POST" novalidate>
                            @csrf()
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" autocomplete="off" value="{{ old('first_name') }}" name="first_name" id="firstname" placeholder="First Name" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" autocomplete="off" value="{{ old('last_name') }}" name="last_name" id="lastname" placeholder="Last Name"  class="form-control"  >
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="email" autocomplete="off" value="{{ old('email') }}" required name="email"  id="email" placeholder="Email Address"   class="form-control" >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" autocomplete="off" value="{{ old('phone') }}" required name="phone" maxlength="14" id="phone" placeholder="Contact Number"   class="form-control" >
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <input type="text" autocomplete="off" value="{{ old('subject') }}" name="subject" id="subject" placeholder="Subject" required  class="form-control" >
                                    <input type="hidden" name="store" value="{{app()->request->store}}">
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <textarea autocomplete="off" name="message"  id="message" placeholder="Tell us your message"  class="form-control" rows="8">{{ old('message') }}</textarea>
                                </div>
                              
                            </div>
                            <div class="row">
                                <div class="d-flex justify-content-center  mb-5">
                                    <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}" data-callback="enableBtn"></div>
                                </div>
                            </div>
                                
                            <div class="row">
                                <div class="col-md-12 text-center  mb-3">
                                    <input type="hidden" name="success_url" >
                                    <button  type="submit" class="btn btn-contact-submit rounded-0 py-2 px-3 f-16 fw-bold text-white">Submit</button>
                                </div>
                            </div>
                            
                        </form>
                    
                </div>
            </div>
        </div>
    </section>
  

@endsection

@section('scripts')

@endsection