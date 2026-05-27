<?php

namespace App\Http\Controllers;

/**
 * 課題3: 配列のキーが見つからない
 * 難易度: ★★☆☆☆
 *
 * 症状:
 *   合計金額の計算で
 *   "Undefined array key 'qty'" エラーが出る。
 *
 * ミッション:
 *   dump() で配列の中身を確認して、typo を見つけよう！
 */
class Exercise3Controller extends Controller
{
    public function index()
    {
        $item = [
            'name'     => '技術書',
            'price'    => 3000,
            'quantity' => 2,   // ← キーの名前をよく見て！
            'tax_rate' => 0.1,
        ];

        // TODO: dump($item) で中身を確認してみよう

        $subtotal = $item['price'] * $item['qty']; // 🐛 typo!
        $tax      = $subtotal * $item['tax_rate'];
        $total    = $subtotal + $tax;

        return view('exercises.exercise3', compact('item', 'subtotal', 'tax', 'total'));
    }
}
