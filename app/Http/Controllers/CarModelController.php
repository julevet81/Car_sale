<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CarModel;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
     public function index()
    {
        $brands = Brand::all();
        $car_models = CarModel::all();
        return view('car_model.index', compact('car_models', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        return view('car_model.add', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands',
            'brand_id' => 'required|exists:brands,id',
        ]);
        CarModel::create($request->all());
        return redirect()->route('car_model.index')->with('success', 'Brand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CarModel $car_model)
    {
        $car_modelData = [
            'Name' => $car_model->name,
            'Brand' => $car_model->brand->name,
            'Created At' => $car_model->created_at->format('Y-m-d H:i:s'),
            'Updated At' => $car_model->updated_at->format('Y-m-d H:i:s'),
        ];
        return view('car_model.show', compact('car_modelData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarModel $car_model)
    {
        $brands = Brand::all();
        return view('car_model.add', compact('car_model', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarModel $carModel)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:brands,name,' . $carModel->id,
            'brand_id' => 'required|exists:brands,id',
        ]);

        $carModel->update($request->all());

        return redirect()->route('car_model.index')->with('success', 'Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarModel $carModel)
    {
        $carModel->delete();
        return redirect()->route('car_model.index')->with('success', 'Brand deleted successfully.');
    }
}
