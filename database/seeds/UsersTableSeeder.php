<?php

use App\Modules\Auth\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->defaults();

        $this->factory(false, 100);
    }
    
    private function defaults()
    {
        $users = [
            
            [
                'first_name' => 'Root',
                'last_name'  => 'User',
                'email'      => 'root@admin.com',
                'password'   => 'gt123456',
                'type'       => 'root',
                'status'     => 'active',
            ],
            
            [
                'first_name' => 'Admin',
                'last_name'  => 'User',
                'email'      => 'admin@admin.com',
                'password'   => 'gt123456',
                'type'       => 'admin',
                'status'     => 'active',
            ],
            
        ];
        
        foreach ($users as $user) {
            
            User::create($user);
        }
        
    }

    private function factory($active, $cant)
    {
        if ($active)
        {
            factory(User::class, $cant)->create();
        }
    }
}
