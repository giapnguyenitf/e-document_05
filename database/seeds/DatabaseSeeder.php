<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            DocumentsTableSeeder::class,
            CommentsTableSeeder::class,
            CoinsTableSeeder::class,
            FavoritesTableSeeder::class,
            TransactionsTableSeeder::class,
            HistoriesTableSeeder::class,
            FriendshipsTableSeeder::class,
        ]);
    }
}
