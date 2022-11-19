<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::insert([
            array(
                'id' => '1',
                'name' => 'Md. Jahid Hasan',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL
            ),
            array(
                'id' => '2',
                'name' => 'Salauddin Ayub',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL
            ),
            array(
                'id' => '3',
                'name' => 'Kamrul Haque',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL
            ),
            array(
                'id' => '4',
                'name' => 'Prionto Abdullah',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL
            ),
            array(
                'id' => '5',
                'name' => 'Jony Miya',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL
            ),
        ]);
    }
}
