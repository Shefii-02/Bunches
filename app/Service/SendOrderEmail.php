<?php
namespace App\Service;
use App\Models\User;
use App\Models\Order;
use App\Models\Item;
use App\Models\Store;
use App\Models\Basket;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderInvoiceMail;
use App\Mail\OrderNotification;
use DB;

use SparkPost\SparkPost;
use GuzzleHttp\Client;
use Http\Adapter\Guzzle7\Client as GuzzleAdapter;
use Nyholm\Psr7\Factory\Psr17Factory;
use Http\Message\MessageFactory\DiactorosMessageFactory;
use Illuminate\Support\Facades\Log;

trait SendOrderEmail{

    public function SendEmailTrait(){
           $apiKey = '10d2e69fc8359017ebd13a245561754a9bc2bac8';
           $apiEndpoint = 'https://api.sparkpost.com/api/v1/';
           
        $unsentCusEmails = Order::with('basket','orderItems','address')
                             ->whereHas('basket')
                             ->whereHas('address')
                             ->where('status',1)
                             ->where('customer_email_send',0)
                             ->whereNull('customer_email_send_message_id')
                             ->get();
                             
        $unsentStoreEmails = Order::with('basket','orderItems','address')
                             ->whereHas('basket')
                             ->whereHas('address')
                             ->where('status',1)
                             ->where('store_email_send',0)
                             ->whereNull('store_email_send_message_id')
                             ->get();
                             
                foreach($unsentCusEmails as $order_details){
                    //order Confirmation mail
                    $sendto = env('MAIL_TO_COPY');
                    
                    // $template = view('emails.order-invoice', compact('order_details'))->render();
                    $template = new OrderInvoiceMail($order_details);
                    $template = $template->render();
            
            
                    $client = new Client([
                        'headers' => [
                            'Authorization' => $apiKey,
                            'Content-Type' => 'application/json',
                        ],
                    ]);
                    
                    
                    
        
                    try{
                        $response = $client->post($apiEndpoint . 'transmissions', [
                            'json' => [
                                'options' => [
                                    'sandbox' => false,
                                ],
                                'content' => [
                                    'name' => 'BUNCHES',
                                    'from' => 'orders@bunches.ca',
                                    'subject' => "Thank you for Your Order",
                                    'html' => $template,
                                ],
                                'recipients' => [
                                    ['address' => ['email' => $order_details->email]],
                                ],
                                'bcc' => [
                                    [
                                        'address' => [
                                            'name' => 'B ADMIN',
                                            'email' => $sendto,
                                        ],
                                    ],
                                ],
                            ],
                        ]);
                        
                        $responseData = json_decode($response->getBody(), true);
    
                        if (isset($responseData['results']['id'])) {
                            $message_id = $responseData['results']['id'];
                             \Log::info("Customer Message id is  ".$message_id);
                             Order::where('id', $order_details->id)->update(['customer_email_send_message_id' => $message_id]);
                        } else {
                   
                            \Log::info("Customer Email Message id is  NULL");
                        }
             
                         
                    //     Mail::to($order_details->email)->bcc($sendto)->send(new OrderInvoiceMail($order_details));    
                    //   Order::where('id', $order_details->id)->update(['customer_email_send' => 1]);
                    }
                    catch(\Exception $e){
                          \Log::info($e);
                    }
                }
                
                
                
                
                foreach($unsentStoreEmails as $order_details){
                            //order notification
                    $cc_mailId = [];
                    $all_ordersSend= env('MAIL_TO_ORDER') ?? env('MAIL_FROM_ADDRESS'); 
                   
                        if($order_details->basket->order_type == 'pickup'){
                            $store = Store::where('id',$order_details->basket->pickup_id)->first();
                        }
                        else{
                            $store = Store::where('shipping',1)->first() ?? '';
            
                        }
                        
                        if(env('APP_URL') != 'https://www.stage.bunches.ca'){
                            if($store){
                                if($order_details->basket->order_type == 'delivery') {
                                    $cc_mailId[] = $store->email;    // Default Delivery store mail
                                }
                                else
                                {
                                    // Selected Store mail 
                                    $cc_mailId[] = $store->email;  //primary mail id
                                    
                                    // if($store->secondary_email != ''){
                                    //     $cc_mailId[] = $store->secondary_email; //secondary mail id
                                    // }
                                    if($store->secondary_email != ''){
                                        $sec_emails  = explode(',',$store->secondary_email);
                                        $cc_mailId  = array_merge($cc_mailId,$sec_emails);
                                    }
                                }
                            }  
                        }
                        
                        if(count($cc_mailId) <= 0){
                            $cc_mailId[] = env('MAIL_TO_DEV'); 
                        }
                        
                        // $template = view('emails.order-notification', compact('order_details'))->render(); 
                        $template = new OrderNotification($order_details);
                        $template = $template->render();
                    
                        $client = new Client([
                            'headers' => [
                                'Authorization' => $apiKey,
                                'Content-Type' => 'application/json',
                            ],
                        ]);
                        
                    try{
                        $response = $client->post($apiEndpoint . 'transmissions', [
                            'json' => [
                                'options' => [
                                    'sandbox' => false,
                                ],
                                'content' => [
                                    'name' => 'BUNCHES',
                                    'from' => 'orders@bunches.ca',
                                    'subject' => "Received New Order",
                                    'html' => $template,
                                ],
                                'recipients' => [
                                    ['address' => ['email' => $all_ordersSend]],
                                ],
                                // 'bcc' => [
                                //     [
                                // jakki.sweetiepie@gmail.com 	sweetiepieorders@bunches.ca	tina@bunches.ca
                                //         'address' => [
                                //             'email' => 'shefii.km@gmail.com',
                                //         ],
                                //     ],
                                //     [
                                //         'address' => [
                                //             'email' => 'irshad.indigital@gmail.com',
                                //         ],
                                //     ],
                                // ],
                            ],
                        ]);
                        
                        
                        
                        $responseData = json_decode($response->getBody(), true);
    
                        if (isset($responseData['results']['id'])) {
                            $message_id = $responseData['results']['id'];
                             \Log::info("Store Message id is  ".$message_id);
                             Order::where('id', $order_details->id)->update(['store_email_send_message_id' => $message_id]);
                        } else {
                   
                            \Log::info("Store Email Message id is  NULL");
                        }
             
                        $cc_mailId[] = 'cesario@indigitalgroup.ca';
             
                        foreach($cc_mailId as $store_email_fwd){
                                $client = new Client([
                                    'headers' => [
                                        'Authorization' => $apiKey,
                                        'Content-Type' => 'application/json',
                                    ],
                                ]);
                                $response = $client->post($apiEndpoint . 'transmissions', [
                                    'json' => [
                                        'options' => [
                                            'sandbox' => false,
                                        ],
                                        'content' => [
                                            'name' => 'BUNCHES',
                                            'from' => 'orders@bunches.ca',
                                            'subject' => "Received New Order",
                                            'html' => $template,
                                        ],
                                        'recipients' => [
                                            ['address' => ['email' => $store_email_fwd]],
                                        ],
                                    ],
                                ]);
                           
                        }
                        
                        $items = DB::table('items') 
                                    ->join('products', 'items.product_id', '=', 'products.id')
                                    ->join('menucategory_products', 'products.master_id', 'menucategory_products.product_id')
                                    ->join('menu_categories', 'menu_categories.master_id', 'menucategory_products.category_id')
                                    ->where('menu_categories.name', '=', 'Cookie Cakes')
                                    ->where('basket_id',$order_details->basket_id)
                                    ->select('items.*','menu_categories.*')
                                    ->get();
                        if($items->count()>0){
                            $client = new Client([
                                    'headers' => [
                                        'Authorization' => $apiKey,
                                        'Content-Type' => 'application/json',
                                    ],
                                ]);
                                $response = $client->post($apiEndpoint . 'transmissions', [
                                    'json' => [
                                        'options' => [
                                            'sandbox' => false,
                                        ],
                                        'content' => [
                                            'name' => 'BUNCHES',
                                            'from' => 'orders@bunches.ca',
                                            'subject' => "Received New Order",
                                            'html' => $template,
                                        ],
                                        'recipients' => [
                                            ['address' => ['email' => 'headoffice@bunches.ca']],
                                        ],
                                    ],
                                ]);
                                  $responseData = json_decode($response->getBody(), true);
    
                                if (isset($responseData['results']['id'])) {
                                    $message_id = $responseData['results']['id'];
                                     \Log::info("Additional Email Message id is  ".$message_id);
                                     Order::where('id', $order_details->id)->update(['additional_email_id' => $message_id]);
                                } else {
                           
                                    \Log::info("Additional Email Message id is  NULL");
                                }
                        }     
                                    
                      
                    }
                    catch(\Exception $e){
                          \Log::info($e);
                    }
                        
                    
                }
                
        if($unsentCusEmails->count() > 0 || $unsentStoreEmails->count() > 0){
            
             \Log::info("SendEmailTrait Cron is working fine!");  
        }    
             return 0;
      }
}