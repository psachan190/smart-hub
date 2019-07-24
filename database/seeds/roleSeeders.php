<?php

use Illuminate\Database\Seeder;

class roleSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
                [
                    'role_name' => 'Super Admin',
                    'update_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'role_name' => 'Standard',
                    'update_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'role_name' => 'VIP',
                    'update_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'role_name' => 'Business Owner',
                    'update_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'role_name' => 'Social Political',
                    'update_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s'),
                ],
                 [
                    'role_name' => 'Business Organization ',
                    'update_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'role_name' => 'Social Organization',
                    'update_at' => date('Y-m-d H:i:s'),
                    'created_at' => date('Y-m-d H:i:s'),
                ]
        ]); 
    }
}
