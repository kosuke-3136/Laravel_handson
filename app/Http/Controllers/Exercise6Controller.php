<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * 課題6: ログを使ったデバッグ ★★☆☆☆（自習用）
 *
 * 症状: 本番環境では dump() / dd() は使えない。どうやって調査する？
 * ミッション: TODO コメントを外して Log::info() / Log::error() を有効化しよう
 * ログ確認: storage/logs/laravel.log
 */
class Exercise6Controller extends Controller
{
    public function create() { return view('exercises.exercise6'); }

    public function store(Request $request)
    {
        // TODO: Log::info() でリクエストデータを記録しよう
        // Log::info('ステップ1: リクエスト受信', ['data' => $request->all()]);

        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        // TODO: バリデーション通過後もログに記録しよう
        // Log::info('ステップ2: バリデーション通過', ['email' => $validated['email']]);

        try {
            $user = User::create([
                'name'     => $validated['name'],
                'email'    => $validated['email'],
                'password' => bcrypt($validated['password']),
            ]);

            // TODO: 成功時のログ
            // Log::info('ステップ3: ユーザー作成成功', ['user_id' => $user->id]);

            return redirect()->route('exercise6.success');

        } catch (\Exception $e) {
            // TODO: エラー時のログ（これがないと本番で原因がわからない！）
            // Log::error('ステップ3: ユーザー作成失敗', [
            //     'error' => $e->getMessage(),
            //     'email' => $validated['email'],
            // ]);

            return back()->withErrors(['error' => '登録に失敗しました']);
        }
    }

    public function success()
    {
        return view('exercises.success', [
            'exercise' => 6,
            'message'  => 'ログを使ったデバッグができました！storage/logs/laravel.log を確認しよう',
        ]);
    }
}
