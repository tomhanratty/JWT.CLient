    
<?php

require '../model/JWTClient.php';
require '../model/user_db.php';



session_start();
if (isset($_SESSION['api_key'])) {
    $api_key = $_SESSION['api_key'];
} else {
    $api_key = null;
}



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_req_login';
    }
}

$basicUrl = "http://localhost/JWTServer/index.php";


switch ($action) {

    case'show_req_login':
        include'../view/login_form.php';
        break;

    case 'login':
        $userName = filter_input(INPUT_POST, 'userName');
        $password = filter_input(INPUT_POST, 'password');
        loginUser($userName, $password);
        include'../view/home.php';
        break;

    case'show_req_register':
        include'../view/register_form.php';
        break;

    case'view_home';
        include'../view/home.php';
        break;

    case'register':
        $userName = filter_input(INPUT_POST, 'userName');
        $password = filter_input(INPUT_POST, 'password');
        $memType = filter_input(INPUT_POST, 'memType');

        addUser($userName, $password, $memType);

        $keyReq = "?userName=" . $userName
                . "&password=" . $password
                . "&memType=" . $memType
                . "&Service=Request_key";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $basicUrl . $keyReq);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
        $api_key = curl_exec($ch);
        curl_close($ch);

        updateUserApiKey($userName, $api_key, $password);

        $_SESSION['api_key'] = $api_key;
        include '../view/home.php';
        break;

    case'show_token':

        include '../view/show_token.php';
        break;

    case'show_req_register_for_service':
        include'../view/register_for_service.php';
        break;

    case'register_for_service':
        $userName = filter_input(INPUT_GET, 'userName');
        $password = filter_input(INPUT_GET, 'password');
        $memType = filter_input(INPUT_GET, 'memType');
        $keyReq = "?userName=" . $userName
                . "&password=" . $password
                . "&memType=" . $memType
                . "&Service=Register";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $basicUrl . $keyReq);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
        $api_key = curl_exec($ch);
        curl_close($ch);

        include '../view/home.php';
        break;

    case'show_request_token';
        include '../view/request_token_form.php';
        break;

    case'request_token';
        $userName = filter_input(INPUT_POST, 'userName');
        $password = filter_input(INPUT_POST, 'password');
        $memType = filter_input(INPUT_POST, 'memType');
        $keyReq = "?userName=" . $userName
                . "&password=" . $password
                . "&memType=" . $memType
                . "&Service=Request_key";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $basicUrl . $keyReq);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
        $api_key = curl_exec($ch);
        curl_close($ch);

        updateUserApiKey($userName, $api_key, $password);
        updateUserMemType($userName, $memType, $password);

        $_SESSION['api_key'] = $api_key;
        include '../view/show_token.php';
        break;

    case'req_service1':
        $keyReq = "?api_key=" . $api_key . "&Service=Service1";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $basicUrl . $keyReq);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
        $response = curl_exec($ch);
        curl_close($ch);

        include '../view/show_response.php';
        break;

    case'all_teams':
        $keyReq = "?api_key=" . $api_key . "&Service=Service2";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $basicUrl . $keyReq);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
        $response = json_decode(curl_exec($ch), TRUE);
        curl_close($ch);



        include '../view/show_response_all_teams.php';

        break;

    case'req_singleTeam':
        include '../view/single_team_form.php';
        break;

    case'singleTeam':
        $homeTeam = filter_input(INPUT_POST, 'homeTeam');

        $keyReq = "?api_key=" . $api_key . "&homeTeam=" . $homeTeam . "&Service=Single_team";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $basicUrl . $keyReq);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
        $response = json_decode(curl_exec($ch), TRUE);
        curl_close($ch);
        if ($response != "you must be a premium member") {
            include '../view/show_response_single.php';
        } else {
            include '../view/error.php';
        }
        break;

    case'req_twoTeam':
        include '../view/two_team_form.php';
        break;

    case'twoTeam':
        $homeTeam = filter_input(INPUT_POST, 'homeTeam');
        $awayTeam = filter_input(INPUT_POST, 'awayTeam');

        $keyReq = "?api_key=" . $api_key . "&homeTeam=" . $homeTeam . "&awayTeam=" . $awayTeam . "&Service=Two_team";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $basicUrl . $keyReq);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
        $response = json_decode(curl_exec($ch), TRUE);
        curl_close($ch);

        if ($response != "you must be a premium member") {
            include '../view/show_response_two_teams.php';
        } else {
            include '../view/error.php';
        }
        break;
}

