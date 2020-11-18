<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Travelpost;

use Storage;


class TravelpostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { 
            $user = \Auth::user();
            $travelposts = Travelpost::orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'user' => $user,
            'travelposts' => $travelposts,
        ];
        }
        return view('welcome', $data);
    }



    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            // 'file' => 'required|max:255',
            'prefecture_id' => 'required',
            'comment' => 'required|max:255',
        ]);

        $file = $request->file('file');
        // 第一引数はディレクトリの指定
        // 第二引数はファイル
        // 第三引数はpublickを指定することで、URLによるアクセスが可能となる
        $path = Storage::disk('s3')->putFile('/travelpost', $file, 'public');
        // hogeディレクトリにアップロード
        // $path = Storage::disk('s3')->putFile('/hoge', $file, 'public');
        // ファイル名を指定する場合はputFileAsを利用する
        // $path = Storage::disk('s3')->putFileAs('/', $file, 'hoge.jpg', 'public');

        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->travelposts()->create([
            'file' => $path,
            'prefecture_id' => $request->prefecture_id,
            'comment' => $request->comment,
        ]);
        return redirect('/');
       
    }
    
    public function destroy($id)
    {
        $travelpost = \App\Travelpost::findOrFail($id);

        if (\Auth::id() === $travelpost->user_id) {
            $travelpost->delete();
        }

        return back();
    }
    
    
    
    
    public function create()
    {
        $travelpost = new Travelpost;

        // メッセージ作成ビューを表示
        return view('travelposts.form', [
            'travelpost' => $travelpost,
        ]);
    }
    
    
    
    
}

