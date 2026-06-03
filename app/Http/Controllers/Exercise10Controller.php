<?php
namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * 課題10: 複合課題（3つの問題が同時に起きる） ★★★★☆（自習用）
 *
 * 実務のバグは複数の問題が絡み合っていることが多い。
 *
 * 症状:
 *   - キーワード検索が効いていない（空でも絞り込まれる）
 *   - ページが遅い
 *   - エラーが出てもログに残らない
 *
 * 仕込まれたバグ（3つ）:
 *   Bug1: keyword が空でも where 条件が適用される
 *   Bug2: N+1問題（user + category）
 *   Bug3: 例外が握りつぶされてログに残らない
 *
 * デバッグの進め方:
 *   Step1: toSql() で Bug1 を発見
 *   Step2: Debugbar で Bug2 を発見
 *   Step3: Log:: で Bug3 を修正
 */
class Exercise10Controller extends Controller
{
    public function index(Request $request)
    {
        $keyword  = $request->input('keyword');
        $category = $request->input('category_id');

        $query = Post::query();

        // 🐛 Bug1: keyword が空でも where が適用されてしまう
        $query->where('title', 'like', '%' . $keyword . '%');

        // TODO: toSql() で Bug1 を確認しよう
        // dump($query->toSql());
        // dump($query->getBindings());

        if ($category) {
            $query->where('category_id', $category);
        }

        // 🐛 Bug2: N+1問題（with() がない）
        $posts = $query->get();

        // TODO: Debugbar で Bug2 を確認しよう

        return view('exercises.exercise10', compact('posts', 'keyword'));

        // ✅ 正解コード（参考）:
        // $query = Post::with(['user', 'category']);
        // if ($keyword) { $query->where('title', 'like', '%' . $keyword . '%'); }
        // try {
        //     Log::info('投稿検索', ['keyword' => $keyword]);
        //     $posts = $query->paginate(20);
        //     return view('exercises.exercise10', compact('posts', 'keyword'));
        // } catch (\Exception $e) {
        //     Log::error('検索失敗', ['error' => $e->getMessage()]);
        //     return response()->json(['error' => '検索に失敗しました'], 500);
        // }
    }
}
