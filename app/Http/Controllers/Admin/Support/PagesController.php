<?php

namespace App\Http\Controllers\Admin\Support;

use App\Http\Controllers\Controller;
use App\Models\Support\Message;
use App\Models\Support\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    // Get Support Messages Index Page
    public function index() {
    	$messages = Message::where('status', '!=', 'closed')->orderBy('created_at', 'desc')->paginate(5);

    	return view('admin.support.index')
    							->withMessages($messages);
    }

    // View Report
    public function viewReport($id) {
    	$message = Message::find($id);

        $responses = Response::where('message_id', $id)->orderBy('created_at', 'desc')->get();

        return view('admin.support.viewReport')
                                ->withMessage($message)
                                ->withResponses($responses);
    }

    // Request Information
    public function requestInfo(Request $request, $id) {
        $this->validate($request, [
            'message' => 'required|max:10000|min:10|string',
        ]);

        $message = Message::find($id);

        $message->status = 'needs_info';

        $message->save();

        $response = new Response;

        $response->admin_id = Auth::guard('admin')->user()->id;
        $response->message = $request->message;
        $response->message_id = $id;

        $response->save();

        Session::flash('success', 'Request for more information has been submitted');

        return redirect()->route('admin.support.viewReport', $id);
    }

    // Close Report
    public function closeReport($id) {
        $message = Message::find($id);

        $message->status = 'closed';

        $message->save();

        Session::flash('success', 'Report has been successfully closed');

        return redirect()->route('admin.support.index');
    }
}
