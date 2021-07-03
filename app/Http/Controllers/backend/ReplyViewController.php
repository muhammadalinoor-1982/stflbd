<?php

namespace App\Http\Controllers\backend;

use App\CommentReply;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReplyViewController extends Controller
{
    public function view()
    {
        $data['title']='Reply View List';
        $data['comment_replies'] = CommentReply::all();
        $data['serial']=1;
        return view('backend.ReplyViewPage.RiplyView',$data);

    }
    public function destroy($id)
    {
        $reply = CommentReply::findOrFail($id);
        $reply->delete();
        session()->flash('message','Reply Deleted successfully');
        return redirect()->route('ReplyView.view');
    }
}
