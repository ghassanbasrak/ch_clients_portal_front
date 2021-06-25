<?php

function user_id()
{
    $session = \Config\Services::session();
    return $session->get('user_id');
}

function create_client(array $data)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => env('apiUrl') . '/client',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => http_build_query($data, '\n'),
        CURLOPT_HTTPHEADER => array(
            'Authentication: '.user_id(),
            'Authorization: Bearer 365ef3b72db63182c449c785e5ad397c2d2b2ee9',
            'Content-Type: application/x-www-form-urlencoded',
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $result = json_decode($response);
    if($result->id)
        return true;
    return false;

}

function create_invoice(array $data)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => env('apiUrl') . '/invoice',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => http_build_query($data, '\n'),
        CURLOPT_HTTPHEADER => array(
            'Authentication: '.user_id(),
            'Authorization: Bearer 365ef3b72db63182c449c785e5ad397c2d2b2ee9',
            'Content-Type: application/x-www-form-urlencoded',
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $result = json_decode($response);
    if($result->id)
        return true;
    return false;
}

function create_service(array  $data)
{

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => env('apiUrl') . '/service',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => http_build_query($data, '\n'),
        CURLOPT_HTTPHEADER => array(
            'Authentication: '.user_id(),
            'Authorization: Bearer 365ef3b72db63182c449c785e5ad397c2d2b2ee9',
            'Content-Type: application/x-www-form-urlencoded',
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $result = json_decode($response);
    if($result->id)
        return true;
    return false;
}

function update_service($id, array $data)
{


    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => env('apiUrl') . '/service/' . $id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => http_build_query($data, '\n'),
        CURLOPT_HTTPHEADER => array(
            'Authentication: '.user_id(),
            'Authorization: Bearer 365ef3b72db63182c449c785e5ad397c2d2b2ee9',
            'Content-Type: application/x-www-form-urlencoded',
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $result = json_decode($response);
    if($result->id)
        return true;
    return false;
}


function update_user($id, array $data)
{


    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => env('apiUrl') . '/user/' . $id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => http_build_query($data, '\n'),
        CURLOPT_HTTPHEADER => array(
            'Authentication: '.user_id(),
            'Authorization: Bearer 365ef3b72db63182c449c785e5ad397c2d2b2ee9',
            'Content-Type: application/x-www-form-urlencoded',
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $result = json_decode($response);
    if($result->id)
        return true;
    return false;
}


function update_client($id, array $data)
{


    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => env('apiUrl') . '/client/' . $id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => http_build_query($data, '\n'),
        CURLOPT_HTTPHEADER => array(
            'Authentication: '.user_id(),
            'Authorization: Bearer 365ef3b72db63182c449c785e5ad397c2d2b2ee9',
            'Content-Type: application/x-www-form-urlencoded',
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $result = json_decode($response);
    if($result->id)
        return true;
    return false;
}




function update_database($id, array $data)
{


    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => env('apiUrl') . '/database/' . $id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => http_build_query($data, '\n'),
        CURLOPT_HTTPHEADER => array(
            'Authentication: '.user_id(),
            'Authorization: Bearer 365ef3b72db63182c449c785e5ad397c2d2b2ee9',
            'Content-Type: application/x-www-form-urlencoded',
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $result = json_decode($response);
    if($result->client_id)
        return true;
    return false;
}

function create_user(array $data)
{

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => env('apiUrl') . '/user/register',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => http_build_query($data, '\n'),
        CURLOPT_HTTPHEADER => array(
            'Authentication: '.user_id(),
            'Authorization: Bearer 365ef3b72db63182c449c785e5ad397c2d2b2ee9',
            'Content-Type: application/x-www-form-urlencoded',
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $result = json_decode($response);

    if($result->id)
        return true;
    return false;

}

function get_users()
{

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => env('apiUrl') . '/user',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authentication: '.user_id(),
            'Authorization: ' . env('bearerToken'),
            'Content-Type: application/x-www-form-urlencoded',
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $result = json_decode($response);
    return $result;
}

function get_invoices()
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => env('apiUrl') . '/invoice',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authentication: '.user_id(),
            'Authorization: ' . env('bearerToken'),
            'Content-Type: application/x-www-form-urlencoded',
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $result = json_decode($response);
    return $result;

}
function get_clients()
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => env('apiUrl') . '/client',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authentication: '.user_id(),
            'Authorization: ' . env('bearerToken'),
            'Content-Type: application/x-www-form-urlencoded',
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $result = json_decode($response);
    return $result;

}


function get_client_invoices($client_id)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => env('apiUrl') . '/client_invoices/' . $client_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authentication: '.user_id(),
            'Authorization: ' . env('bearerToken'),
            'Content-Type: application/x-www-form-urlencoded',
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $result = json_decode($response);
    return $result;

}
function get_services()
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => env('apiUrl') . '/service',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: ' . env('bearerToken'),
            'Authentication: '.user_id(),
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $result = json_decode($response);
    return $result;

}

function get_service($id)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => env('apiUrl') . '/service/' . $id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: ' . env('bearerToken'),
            'Authentication: '.user_id(),
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $result = json_decode($response);
    return $result;
}

function get_user($id)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => env('apiUrl') . '/user/' . $id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: ' . env('bearerToken'),
            'Authentication: '.user_id(),
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $result = json_decode($response);
    return $result;
}

function get_invoice($id)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => env('apiUrl') . '/invoice/' . $id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: ' . env('bearerToken'),
            'Authentication: '.user_id(),
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $result = json_decode($response);
    return $result;
}

function get_client($id)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => env('apiUrl') . '/client/' . $id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: ' . env('bearerToken'),
            'Authentication: '.user_id(),
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $result = json_decode($response);
    return $result;
}