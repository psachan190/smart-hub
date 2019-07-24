<?php

use Illuminate\Database\Seeder;

class ProfileCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('profiletypecategory')->insert([
                [
                    'profileType'=>1,
                    'profileTypeCat' => '0 to 25 LAKH',
					'status' =>'Y',
					'price'=>5000,
					'durationInDays'=>365
                ],
                 [
                    'profileType'=>1,
                    'profileTypeCat' => '25 LAKH to 1 CR.',
					'status' =>'Y',
					'price'=>8000,
					'durationInDays'=>365
                ],
                 [
                    'profileType'=>1,
                    'profileTypeCat'=>'Greater than 1 CR. ',
					'status'=>'Y',
					'price'=>12000,
					'durationInDays'=>365
                ],
                 [
                    'profileType' =>2,
                    'profileTypeCat' => '0 to 50 LAKH',
					'status' =>'Y',
					'price'=>12000,
					'durationInDays'=>365
                ],
                  [
                    'profileType' =>2,
                    'profileTypeCat' => '50 LAKH to 5 CR.',
					'status' =>'Y',
					'price'=>18000,
					'durationInDays'=>365
                ],
                  [
                    'profileType' =>2,
                    'profileTypeCat' => 'Greater than 5 CR.',
					'status' =>'Y',
					'price'=>25000,
					'durationInDays'=>365
                ],
                  [
                    'profileType' =>3,
                    'profileTypeCat' => 'FIGURE',
					'status' =>'Y',
					'price'=>100,
					'durationInDays'=>30
                ],
                 [
                    'profileType' =>3,
                    'profileTypeCat' => 'ICON',
					'status' =>'Y',
					'price'=>500,
					'durationInDays'=>30
                ],
				[
                    'profileType' =>3,
                    'profileTypeCat' => 'LEADER',
					'status' =>'Y',
					'price'=>1000,
					'durationInDays'=>30
                ],
				[
                    'profileType' =>4,
                    'profileTypeCat' => '0 to 100 USERS',
					'status' =>'Y',
					'price'=>1000,
					'durationInDays'=>30
                ],
				[
                    'profileType' =>4,
                    'profileTypeCat' => '100 to 1000 USERS',
					'status' =>'Y',
					'price'=>2500,
					'durationInDays'=>30
                ],
				[
                    'profileType' =>4,
                    'profileTypeCat' => ' Greater than 1000 USERS',
					'status' =>'Y',
					'price'=>5000,
					'durationInDays'=>30
					
                ]
                
        ]);
    }
}
