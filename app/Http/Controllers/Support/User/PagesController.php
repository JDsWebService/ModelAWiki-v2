<?php

namespace App\Http\Controllers\Support\User;

use App\Http\Controllers\Controller;
use App\Models\Support\Message;
use App\Models\Support\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::where('user_id', Auth::guard('user')->user()->id)->orderBy('created_at', 'desc')->get();

        return view('user.support.index')
                                ->withMessages($messages);
    }

    // View Report
    public function viewReport($id) {
        $message = Message::find($id);

        if($message->status === 'closed') {
            Session::flash('warning', 'This report has already been closed or resolved');

            return redirect()->route('user.support.index');
        }

        $responses = Response::where('message_id', $id)->orderBy('created_at', 'desc')->get();

        return view('user.support.viewReport')
                                ->withMessage($message)
                                ->withResponses($responses);
    }

    // Send Response
    public function sendResponse(Request $request, $id) {
        $this->validate($request, [
            'message' => 'required|max:10000|min:10|string',
        ]);

        $response = new Response;

        $response->message = $request->message;
        $response->user_id = Auth::guard('user')->user()->id;
        $response->message_id = $id;

        $response->save();

        Session::flash('success', 'Your response has been successfully sent!');

        return redirect()->route('user.support.viewReport', $id);

    }

    
}
