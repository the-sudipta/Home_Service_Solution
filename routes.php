<?php

// Define routes
$routes = [
    'INDEX' => '/index.php',
    '500_error' => '/view/Error_500.php',

    'login_decider' => '/view/Login_Decider.php',
    'signup_decider' => '/view/Signup_Decider.php',

    'customer_login' => '/view/customer/Login.php',
    'service_provider_login' => '/view/service_provider/Login.php',

    'customer_dashboard' => '/view/customer/Dashboard.php',
    'service_provider_dashboard' => '/view/service_provider/Dashboard.php',

    'customer_signup' => '/view/customer/Signup.php',
    'service_provider_signup' => '/view/service_provider/Signup.php',

//  Customer

    'customer_request' => '/view/customer/RequestService.php',
    'customer_cancel_order' => '/view/customer/Cancel_Order.php',
    'customer_review_form' => '/view/customer/Review.php',
    'customer_review_list' => '/view/customer/Review_List.php',

//    Service-Provider

    'service_provider_all_requests' => '/view/service_provider/All_Requests.php',
    'service_provider_re_schedule' => '/view/service_provider/Re_Schedule.php',
    'service_provider_re_schedule_form' => '/view/service_provider/Re_Schedule_Form.php',
    'service_provider_my_profile' => '/view/service_provider/My_Profile.php',

];

$backend_routes = [
    'customer_login_controller' => '/controller/customer/LoginController.php',
    'service_provider_login_controller' => '/controller/Service_provider/LoginController.php',

    'customer_signup_controller' => '/controller/customer/SignupController.php',
    'service_provider_signup_controller' => '/controller/Service_provider/SignupController.php',

    'logout_controller' => '/controller/LogoutController.php',

    'request_service_controller' => '/controller/customer/RequestServiceController.php',

//    Customer

    'customer_cancel_order_controller' => '/controller/customer/CancelOrderController.php',
    'review_controller' => '/controller/customer/ReviewController.php',

//    Service-Provider

    'service_provider_all_request_accept_controller' => '/controller/Service_provider/All_Request_AcceptController.php',
    'my_profile_controller' => '/controller/Service_provider/My_ProfileController.php',
    're_schedule_controller' => '/controller/Service_provider/Re_Schedule_Controller.php',



];


$image_routes = [
    'user_icon' => '/view/static/image/user.png',
    'customer_icon' => '/view/static/image/customer.png',
    'service_provider_icon' => '/view/static/image/service_provider.png',

    'logo_icon' => '/view/static/image/logo.png',
];

?>
