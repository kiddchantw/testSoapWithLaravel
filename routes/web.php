<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/soap/m1','App\Http\Controllers\SOAPcontroller@method_curl');


Route::get('/hello', function () {
    echo 'hello';
    echo '<br>';


    // try {
    //     $opts = array(
    //         'http' => array(
    //             'user_agent' => 'PHPSoapClient'
    //         )
    //     );
    //     $context = stream_context_create($opts);

    //     $wsdlUrl = $someURL;
    //     $soapClientOptions = array(
    //         'stream_context' => $context,
    //         'cache_wsdl' => WSDL_CACHE_NONE
    //     );

    //     $client = new SoapClient($wsdlUrl, $soapClientOptions);

    //     $checkVatParameters = array(
    //         'countryCode' => 'DK',
    //         'vatNumber' => '47458714'
    //     );

    //     $result = $client->checkVat($checkVatParameters);
    //     print_r($result);
    // }
    // catch(Exception $e) {
    //     echo $e->getMessage();
    // }



    //m1

    // $originalXML = "
    // <xml>
    //   <firstClient>
    //       <name>someone</name>
    //       <adress>R. 1001</adress>
    //   </firstClient>
    //   <secondClient>
    //       <name>another one</name>
    //       <adress></adress>
    //   </secondClient>
    // </xml>"
    // $someURL ='https://www.dataaccess.com/webservicesserver/NumberConversion.wso';

    //Translate the XML above in a array, like PHP SOAP function requires
    // $myParams = array(
    //     'NumberToDollars' => array(
    //         'dNum' => '500',
    //         )
    //     );
    // $webService = new SoapClient($someURL);
    // $result = $webService->someWebServiceFunction($myParams);
    // var_dump($result);
});
