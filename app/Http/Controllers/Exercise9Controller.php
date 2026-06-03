<?php
namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;

/**
 * 課題9: 「動いているか」を確認するデバッグ ★★★☆☆（自習用）
 *
 * 重要: デバッグ = エラーを直すだけではない！
 *       「期待通りに動いているか確認する」のもデバッグ。
 *
 * 症状: いいね機能を実装した。エラーは出ていない。
 *       でも正しく動いているか分からない。
 *
 * ミッション:
 *   1. dump() でリクエストデータを確認
 *   2. dump() で重複チェックの結果を確認
 *   3. Debugbar で SQL が何回発行されているか確認
 *   4. （改善）withCount() を使って SQL を減らせないか考えよう
 */
class Exercise9Controller extends Controller
{
    public function index()
    {
        $posts = Post::with('likes')->take(10)->get();
        return view('exercises.exercise9', compact('posts'));
    }

    public function like(Request $request, $postId)
    {
        $userId = $request->input('user_id', 1);
        $post   = Post::find($postId);

        // TODO: Step1 - 受け取った値を確認しよう
        // dump('受け取った値', ['post_id' => $postId, 'user_id' => $userId]);

        $alreadyLiked = Like::where('post_id', $postId)
                            ->where('user_id', $userId)
                            ->exists();

        // TODO: Step2 - 重複チェックの結果を確認しよう
        // dump('既にいいね済み?', $alreadyLiked);

        if (!$alreadyLiked) {
            Like::create(['post_id' => $postId, 'user_id' => $userId]);
        }

        // TODO: Step3 - Debugbar でこの処理の SQL を確認しよう
        $likeCount = Like::where('post_id', $postId)->count();

        // TODO: Step4 - レスポンスを確認しよう
        // dump('レスポンス', ['liked' => !$alreadyLiked, 'count' => $likeCount]);

        return response()->json(['liked' => !$alreadyLiked, 'count' => $likeCount]);
    }
}
