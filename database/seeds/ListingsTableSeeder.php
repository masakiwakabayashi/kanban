<?php

use Illuminate\Database\Seeder;

class ListingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Listings = [
            ['title' => 'Laravelの学習', 'user_id' => 1, 'created_at' => '2020/09/01'],
            ['title' => 'フロントエンドの学習', 'user_id' => 1, 'created_at' => '2020/10/01'],
        ];
        foreach ($Listings as $Listing) {
            DB::table('listings')->insert([
                    'title' => $Listing['title'],
                    'user_id' => $Listing['user_id'],
                    'created_at' => $Listing['created_at']
                ]);
        }
    }
}
