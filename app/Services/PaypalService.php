<?php

namespace App\Services;


use App\Models\Order;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class PaypalService
{
    private $client;
    private $client_id;
    private $client_secret;

    function __construct($client_id,$client_secret)
    {
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;

        $environment = new SandboxEnvironment($this->client_id,$this->client_secret);
        $this->client = new PayPalHttpClient($environment);
    }

    public function createOrder($orderId)
    {
        $store = Order::find($orderId)->store;
        $request = new OrdersCreateRequest();
        $request->headers["prefer"] = "return=representation";
        $request->body = $this->checkoutData($orderId);
        //$request->body = $this->simpleCheckoutData($orderId);
        try {
            return $this->client->execute($request);
        }
        catch(\Exception $e){
            dd($e->getMessage());
            abort(500);
        }
    }

    public function captureOrder($paypalOrderId)
    {
        $request = new OrdersCaptureRequest($paypalOrderId);
        return $this->client->execute($request);
    }

    private function simpleCheckoutData($orderId)
    {
        $order = Order::find($orderId);
        return [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => 'webmall_'. uniqid(),
                "amount" => [
                    "value" => $order->payedTotal,
                    "currency_code" => "USD"
                ]
            ]],
            "application_context" => [
                "cancel_url" => route('paypal.cancel'),
                "return_url" => route('paypal.success', $orderId)
            ]
        ];
    }


    private function checkoutData($orderId)
    {
        $order = Order::find($orderId);
        $orderItems = [];
        foreach($order->products as $item) {

            $orderItems[] = [
                'name' => $item->name,
                'description' => substr($item->description,0,30)."...",
                'quantity' => $item->pivot->quantity,
                'unit_amount' => [
                    'currency_code' => 'USD',
                    'value' => $item->price
                ],
                'tax' =>
                    [
                        'currency_code' => 'USD',
                        'value' => '0',
                    ],
                'category' => 'PHYSICAL_GOODS',

            ];

        }



        $checkoutData = [
            'intent' => 'CAPTURE',
            'application_context' =>
                [
                    'return_url' => route('paypal.success', $orderId),
                    'cancel_url' => route('paypal.cancel'),
                    'brand_name' => 'WEBMALL',
                    'locale' => 'en-US',
                    'landing_page' => 'BILLING',
                    'shipping_preference' => 'SET_PROVIDED_ADDRESS',
                    'user_action' => 'PAY_NOW',
                ],
            'purchase_units' => [
                [
                    'reference_id' =>  uniqid(),
                    'description' => 'Order number'.$order->number,
                    'custom_id' => 'CUST-HighFashions',
                    'soft_descriptor' => 'HighFashions',
                    'items' => $orderItems,
                    'shipping' =>
                        [
                            'method' => 'United States Postal Service',
                            'name' =>
                                [
                                    'full_name' => $order->client->lastName.' '.$order->client->firstName,
                                ],
                            'address' =>
                                [
                                    'address_line_1' => $order->client->address,
                                    'address_line_2' => '',
                                    'admin_area_2' => $order->client->city,
                                    'admin_area_1' => '',
                                    'postal_code' => $order->client->postCode,
                                    'country_code' => 'MA',
                                ],
                        ],
                    'amount' =>
                        [
                            'currency_code' => 'USD',
                            'value' => $order->payedTotal,
                            'breakdown' =>
                                [
                                    'item_total' =>
                                        [
                                            'currency_code' => 'USD',
                                            'value' => $order->payedTotal,
                                        ],
                                    'shipping' =>
                                        [
                                            'currency_code' => 'USD',
                                            'value' => '0',
                                        ],
                                    'handling' =>
                                        [
                                            'currency_code' => 'USD',
                                            'value' => '0',
                                        ],
                                    'tax_total' =>
                                        [
                                            'currency_code' => 'USD',
                                            'value' => '0',
                                        ],
                                    'shipping_discount' =>
                                        [
                                            'currency_code' => 'USD',
                                            'value' => '0',
                                        ],
                                ],
                        ],
                ]
            ],

        ];

        return $checkoutData;
    }
}
