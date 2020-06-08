<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
// use App\Wallet;
use PayantNG\Payant;

class PaymentController extends Controller
{
    public $pay;

    public function __construct()
    {
        $this->pay = new Payant\Payant('ba9b48da7aa5bf647df4b74f54429a87e23d68276caa46d040ab41bb');
    }
    
    //invoice 
    public function invoice()
    {
        
        $client_id = '410';
        $client_data = [
            "first_name" => "Jonathan ",
            "last_name" => "Itakpe",
            "email" => "jonathan@floatr.com.ng",
            "phone" => "+234809012345"
        ];
        $due_date = "12/30/2016";
        $fee_bearer = "client";
        $items = [
              [
                "item" => ".Com Domain Name Registration",
                "description" => "alberthostpital.com",
                "unit_cost" => "2500.00",
                "quantity" => "1"
              ]
        ];

        $invoice =  $this->pay->addInvoice($client_id, $client_data, $due_date, $fee_bearer,$items);
        dd($invoice);

    }

    public function getInvoice()
    {
      
        $result =  $this->pay->getInvoice();
        return $this->response->json($result);

    }

    public function addPay()
    {
      
        $reference_code = 'H5RJ2DGq6r3edZT0LKU8';

        if($reference_code != ''){
            $amount = "500.00";
            $channel = 'Cash';
           
                $add_payment =  $this->pay->addPayment($reference_code,$amount,$channel);
                return response()->json($add_payment);
            }else{
                die;
            }
     
    }


   public function getPayment()
   {
    $reference_code = 'H5RJ2DGq6r3edZT0LKU8';

    if($reference_code != ''){
            $get_payment =  $this->pay->getPayment($reference_code );
            return response()->json($get_payment);
        }else{
            die;
        }

    
   }
}
