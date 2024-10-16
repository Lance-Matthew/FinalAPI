<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item\Itemrso;
class ItemrsoController extends Controller
{
   public function index(){
      
   }

   public function store(Request $request){
      $request->validate([
         'Department' => 'required|max:20|string',
         'Course' => 'required|max:20|string',
         'Gender' => 'required|max:20|string',
         'Type' => 'required|max:20|string',
         'Body' => 'required|max:20|string',
         'Size' => 'required|max:20|string',
         'Stock' => 'required|max:20|int',
         'Reserved' => 'required|max:20|int',
      ]);

      Itemrso::create([
         'Department' => $request->Department,
         'Course' => $request->Course,
         'Gender' => $request->Gender,
         'Type' => $request->Type,
         'Body' => $request->Body,
         'Size' => $request->Size,
         'Stock' => $request->Stock,
         'Reserved' => $request->Reserved,
      ]);
      return response()->json(['message' => "Added Succesfully"]);
   } 

   public function show($Course, $Gender, $Type, $Body){
      $data = Itemrso::where('Course', $Course)
      ->where('Gender', $Gender)
      ->where('Type', $Type)
      ->where('Body', $Body)
      ->get();
      return response()->json($data);
   } 

   public function edit($id){

   }

   public function update(Request $request, $id){

   }
   public function destroy($id){
      $data = Itemrso::find($id);
      $data -> delete();
      return response()->json(['message' => 'item deleted']);
   }

   public function reduceStock($count, $course, $gender, $type, $body, $size,$logic)
   {
      try {
         $item = Itemrso::where('Course', $course)
               ->where('Gender', $gender)
               ->where('Type', $type)
               ->where('Body', $body)
               ->where('Size', $size)
               ->first();
   
         if (!$item) {
               return response()->json(['message' => 'Item not found ReduceStock'], 404);
         }
         if($logic == 'stock'){
            if ($count <= 0) {
               return response()->json(['message' => 'Invalid stock reduction count'], 400);
            }
      
            if ($item->Stock < $count) {
                  return response()->json(['message' => 'Insufficient stock'], 400);
            }

            $item->Stock -= $count;
            $item->save();
      
            return response()->json(['message' => 'Stock reduced successfully'], 200);
         }else if($logic == 'reserved'){  
            $item->Reserved += $count;
            $item->save();
      
            return response()->json(['message' => 'Reserved increased successfully'], 200);
         }else if($logic == 'claim'){
            $item->Reserved -= $count;
            $item->save();
      
            return response()->json(['message' => 'Reserved reduced successfully'], 200);
         }else if($logic == 'reservedFirst'){
            if($item->Reserved == 0){
               $item->Stock += $count;
            } else {
               $reservedReduction = min($count, $item->Reserved);
               $item->Reserved -= $reservedReduction;
               $remainingReduction = $count - $reservedReduction;
               if ($remainingReduction > 0) {
                  $item->Stock += $remainingReduction;
               }
            }
            $item->save();
         }
         
      } catch (\Exception $e) {
         return response()->json(['message' => 'Error reducing stock: ' . $e->getMessage()], 500);
      }
   }

   public function specificUniform($department, $course, $gender, $type, $body, $size){
      $item = Itemrso::where('Course', $course)
               ->where('Department', $department)
               ->where('Gender', $gender)
               ->where('Type', $type)
               ->where('Body', $body)
               ->where('Size', $size)
               ->first();

      if (!$item) {
         return response()->json(["message' => 'Item not found specificForm {$department}, {$course}, {$gender}, {$type}, {$body}, {$size}"], 404);
      }

      return response()->json(['stock' => $item->Stock], 200);
   }
   
}
