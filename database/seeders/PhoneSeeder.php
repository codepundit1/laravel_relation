<?php

namespace Database\Seeders;

use App\Models\Phone;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Phone::insert([
            array(
                'id' => '1',
                'student_id' => '1',
                'phn_no' => '01862206220',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL
            ),
            array(
                'id' => '2',
                'student_id' => '2',
                'phn_no' => '01980546032',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL
            ),
            array(
                'id' => '3',
                'student_id' => '3',
                'phn_no' => '01639286311',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL
            ),
            array(
                'id' => '4',
                'student_id' => '4',
                'phn_no' => '01734562814',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL
            ),
            array(
                'id' => '5',
                'student_id' => '5',
                'phn_no' => '01834126578',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL
            ),
        ]);
    }
}
