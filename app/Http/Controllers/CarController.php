<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\CarCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CarController extends Controller
{
    /**
     * Display a listing of the cars.
     */
    public function index()
    {
        $categories = Category::all();
        $models = CarModel::all();
        $brands = Brand::all();
        $cars = Car::with(['brand', 'carModel', 'category', 'user'])
            ->latest()
            ->paginate(10);

        return view('cars.index', compact('cars', 'brands', 'models', 'categories'));
    }

    /**
     * Show the form for creating a new car.
     */
    public function create()
    {
        $brands = Brand::all();
        $models = CarModel::all();
        $categories = Category::all();

        return view('cars.add', compact('brands', 'models', 'categories'));
    }

    /**
     * Store a newly created car in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_id' => 'required|exists:car_brands,id',
            'car_model_id' => 'required|exists:car_models,id',
            'category_id' => 'required|exists:car_categories,id',
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'kilometer_age' => 'required|integer|min:0',
            'transmission' => 'required|in:manual,automatic',
            'fuel_type' => 'required|in:petrol,diesel,electric,hybrid',
            'condition' => 'required|in:new,used',
            'price' => 'required|numeric|min:0',
            'engine' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(5);

        Car::create($validated);

        return redirect()->route('cars.index')->with('success', 'Car created successfully.');
    }

    /**
     * Display the specified car.
     */
    public function show(Car $car)
    {
        $car->increment('views');

        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified car.
     */
    public function edit(Car $car)
    {
        $brands = Brand::all();
        $models = CarModel::all();
        $categories = Category::all();

        return view('cars.edit', compact('car', 'brands', 'models', 'categories'));
    }

    /**
     * Update the specified car in storage.
     */
    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'brand_id' => 'required|exists:car_brands,id',
            'car_model_id' => 'required|exists:car_models,id',
            'category_id' => 'required|exists:car_categories,id',
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'kilometer_age' => 'required|integer|min:0',
            'transmission' => 'required|in:manual,automatic',
            'fuel_type' => 'required|in:petrol,diesel,electric,hybrid',
            'condition' => 'required|in:new,used',
            'price' => 'required|numeric|min:0',
            'engine' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'in:pending,approved,sold,rejected',
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(5);

        $car->update($validated);

        return redirect()->route('cars.index')->with('success', 'Car updated successfully.');
    }

    /**
     * Remove the specified car from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
    }
}
