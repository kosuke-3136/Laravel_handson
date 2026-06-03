<?php
namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * 課題7: SQLデバッグ ★★★☆☆（自習用）
 *
 * 症状: キーワード検索しても結果が絞り込まれない
 * ミッション:
 *   1. dump($query->toSql()) で発行されるSQLを確認しよう
 *   2. どのカラムを検索しているか確認して、バグを直そう
 */
class Exercise7Controller extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword', '');

        $query = Post::query();

        if ($keyword) {
            // 🐛 バグ: 'title' ではなく 'content' を検索している
            $query->where('content', 'like', $keyword);

            // TODO: toSql() でどんなSQLか確認しよう
            // dump($query->toSql());
            // dump($query->getBindings());
        }

        // TODO: DB::enableQueryLog() で実行後のSQLを確認しよう
        // DB::enableQueryLog();

        $posts = $query->get();

        // TODO: 実行されたSQLを確認
        // dd(DB::getQueryLog());

        return view('exercises.exercise7', compact('posts', 'keyword'));
    }
}
