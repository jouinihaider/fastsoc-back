<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    /**
     * Display the specified customer.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        // Find Customer by ID
        $customer = Customer::findOrFail($id);

        // Return result
        return response()->json(['customer' => new CustomerResource ($customer)], 200);
    }

    /**
     * Display a listing of the customers.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        // Get customers list
        $customers = Customer::all();

        // Return result
        return response()->json(['customers' => CustomerResource::collection($customers)], 200);
    }

    /**
     * Store a newly created customer in storage.
     *
     * @param StoreCustomerRequest $request
     * @return JsonResponse
     */
    public function store(StoreCustomerRequest $request): JsonResponse
    {
        // Get the request data
        $data = $request->all();

        // Create a new customer with the provided data
        $customer = Customer::create($data);

        // Return result
        return response()->json(['customer' => new CustomerResource ($customer)], 201);
    }

    /**
     * Update the specified customer in storage.
     *
     * @param UpdateCustomerRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateCustomerRequest $request, int $id): JsonResponse
    {
        // Get the request data
        $data = $request->all();

        // Find the customer by their ID
        $customer = Customer::findOrFail($id);

        // Update the customer attributes with the provided data
        $customer->update($request->all());

        // Return the updated customer data in a JSON response
        return response()->json(['customer' => new CustomerResource($customer)], 200);
    }

    /**
     * Remove the specified customer from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        // Find the customer by their ID
        $customer = Customer::findOrFail($id);

        // Delete the customer
        $customer->delete();

        // Return the result indicating successful deletion
        return response()->json(['message' => 'Customer deleted successfully'], 200);
    }

    /**
     * Search for client information using the SIRET or SIREN number.
     *
     * @param Request $request The incoming HTTP request.
     * @return JsonResponse The JSON response containing the client information.
     */
    public function search(Request $request): JsonResponse
    {
        // Get the SIRET or SIREN number of the client from the request
        $siretOrSiren = $request->input('siret_or_siren');

        // Authenticate and obtain the access token for the SIRENE API
        $token = $this->getAccessToken();

        // Initialize GuzzleHttp client
        $client = new Client([
            'base_uri' => 'https://api.insee.fr/entreprises/sirene/V3.11/',
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ],
        ]);

        try {
            // Send a request to the SIRENE API to obtain the client information
            $responseSiren = $client->get('siren/' . $siretOrSiren);

            // Handle successful response from the first API
            $customerData = json_decode($responseSiren->getBody(), true);
            return response()->json(['Response Siren' => $customerData], 200);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // If the first API call failed, make a second API call
            try {
                $responseSiret = $client->get('siret/' . $siretOrSiren);

                // Handle successful response from the second API
                $customerData = json_decode($responseSiret->getBody(), true);
                return response()->json(['Response Siret' => $customerData], 200);
            } catch (\GuzzleHttp\Exception\RequestException $e) {
                // If both API calls failed, return a generic error response
                return response()->json([
                    'error siren' => json_decode($e->getResponse()->getBody(), true),
                    'error siret' => json_decode($e->getResponse()->getBody(), true),
                ], 500);
            }
        }
    }
    /**
     * Obtain an access token from the INSEE API.
     *
     * @return string The access token.
     * @throws GuzzleException Thrown if there's an error with the Guzzle HTTP client.
     */
    private function getAccessToken(): string
    {
        // Create a new HTTP client instance.
        $client = new Client();

        // Make a POST request to the INSEE API to obtain an access token.
        $response = $client->request('POST', 'https://api.insee.fr/token', [
            'form_params' => [
                'grant_type' => 'client_credentials',
            ],
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode(env('CLIENT_ID') . ':' . env('CLIENT_SECRET')),
                'Accept'        => 'application/json',
            ],
        ]);

        // Parse the JSON response.
        $responseData = json_decode($response->getBody()->getContents(), true);

        // Return the access token from the response.
        return $responseData['access_token'];
    }

}
