<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Discipline;

class DisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $disciplineData = [
            [
                'title' => 'Taekwondo',
                'description' => 'Power overwhelming',
                'photo' => '/assets/imgdiscipline/1-discipline-1643974916.jpg'
            ],
            [
                'title' => 'Karate',
                'description' => 'Power overwhelming',
                'photo' => '/assets/imgdiscipline/2-discipline-1643975197.jpg'
            ],
            [
                'title' => 'Kung Fu',
                'description' => 'Power overwhelming',
                'photo' => '/assets/imgdiscipline/3-discipline-1643975257.jpg'
            ],
            [
                'title' => 'Tai chi',
                'description' => 'Power overwhelming',
                'photo' => '/assets/imgdiscipline/4-discipline-1643975296.jpg'
            ],
            [
                'title' => 'Yoga',
                'description' => 'Power overwhelming',
                'photo' => '/assets/imgdiscipline/5-discipline-1643975337.jpg'
            ],
            [
                'title' => 'Arial Yoga',
                'description' => 'Power overwhelming',
                'photo' => '/assets/imgdiscipline/6-discipline-1643975369.jpg'
            ],
            [
                'title' => 'Jeet Kune DO',
                'description' => 'Power overwhelming',
                'photo' => '/assets/imgdiscipline/7-discipline-1643975415.jpg'
            ],
            [
                'title' => 'Fitness',
                'description' => 'Power overwhelming',
                'photo' => '/assets/imgdiscipline/8-discipline-1643975495.jpg'
            ],
            [
                'title' => 'Boxing',
                'description' => 'Power overwhelming',
                'photo' => '/assets/imgdiscipline/9-discipline-1643975570.jpg'
            ],
            [
                'title' => 'Mixed Martial Arts',
                'description' => 'Power overwhelming',
                'photo' => '/assets/imgdiscipline/10-discipline-1643975594.jpg'
            ],
            [
                'title' => 'Martial Arts For Kids',
                'description' => 'Power overwhelming',
                'photo' => '/assets/imgdiscipline/11-discipline-1643975717.jpg'
            ],
            [
                'title' => 'Jiu Jitsu',
                'description' => 'Power overwhelming',
                'photo' => '/assets/imgdiscipline/12-discipline-1643975775.jpg'
            ],
            [
                'title' => 'Meditation',
                'description' => 'Power overwhelming',
                'photo' => '/assets/imgdiscipline/13-discipline-1643975910.jpg'
            ],
            [
                'title' => 'Fitness For Children',
                'description' => 'Power overwhelming',
                'photo' => '/assets/imgdiscipline/14-discipline-1643975938.jpg'
            ],
            [
                'title' => 'Judo',
                'description' => 'Power overwhelming',
                'photo' => '/assets/imgdiscipline/15-discipline-1643976023.jpg'
            ],
            [
                'title' => 'Dance',
                'description' => 'Power overwhelming',
                'photo' => '/assets/imgdiscipline/16-discipline-1643976072.jpg'
            ],
            [
                'title' => 'Dance For Children',
                'description' => 'Power overwhelming',
                'photo' => '/assets/imgdiscipline/17-discipline-1643976099.jpg'
            ],
            [
                'title' => 'Body Building',
                'description' => 'Power overwhelming',
                'photo' => '/assets/imgdiscipline/18-discipline-1643976120.jpg'
            ],
        ];

        foreach ($disciplineData as $dData){
            Discipline::create($dData);
        }
    }
}
