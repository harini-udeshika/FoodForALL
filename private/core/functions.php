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
 
    require '../private/models/stripe-php-master/init.php';

    $stripe = new \Stripe\StripeClient('sk_test_51Mkpm2KZpyK8KvAZPZUbc2YT3M7NSnfuXhjrZI5QpKCMeHDwY7p97hGQN4EItsLfdNS5JB4v4xHuskzONTsRv4cf004Mpw8QQV');

    $checkout_session = $stripe->checkout->sessions->create([
        'line_items' => [[
            'price_data' => [
                'currency' => 'lkr',
                'product_data' => [
                    'name' => 'Order#'.$data['order_id'],
                    'description'=>'Delivered to: '.$data['name'].','.$data['address']
                ],
                'unit_amount' => $data['subtotal']*100,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'metadata'=>[
            'user_id'=>$data['user_id'],
            'date'=>$data['date']
        ],

        'success_url' => 'http://localhost/food_for_all/public/thanks',
        'cancel_url' => 'http://localhost/food_for_all/public/cancel',
    ]);

    header("HTTP/1.1 303 See Other");
    header("Location: " . $checkout_session->url);

}
function donate_checkout($data)
{
 
    require '../private/models/stripe-php-master/init.php';

    $stripe = new \Stripe\StripeClient('sk_test_51Mkpm2KZpyK8KvAZPZUbc2YT3M7NSnfuXhjrZI5QpKCMeHDwY7p97hGQN4EItsLfdNS5JB4v4xHuskzONTsRv4cf004Mpw8QQV');

    $checkout_session = $stripe->checkout->sessions->create([
        'line_items' => [[
            'price_data' => [
                'currency' => 'lkr',
                'product_data' => [
                    'name' => 'Donation#'.$data['_id'],
                    'description'=>'Delivered to: '.$data['name'].','.$data['address']
                ],
                'unit_amount' => $data['subtotal']*100,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'metadata'=>[
            'user_id'=>$data['user_id'],
            'date'=>$data['date']
        ],

        'success_url' => 'http://localhost/food_for_all/public/thanks',
        'cancel_url' => 'http://localhost/food_for_all/public/cancel',
    ]);

    header("HTTP/1.1 303 See Other");
    header("Location: " . $checkout_session->url);

}
