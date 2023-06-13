<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ShippingController extends Controller
{
    protected $rajaOngkirKey;
    protected $rajaOngkirBaseUrl;

    public function __construct()
    {
        $this->rajaOngkirKey = config('services.rajaongkir.api_key');
        $this->rajaOngkirBaseUrl = config('services.rajaongkir.base_url');
    }

    public function index()
    {
        $client = new Client();

        $response = $client->request('GET', $this->rajaOngkirBaseUrl . '/city', [
            'headers' => [
                'key' => $this->rajaOngkirKey
            ]
        ]);

        $result = json_decode($response->getBody(), true);

        $origins = $result['rajaongkir']['results'];

        return view('shipping')->with('origins', $origins);
    }

    public function getOrigins()
    {
        $client = new Client();

        $response = $client->request('GET', $this->rajaOngkirBaseUrl . '/city', [
            'headers' => [
                'key' => $this->rajaOngkirKey
            ]
        ]);

        $result = json_decode($response->getBody(), true);

        return response()->json(['origins' => $result['rajaongkir']['results']]);
    }

    public function getDestinations(Request $request)
    {
        $originId = $request->input('origin_id');

        $client = new Client();

        $response = $client->request('GET', $this->rajaOngkirBaseUrl . '/city?province=' . $originId, [
            'headers' => [
                'key' => $this->rajaOngkirKey
            ]
        ]);

        $result = json_decode($response->getBody(), true);

        return response()->json(['destinations' => $result['rajaongkir']['results']]);
    }

    public function calculateShipping(Request $request)
    {
        $originId = $request->input('origin_id');
        $destinationId = $request->input('destination_id');
        $weight = $request->input('weight');

        $client = new Client();

        $response = $client->request('POST', $this->rajaOngkirBaseUrl . '/cost', [
            'headers' => [
                'key' => $this->rajaOngkirKey,
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            'form_params' => [
                'origin' => $originId,
                'destination' => $destinationId,
                'weight' => $weight,
                'courier' => 'jne' // You can adjust the courier as per your requirement
            ]
        ]);

        $result = json_decode($response->getBody(), true);

        return response()->json(['results' => $result['rajaongkir']['results']]);
    }
}
