<!DOCTYPE html>
<html>
<head>
  <title>Bunches Flowers</title>  
  <style>
  @media (max-width: 350px) {
    .header-right {
          font-size:80%;
      }
    }
      
  </style>
</head>
<body style="background: #EEE; font-family: sans-serif; padding:0px;margin:0px;min-height:100vh;color:#333;line-height:150%; font-size:16px;">
    <div style="width: 700px;  margin: 0px auto; background:#FFF; min-height:100vh;position:relative;" >
        <div style="text-align: left;background:#FFF; padding:5px 15px; height:75px; border-bottom:1px solid #e86f9d; background:#e86f9d00;"><!-- Header //-->
            <div style="max-width:50%;clear:none;float:left;" >
                <img src="{{url('assets/images/email_logo.png')}}"  style="height:auto; margin-top:-3px; max-width:100%;" alt="Bunches Flowers" />
            </div>
            <div style="float:right;text-align:right;padding:10px 0;white-space:nowrap;position:absolute; right:10px; top:15px; z-index:25;" class="header-right">
                <a href="tel:+16472453301" style="color:#000000;font-weight:bold;text-decoration:none;">+1 647-245-3301</a><br/>
                <a href="mailto:contact@bunches.ca" style="color:#000000;font-weight:bold;text-decoration:none;">contact@bunches.ca</a>
            </div>
        </div><!-- Header //-->
        <div style="padding:15px 25px; letter-spacing:0px;min-height: calc(100vh - 215px);clear:both;"><!-- Main Area //-->
        
            @yield('content')
           
        </div><!-- Main Area //-->
        <div style="background:#333;height:100px;">
            <div style="padding:5px 10px;color:#FFF;">
                <p style="text-align:center; margin-bottom:5px;"><span style="font-style:italic;">Visit</span>  <a href="{{url('/')}}" style="color:#FFF;">Bunches.ca</a> | <span style="font-style:italic;">Follow us on</span>  
                
                <a href="https://www.facebook.com/bunches.ca" style="color:#FFF;"><img src="{{url('assets/images/fb.png')}}" width="14" height="14"></a> <a href="https://www.instagram.com/bunches.ca/" style="color:#FFF;"><img src="{{url('assets/images/ig.png')}}"  width="14" height="14"></a> 
                <a href="https://www.tiktok.com/@bunches.ca" style="color:#FFF;"><img src="{{url('assets/images/tt.png')}}" width="14" height="14"></a> </p>
            </div>
        </div>
        
    </div>

</body>
</html>