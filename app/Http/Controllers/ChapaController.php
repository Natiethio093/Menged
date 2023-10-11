<?php

namespace App\Http\Controllers;
use Exception;
use Chapa\Chapa\Facades\Chapa as Chapa;
use Illuminate\Http\Request;
use App\Models\Seat;
use App\Models\Booked;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
class ChapaController extends Controller
{
    /**
     * Initialize Rave payment process
     * @return void
     */
    protected $reference;

    public function __construct(){
        $this->reference = Chapa::generateReference();

    }
    public function initialize(Request $req)
    {
        $total = $req->total;

        $bookedId = $req->bookedId;

        $seatId =   $req->seatId;
        
        try {
            $user = Auth::user();
            // This generates a payment reference
            $reference = $this->reference;

            // Enter the details of the payment
            $data = [
                'amount' => $total,
                'email' => $user->email,
                'tx_ref' => $reference,
                'currency' => "ETB",
                'callback_url' => route('callback', [$reference]),
                'return_url' => 'http://127.0.0.1:8000/confirmchapapayment',
                'first_name' => $user->name,
                // 'last_name' => $req->sname,
                "customization" => [
                    "title" => 'Chapa  Test',
                    "description" => "I am testing this"
                ]
            ];

            Session::put('payment_parameters', [
                'total' => $total,
                'bookedId' => $bookedId,
                'seatId' => $seatId,
            ]);

            $payment = Chapa::initializePayment($data);

            if ($payment['status'] !== 'success') {
                echo ('Payment Unsuccessful!!');
                return;
            }

      
            return redirect($payment['data']['checkout_url']);

           
        } catch (Exception $exception) {
            return redirect()->back()->with('Failed', 'No internet connection. Please check your network and try again.');
        }
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback($reference)
{
    $data = Chapa::verifyTransaction($reference);
   


    // return response()->json([
    //     'status'=> 200,
    //     'message'=> 'Successfull'
    // ]);
   

}
}
