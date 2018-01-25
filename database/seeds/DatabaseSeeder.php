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
        DB::table('users')->insert([
            'name' => 'giapnguyenitf',
            'email' => 'giapnguyenitf@gmail.com',
            'password' => bcrypt('123456'), // secret
            'remember_token' => str_random(10),
            'is_admin' => true,
        ]);
        $this->call([
            // UsersTableSeeder::class,
            // CategoriesTableSeeder::class,
            // DocumentsTableSeeder::class,
            // CommentsTableSeeder::class,
            // CoinsTableSeeder::class,
            // FavoritesTableSeeder::class,
            // TransactionsTableSeeder::class,
            // HistoriesTableSeeder::class,
            // FriendshipsTableSeeder::class,
            
        ]);
    }
}
