<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(UserTableSeeder::class);
        $this->call(AuthorTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(BookTableSeeder::class);
        $this->call(ReviewTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(RateTableSeeder::class);
        Model::reguard();
    }
}
