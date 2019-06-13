# EstoreSMS PHP
# Overview

Send text and flash messages to one or more recipients

  You can read more about the EstoreSMS API [here](https://estoresms.com/)

# Getting Started
  Set up an estoresms [account](https://estoresms.com/login) and take note of your username and password.

## Installation
  ```bash
composer require wapnen/estoresms
```

## Enable the API
  Make sure that your estoresms balance is not empty. Login to the dashboard to fund your user account.

## Authentication
  You will use your estoresms account username and password to authenticate with the API.

# Usage
```
<?php
include "vendor/autoload.php";
use EstoreSMS\SMS;

$sms = new SMS('username', 'password');
$recipients = [081*********, 081*******];
$response = $sms->send($recipients, 'message', 'sender_id');
echo $response;
 ?>

```

## Parameters

| Parameter  | Description |
| ------------- | ------------- |
| username  | Your estoresms username  |
| password  | Estoresms password  |
| recipients | An array of at least one phone number(s) to which the message is sent|
| message | The message string |
| sender_id | A string to display as the message sender |


## Optional parameters

| Parameter  | Description |
| ------------- | ------------- |
| dnd  | Default to false. Set to true if the number is on dnd mode  |
| flash_sms  | Default to false. Set to true if the message should be sent as a flash text  |  


## DND numbers
```
<?php
include "vendor/autoload.php";
use EstoreSMS\SMS;

$sms = new SMS('username', 'password');
$recipients = [081*********, 081*******];
$response = $sms->send($recipients, 'message', 'sender_id', true);
echo $response;
 ?>

```

## Flash SMS
```
<?php
include "vendor/autoload.php";
use EstoreSMS\SMS;

$sms = new SMS('username', 'password');
$recipients = [081*********, 081*******];
$response = $sms->send($recipients, 'message', 'sender_id', false, true);
echo $response;
?>

```


### Response

Here is a list of possible return values

| Message  | Description |
| ------------- | ------------- |
| OK | Successful |
| 2904 | SMS sending failed |
| 2905 | Invalid username/password combination |
| 2906 | Credit exhausted |
| 2907 | Gateway unavailable |
| 2908 | Invalid schedule date format |
| 2909 | Unable to schedule |
| 2910 | Username is empty |
| 2911 | Password is empty |
| 2912 | Recipient is empty |
| 2913 | Message is empty |
| 2914 | Sender is empty |
| 2915 | One or more required fields are empty |
| 2916 | Blocked message content |
| 2917 | Blocked sender ID |
