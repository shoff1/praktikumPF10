<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::factory()->count(200)->create();
        DB::table('employees')->insert([
            [
                'firstname' => 'Abun',
                'lastname' => 'Gufflux',
                'email'=> 'abun123@gmail.com',
                'age' => 21,
                'position_id' => 1
            ],
            [
                'firstname' => 'Alecks',
                'lastname' => 'Coach',
                'email'=> 'alek@gmail.com',
                'age' => 31,
                'position_id' => 2
            ],
            [
                'firstname' => 'Jake',
                'lastname' => 'Jean',
                'email'=> 'Jakejean@gmail.com',
                'age' => 24,
                'position_id' => 3
            ],
        ]);
    }
}
