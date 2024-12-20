<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student\BookCollection;
use App\Http\Controllers\Item\ItemBookController;
use App\Http\Controllers\Student\MailsController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Student\ProfileController;

class BookCollectionController extends Controller
{   
    public function index()
    {
        $bookCollections = BookCollection::all();
        return response()->json(['bookCollections' => $bookCollections]);
    }

    public function generateCode(){
        $code = mt_rand(00000, 99999);
        $existingCode = BookCollection::where('code', $code)->first();

        if ($existingCode) {
            return $this->generateCode();
        }

        return $code;
    }
    public function store(Request $request)
    {
        $scheduleA = ["Monday", "Tuesday", "Wednesday",];
        $scheduleB = ["Thursday", "Friday", "Saturday"];

        $validatedData = $request->validate([
            'BookName' => 'nullable|string|max:255',
            'SubjectCode' => 'nullable|string|max:255',
            'SubjectDesc' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:5',
            'Status' => 'required|string|max:255',
            'claiming_schedule' => 'nullable|string|max:255',
            'shift' => "nullable|string|max:255",
            'stubag_id' => 'required|integer|exists:student_bags,id',
            'dateReceived' => 'nullable|date',
            'reservationNumber' => 'nullable|integer|exists',
            'Department' => 'nullable|string|max:255',
        ]);

        if (empty($validatedData['code'])) {
            $validatedData['code'] = $this->generateCode();
        }


        $existingBook = BookCollection::where('BookName', $validatedData['BookName'])
        ->where('stubag_id', $validatedData['stubag_id'])->first();

        if ($existingBook) {
            return response()->json(['message' => 'Book already exists'], 409);
        }

        $bookCollection = BookCollection::create($validatedData);

        return response()->json(['message' => 'Book Collection created successfully', 'bookCollection' => $bookCollection], 201);
    }

    public function requestbook(Request $request, $stocks)
    {
        $scheduleA = ["Monday", "Tuesday", "Wednesday",];
        $scheduleB = ["Thursday", "Friday", "Saturday"];
        $requestController = new ItemBookController();
        $departmentController = new DepartmentController();

        $validatedData = $request->validate([
            'BookName' => 'nullable|string|max:255',
            'SubjectCode' => 'nullable|string|max:255',
            'SubjectDesc' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:5',
            'Status' => 'required|string|max:255',
            'claiming_schedule' => 'nullable|string|max:255',
            'shift' => "nullable|string|max:255",
            'stubag_id' => 'required|integer|exists:student_bags,id',
            'dateReceived' => 'nullable|date',
            'reservationNumber' => 'nullable|integer|exists',
            'Department' => 'nullable|string|max:255',
        ]);

        if (empty($validatedData['code'])) {
            $validatedData['code'] = $this->generateCode();
        }
        
        $mailController = new MailsController();
        $description = $stocks == 0
        ? "The Book {$validatedData['code']} you've requested is now RESERVED."
        : "The Book {$validatedData['code']} you've requested is now ready to be CLAIMED.";

        $redirect = $stocks == 0
        ? "Reserve"
        : "Claim";

        $mailController->createdata([
            'description' => $description,
            'time' => now(),
            'isDone' => false,
            'redirectTo' => $redirect,
            'notificationId' => $validatedData['stubag_id']
        ]);

        if($validatedData['Status'] == 'Request'){
            if($stocks == 0){
                $highestReservation = BookCollection::
                where('BookName', $validatedData['BookName'])
                ->max('reservationNumber');
    
                $validatedData['Status'] = 'Reserved';
                $validatedData['reservationNumber'] = ++$highestReservation;
                $requestController->reduceStock(1, $validatedData['BookName'], "reserved");
                $departmentController->displaycounts($validatedData['Department'], 1, 'reserved', 'add');
            }
            else{
                if($validatedData['shift'] == 'A'){
                    $validatedData['claiming_schedule'] = "$scheduleA[0] to $scheduleA[2]";
                }
                elseif($validatedData['shift'] == 'B'){
                    $validatedData['claiming_schedule'] = "$scheduleB[0] to $scheduleB[2]";
                }
                else{
                    return response()->json(['message' => 'Department not found in either shift'], status: 400);
                }
                $validatedData['Status'] = 'Claim';
                $validatedData['reservationNumber'] = null;
                $requestController->reduceStock(1, $validatedData['BookName'], "stock");
                $departmentController->displaycounts($validatedData['Department'], 1, 'claim', 'add');
            }
        }

        $existingBook = BookCollection::where('BookName', $validatedData['BookName'])
        ->where('stubag_id', $validatedData['stubag_id'])->first();

        if ($existingBook) {
            return response()->json(['message' => 'Book already exists'], 409);
        }

        $bookCollection = BookCollection::create($validatedData);

        return response()->json(['message' => 'Book Collection created successfully', 'bookCollection' => $bookCollection], 201);
    }
    public function show($stubag_id, $status)
    {   
        if($status == "All"){
            $bookCollections = BookCollection::where('stubag_id', $stubag_id)
            ->get();
        // Return the book collections as JSON
        return response()->json(['bookCollections' => $bookCollections]);
        }else{
             // Find book collections based on stubag_id and status
        $bookCollections = BookCollection::where('stubag_id', $stubag_id)
        ->where('Status', $status)
        ->get();
    // Return the book collections as JSON
    return response()->json(['bookCollections' => $bookCollections]);
        }
       
    }

