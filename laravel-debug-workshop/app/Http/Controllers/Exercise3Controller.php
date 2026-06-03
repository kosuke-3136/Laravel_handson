<?php
namespace App\Http\Controllers;

/**
 * 課題3: 配列のキーが見つからない ★★☆☆☆
 *
 * 症状: "Undefined array key 'qty'" エラーが出る
 * ミッション: dump($item) で配列の中身を確認して、typo を見つけよう！
 */
class Exercise3Controller extends Controller
{
    public function index()
    {
        $item = [
            'name'     => '技術書',
            'price'    => 3000,
            'quantity' => 2,   // ← キー名をよく見て！
            'tax_rate' => 0.1,
        ];

        // TODO: dump($item) で中身を確認しよう
        // dump($item);

        $subtotal = $item['price'] * $item['qty']; // 🐛 typo!
        $tax      = $subtotal * $item['tax_rate'];
        $total    = $subtotal + $tax;

        return view('exercises.exercise3', compact('item', 'subtotal', 'tax', 'total'));
    }
}
