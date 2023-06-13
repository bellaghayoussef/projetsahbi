<?php

namespace App\SMS;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;
class Sms {

    public function send($receiverNumber,$messaged) {

       try {
        $sid    = "ACf169e8f69b9fe6f3fd803569612a0692";
        $token  = "858882cbb8a43eaf88c38152d952593c";
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
          ->create("+21656818880", // to
            array(
                "from" => "+19852484364",
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
