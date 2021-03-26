<?php
include "ip.php";
echo "<br> Local ip ".$localIP;
echo "<br> public ip ".$ip;
echo "<br> mac ".$mac;
?>
<?php
$api_key = "YOUR_API_KEY";
//$headers = array('Content-Type: application/json', 'Accept: application/json', 'X-UserType: USER', 'X-SourceID: WEB', 'X-ClientLocalIP: Your_Local_IPAddress', 'X-ClientPublicIP: Your_Public_IPAddress', 'X-MACAddress: Your_MAC_Address', 'X-PrivateKey: Your_Private_Key');
$headers = array('Content-Type: application/json', 'Accept: application/json', 'X-UserType: USER', 'X-SourceID: WEB', 'X-ClientLocalIP: $localIP', 'X-ClientPublicIP: $ip', 'X-MACAddress: $mac', 'X-PrivateKey: $api_key');	    
$data["clientcode"] = "YOUR_CLIENT_CODE_HERE";
$data["password"] = "YOUR_PASSWORD_HERE";

$url = 'https://apiconnect.angelbroking.com/rest/auth/angelbroking/user/v1/loginByPassword';

$jsonData = json_encode($data);

$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_HEADEROPT, CURLHEADER_UNIFIED);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    
$result = curl_exec($curl);
$http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

echo '<br/>Response Status : ' . $http_status;
echo '<br/>Response String : ' . $result;

//To Convert json response to array
$resJsonArray = json_decode($responseContent, true);
//print_r($result);
?>
