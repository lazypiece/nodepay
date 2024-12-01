<?php


system("clear");
while(true){


  $sesi = "";
  $cf = "";
  $id = "";
  $auth = "";
  
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => 'https://api.nodepay.org/api/auth/session',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_COOKIE => '__cf_bm=$cf; JSESSIONID=$sesi',
  CURLOPT_HTTPHEADER => [
    'User-Agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36',
    'authorization: Bearer '.$auth,
    'content-type: application/json',
    'origin: chrome-extension://lgmpfmgeabnnlemejacfljbmonaomfmm',
    'accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7',
  ],
]);

$res = curl_exec($curl);
$json = json_decode($res);

if (isset($json->data->uid)){
   echo "Uid        : ".$json->data->uid."\n";
}else{
   echo "Login gagal "."\n";
}

if (isset($json->msg)){
   echo "Login      : ".$json->msg."\n";
}else{
   echo "Login gagal  "."\n";
}
if (isset($json->data->name)){
   echo "Nama       : ".$json->data->name."\n";
}else{
   echo "Login gagal  "."\n";
}

if (isset($json->data->balance->total_collected)){
   echo "Balance    : ".$json->data->balance->total_collected."\n";
}

if (isset($json->data->balance->season_id)){
   echo "Season     : ".$json->data->balance->season_id."\n";
}

if (isset($json->data->network_earning_rate)){
   echo "Earning    : ".$json->data->network_earning_rate."\n";
}


$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => 'https://nw.nodepay.org/api/network/ping',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => '{"id":"$id","browser_id":"1b602cdd-9210-49f7-abe3-3e3507a92727","timestamp":1732156222,"version":"2.2.7"}',
  CURLOPT_COOKIE => '__cf_bm=',
  CURLOPT_HTTPHEADER => [
    'User-Agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36',
    'Content-Type: application/json',
    'authorization: Bearer '.$auth,
    'origin: chrome-extension://lgmpfmgeabnnlemejacfljbmonaomfmm',
    'accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7',
  ],
]);
$ping = curl_exec($curl);
$json = json_decode($ping);

if (isset($json->msg)){
   echo "Ping sent  : ".$json->msg."\n";
}else{
   echo "Pong gagal : ";
}


if (isset($json->data->ip_score)){
   echo "Ping ms    : ".$json->data->ip_score."\n";
}else{
   echo "\n";
}



$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => 'https://api.nodepay.org/api/mission/complete-mission',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => '{"mission_id":"1"}',
  CURLOPT_COOKIE => '__cf_bm='.$cf,
  CURLOPT_HTTPHEADER => [
    'User-Agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36',
    'Content-Type: application/json',
    'authorization: Bearer '.$auth,
    'origin: https://app.nodepay.ai',
    'referer: https://app.nodepay.ai/',
    'accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7',
  ],
]);

$reward = curl_exec($curl);
$json = json_decode($reward);

echo "Message    : ".$json->msg ?? 'N/A';
echo "\n";
sleep(10);
echo "\n\n";


}
