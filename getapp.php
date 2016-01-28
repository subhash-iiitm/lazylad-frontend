
<?php
$send_to=isset($_POST['mobile'])?$_POST['mobile']:null;
$message="Download link "
$curl = curl_init();

$url=http://www.angulartechnologies.com/newserver/oms/send_sms;
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url,

    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => array(
        send_to => $send_to,
        message =>$msg
    )
));

$resp = curl_exec($curl);

curl_close($curl);