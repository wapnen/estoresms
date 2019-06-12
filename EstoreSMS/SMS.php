<?php
/**
 *
 */
namespace EstoreSMS;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request as GuzzleHttpRequest;

class SMS
{

  static function send($username, $password, $recipient, $message, $sender){

    if(strlen($recipient) < 11 || strlen($recipient) > 11 || !is_numeric($recipient) ){
      throw new \Exception("Invalid phone number", 1);

    }
    $client = new Client();
    //send sms using estoresms
    try {
      $response = $client->request('GET', 'http://www.estoresms.com/smsapi.php',
      ['query' => ['username' => $username,
                   'password' => $password,
                   'sender' => $sender,
                   'recipient' => $recipient,
                   'message' => $message,

                  ]]);
    }  catch (RequestException $e) {
            $response = $this->statusCodeHandling($e);
            return $response;
        }

    return $response->getBody()->getContents();
  }

  protected function statusCodeHandling($e)
   {
       $response = array("statuscode" => $e->getResponse()->getStatusCode(),
       "error" => json_decode($e->getResponse()->getBody(true)->getContents()));
       return $response;
   }

}
