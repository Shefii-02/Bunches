<?php

    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
    use Carbon\Carbon;
    use Config; 
    use Illuminate\Support\Facades\File; // Import the File facade
    use App\Mail\ContactMail;
    use App\Mail\WholesaleMail;
    use App\Mail\CateringMail;
    use App\Mail\CareerMail;
    use App\Mail\OrderInquiry;
    use App\Models\OrderFeedback;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Str;
    use App\Models\Store;
    use App\Http\Requests\ContactFormRequest;
    use App\Http\Requests\WholesaleFormRequest;
    use App\Http\Requests\CateringFormRequest;
    use App\Http\Requests\CareerFormRequest;
    
    
    use App\Models\Order;
    
    use App\Models\CareerRequest;

    class MailController extends Controller
    {
        
        function contact_send(ContactFormRequest $request){
            
            $store = Store::where('slug', $request->store)->first();
            
            $sendto= env('MAIL_TO_GENERAL') ?? env('MAIL_TO_ADDRESS');
            
            if(env('APP_ENV')=='local')
                $sendto = 'developer@indigitalgroup.ca';
                
  
            try {
                
                $mail = Mail::to($sendto); // Change $contact to $email
                
                if($store) {
                   $mail->cc($store->email);
                }
                
                $mail->send(new ContactMail($request));
                
                return redirect('/contact')->with('success', 'Message sent successfully! We will get back to you shortly.');
    
            } catch(\Exception $e) {
                return redirect('/contact')->with('error', 'An error occurred while sending the message. Please try again later.');
    
            }
            
        }
      
        function wholesaleForm_send(WholesaleFormRequest $request){
         
            $sendto= env('MAIL_TO_WHOLESALE') ?? env('MAIL_TO_ADDRESS');
            
            if(env('APP_ENV')=='local')
                $sendto = 'developer@indigitalgroup.ca';
                
            
            
            try {
                $mail = Mail::to($sendto)->send(new WholesaleMail($request));
                return redirect()->back()->with('success', 'Message sent successfully! We will get back to you shortly.');
    
            } catch(\Exception $e) {
                // die($e->getMessage()); // Use getMessage() to get the \Exception message
            return redirect()->back()->with('error', 'An error occurred while sending the message. Please try again later.');
    
            }
    	}
    	
    	function catering_send(CateringFormRequest $request){
    	    
    	    $sendto= env('MAIL_TO_CATERING') ?? env('MAIL_TO_ADDRESS');
    	     
    	    if(env('APP_ENV')=='local')
                $sendto = 'developer@indigitalgroup.ca'; 
    	     
            try {
                $mail = Mail::to($sendto)->send(new CateringMail($request));
                return redirect()->back()->with('success', 'Message sent successfully! We will get back to you shortly.');
    
            } catch(\Exception $e) {
                // die($e->getMessage()); // Use getMessage() to get the exception message
                return redirect()->back()->with('error', 'An error occurred while sending the message. Please try again later.');
    
            }
        	
    	}
    	
        public function StoreCareerRequest(CareerFormRequest $request){
            
            $store   = Store::where('master_id',$request->location)->first() ?? abort(404);
            $career = new CareerRequest();
            $career->store_name= $store->name;
            $career->position  = $request->position;
            $career->firstname = $request->firstname;
            $career->lastname  = $request->lastname;
            $career->phone     = $request->phone;
            $career->email     = $request->email;
            $career->message   = $request->descrption;
            $career->availability   = $request->availability;
            
            if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('images/resumes'); // This will store the resume in the "public/resumes" folder.
            }
            $resumeName = basename($request->resume);
            $career->resume    = $resumePath ?? '';
            try{
                $career->save();
                $apiDomain = env('TNG_API_DOMAIN'); 
             
                $url = $apiDomain."/api/website/career-request-store";
                
                    $post = ['career_id' => 1,
                             'firstname' => $career->firstname,
                             'lastname'  => $career->lastname,
                             'phone'     => $career->phone,
                             'email'     => $career->email,
                             'message'   => $career->message,
                             'store_name' => $career->store_name
                            ];
              
                    $result__api = CurlSendPostRequest($url,$post);
                    $result__api = json_decode($result__api);  
                    
                 
                    $sendto= env('MAIL_TO_CAREER') ?? env('MAIL_TO_ADDRESS');
                    
                    if(env('APP_ENV')=='local')
                        $sendto = 'developer@indigitalgroup.ca'; 
                    
                    $mail = new CareerMail($career);
                 if ($request->hasFile('resume')) {
                    // Read the resume file contents
                    $resumeContents = File::get($resumePath);
                    
                    // Attach the resume data to the email
                    $mail->attachData($resumeContents, $resumeName, ['mime' => File::mimeType($resumePath)]);
                 }
                 
                try{
                    Mail::to($sendto)->send($mail);
                }
                catch(\Exception $e){
                }
                
        // 		session()->flash('success', 'Successfully Submitted..');
        		return 1;
    // 			return redirect()->back();
            }
            catch(\Exception $e){
                // dd($e->message());
    //           	session()->flash('failed', $e->message());
    // 			return redirect()->back();
                return 0;
            }
            
        }
        
        
        
        
        public function order_inquiry($id,$session,Request $request){
        
                $order_details = Order::with('basket', 'orderItems', 'address')
                                ->where('invoice_id', $id)
                                ->whereHas('basket', function ($query) use ($session) {
                                    $query->where('session', $session);
                                })
                                ->firstOrFail();
            
            $basketExists = isset($order_details->basket);
            
            if (!$basketExists) {
                abort(404);
            }
            
            
            //order inquiry mail
                
                $sendto = env('MAIL_TO_CUSTOMERCARE');
                $reason=$request->reason_inquiry;
                $messages=$request->message;
                try{
                    Mail::to($sendto)->send(new OrderInquiry($order_details,$reason,$messages));
                    return redirect()->back()->with('success_send', 'Thank you for the Inquiry <br> We will get back to you shortly.');
                }
                catch(\Exception $e){
                    return redirect()->back()->with('error', 'An error occurred while sending the inquiry. Please try again later.');
                }
            
            
        }
        
        
        
        public function share_feedback($id,$session,Request $request){
            $order_details = Order::with('basket', 'orderItems', 'address')
                            ->where('invoice_id', $id)
                            ->whereHas('basket', function ($query) use ($session) {
                                $query->where('session', $session);
                            })
                            ->firstOrFail();
        
            $basketExists = isset($order_details->basket);
            
            if (!$basketExists) {
                abort(404);
            }
            
            $exist = OrderFeedback::where('invoice_id',$id)->first();
            if($exist){
                    $msg = 'Your feedback already submited.';
                    return view('frontend.share-feedback',compact('msg'));
            }
            else{
                $newone = new OrderFeedback();
                $newone->invoice_id = $id;
                $newone->rating = $request->rating;
                $newone->comments = $request->comments;
                $newone->save();
                $msg = 'Thank you for your feedback.';
                return view('frontend.share-feedback',compact('msg'));
            }
        }
        
        
    }