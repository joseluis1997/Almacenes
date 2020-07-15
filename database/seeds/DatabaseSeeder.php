 
<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class DatabaseSeeder extends Seeder
{
	public function run()
    {

	 	 // DB::table('users')->insert([
	 	 //   'ci' => '8174701',
    //        'name' => 'jose luis',
    //        'lastname' =>'Mercado Alarcon',
    //        'telephone' =>'75315092',
    //        'username' => 'jose1997',
    //        'password' => Hash::make('pass123')
    //     ]);
    // $users = factory(App\User::class, 10)->create();

        $this->call(RolesAndPermissions::class);
        $this->call(UsersTableSeeder::class);
	}
}