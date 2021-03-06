<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SOAPcontroller extends Controller
{

    public function method2()
    {
        //m1的改寫。另一個專案測試ok
        $xml_data = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n
    <soap:Envelope xmlns:soap=\"http://schemas.xmlsoap.org/soap/envelope/\">\n
        <soap:Body>\n
            <NumberToDollars xmlns=\"http://www.dataaccess.com/webservicesserver/\">\n
                <dNum>500</dNum>\n
            </NumberToDollars>\n
     </soap:Body>\n</soap:Envelope>";
        $URL = "https://www.dataaccess.com/webservicesserver/NumberConversion.wso";

        $ch = curl_init($URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: text/xml; charset=utf-8"));
        $output = curl_exec($ch);
        curl_close($ch);
        print_r($output);
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
