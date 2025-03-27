<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::truncate();

        $csvFile = fopen(base_path("database/data/students.csv"), "r");

        $firstline = true;
        
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
        if (!$firstline) {
        Student::create([
        "FirstName" => $data['1'],
        "LastName" => $data['2'],
        "School" => $data['3'],
        ]);
        }
        $firstline = false;}
        fclose($csvFile);
        }
}
