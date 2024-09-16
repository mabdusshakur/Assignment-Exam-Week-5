<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rentals = Rental::all();
        return view('admin.rentals.index', compact('rentals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = User::where('role', 'customer')->get();
        $cars = Car::where('availability', true)->get();
        $data = [
            'customers' => $customers,
            'cars' => $cars,
        ];
        return view('admin.rentals.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'total_cost' => 'nullable|numeric|',
        ]);


        $car = Car::find($request->car_id);
        $cost_calculation = $car->daily_rent_price * (strtotime($request->end_date) - strtotime($request->start_date)) / (60 * 60 * 24);
        $cost = $request->total_cost ?? $cost_calculation;

        Rental::create([
            'user_id' => $request->user_id,
            'car_id' => $request->car_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_cost' => $cost,
        ]);

        $car->update([
            'availability' => false,
        ]);

        return redirect()->route('admin.rentals.index')->with('success', 'Rental created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rental $rental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rental $rental)
    {
        $customers = User::where('role', 'customer')->get();

        $available_cars = Car::where('availability', true)->get();
        $selected_car = Car::find($rental->car_id);
        $cars = $available_cars->add($selected_car);

        $data = [
            'customers' => $customers,
            'cars' => $cars,
            'rental' => $rental,
        ];
        return view('admin.rentals.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rental $rental)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'total_cost' => 'nullable|numeric|',
        ]);

        $car = Car::find($request->car_id);
        $cost_calculation = $car->daily_rent_price * (strtotime($request->end_date) - strtotime($request->start_date)) / (60 * 60 * 24);
        $cost = $request->total_cost ?? $cost_calculation;

        if ($rental->car_id != $request->car_id) {
            $rental->car->update([
                'availability' => true,
            ]);
        }

        $rental->update([
            'user_id' => $request->user_id,
            'car_id' => $request->car_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_cost' => $cost,
        ]);

        $car->update([
            'availability' => false,
        ]);

        return redirect()->route('admin.rentals.index')->with('success', 'Rental updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rental $rental)
    {
        $rental->car->update([
            'availability' => true,
        ]);
        $rental->delete();
        return redirect()->route('admin.rentals.index')->with('success', 'Rental deleted successfully');
    }
}