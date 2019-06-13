<?php
/**
 *
 */
namespace EstoreSMS;

class EstoreSMS
{
  /**
   *The estoresms username
   */
  protected $username;

  /**
   *The estoresms password
   */
  protected $password;

  function __construct($username, $password)
  {
    $this->username = $username;
    $this->password = $password;
  }

  

}
