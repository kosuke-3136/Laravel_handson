<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ユーザー 20人
        $userIds = [];
        for ($i = 1; $i <= 20; $i++) {
            $userIds[] = DB::table('users')->insertGetId([
                'name'       => "ユーザー{$i}",
                'email'      => "user{$i}@example.com",
                'password'   => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // カテゴリ 10個
        $categoryNames = ['PHP', 'Laravel', 'Vue.js', 'React', 'Docker',
                          'AWS', 'データベース', 'セキュリティ', 'テスト', 'その他'];
        $categoryIds = [];
        foreach ($categoryNames as $name) {
            $categoryIds[] = DB::table('categories')->insertGetId([
                'name'       => $name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 投稿 100件
        // 課題2用に user_id = 0（存在しないユーザー）のデータを入れる
        $postIds = [];
        for ($i = 1; $i <= 100; $i++) {
            $postIds[] = DB::table('posts')->insertGetId([
                // 🐛 課題2のバグ: user_id が 0 になっている（外部キー制約なし）
                'user_id'     => 0,
                'category_id' => $categoryIds[array_rand($categoryIds)],
                'title'       => "投稿タイトル {$i}",
                'content'     => "これは投稿{$i}の本文です。" . str_repeat('サンプルテキスト。', rand(3, 10)),
                'created_at'  => now()->subDays(rand(0, 30)),
                'updated_at'  => now(),
            ]);
        }

        // コメント 500件（コメントは正常なuser_idを使う）
        for ($i = 1; $i <= 500; $i++) {
            $messages = [
                'とても参考になりました！',
                '素晴らしい記事ですね。',
                'もっと詳しく知りたいです。',
                '同感です！',
                '勉強になりました。',
            ];

            DB::table('comments')->insert([
                'post_id'    => $postIds[array_rand($postIds)],
                'user_id'    => $userIds[array_rand($userIds)],
                'content'    => $messages[array_rand($messages)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('✅ ダミーデータ作成完了！');
        $this->command->info('   ユーザー : 20人');
        $this->command->info('   カテゴリ : 10個');
        $this->command->info('   投稿     : 100件 (user_id=0 が課題2のバグ)');
        $this->command->info('   コメント : 500件');
    }
}
