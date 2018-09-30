<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use App\Models\Forum\ForumPost;
use App\Models\Forum\ForumReply;
use App\Models\Support\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mews\Purifier\Facades\Purifier;

class ReportingController extends Controller
{
    // Make a Report
    public function generateReport(Request $request) {
    	$this->validate($request, [
    		'message' => 'required|max:10000|min:25|string',
    		'reason' => 'required'
    	]);

    	$supportMessage = new Message;

    	$supportMessage->reason = $request->reason;
    	$supportMessage->message = Purifier::clean($request->message);

    	if($request->reply_id) {
    		$postSlug = ForumReply::find($request->reply_id)->post->slug;
    		$supportMessage->reply_id = $request->reply_id;
    	}
    	if($request->post_id) {
    		$postSlug = ForumPost::find($request->post_id)->slug;
    		$supportMessage->post_id = $request->post_id;
    	}

    	$supportMessage->user_id = Auth::guard('user')->user()->id;
    	$supportMessage->status = 'open';

    	$supportMessage->save();

    	Session::flash('success', 'Your report has been recieved. Please allow 24 hours for a reply.');

    	return redirect()->route('forum.post.show', $postSlug);
    }
}
