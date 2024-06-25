@extends('layouts.frontend')

@section('contents')
    
    <section class="product-listing-banner">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>Forget Password</h1>
                </div> 
            </div>
        </div>
    </section>
    
    <section class=" pb-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                
              <div class="col-md-5 card border-0 shadow-lg p-3 mb-5 bg-body rounded">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form class="card-body validated not-ajax" method="POST" action="{{url('new-password')}}" >
                        <div class=" row">
                            @csrf()
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email }}">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">New Password<span class="text-danger"> *</span></label>
                                    <input type="password" name="password" class="form-control" id="new_password" required>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="confirm_password" class="form-label">Confirm Password<span class="text-danger"> *</span></label>
                                    <input type="password" name="password_confirmation" class="form-control" id="confirm_password" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark rounded-pill mt-3 mb-3 pe-4 ps-4">Send Password Reset Link</button><br>
                            </div>
                            <div class="text-center mt-3">
                                 <a href="{{url('sign-in')}}">Back to login?</a>
                            </div>
                            
                        </div>
                        
                        
                        
                    </form>
              </div>
            </div>
        </div>
    </section>

@endsection