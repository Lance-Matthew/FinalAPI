<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Stock;

class StockController extends Controller
{
    public function index(){
        $data = Stock::all();
        return response()->json($data);
    }

    public function show($Course){
        $data = Stock::where('Course', $Course)->get();
        return response()->json($data);
    }

    public function store(Request $request){
        $request->validate([
            'stockName' => 'required|max:20|string',
            'stockPhoto' => 'required|mimes:png,jpg,jpeg,webp',
            'Course' => 'required|max:20|string',
            'Gender' => 'required|max:20|string',
            'Type' => 'required|max:20|string',
            'Body' => 'required|max:20|string',
        ]);
        if ($request->has('stockPhoto')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/uniform/';
            $file->move($path, $filename);
        }
        Stock::create([
            'stockName' => $request->stockName,
            'stockPhoto' => $request->stockPhoto,
            'Course' => $request->Course,
            'Gender' => $request->Gender,
            'Type' => $request->Type,
            'Body' => $request->Body,
        ]);
        return response()->json(['message' => "Added Succesfully"]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'stockName' => 'required|max:20|string',
            'stockPhoto' => 'required|mimes:png,jpg,jpeg,webp',
            'Department' => 'required|max:20|string',
            'Gender' => 'required|max:20|string',
            'Type' => 'required|max:20|string',
            'Body' => 'required|max:20|string',
        ]);


        $data = Stock::findOrFail($id);
        if ($request->has('photo')) {

            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $path = 'uploads/stock';
            $file->move($path, $filename);
        }
        $data->update([
            'stockName' => 'required|max:20|string',
            'stockPhoto' => 'required|mimes:png,jpg,jpeg,webp',
            'courseID' => 'required|max:5|int'
        ]);
        return response()->json(['message' => "Updated Succesfully"]);
    }
    public function destroy($id){
        $data = Stock::find($id);
        $data -> delete();
        return response()->json(['message' => "Deleted Successfully"]);
    }
}
