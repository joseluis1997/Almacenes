 
<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Partida;
use App\Medida;
use App\Articulo;
use App\proveedor;
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
        factory(\App\Area::class, 1)->create([
              'NOM_AREA' => 'GOBIERNO AUTÓNOMO DEPARTAMENTAL DE TARIJA'
            ]);

        // factory(\App\Partida::class, 1)->create([
        //       'NOM_PARTIDA' => 'MATERIALES Y SUMINISTROS',
        //       'NRO_PARTIDA' => 30000,
        //     ]);

        $this->call(RolesAndPermissions::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PartidasTableSeeder::class);
        $this->call(MedidasTableSeeder::class);
        $this->call(proveedores_seeder::class);
        // $this->call(ArticulosTableSeeder::class);
	}
}