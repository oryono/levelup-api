<?php

use App\Models\CourseCategory;
use Illuminate\Database\Seeder;

class CourseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Data Science and Machine Learning',
                'description' => ''
            ],

            [
                'name' => 'Software Development',
                'description' => ''
            ],

            [
                'name' => 'Humanities',
                'description' => ''
            ],

            [
                'name' => 'Math',
                'description' => ''
            ],

            [
                'name' => 'Marketing',
                'description' => ''
            ],

            [
                'name' => 'Life Science',
                'description' => ''
            ]
        ];

        foreach ($categories as $category) {
            CourseCategory::create($category);
        }
    }
}
