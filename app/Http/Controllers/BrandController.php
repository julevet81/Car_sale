<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brands.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands',
            'description' => 'nullable|string|max:1000',
        ]);
        Brand::create($request->all());
        return redirect()->route('brand.index')->with('success', 'Brand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        $brandData = [
            'Name' => $brand->name,
            'Country' => $brand->country,
            'Logo' => $brand->logo,
            'Created At' => $brand->created_at->format('Y-m-d H:i:s'),
            'Updated At' => $brand->updated_at->format('Y-m-d H:i:s'),
        ];
        return view('brands.show', compact('brandData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:brands,name,' . $brand->id,
            'country' => 'nullable|string|max:50',
            'logo' => 'nullable|string|max:500',
        ]);

        $brand->update($request->all());

        return redirect()->route('brand.index')->with('success', 'Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brand.index')->with('success', 'Brand deleted successfully.');
    }
}
