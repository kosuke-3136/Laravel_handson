<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * 課題1: フォームが動かない ★☆☆☆☆
 *
 * 症状: フォームを送信してもユーザーが作成されない。エラーも出ない。
 * ミッション: dump() を使ってリクエストデータを確認し、原因を見つけよう！
 */
class Exercise1Controller extends Controller
{
    public function create()
    {
        return view('exercises.exercise1');
    }

    public function store(Request $request)
    {
        // TODO: dump() を追加してリクエストデータを確認しよう
        // dump($request->all());

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('exercise1.success');
    }

    public function success()
    {
        return view('exercises.success', ['exercise' => 1, 'message' => 'ユーザー登録できました！']);
    }
}
