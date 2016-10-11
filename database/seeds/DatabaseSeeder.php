<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UserTableSeeder::class);
        $this->call(PostTableSeeder::class);
    }
}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        for($i = 0; $i < 10; ++$i)
        {
            DB::table('users')->insert([
                'name' => 'Nom' . $i,
                'email' => 'email' . $i . '@blop.fr',
                'password' => bcrypt('password' . $i),
                'phonenb'=>'1234567890',
                'jobtitle'=>'unknown',
                'admin' => rand(0, 1)
            ]);
        }
    }
}

class PostTableSeeder extends Seeder {

    private function randDate()
    {
        return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
    }

    public function run()
    {
        DB::table('posts')->delete();

        for($i = 0; $i < 100; ++$i)
        {
            $date = $this->randDate();
            DB::table('posts')->insert([
                'title' => 'Titre' . $i,
                'content' => 'Contenu' . $i . ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'resolv'=> false,
                'url'=>"",
                'user_id' => rand(1, 10),
                'created_at' => $date,
                'updated_at' => $date
            ]);
        }
    }
}