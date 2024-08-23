<?php

namespace App\Http\Traits;

use Log;
use Postmark\PostmarkClient;

trait SendMailTrait
{
    /**
     * send mail via postmark
     *
     * @return Response
     */
    private function sendMail($senderEmail, $receiverEmail, $templateId, $messageValues)
    {
       // dd($messageValues);
        Log::info("Sending mail to $receiverEmail with template id: $templateId");
        Log::debug("Message values: " . json_encode($messageValues));

        try {
            $client = new PostmarkClient(config('services.postmark.token'));
            //dd($client->sendEmailWithTemplate());
            $sendResult = $client->sendEmailWithTemplate(
                $senderEmail,
                $receiverEmail,
                $templateId,
                $messageValues
            );

            Log::info("Mail sent status: ". $sendResult->message);
        } catch (PostmarkException $ex) {
            Log::error("Error sending mail: Http Status Code: " . $ex->httpStatusCode . " Message: " .
                $ex->message . "Postmark API Error: " . $ex->postmarkApiErrorCode);
        } catch (Exception $generalException) {
            Log::error("General Exception sending mail: " . print_r($generalException));
        }
    }
}