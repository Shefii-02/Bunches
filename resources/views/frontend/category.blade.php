@extends('layouts.frontend')
@section('styles')
<style>
   
     
</style>
@endsection
@section('contents')
    
    <section class="bread_crumb bg-light py-3 my-3">
        <div class="container">
            <div class="row">
                
                <div class="col-6 ">
                    <p class="mb-0 f-14 text-dark ">You are here: <a href="{{url('/')}}" class="text-dark">Home</a> > {{$pageTitle == 'Category' ? 'Categories' : $pageTitle}}</p>
                </div>
                <div class="col-6">
                   
                </div>
            </div>
        </div>
    </section>
    
    <section class="shop py-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="">{{$pageTitle == 'Category' ? 'Categories' : $pageTitle}}</h1>
                </div>
                <div class="col-lg-6  text-end">
                    
                </div>
            </div>
        </div>
    </section>
    
    <section class="product-listing page_section menu_page pb-5 pt-2">
        <div class="container">
            <div class="row for-p-l-p">
                @foreach($categories as $items)
                    <div class="col-lg-3 mt-2 mb-2" >
                        <div class="for-product-category position-relative d-flex align-items-center">
                            <a href="{{url(strtolower($pageTitle).'/'.$items->slug)}}" class="w-100">
                                
                                <div class="image-wrapper" style="overflow: hidden;height:300px;background: linear-gradient(rgb(0 0 0 / 24%), rgba(0, 0, 0, 0.553)), 
                                url({!! $items->picture == 'dummy.png' ? getCatgeoryImg($items->id) : asset('images/categories/'.$items->picture) !!}) center / cover no-repeat;">
                                    
                                </div>
                                <div class="position-absolute d-flex justify-content-center align-items-center w-100 h-100" style="top: 0;">
                                    <h1 class="text-light text-center h3">{{$items->name}}</h1>
                                </div>
                                
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection