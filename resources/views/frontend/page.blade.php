@extends('layouts.frontend')

@section('styles')
    
    <style>
           
        h3 {
            font-size:110%;
            font-weight:bold;
        }
        
    </style>

@endsection


@section('contents')


   <section class="bread_crumb bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <p class="mb-0 f-15">{{$site->heading}}</p>
                </div>
                <div class="col-6 text-end">
                    <p class="mb-0 f-14 text-dark ">You are here: Bunches > {{$site->heading}}</p>
                </div>
            </div>
        </div>
    </section>

    <section id="page" class="page_section py-5">
        <div class="container">
          <div class="row justify-content-center">
              <div class="col-12 col-md-10 col-lg-8">
                    <div class="fix-wrap">
                        <div class="faq-accordions">
                            {!! str_replace("&nbsp;","",$site->html) !!}
                        </div>
                    </div>
              </div>
          </div>
        </div>
    </section>


@endsection