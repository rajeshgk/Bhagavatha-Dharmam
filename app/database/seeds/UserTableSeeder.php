<?php
 
class UserTableSeeder extends Seeder {
 
    public function run()
    {
        // our array of user objects to create - just one in this case
				Log::error('Something is really going wrong. UserTableSeeder');
      $users = array(
          array(
              'username' => 'admin',
              'email' => 'admin@srisrianna.com',
              'password' => Hash::make('password')
          )
      );
 
      DB::table('users')->insert($users);
 
    }
 
}