<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use Mail;

class StripePaymentController extends Controller
{
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => (int)$request->price * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment for testing Reservation." 
        ]);

        $mail_data = array('name' => $request->firstname, 'term' => $request->term, 'price' => $request->price);
        $toMail = $request->email;
        Mail::send('pages.send_invoice', $mail_data, function($message) use ($toMail) {
            $message->from('reserva0523@gmail.com', 'Reserva María Aurora');
            $message->to($toMail)->subject('Test - Suite Booking Invoice');
          });
  
        Session::flash('success', 'Payment successful!');
          
        return redirect()->route('dashbord');
    }
}
