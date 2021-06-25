<?php



function login($email, $password)
{

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => env('apiUrl') . '/user/login',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => http_build_query([
            'email' => $email,
            'password' => $password
        ], '\n'),
        CURLOPT_HTTPHEADER => array(
            'Authorization: ' . env('bearerToken'),
            'Content-Type: application/x-www-form-urlencoded',
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $result = json_decode($response);
    if(isset($result->user_id))
    {
        $session = \Config\Services::session();

        $session->set("user_id", $result->user_id);
        $session->set("role", $result->role);
    }

}
function client_login($email, $password)
{

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => env('apiUrl') . '/client/login',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => http_build_query([
            'email' => $email,
            'password' => $password
        ], '\n'),
        CURLOPT_HTTPHEADER => array(
            'Authorization: ' . env('bearerToken'),
            'Content-Type: application/x-www-form-urlencoded',
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $result = json_decode($response);
    if(isset($result->user_id))
    {
        $session = \Config\Services::session();

        $session->set("client_id", $result->user_id);
    }

}