<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\ItemResource;
use App\Http\Resources\OrderResource;
use App\Models\Customer;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Vendor;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{

    /**
     * Return order infos
     *
     * Return the order infos
     *
     * @group Order
     * @return JsonResponse
     */
    public function infos(): JsonResponse
    {
        // Retrieve all vendors, offers, and customers and wrap them in ItemResource
        $vendors = ItemResource::collection(Vendor::all());
        $offers = ItemResource::collection(Offer::all());
        $customers = ItemResource::collection(Customer::all());

        // Return success response containing information about vendors, offers, and customers
        return $this->success(['vendors' => $vendors, 'offers' => $offers, 'customers' => $customers]);
    }

    /**
     * Display a listing of the orders.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        // Retrieve all orders from the database
        $orders = Order::all();

        // Return a JSON response with the list of orders
        return response()->json(['orders' => OrderResource::collection($orders)], 200);
    }

    /**
     * Store a newly created order in storage.
     *
     * @param StoreOrderRequest $request
     * @return JsonResponse
     */
    public function store(StoreOrderRequest $request): JsonResponse
    {
        // Find the customer by their ID
        $customer = Customer::findOrFail($request->customer_id);

        // Create a new order instance
        $order = new Order();
        $order->offer_id = $request->offer_id;
        $order->description = $request->description;
        $order->license_count = $request->license_count;

        // Associate the customer with the order
        $order->customer()->associate($customer);

        // Save the order to the database
        $order->save();

        // Attach vendors to the order
        $order->vendors()->sync($request->vendors);

        // Load relationships before returning the response
        $order->load('customer', 'offer', 'vendors');

        // Return a JSON response with the created order and status code 201 (Created)
        return response()->json(['order' => new OrderResource($order)], 201);
    }

    /**
     * Update the specified order in storage.
     *
     * @param StoreOrderRequest $request
     * @param Order $order
     * @return JsonResponse
     */
    public function update(StoreOrderRequest $request, Order $order): JsonResponse
    {
        // Update order details
        $order->offer_id = $request->offer_id;
        $order->description = $request->description;
        $order->license_count = $request->license_count;
        $order->customer_id = $request->customer_id;
        $order->save();

        // Sync vendors with the order
        $order->vendors()->sync($request->vendors);

        // Load relationships before returning the response
        $order->load('customer', 'offer', 'vendors');

        // Return a JSON response with the updated order and status code 200 (OK)
        return response()->json(['order' => new OrderResource($order)], 200);
    }

    /**
     * Remove the specified order from storage.
     *
     * @param Order $order
     * @return JsonResponse
     */
    public function destroy(Order $order): JsonResponse
    {
        // Delete the order
        $order->delete();

        // Return a JSON response indicating successful deletion
        return response()->json(['message' => 'Order deleted successfully'], 200);
    }
}
