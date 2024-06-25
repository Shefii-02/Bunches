@extends('layouts.frontend')
@section('contents')

<section class="bread_crumb bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <p class="mb-0 f-15">{{capitalText('Blogs')}}</p>
                </div>
                <div class="col-6 text-end">
                    <p class="mb-0 f-14 text-dark ">You are here: <a href="{{url('/')}}" class="text-dark">Bunches</a> >
                    <a href="{{url('category')}}">Blogs</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-area page_section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-9">
                    <div class="row">
                        @foreach($blogs as $items)
                        <div class="col-12 col-md-6 mb-4">
                            <a href="{{url('blog/'.$items->slug)}}" class="text-decoration-none text-dark">
                                <div class="blog-card shadow">
                                    <div class="blog-img">
                                        <img src="{{isset($blogs) && $items->picture != '' ? asset('images/blogs/'.$items->picture):asset('dummy.jpg')}}" class="w-100" alt="">
                                    </div>
                                    <div class="blog-content py-3 px-3">
                                        <h2 class="mb-1 one-line h4 text-muted">{{ ltrim(str_replace('&nbsp;','',$items->name)) }}</h2>
                                        <h5 class="d-none">{{date('d M Y',strtotime($items->published_at))}}</h5>
                                        <div class="two-line small">
                                            {{ Str::limit(str_replace('&nbsp;','',strip_tags($items->description)),'200') }}                                   
                                         </div>
                                        <a class="text-decoration-none my-3 text-end" href="{{url('blog/'.$items->slug)}}">Read more </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>



                </div>

                <div class="col-12 col-md-12 col-lg-3">
                    <div class="for-sticky mb-3 mv-md-0">
                     

                        <div class="re-category">
                            <div class="row">
                                <div class="col-12">
                                    <div class="side-right-bar bg-light p-3 rounded">
                                        <h4 mb-3>Category</h4>
                                    <ul>
                                        @foreach($blog_category as $_category)
                                        <li class="mb-2">
                                            <a href="{{url('blog/category/'.$_category->slug)}}"  class="text-decoration-none text-black">
                                                <div class="row align-items-center">
                                                    <div class="col-6">
                                                        <img class="w-100" src="{{isset($blog_category) && $_category->picture != '' ? asset('images/blogs/'.$_category->picture):asset('dummy.jpg')}}" alt="">
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="fw-bold text-dark mb-0">{{$_category->name}}</h5>
                                                    </div>
                                                </div>
                                                
                                            </a>
                                        </li>
                                       @endforeach
                                    </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </section>


@endsection