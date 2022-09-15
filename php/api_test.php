<?php
include_once('connexion.php');
//require_once __DIR__.'/../vendor/autoload.php';
//$dotenv = new Dotenv\Dotenv(__DIR__.'/../');
//$dotenv->load();
$conn = Database::connect();
date_default_timezone_set("Europe/Paris");
$datetime_now = date("Y-m-d H:i:s");
if (isset($_GET['all'])){
    $apikey = 'PMAK-62642462da39cd50e9ab4ea7-815e244f4fdea2d2075d8966cac3b7f10b';
    $url = 'https://4ebb0152-1174-42f0-ba9b-4d6a69cf93be.mock.pstmn.io/orders';
    $url2 = 'https://4ebb0152-1174-42f0-ba9b-4d6a69cf93be.mock.pstmn.io/contacts';
    $options = array('http' => array(
        'method'  => 'GET',
        'header' => 'x-api-key: PMAK-62642462da39cd50e9ab4ea7-815e244f4fdea2d2075d8966cac3b7f10b','Content-Type: application/javascript'
    ));
    $context  = stream_context_create($options);
    $order = file_get_contents($url, false, $context);
    $contact = file_get_contents($url2, false, $context);
    $order_data = json_decode($order, true);
    $contact_data = json_decode($contact, true);
    $newArray = array_combine($order_data, $contact_data); #we can use array_combine or iterate manually more acurate;
    if(!$order_data or !$contact_data){die("Connection Failure or no data available");}
    $orderCount =  count($order_data['results']);
    $contactCount =  count($contact_data['results']);
    for($i=0; $i<$contactCount; $i++){
        $temp = array("AccountName"=>$contact_data['results'][$i]['AccountName'],"AddressLine1"=>$contact_data['results'][$i]['AddressLine1'], "AddressLine2"=>$contact_data['results'][$i]['AddressLine2'],"City"=>$contact_data['results'][$i]['City'],"ContactName"=>$contact_data['results'][$i]['ContactName'],"Country"=>$contact_data['results'][$i]['Country'],"ZipCode"=>$contact_data['results'][$i]['ZipCode']);
        try{
            $sql = $conn->prepare ("INSERT INTO contacts (customer_id, json_data) VALUES (?, ?);");
            $sql->execute([$contact_data['results'][$i]['ID'],json_encode($temp)]);
            $j++;
        }
        catch (PDOException $e){
                $f++;
       }
    } 
    //forach($order_data as $data){} or more accurate for me to use a orderCount and to get the appropriate value;
    header('Content-Type: text/csv, charset=UTF-8');
    header('Content-Disposition: attachment; filename="order_table_"'.date("Y-m-d H:i:s").'.csv');
    $document = fopen('php://output', 'w');   
    fputcsv($document, array("order", "account_name", "delivery_name", "delivery_address", "delivery_country", "delivery_zipcode", "delivery_city", "items_count", "item_index", "item_id", "item_quantity", "line_price_excl_vat", "line_price_incl_vat")); 
    for($i=0; $i<$orderCount; $i++){ 
        try{
            $sql = $conn->prepare ("INSERT INTO orders (date_time, order_id, customer_id, order_num, currency, amount, salesOrder, validated) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
            $sql->execute([$datetime_now, $order_data['results'][$i]['OrderID'], $order_data['results'][$i]['DeliverTo'], $order_data['results'][$i]['OrderNumber'], $order_data['results'][$i]['Currency'], $order_data['results'][$i]['Amount'], json_encode($order_data['results'][$i]['SalesOrderLines']['results']), 'false']);
            $j++;
        }
        catch (PDOException $e){
                $f++;
        }
        $itemCount = count($order_data['results'][$i]['SalesOrderLines']['results']);    
            for($k=0; $k<$contactCount; $k++){ 
                for($n=0; $n<$itemCount; $n++){   
                    if (($order_data['results'][$i]['DeliverTo']) == ($contact_data['results'][$k]['ID'])){                                 
                        fputcsv($document, array($order_data['results'][$i]['OrderID'],$contact_data['results'][$k]['AccountName'], $contact_data['results'][$k]['ContactName'] , $contact_data['results'][$k]['AddressLine1'] ." , ". $contact_data['results'][$k]['AddressLine2'], $contact_data['results'][$k]['Country'], $contact_data['results'][$k]['ZipCode'], $contact_data['results'][$k]['City'], $itemCount, $n, $order_data['results'][$i]['SalesOrderLines']['results'][$n]['Item'], $order_data['results'][$i]['SalesOrderLines']['results'][$n]['Quantity'], $order_data['results'][$i]['SalesOrderLines']['results'][$n]['UnitPrice'], ($order_data['results'][$i]['SalesOrderLines']['results'][$n]['UnitPrice']) + ($order_data['results'][$i]['SalesOrderLines']['results'][$n]['VATAmount'])));
                    }   
            } 
        }   
    } 
    
    fclose($document);     
    exit(); 
}


#other type of API connection usin CURL
/*
header('location:index.php');
All user data exists in 'data' object
$curl_api = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://4ebb0152-1174-42f0-ba9b-4d6a69cf93be.mock.pstmn.io/orders',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json','x-api-key: PMAK-62642462da39cd50e9ab4ea7-815e244f4fdea2d2075d8966cac3b7f10b'
  ),
));
$api_order = curl_exec($curl_api);

if($err = curl_error($curl_api)){
    echo $err;
}
else{
    $jsonDecode = json_decode($api_order, true);
    print_r($jsonDecode);
}
curl_close($curl_api);
>>>>> or we can simply use >>>>>
header('Content-Type:application/json');

#test Unitiare 

public function testGetComments()
{
    $client = $this->createAuthenticatedClient('api@api.com', 'api');
$this->execQuery($client, 'GET', null, '/api/comments');
$response = $client->getResponse();
$this->assertJsonResponse($response, 200);
$content = json_decode($response->getContent(), true);
$this->assertInternalType('array', $content);
$this->assertCount(3, $content);
$comment = $content[0];
$this->assertArrayHasKey('body', $comment);
$this->assertArrayHasKey('status', $comment);
$this->assertArrayNotHasKey('content', $comment);
$this->assertArrayNotHasKey('password', $comment['user']);
}

*/
?>


