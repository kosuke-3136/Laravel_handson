<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Log;

/**
 * 課題11: ツールを組み合わせて解く ★★★★★（自習用）
 *
 * 全てのデバッグツールを使う最終課題。
 *
 * 症状:
 *   - 特定のユーザーだけ投稿数が 0 になっている（エラーなし）
 *   - ページ全体が遅い
 *
 * 仕込まれた問題（4つ）:
 *   Problem1: N+1問題（ループ内で SQL が発行される）
 *   Problem2: カウントSQLに余分な条件がある（status = 'published'）
 *   Problem3: 処理の記録がない（ログがない）
 *   Problem4: 修正後に検証する手段がない
 *
 * デバッグの進め方:
 *   Step1: dump() でデータを確認 → 投稿数0のユーザーを特定
 *   Step2: Debugbar でクエリ数を確認 → N+1を発見
 *   Step3: toSql() でカウントSQLの条件を確認
 *   Step4: Log:: を追加して本番対応できる形に整える
 */
class Exercise11Controller extends Controller
{
    public function index()
    {
        $users = User::all();

        // TODO: Step1 - 最初のユーザーのデータを確認しよう
        // dump($users->first()->toArray());

        $result = $users->map(function ($user) {

            // 🐛 Problem1: ループ内でSQLを発行している（N+1）
            // 🐛 Problem2: 'published' 条件が余分についている
            $postCount = Post::where('user_id', $user->id)
                             ->where('status', 'published') // ← 余分な条件
                             ->count();

            // TODO: Step2 - Debugbar でクエリ数を確認しよう
            // TODO: Step3 - このSQLを toSql() で確認しよう
            // $q = Post::where('user_id', $user->id)->where('status', 'published');
            // dump($q->toSql(), $q->getBindings());

            return ['id' => $user->id, 'name' => $user->name, 'post_count' => $postCount];
        });

        // TODO: Step4 - Log:: を追加しよう
        // Log::info('ユーザー一覧取得完了', ['count' => $users->count()]);

        return view('exercises.exercise11', compact('result'));

        // ✅ 正解コード（参考）:
        // Log::info('ユーザー一覧取得開始');
        // $users = User::withCount('posts')->get();
        // Log::info('取得完了', ['count' => $users->count()]);
        // return view('exercises.exercise11', compact('users'));
    }
}
