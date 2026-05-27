<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Exercise1Controller;
use App\Http\Controllers\Exercise2Controller;
use App\Http\Controllers\Exercise3Controller;
use App\Http\Controllers\Exercise4Controller;
use App\Http\Controllers\Exercise5Controller;

// トップページ（課題一覧）
Route::get('/', function () {
    return view('welcome');
});

// 課題1: フォームデータが保存されない
Route::get('/exercise1',         [Exercise1Controller::class, 'create'])->name('exercise1.create');
Route::post('/exercise1',        [Exercise1Controller::class, 'store'])->name('exercise1.store');
Route::get('/exercise1/success', [Exercise1Controller::class, 'success'])->name('exercise1.success');

// 課題2: リレーションがnull
Route::get('/exercise2/{id}', [Exercise2Controller::class, 'show'])->name('exercise2.show');

// 課題3: 配列のキーエラー
Route::get('/exercise3', [Exercise3Controller::class, 'index'])->name('exercise3.index');

// 課題4: N+1問題（初級）
Route::get('/exercise4', [Exercise4Controller::class, 'index'])->name('exercise4.index');

// 課題5: N+1問題（上級）
Route::get('/exercise5', [Exercise5Controller::class, 'index'])->name('exercise5.index');
