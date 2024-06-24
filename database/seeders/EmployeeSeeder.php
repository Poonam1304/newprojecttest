<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::truncate();

        $data = [
            ['name' => 'Ramesh'],
            ['name' => 'Gaurav', 'parent_id' => 1],
            ['name' => 'Shalu', 'parent_id' => 1],
            ['name' => 'Deepu'],
            ['name' => 'Amit', 'parent_id' => 4],
            ['name' => 'Sham Lal', 'parent_id' => 4],
            ['name' => 'Kapil','parent_id' => 4 ],
            ['name' => 'Prem Chopra'],
        ];

        foreach ($data as $item) {
            Employee::create($item);
        }
    }
}
