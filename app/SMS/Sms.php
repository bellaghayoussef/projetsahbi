<?php

namespace App\SMS;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;
class Sms {

    public function send($receiverNumber,$messaged) {

       try {
        $sid    = "ACf169e8f69b9fe6f3fd803569612a0692";
        $token  ="a78267e1199a4c26fe4ac16fbd39ff3d";
      $receiverNumber = '+'.$receiverNumber;

        $twilio = new Client($sid, $token);

        $message = $twilio->messages
                          ->create( $receiverNumber, // to
                                   array(
                                       "messagingServiceSid" => "MG3b1fa6a59cc206bca7da6ee54f0833a6",
                                       "body" => $messaged
                                   )
                          );

                          return true;
       } catch (\Throwable $th) {

        Log::error($th);
        return true;
       }



    }
}
