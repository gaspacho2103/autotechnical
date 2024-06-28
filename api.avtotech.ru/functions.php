<?php
    function getPrava($connect) {
        $prava = mysqli_query($connect, "SELECT * FROM `prava`");

        $prava = mysqli_fetch_assoc($prava);

        echo json_encode($prava);
    }


    function getOrders($connect) {
        $orders = mysqli_query($connect, "SELECT * FROM `orders`");

        $ordersList = [];

        while($order = mysqli_fetch_assoc($orders)) {
            $ordersList[] = $order;
        }

        echo json_encode($ordersList);
    }

    function getOrder($connect, $id) {
        $order = mysqli_query($connect, "SELECT * FROM `orders` WHERE `id` = '$id'");

        if(mysqli_num_rows($order) === 0) {
            http_response_code(404);

            $res = [
                "status" => false,
                "message" => "Order not found"
            ];

            echo json_encode($res);
        } else {
            $order = mysqli_fetch_assoc($order);

            echo json_encode($order);
        }
    }

    function addOrder($connect, $data) {

        $name = $data['name'];
        $telephone = $data['telephone'];
        $company = $data['company'];
        $service = $data['service'];
        $type = $data['type'];
        $avto = $data['avto'];

        mysqli_query($connect, "INSERT INTO `orders`(`name`, `telephone`, `company`, `service`, `type`, `avto`) VALUES ('$name','$telephone','$company','$service','$type','$avto')");

        http_response_code(201);

        $res = [
            "status" => true,
            "order_id" => mysqli_insert_id($connect)
        ];

        echo json_encode($res);

    }

    function updateOrder($connect, $id, $data) {

        $name = $data['name'];
        $telephone = $data['telephone'];
        $company = $data['company'];
        $service = $data['service'];
        $type = $data['type'];
        $avto = $data['avto'];

        mysqli_query($connect, "UPDATE `orders` SET `name`='$name',`telephone`='$telephone',`company`='$company',`service`='$service',`type`='$type',`avto`='$avto' WHERE `id` = '$id'");

        http_response_code(200);

        $res = [
            "status" => true,
            "message" => "Order is updated"
        ];

        echo json_encode($res);
    }

    function deleteOrder($connect, $id) {
        mysqli_query($connect, "DELETE FROM `orders` WHERE `id` = '$id'");

        http_response_code(200);

        $res = [
            "status" => true,
            "message" => "Order is deleted"
        ];

        echo json_encode($res);
    }

    function getReviews($connect) {
        $reviews = mysqli_query($connect, "SELECT * FROM `reviews`");

        $reviewsList = [];

        while($review = mysqli_fetch_assoc($reviews)) {
            $reviewsList[] = $review;
        }

        echo json_encode($reviewsList);
    }

    function getReview($connect, $id) {
        $review = mysqli_query($connect, "SELECT * FROM `reviews` WHERE `id` = '$id'");

        if(mysqli_num_rows($review) === 0) {
            http_response_code(404);

            $res = [
                "status" => false,
                "message" => "Review not found"
            ];

            echo json_encode($res);
        } else {
            $review = mysqli_fetch_assoc($review);

            echo json_encode($review);
        }
    }

    function addReview($connect, $data) {
        $name = $data['name'];
        $review = $data['review'];

        mysqli_query($connect, "INSERT INTO `reviews`(`name`, `review`) VALUES ('$name', '$review')");

        http_response_code(201);

        $res = [
            "status" => true,
            "review_id" => mysqli_insert_id($connect)
        ];

        echo json_encode($res);

    }

    function getContacts($connect) {
        $contacts = mysqli_query($connect, "SELECT * FROM `contacts`");

        $contactsList = [];

        while($contact = mysqli_fetch_assoc($contacts)) {
            $contactsList[] = $contact;
        }

        echo json_encode($contactsList);
    }

    function updateContacts($connect, $data) {

        $telephone = $data['telephone'];
        $telegram = $data['telegram'];
        $email = $data['email'];
        $address = $data['address'];

        mysqli_query($connect, "UPDATE `contacts` SET `telephone`='$telephone',`telegram`='$telegram',`email`='$email',`address`='$address'");

        http_response_code(200);

        $res = [
            "status" => true,
            "message" => "Contacts is updated"
        ];

        echo json_encode($res);
    }

    function deleteReview($connect, $id) {
        mysqli_query($connect, "DELETE FROM `reviews` WHERE `id` = '$id'");

        http_response_code(200);

        $res = [
            "status" => true,
            "message" => "Review is deleted"
        ];

        echo json_encode($res);
    }
?>