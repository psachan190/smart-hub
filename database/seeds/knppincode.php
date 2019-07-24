<?php

use Illuminate\Database\Seeder;

class knppincode extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('knppincode')->insert([
                [
                    'pincode' => '208022',
                    'city' => 'kanpur',
					'pinStatus' =>'1',
                ],
                 [
                    'pincode' => '208019',
                    'city' => 'kanpur',
					'pinStatus' =>'1',
                ],
                 [
                    'pincode' => '209401',
                    'city' => 'kanpur',
					'pinStatus' =>'1',
                ],
                 [
                    'pincode' => '208012',
                    'city' => 'kanpur',
					'pinStatus' =>'1',
                ],
                  [
                    'pincode' => '209214',
                    'city' => 'kanpur',
					'pinStatus' =>'1',
                ],
                  [
                    'pincode' => '208023',
                    'city' => 'kanpur',
					'pinStatus' =>'1',
                ],
                  [
                    'pincode' => '209217',
                    'city' => 'kanpur',
					'pinStatus' =>'1',
                ],
                 [
                    'pincode' => '208021',
                    'city' => 'kanpur',
					'pinStatus' =>'1',
                ],
				[
                    'pincode' => '209402',
                    'city' => 'kanpur',
					'pinStatus' =>'1',
                ],
				[
                    'pincode' => '208004',
                    'city' => 'kanpur',
					'pinStatus' =>'1',
                ],
				[
                    'pincode' => '208025',
                    'city' => 'kanpur',
					'pinStatus' =>'1',
                ],
				[
                    'pincode' => '208015',
                    'city' => 'kanpur',
					'pinStatus' =>'1',
                ]
                
        ]); 
    }
}