    public function codeShow($code)
    {
        $bookCollections = BookCollection::where('code', $code)->first();

        if(!$bookCollections){
            return response()->json(['message' => 'Book Collection not found'], 404);
        }

        if($bookCollections->Status != 'Claim'){
            return response()->json(['message' => 'Book is not ready for claiming'], 409);
        }
        else{
            return response()->json(['bookCollections' => $bookCollections], 200);
        }
        
    }
    

    public function update(Request $request, $id)
    {
        $bookCollection = BookCollection::find($id);


        if (!$bookCollection) {
            return response()->json(['message' => 'Book Collection not found'], 404);
        }

        $validatedData = $request->validate([
            'BookName' => 'nullable|string|max:255',
            'SubjectCode' => 'nullable|string|max:255',
            'SubjectDesc' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:5',
            'Status' => 'nullable|string|max:255',
            'claiming_schedule' => 'nullable|string|max:255',
            'stubag_id' => 'nullable|integer|exists:student_bags,id',
            'dateReceived' => 'nullable|date',
            'reservationNumber' => 'nullable|integer|exists',
            'Department' => 'nullable|string|max:255',
        ]);

        $bookCollection->update($validatedData);

        return response()->json(['message' => 'Book Collection updated successfully', 'bookCollection' => $bookCollection], 200);
    }

    public function destroy($id)
    {
        $bookCollection = BookCollection::find($id);

        if (!$bookCollection) {
            return response()->json(['message' => 'Book Collection not found'], 404);
        }

        $bookCollection->delete();

        return response()->json(['message' => 'Book Collection deleted successfully'], 200);
    }

    public function changeStatus($id, $status,){
        $bookCollection = BookCollection::find($id);
        $scheduleA = ["Monday", "Tuesday", "Wednesday",];
        $scheduleB = ["Thursday", "Friday", "Saturday"];
        $requestController = new ItemBookController();
        $departmentController = new DepartmentController();
        $bookname = $bookCollection->BookName;

        if(!$bookCollection){
            return response()->json(['Book not found'], status: 400);
        }

        if($status == 'Reserved'){
            $highestReservation = BookCollection::
            where('BookName', $bookCollection->BookName)
            ->max('reservationNumber');
            $requestController->reduceStock(1, $bookname, "reserved");
            $departmentController->displaycounts($bookCollection->Department, 1, 'reserved', 'add');
            $bookCollection->Status = 'Reserved';
            $bookCollection->reservationNumber = ++$highestReservation;
            $bookCollection->save();
        }

        if($status == 'Claim'){
            if($bookCollection->shift == 'A'){
                $bookCollection->claiming_schedule = "$scheduleA[0] to $scheduleA[2]";
            }
            elseif($bookCollection->shift == 'B'){
                $bookCollection->claiming_schedule = "$scheduleB[0] to $scheduleB[2]";
            }
            else{
                return response()->json(['message' => 'Department not found in either shift'], status: 400);
            }
            $bookCollection->Status = $status;
            $bookCollection->reservationNumber = null;
            $departmentController->displaycounts($bookCollection->Department, 1, 'claim', 'add');
            $departmentController->displaycounts($bookCollection->Department, 1, 'reserved', 'subtract');
        }

        if($status == 'Complete'){
            $mailController = new MailsController();
            $description = "Your Book has been CLAIMED.";

            $mailController->createdata([
                'description' => $description,
                'time' => now(),
                'isDone' => false,
                'redirectTo' => 'Complete',
                'notificationId' => $bookCollection->stubag_id
            ]);
            $bookCollection->dateReceived = now();
            $bookCollection->Status = $status;
            $bookCollection->claiming_schedule = null;
            $bookCollection->code = null;
            $departmentController->displaycounts($bookCollection->Department, 1, 'complete', 'add');
            $departmentController->displaycounts($bookCollection->Department, 1, 'claim', 'subtract');
        }
        $bookCollection->save();

        return response()->json(['message' => 'Status changed successfully'], status: 200);
    }

