<?php

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');
    header('Access-Control-Allow-Methods: *');
    header('Access-Control-Allow-Credentials: true');

    header('Content-type: json/application');

    require 'config.php';
    require 'functions.php';

    $method = $_SERVER['REQUEST_METHOD'];

    $q = $_GET['q'];
    $params = explode('/', $q);

    $type = $params[0];

    if(isset($params[1])) {
        $id = $params[1];
    }

    switch($method) {
        case 'GET':
            if($type === 'orders') {
                if(isset($id)) {
                    getOrder($connect, $id);
                } else {
                    getOrders($connect);
                }
            }
            elseif($type === 'reviews') {
                if(isset($id)) {
                    getReview($connect, $id);
                } else {
                    getReviews($connect);
                }
            }
            elseif($type === 'contacts') {
                getContacts($connect);
            }
            elseif($type === 'prava') {
                getPrava($connect);
            } 
        break;
        case 'POST':
           if($type === 'orders') {
                addOrder($connect, $_POST);
           }
           if($type === 'reviews') {
                addReview($connect, $_POST);
           }
        break;
        case 'PATCH':
            if($type === 'orders') {
                if(isset($id)) {
                    $data = file_get_contents('php://input');
                    $data = json_decode($data, true);
                    updateOrder($connect, $id, $data);
                }
            }
            elseif($type === 'contacts') {
                $data = file_get_contents('php://input');
                $data = json_decode($data, true);
                updateContacts($connect, $data);
            }
        break;
        case 'DELETE':
            if($type === 'orders') {
                if(isset($id)) {
                    deleteOrder($connect, $id);
                }
            }
            elseif($type === 'reviews') {
                if(isset($id)) {
                    deleteReview($connect, $id);
                }
            }
        break;

    }
?>