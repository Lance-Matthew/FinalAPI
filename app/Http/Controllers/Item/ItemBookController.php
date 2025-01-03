<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item\ItemBook;
class ItemBookController extends Controller
{
   public function index(){
      
   }

   public function store(Request $request){
      $request->validate([
          'Course' => 'required|max:50|string',
          'Department' => 'required|max:50|string',
          'BookName' => 'required|max:50|string',
          'SubjectCode' => 'required|max:50|string',
          'SubjectDesc' => 'required|max:50|string',
          'Stock' => 'required|max:10|int',
          'Reserved' => 'required|max:10|int',
      ]);
      ItemBook::create([
          'Course' => $request->Course,
          'Department' => $request->Department,
          'BookName' => $request->BookName,
          'SubjectCode' => $request->SubjectCode,
          'SubjectDesc' => $request->SubjectDesc,
          'Stock' => $request->Stock,
          'Reserved' => $request->Reserved,
      ]);
      return response()->json(['message' => "Added Succesfully"]);
  }

   // DAGDAG / GINALAW NI LANCE
   public function show($Course){
      $data = ItemBook::where('Course', $Course)->get();
      return response()->json($data);
   } 

   public function edit($id){

   }

   public function update(Request $request, $id){

   }
   public function destroy($id){
      $data = ItemBook::find($id);
      $data -> delete();
      return response()->json(['message' => "Deleted successfully"]);
   }

   public function reduceStock($count, $bookname, $logic)
   {
      try {
         $item = ItemBook::where('BookName', $bookname)
               ->first();
   
         if (!$item) {
               return response()->json(["message' => 'Book not found {$bookname}"], 404);
         }
         
         if ($logic == 'stock') {
            if ($count <= 0) {
                  return response()->json(["message' => 'Invalid stock reduction count {$bookname}"], 400);
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
      
            return response()->json(["message' => 'Reserved increased successfully {$bookname}"], 200);
         }else if($logic == 'claim'){
            $item->Reserved -= $count;
            $item->save();
      
            return response()->json(['message' => 'Reserved reduced successfully'], 200);

         }else if($logic == 'reduce'){  
            $item->Stock -= $count;
            $item->save();
      
            return response()->json(['message' => 'Reserved decreased successfully'], 200);
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
   public function specificBook($bookname){
      $item = ItemBook::where('BookName', $bookname)->first();

      if (!$item) {
         return response()->json(['message' => 'Item not found'], 404);
      }

      return response()->json(['stock' => $item->Stock], 200);
   }
   public function reduce($bookname, $count){
   
      $item = ItemBook::where('BookName', $bookname)->first();
   
      if (!$item) {
         return response()->json(['message' => 'Item not found'], 404);
      }
   
      if ($item->Stock < $count) {
         return response()->json(['message' => 'Insufficient stock'], 400);
      }
   
      $item->Stock -= $count;
      $item->save();
   
      return response()->json(['stock' => $item->Stock], 200);
   }
   
}
