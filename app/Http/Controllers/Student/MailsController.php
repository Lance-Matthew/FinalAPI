<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Mails;
use App\Models\Student\Profile;

class MailsController extends Controller
{
    public function index(){
        $mails = Mails::all();
        return response() -> json(['mails' => $mails]);
    }

    public function store(Request $request){  
        return Mails::create($request->all());
    }

    public function createData(array $data) {
        return Mails::create($data);
    }

    public function notificationDone($id){
        Mails::where('id', $id)->update(['isDone' => true]);
        return response() -> json(['message' => 'Email Marked as Done']);    

    }

    public function show($notificationId){
        $mails = Mails::where('notificationId', $notificationId)
        ->orderBy('id', 'desc')
        ->get();
        
        if($mails->isEmpty()) {
            return response()->json(['message' => 'No Email found for the specified Notification'], 404);
        }

        return response()->json(['mails' => $mails]);
    }
    
    public function isTapped($id)
    {
        $mail = Mails::find($id);

        if (!$mail) {
            return response()->json(['message' => 'Mail not found'], 404);
        }

        $mail->isTapped = true;
        $mail->save();

        return response()->json(['message' => 'Mail marked as tapped'], 200);
    }

    public function allread($notificationId, ProfileController $profileController)
    {
        $updated = Mails::where('notificationId', $notificationId)->update(['isRead' => true]);

        if ($updated > 0) {
            $profileController->zeroread($notificationId);
            return response()->json(['message' => 'All mails marked as read'], 200);
        }
        return response()->json(['message' => 'No mails found for the given notification ID'], 404);
    }

    public function destroy($id){
        $mails = Mails::find($id);
        $mails -> delete();
        return response()-> json(['message' => 'Mail Removed']);
    }
}
