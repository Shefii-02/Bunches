<div class="border p-3 mb-3">
    <h6 class="fw-bold mb-3">Recipient</h6>
    <div class="col-lg-12">
        <div class="row">
            @if(session('ordertype') == 'delivery')
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Zip / Postal Code</label>
                    <input class="form-control" autocomplete="off" type="text"  value="{{session()->has('postalcode') ? session('postalcode') :''}}"
                            name="postal" id="postal" placeholder="" maxlength="7" required>
                </div>
            </div>
            <div class="col-lg-4">
                <label for="">Location Type</label>
                <select name="location_type" class="form-control p-2" id="location_type">
                     <option selected="selected" @if(session()->has('locType')) @if((session('locType') == 'Residence')) selected @endif @endif value="Residence">Residence</option>
                     <option value="Business" @if(session()->has('locType')) @if((session('locType') == 'Business')) selected @endif @endif >Business</option>
                     <option value="Funeral home" @if(session()->has('locType')) @if((session('locType') == 'Funeral home')) selected @endif @endif >Funeral home</option>
                     <option value="Hospital" @if(session()->has('locType')) @if((session('locType') == 'Hospital')) selected @endif @endif >Hospital</option>
                     <option value="Apartment" @if(session()->has('locType')) @if((session('locType') == 'Apartment')) selected @endif @endif >Apartment</option>
                     <option value="School" @if(session()->has('locType')) @if((session('locType') == 'School')) selected @endif @endif >School</option>
                     <option value="Church" @if(session()->has('locType')) @if((session('locType') == 'Church')) selected @endif @endif >Church</option>
                </select>
            </div>
            @endif
            <div class="col-lg-4">
                @if(session('ordertype') == 'pickup')
                <label>Pickup Date</label>
                <!---------------------------------------PICKUP---------------------------------------------------------------------------------------->
                    {!! showPickupCalender(null,session('ordertype')) !!}
                <!------------------------------------------------------------------------------------------------------------------------------------->
                @else
                    <label>Delivery Date</label>
                
                <!------------------------------------- DELIEVRY--------------------------------------------------------------------------------------->
                    {!! showDeiveryCalender(null,session('ordertype')) !!}
                <!------------------------------------------------------------------------------------------------------------------------------------->
                @endif

                <div class="input-group form-group " role="button">
                    <span class="form-control date-input cursor-pointer rounded-0"  id="date-dropdown-toggle" >{{$serveDate != ''  && date('Y-m-d',strtotime($serveDate)) > date('Y-m-d') ? date('F d, Y',strtotime($serveDate)) : ''}}</span>
                    <input type="hidden" id="pickup_date" value="{{$serveDate}}" name="pickup_date">
                    <span class="input-group-text" role="button" id="calendar-icon">
                        <i class="bi bi-calendar-check-fill"></i>
                    </span>
                </div>
            </div>
            
             @if(session('ordertype') == 'pickup')
            <div class="col-lg-4" >
                <div class="form-group ">
                <label>Pickup Time</label>
                        <select name="pickup_time"  class="form-select"   id="pickup_time" required>
                           
                        </select>
                    <span class="text-danger time_exceeded"></span>
                </div>
            </div>
            @endif
                                        
        </div>
        <div class="row">
             <div class="form-group mt-2">
                    <label class="text-capitalize mt-2">Earliest {{session('ordertype')}}:</label>
                <div class="row" id="EarliestDates">
                    
                </div>
            </div>
        </div>
    </div>
</div>