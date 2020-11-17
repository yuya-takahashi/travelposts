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
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの投稿の一覧を作成日時の降順で取得
            $travelposts = $user->travelposts()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'travelposts' => $travelposts,
            ];
        }

        // Welcomeビューでそれらを表示
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
    
    public function create()
    {
        $travelpost = new Travelpost;

        // メッセージ作成ビューを表示
        return view('travelposts.form', [
            'travelpost' => $travelpost,
        ]);
    }
    
    
    
    
    public function disp()
    {
        $path = Storage::disk('s3')->url('hoge.jpg');
        return view('disp', compact('path'));
    }
}
