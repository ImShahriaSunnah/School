<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\SchoolCheckout;
use App\Models\WorkplaceInfo;
use Exception;

class PaymentController extends Controller
{
    
    public function paymentindex(Request $request)
    {
        // return $request;

        $url = 'https://sandbox.aamarpay.com/request.php'; // live url https://secure.aamarpay.com/request.php
            
        $fields = array(
            'store_id' => 'aamarpaytest', //store id will be aamarpay,  contact integration@aamarpay.com for test/live id
            'amount' => $request->pay_amount, //transaction amount
            'payment_type' => $request->select, //no need to change
            'currency' => 'BDT',  //currenct will be USD/BDT
            'tran_id' => rand(1111111,9999999), //transaction id must be unique from your end
            'cus_name' => Auth::user()->school_name,  //customer name
            'cus_email' => Auth::user()->email, //customer email address
            'cus_add1' => Auth::user()->address,  //customer address
            'cus_add2' => Auth::user()->address, //customer address
            'cus_city' => 'Dhaka',  //customer city
            'cus_state' => 'Dhaka',  //state
            'cus_postcode' => '1230', //postcode or zipcode
            'cus_country' => 'Bangladesh',  //country
            'cus_phone' => Auth::user()->phone_number, //customer phone number
            'cus_fax' => Null,  //fax
            'ship_name' => Null, //ship name
            'ship_add1' => Null,  //ship address
            'ship_add2' => Null,
            'ship_city' => Null, 
            'ship_state' => Null,
            'ship_postcode' => Null, 
            'ship_country' => Null,
            'desc' => 'payment description', 
            'success_url' => route('payment.success'), //your success route
            //'success_url' => route('payment.success'), //your success route
            'fail_url' => route('school.payment.status'), //your fail route
            'cancel_url' => route('school.payment.status'), //your cancel url
            'opt_a' => Null,  //optional paramter
            'opt_b' => Null,
            'opt_c' => Null, 
            'opt_d' => Null,
            'signature_key' => 'dbb74894e82415a2f7ff0ec3a97e4183'
        ); //signature key will provided aamarpay, contact integration@aamarpay.com for test/live signature key

        $fields_string = http_build_query($fields);
         
            
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_URL, $url);  
    
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // return curl_exec($ch);
        $url_forward = str_replace('"', '', stripslashes(curl_exec($ch)));	
        curl_close($ch);

        $this->redirect_to_merchant($url_forward);
    }

    function redirect_to_merchant($url)
    {

        ?>
        <html xmlns="http://www.w3.org/1999/xhtml">
          <head><script type="text/javascript">
            function closethisasap() { document.forms["redirectpost"].submit(); } 
          </script></head>
          <body onLoad="closethisasap();">
          
            <form name="redirectpost" method="post" action="<?php echo 'https://sandbox.aamarpay.com/'.$url; ?>"></form>
            
          </body>
        </html>
        <?php	
        exit;
    } 

    public function schoolPaymentShowCheckout(Request $request)
    {
        // dd($request->all());
        $checkout = new SchoolCheckout();
        $checkout->school_id = Auth::user()->id;
        $checkout->pay_amount = $request->pay_amount;
        //$checkout->gateway_number = $request->gateway_number;
        $checkout->gateway_type = $request->select;
        $checkout->transaction_number     = $request->tran_id;

        $checkout->save();
        Alert::success('Successfully Payment Submitted,After accept your payment you get a message', 'Success Message');
        return redirect()->route('school.payment.status');
    }


    public function success(Request $request)
    {
        try{
            $school = School::where('email', $request['cus_email'])->where('phone_number', $request['cus_phone']);

            if($school->exists())
            {
                $school = $school->first(); // school data

                $insert = Payment::create([
                    'school_id' =>  $school->id,
                    'payment_amount'    =>  $request['amount'],
                    'payment_charge'    =>  $request['pg_service_charge_bdt'],
                    'payment_type'      =>  $request['card_type'],
                    'resp'              =>  json_encode($request->all()),
                    'status'            =>  0
                ]);

                WorkplaceInfo::where('school_id', $school->id)
                ->update([
                    'payment_amount'    =>  $request['amount'],
                    'last_payment_at'   =>  now()
                ]);

                Auth::guard('schools')->loginUsingId($school->id);
            }
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }

        Alert::success("Great!", "Payment successfully");
        return redirect()->route('school.payment.status');
    }

    public function fail(Request $request){
        return $request;
    }
}
