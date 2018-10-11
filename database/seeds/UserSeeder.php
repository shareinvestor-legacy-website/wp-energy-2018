<?php


use BlazeCMS\Models\User;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'username' => 'sysadmin',
            'email' => 'atthakorn@cocobana.co',
            'password' => '$2y$10$rTTy/gg2bIU6TihxR0pUm.mq8G38SfNG3oGDgzSntIbMK73w/k9NS',
            'is_active' => 1,
        ]);


        User::create([
            'username' => 'siadmin',
            'email' => 'dev.th@shareinvestor.com',
            'password' => '$2y$10$z1Jpfw6bCfq5pOxDCqWlP./8vEqG54/xnDm2ev2TYpn1JNWtoLgP.',
            'is_active' => 1,
        ])->syncRoles(['admin']);



     
    }
}