    public function changeRequestStatus($id, $status){
        $bookCollection = BookCollection::find($id);
        $scheduleA = ["Monday", "Tuesday", "Wednesday",];
        $scheduleB = ["Thursday", "Friday", "Saturday"];

        if(!$bookCollection){
            return response()->json(['Book not found'], status: 400);
        }
        $requestController = new ItemBookController();
        
        $departmentController = new DepartmentController();

        $bookname = $bookCollection->BookName;
        $stuId = $bookCollection->stubag_id;

        $response = $requestController->specificBook($bookname);
        if ($response->getStatusCode() == 200) {
            $stockData = json_decode($response->getContent(), true);
            $stocks = $stockData['stock']; 
        } else {
            return $response;
        }
        $mailController = new MailsController();
        $description = $stocks == 0
        ? "The Book {$bookCollection->code} you've requested is now RESERVED."
        : "The Book {$bookCollection->code} you've requested is now ready to be CLAIMED.";
        $redirect = $stocks == 0
        ? "Reserve"
        : "Claim";
    
        
        $mailController->createdata([
            'description' => $description,
            'time' => now(),
            'isDone' => false,
            'redirectTo' => $redirect,
            'notificationId' => $stuId
        ]);
        if($status == 'Request'){
            if($stocks == 0){
                $highestReservation = BookCollection::
                where('BookName', $bookCollection->BookName)
                ->max('reservationNumber');
    
                $bookCollection->Status = 'Reserved';
                $bookCollection->reservationNumber = ++$highestReservation;
                $bookCollection->save();
                $departmentController->displaycounts($bookCollection->Department, 1, 'reserved', 'add');
                $requestController->reduceStock(1, $bookname, "reserved");
            }
            else{
                if($bookCollection->shift == 'A'){
                    $bookCollection->claiming_schedule = "$scheduleA[0] to $scheduleA[2]";
                }
                elseif($bookCollection->shift == 'B'){
                    $bookCollection->claiming_schedule = "$scheduleB[0] to $scheduleB[2]";
                }
                else{
                    return response()->json(['message' => 'Department not found in either shift'], status: 400);
                }
                $bookCollection->Status = 'Claim';
                $bookCollection->reservationNumber = null;
                $departmentController->displaycounts($bookCollection->Department, 1, 'claim', 'add');
                $requestController->reduceStock(1, $bookname, "stock");
            } 
        }
        $bookCollection->save();

        return response()->json(['message' => 'Status changed successfully'], status: 200);
    }

    public function reservedBookFirst($count, $identifier) {
        $scheduleA = ["Monday", "Tuesday", "Wednesday"];
        $scheduleB = ["Thursday", "Friday", "Saturday"];
        $requestController = new ItemBookController();
        $departmentController = new DepartmentController();
        $bookCollection = BookCollection::where('BookName', $identifier)
            ->whereNotNull('reservationNumber')
            ->orderBy('reservationNumber', 'asc')
            ->take($count)
            ->get();

        foreach ($bookCollection as $books) {
            $mailController = new MailsController();
            $description = "The Book {$bookCollection->code} that is reserved is now ready to be CLAIMED.";
            $mailController->createdata([
                'description' => $description,
                'time' => now(),
                'isDone' => false,
                'redirectTo' => 'Claim',
                'notificationId' => $books->stubag_id
            ]);

            if($books->shift == 'A'){
                    $books->claiming_schedule = "$scheduleA[0] to $scheduleA[2]";
                }
                elseif($books->shift == 'B'){
                    $books->claiming_schedule = "$scheduleB[0] to $scheduleB[2]";
                } else {
                return response()->json(['message' => 'Department not found in either shift'], 400);
            }
    
            $books->Status = 'Claim';
            $books->reservationNumber = null;
            $departmentController->displaycounts($books->Department, 1, 'claim', 'add');
            $departmentController->displaycounts($books->Department, 1, 'reserved', 'subtract');
            
            if (!$books->save()) {
                return response()->json(['message' => 'Failed to update record for book ID: ' . $books->id], 500);
            } else {
            }
        }
        $requestController->reduceStock($count, $identifier, 'reservedFirst');
        return response()->json(['message' => 'Reserved Books Successfully Prioritized'], 200);
    }

    
    
    public function showAllBooks($stubag_id,$status){
        if($status == "All"){
            $bookCollections = BookCollection::where('stubag_id', $stubag_id)
            ->get();
        // Return the book collections as JSON
        return response()->json(['bookCollections' => $bookCollections]);
        }else{
             // Find book collections based on stubag_id and status
        $bookCollections = BookCollection::where('stubag_id', $stubag_id)
        ->where('Status', $status)
        ->get();
    // Return the book collections as JSON
    return response()->json(['bookCollections' => $bookCollections]);
        }
    }

    public function completedBooks(){
        $books = BookCollection::where('Status', "Complete")->get();
        return response()->json(['items' => $books], 200);
    }
}