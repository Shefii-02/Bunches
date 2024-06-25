@extends('layouts.frontend')

@section('contents')

    <section class="bread_crumb bg-light py-3 my-3">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <p class="mb-0 f-15">Sign up</p>
            </div>
            <div class="col-6 text-end">
                <p class="mb-0 f-14 text-dark ">You are here: Bunches > Sign up</p>
            </div>
        </div>
    </div>
</section>
    
    <section class=" page_section">
        <div class="container">
            <div class="row justify-content-center w-100 m-0">
              <div class="col-md-7 col-lg-6 card border-0 shadow-lg p-3 mb-5 bg-body rounded">
                    <form class="card-body" method="post" action="{{url('sign-up')}}" novalidate>
                        <div class="address-form row">
                            @csrf()
                            
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email<span class="text-danger"> *</span></label>
                                    <input type="email" name="email" autocomplete="off"  id="email" value="{{old('email')}}"  class="form-control" required>
                                    <span>
                			            {{$errors->first('email')}}
                			        </span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password<span class="text-danger"> *</span></label>
                                    <input type="password" autocomplete="new-password" class="form-control" name="password" id="password" required>
                                    <span>
                			            {{$errors->first('password')}}
                			        </span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="confirm" class="form-label">Confirm Password<span class="text-danger"> *</span></label>
                                    <input type="password"  autocomplete="off" class="form-control" name="password_confirmation" id="confirm" required>
                                    <span>
                			            {{$errors->first('password_confirmation')}}
                			          </span>
                                </div>
                            </div>
                            
                            <hr class="mt-3 mb-4">
                            
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="firstname" class="form-label">First Name<span class="text-danger"> *</span></label>
                                    <input type="text"  autocomplete="off" class="form-control"  name="firstname" id="firstname" value="{{old('firstname')}}"  required>
                                    <span>
            			                {{$errors->first('firstname')}}
            			            </span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="lastname" class="form-label">Last Name</label>
                                    <input type="text"  autocomplete="off" class="form-control" name="lastname" id="lastname" required>
                                    <span>
            			                {{$errors->first('lastname')}}
            			            </span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="phone"  class="form-label">Phone Number<span class="text-danger"> *</span></label>
                                    <input type="text"  autocomplete="off" class="form-control" name="phone" id="phone" required>
                                    <span>
            			                {{$errors->first('phone')}}
            			            </span>
                                </div>
                            </div>
                             <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="dob"  class="form-label">Birthday on<span class="text-danger"> *</span></label> 
                                    <div class="input-group">
                                         <select class="form-select" name="day" id="day" required>
                                            <option value="" disabled selected>Day</option>
                                            <!-- Add options for days 1 to 31 -->
                                            <?php
                                            for ($day = 1; $day <= 31; $day++) {
                                              echo "<option value='$day'>$day</option>";
                                            }
                                            ?>
                                          </select>
                                          <select class="form-select" name="month" id="month" required>
                                            <option value="" disabled selected>Month</option>
                                            <!-- Add options for months January to December -->
                                            <?php
                                            $months = array(
                                              'January', 'February', 'March', 'April', 'May', 'June', 'July',
                                              'August', 'September', 'October', 'November', 'December'
                                            );
                                            foreach ($months as $index => $month) {
                                              echo "<option value='" . ($index + 1) . "'>$month</option>";
                                            }
                                            ?>
                                          </select>
                                          <select class="form-select" name="year" id="year" required>
                                              <option value="" disabled selected>Year</option>
                                                  <?php
                                                  $currentYear = date("Y");
                                                  $startYear = $currentYear - 18;
                                                  
                                                  for ($year = $startYear; $year >= 1900; $year--) {
                                                    echo "<option value='$year'>$year</option>";
                                                  }
                                                  ?>

                                          </select>
                                        <input type="hidden" name="dob" id="dob" value="">
                                      </div>
                                    <span>
            			                {{$errors->first('phone')}}
            			            </span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address<span class="text-danger"> *</span></label>
                                    <textarea class="form-control address_fill"  autocomplete="off" value="{{old('address')}}" name="address" id="address" ></textarea>
                                    <span>
            			                {{$errors->first('address')}}
            			            </span>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="city"  class="form-label">City<span class="text-danger"> *</span></label>
                                    <input type="text"  autocomplete="off" class="form-control city_fill"  value="{{old('city')}}" name="city" id="city" required>
                                    <span>
            			                {{$errors->first('city')}}
            			            </span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="postal_code" class="form-label">Postal Code<span class="text-danger"> *</span></label>
                                    <input type="text"  autocomplete="off" maxlength="7" class="form-control postalCode_fill" id="postal_code" value="{{old('postalcode')}}" name="postalcode"  required>
                                    <span>
            			                {{$errors->first('postalcode')}}
            			            </span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="province" class="form-label">Province<span class="text-danger"> *</span></label>

                                    <select class="form-control province_fill" name="province" id="province" required>
                                        <option value="">Select Province</option>
                                                @foreach($province as $item)
            		                             <option value="{{$item->name}}" {{$item->code == old('province') ? 'selected' : ''}}>
            		                                       {{$item->name}}</option>
            		                          @endforeach
            		                </select>
                                    <span>
            			                {{$errors->first('province')}}
            			            </span>

                                </div>
                            </div>
                           
                            <div class="col-lg-12">
                                <div class="form-check d-flex justify-content-left mb-4">
                                    <input class="form-check-input me-2" required type="checkbox" name="required_terms" value="1" id="required" aria-describedby="registerCheckHelpText">
                                    <label class="form-check-label" for="required">
                                      I have read and agree to the terms &nbsp;&nbsp;
                                    </label>
                                </div>  
                            </div>
                            <div class="row">
                                <div class="d-flex justify-content-center  mb-5">
                                    <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}" data-callback="enableBtn"></div>
                                </div>
                            </div>
                            
                             
                            <div class="text-center">
                                <button type="submit" class="btn rounded-3 text-bg-light text-dark  my-3">Sign Up</button><br>
                                <small>Your FREE account will be registered by submitting this form.</small>
                            </div>
                            <div class="text-center mt-3">
                                Have an account? <a href="{{url('sign-in')}}">Log in</a>
                            </div>
                            
                        </div>
                        
                        
                        
                    </form>
              </div>
            </div>
        </div>
    </section>
    
    
@endsection


@section('scripts')
    <script>
     $(document).ready(function() {
        $('#day, #month, #year').on('change', function() {
            var day = $('#day').val();
            var month = $('#month').val();
            var year = $('#year').val();
            
            if (day && month && year) {
                var dob = year + '-' + month + '-' + day;
                $('#dob').val(dob);
            }
        });
    });
    </script>
@endsection