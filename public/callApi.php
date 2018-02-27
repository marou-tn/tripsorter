<?php
/**
 * Created by PhpStorm.
 * User: marou
 * Date: 26/02/2018
 * Time: 23:29
 */


function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if (!empty($data))
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}

$method = 'POST';
$url = 'http://localhost/tripsorter/api/v1';
$data = [];
$data[] = [
    'from' => 'Madrid',
    'to' => 'Barcelona',
    'transport' => 'train',
    'transportCode' => '78A',
    'transportName' => '',
    'seat' => '45B'
];
$data[] = [
    'from' => 'Gerona Airport',
    'to' => 'Stockholm',
    'transport' => 'flight',
    'code' => 'SK455',
    'name' => '',
    'gate' => '45B',
    'seat' => '3A',
    'baggage' => 'drop at ticket counter 344'
];
$data[] = [
    'from' => 'Stockholm',
    'to' => 'New York JFK',
    'transport' => 'flight',
    'code' => 'SK22',
    'name' => '',
    'gate' => '22',
    'seat' => '7B',
    'baggage' => 'will we automatically transferred from your last leg'
];
$data[] = [
    'from' => 'Barcelona',
    'to' => 'Gerona Airport',
    'transport' => 'bus',
    'code' => '',
    'name' => 'airport bus',
    'seat' => ''
];
//var_dump($data);die;

$bcs['BoardingCards'] = json_encode($data);

$result = callAPI($method, $url, $bcs);
var_dump(json_decode($result));