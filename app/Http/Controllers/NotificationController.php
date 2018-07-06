<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Services\ProductService;
use App\Services\UserService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getNotification(ProductService $productService, CartService $cartService)
    {
        $product = null;
        $cart = $cartService->getCart();
        if(!empty($cart)) {
            $length = count($cart);
            $productId = $cart[$length - 1]['details']['id'];
            $product = $productService->findById($productId);
        } else {
            $product = $productService->findRecentProduct();
        }
        $result = [
            'notification' => [
                'title' => $product->name,
                'message' => $product->details,
                'icon' => $product->image_location,
                'tag' => $product->brand . '_' .$product->name,
                'redirectURL' => '/?product=' .$product->name
            ]
        ];
        return response()->json($result);
    }

    public function subscribe(Request $request)
    {
        try {
            $apiKey = config('broadcasting.connections.firebase.api_key');
            $endPoint = config('broadcasting.connections.firebase.gcm_endpoint');
            $client = new Client();
            $response = $client->request('POST', $endPoint, [
                'json' => ['registration_ids' => [$request->subscriptionId]],
                'headers' => [
                    'Authorization' => 'key=' . $apiKey
                ]
            ]);

            $this->userService->updateSimple($request->user()->id, ['notification_id' => $request->subscriptionId]);

            return response()->json($response);
        } catch(\Exception $ex)
        {
            return response()->json(['error' => 'an error occurred subscribing the worker']);
        }
    }

    public function push()
    {
        try {
            $users = $this->userService->findAllUsersUnPaged();
            $subscriptionIds = $users->pluck('notification_id');
            $apiKey = config('broadcasting.connections.firebase.api_key');
            $endPoint = config('broadcasting.connections.firebase.gcm_endpoint');
            $client = new Client();
            $response = $client->request('POST', $endPoint, [
                'json' => ['registration_ids' => $subscriptionIds->all()],
                'headers' => [
                    'Authorization' => 'key=' . $apiKey
                ]
            ]);

            return response()->json($response);
        } catch(\Exception $ex)
        {
            return response()->json(['error' => 'an error occurred subscribing the worker']);
        }
    }

}
