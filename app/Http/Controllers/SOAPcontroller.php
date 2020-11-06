<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SOAPcontroller extends Controller
{
    
    public function method2()
    {
        $client = new http\Client;
$request = new http\Client\Request;
$request->setRequestUrl('https://www.dataaccess.com/webservicesserver/NumberConversion.wso');
$request->setRequestMethod('POST');
$body = new http\Message\Body;
$body->append('<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <NumberToWords xmlns="http://www.dataaccess.com/webservicesserver/">
      <ubiNum>500</ubiNum>
    </NumberToWords>
  </soap:Body>
</soap:Envelope>');
$request->setBody($body);
$request->setOptions(array());
$request->setHeaders(array(
  'Content-Type' => 'text/xml; charset=utf-8'
));
$client->enqueue($request)->send();
$response = $client->getResponse();
echo $response->getBody();
    }
    
    //
    public function method_curl()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.dataaccess.com/webservicesserver/NumberConversion.wso",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n
            <soap:Envelope xmlns:soap=\"http://schemas.xmlsoap.org/soap/envelope/\">\n  
                <soap:Body>\n   
                    <NumberToDollars xmlns=\"http://www.dataaccess.com/webservicesserver/\">\n      
                        <dNum>500</dNum>\n    
                    </NumberToDollars>\n  
             </soap:Body>\n</soap:Envelope>",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: text/xml; charset=utf-8"
            ),
        ));
    
        $response = curl_exec($curl);
    
        curl_close($curl);
        echo $response;
    }
}
