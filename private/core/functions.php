<?php

function get_var($key)
{

    if (isset($_POST[$key])) {
        return $_POST[$key];
    }
}

function get_select()
{

}

function esc($var)
{
    return htmlspecialchars($var);
}

function stripe_checkout($data)
{
    $order = new Merchandise_purchase();
    require '../private/models/stripe-php-master/init.php';

    $stripe = new \Stripe\StripeClient ('sk_test_51Mkpm2KZpyK8KvAZPZUbc2YT3M7NSnfuXhjrZI5QpKCMeHDwY7p97hGQN4EItsLfdNS5JB4v4xHuskzONTsRv4cf004Mpw8QQV');

    $checkout_session = $stripe->checkout->sessions->create([
        'line_items' => [[
            'price_data' => [
                'currency' => 'lkr',
                'product_data' => [
                    'name' => 'Order#' . $data['order_id'],
                    'description' => 'Delivered to: ' . $data['name'] . ',' . $data['address'],
                ],
                'unit_amount' => $data['subtotal'] * 100,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'metadata' => [
            'user_id' => $data['user_id'],
            'date' => $data['date'],
        ],

        'success_url' => 'http://localhost/food_for_all/public/thanks?session_id={CHECKOUT_SESSION_ID}&order_id=' . $data['order_id'] . '&org_id=' . $data['org_id'],
        'cancel_url' => 'http://localhost/food_for_all/public/cancel',
    ]
    );
    $array = explode("pay", $checkout_session->url);
    $session_id = $array[1];
    $session_id = explode("#", $array[1])[0];
    $query = "update merchandise_purchase set session_id=:s_id where order_id=:id";
    $order->query($query, ['s_id' => $session_id, 'id' => $data['order_id']]);

    header("HTTP/1.1 303 See Other");

    header("Location: " . $checkout_session->url);

}
function webhook()
{
    $order = new Merchandise_purchase();

    $endpoint_secret = STRIPE_WEBHOOK_SECRET;

    $payload = @file_get_contents('php://input');
    $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
    $event = null;

    try {
        $event = \Stripe\Webhook::constructEvent(
            $payload, $sig_header, $endpoint_secret
        );
    } catch (\UnexpectedValueException $e) {
        // Invalid payload
        http_response_code(400);
        exit();
    } catch (\Stripe\Exception\SignatureVerificationException $e) {
        // Invalid signature
        http_response_code(400);
        exit();
    }

    // Handle the event
    switch ($event->type) {
        case 'checkout.session.completed':
            $session = $event->data->object;
            $session_id = '/' . $session->id;
            $query = "update merchandise_purchase set status= 1 where session_id=:s_id";
            $order->query($query, ['s_id' => $session_id]);
        // ... handle other event types
        default:
            echo 'Received unknown event type ' . $event->type;
    }

    http_response_code(200);
}
function donate_checkout($data)
{
    $donate = new Donate();
    require '../private/models/stripe-php-master/init.php';

    $stripe = new \Stripe\StripeClient ('sk_test_51Mkpm2KZpyK8KvAZPZUbc2YT3M7NSnfuXhjrZI5QpKCMeHDwY7p97hGQN4EItsLfdNS5JB4v4xHuskzONTsRv4cf004Mpw8QQV');

    $checkout_session = $stripe->checkout->sessions->create([
        'line_items' => [[
            'price_data' => [
                'currency' => 'lkr',
                'product_data' => [
                    'name' => 'Donation#' . $data['id'],
                    'description' => 'Donate to: ' . $data['name'],
                ],
                'unit_amount' => $data['amount'] * 100,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'metadata' => [
            'user_id' => $data['donor_id'],
            'date' => date('Y-m-d'),
        ],

        'success_url' => 'http://localhost/food_for_all/public/donation_success?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => 'http://localhost/food_for_all/public/cancel',
    ]);
    $array = explode("pay", $checkout_session->url);
    $session_id = $array[1];
    $session_id = explode("#", $array[1])[0];
    $query = "update donate set session_id=:s_id where donation_id=:id";
    $donate->query($query, ['s_id' => $session_id, 'id' => $data['id']]);
    header("HTTP/1.1 303 See Other");

    header("Location: " . $checkout_session->url);

}
