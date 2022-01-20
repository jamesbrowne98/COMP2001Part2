

<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../src/model/DataAccess.php';
include_once '../src/model/statistics_crime.php';

if(!isset($db)) {
    $db = new DataAccess();
}

$crimes = $db->Statistics_Crime();

if($crimes)
{
    $code = 200;
    header_remove();
    http_response_code($code);
    header('Content-Type: application/json');
    header('Status: '.$code);

    echo getSemanticMarkup($crimes);
}
else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No crimes found.")
    );
}

function getSemanticMarkup($response)
{
    $SemanticResult = '{ "@context" : { "Place" : "http://schema.org", "cr" : "http://web.socem.plymouth.ac.uk" }, "Place" : [ ';

    foreach($response as $Entries)
    {
        $SemanticResult .= '{ "@type" : "Place",
                "offence" : "'.$Entries->Offence().'",
                "Y2003" : "'.$Entries->Year().'",
                "Y2004" : "'.$Entries->YearTwo().'",
                "Y2005" : "'.$Entries->YearThree().'" },';

    }
    //remove the traliing comma from the end
    $SemanticResult = substr($SemanticResult, 0, -1);
    $SemanticResult .= ']}';

    return $SemanticResult;
}

function returnJSON($response, $code)
{
    header_remove();
    http_response_code($code);
    header('Content-Type: application/json');
    header('Status: '.$code);
    return json_encode(array('status' => $code, 'message' => $response));
}
