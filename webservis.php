<?php
function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: text/html');
    header('Access-Control-Allow-Origin: *');
}
function rest_get($request, $data) { }
function rest_post($request, $data) { }
function rest_delete($request) { }
function rest_put($request, $data) { }
function rest_error($request) { }

$method  = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];

switch($method) {
    case 'PUT':
        parse_str(file_get_contents('php://input'), $put_vars);
        zag(); $data = $put_vars; rest_put($request, $data); break;
    case 'POST':
        zag(); $data = $_POST; rest_post($request, $data); break;
    case 'GET':
        zag(); $data = $_GET; rest_get($request, $data); 
        $id = $_GET['id'];
        $veza = new PDO("mysql:dbname=league;host=localhost;charset=utf8", "admin", "admin");
     	$veza->exec("set names utf8");
		$rezultat = $veza->query("SELECT firstname, lastname,goals FROM players WHERE id = $id");
 		
 	foreach ($rezultat as $children) {

			$ime = $children['firstname'];
			$prezime = $children['lastname'];
			$golovi = $children['goals'];
			$encode = array($ime,$prezime,$golovi);
		
	}
         echo json_encode($encode);
    
        break;
	
    case 'DELETE':
        zag(); rest_delete($request); break;
    default:
        header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
        rest_error($request); break;
}

?>
