<?php
/**
 * Represents the class for sending sms using the estoresms api
 */
namespace EstoreSMS;
use EstoreSMS\EstoreSMS;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request as GuzzleHttpRequest;

class SMS extends EstoreSMS
{

  /**
   *SMS api url
   */
  protected $SMS_URL = "http://www.estoresms.com/smsapi.php";

  /**
   *Flash sms api url
   */
  protected $FLASH_SMS_URL = "http://www.estoresms.com/flashsms_api.php";

  /**
   *Sends sms to a specific recipient
   */
  public function send( $recipient = array(), $message, $sender, $dnd = false, $flash_sms = false ){

    $url = $flash_sms ? $this->FLASH_SMS_URL : $this->SMS_URL;
    $client = new Client();
    //send sms using estoresms
    try {
      $response = $client->request('GET', $url,
      ['query' => ['username' => $this->username,
                   'password' => $this->password,
                   'sender' => $sender,
                   'recipient' => implode( ',' , $recipient),
                   'message' => $message,
                   'dnd' => $dnd,
                  ]]);
    }  catch (RequestException $e) {
            $response = $this->statusCodeHandling($e);
            return $response;
        }

    return $response->getBody()->getContents();
  }

  /**
   * Handles status codes from the api responses
   */
  protected function statusCodeHandling($e)
   {
       $response = array("statuscode" => $e->getResponse()->getStatusCode(),
       "error" => json_decode($e->getResponse()->getBody(true)->getContents()));
       return $response;
   }

}
