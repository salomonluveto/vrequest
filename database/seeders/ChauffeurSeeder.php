<?php

namespace Database\Seeders;

use App\Models\Chauffeur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChauffeurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Chauffeur::factory()->count(5)->create();
        // $users=factory(User::class,4)->create();
        // $users->each(function($user){
        //     factory(Chauffeur::class)->create([
        //         'user_id'=>$user->id,
        //     ]);
        // });
    }
}
