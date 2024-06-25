@extends('layouts.frontend')

@section('contents')
    

    <section class="bread_crumb bg-light py-3 my-3">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <p class="mb-0 f-15">Sign In</p>
                </div>
                <div class="col-6 text-end">
                    <p class="mb-0 f-14 text-dark ">You are here: Bunches > Sign In</p>
                </div>
            </div>
        </div>
    </section>
    
    <section class=" page_section">
        <div class="container">
            <div class="row justify-content-center w-100 m-0">
              <div class="col-md-7 col-lg-5 card border-0 shadow-lg p-3 mb-5 bg-body rounded">
                    
                    <form class="card-body validated not-ajax" method="post"  action="{{url('sign-in')}}">
                        <div class=" row">
                            @csrf()
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email<span class="text-danger"> *</span></label>
                                    <input type="email" autocomplete="off" class="form-control" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password<span class="text-danger"> *</span></label>
                                    <input type="password" autocomplete="new-password" class="form-control" name="password" id="password" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check d-flex justify-content-left mb-2 mb-md-4">
                                            <input class="form-check-input me-2" type="checkbox" value="1" id="remember" name="remember" aria-describedby="registerCheckHelpText">
                                            <label class="form-check-label" for="remember">
                                              Remember me
                                            </label>
                                        </div>  
                                    </div>
                                    <div class="col-6 text-end f-g-pass">
                                        <a href="{{url('forget-password')}}">Forgot password?</a>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn rounded-3 text-bg-light text-dark  my-3">Sign In</button><br>
                            </div>
                            <div class="text-center mt-3">
                                Don't have an account? <a class="ms-2" href="{{url('sign-up')}}">Register Here</a>
                            </div>
                            
                        </div>
                        
                        
                        
                    </form>
              </div>
            </div>
        </div>
    </section>
    
    
@endsection