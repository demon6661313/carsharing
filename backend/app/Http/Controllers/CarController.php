<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $cars = Car::query()->with('user')->get();
        $cars = CarResource::collection($cars)->toArray(request());

        return response()->json($cars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreCarRequest $request)
    {
        Car::query()->create([
            'brand' => $request->brand,
            'model' => $request->model,
            'vin' => $request->vin,
            'user_id' => $request->user_id,
        ]);

        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Car $car)
    {
        return response()->json([
            'brand' => $car->brand,
            'model' => $car->model,
            'vin' => $car->vin,
            'user_id' => $car->user?->id,
            'user_email' => $car->user->email,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarRequest  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $car->user_id = $request->user_id;
        $car->save();

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return response()->json();
    }
}
