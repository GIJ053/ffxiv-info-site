<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $api = new \XIVAPI\XIVAPI();
        $classArrays = $api->content->ClassJob()->list()->Results;
        $classIDs = [];

        for ($i=0 ; $i < count($classArrays) ; $i++ ) {
            $currentClass = $api->content->ClassJob()->one($classArrays[$i]->ID);

            if ($currentClass->DohDolJobIndex == -1 && $currentClass->JobIndex != 0 && $currentClass->IsLimitedJob == 0) {
                $classIDs[] = $currentClass->ID;
            }
        }

    // foreach ($classArrays as $id => $value) {  Need to test if this is better implementaion
    //     $currentClass = $api->content->ClassJob()->one($value);

    //     if ($currentClass->DohDolJobIndex == -1 && $currentClass->JobIndex != 0 && $currentClass->IsLimitedJob == 0) {
    //         $classIDs[] = $value;
    //     }
    // }

        for ($i=0; $i < count($classIDs); $i++) {
            $newJob = new Job;
            $currentJob = $api->content->ClassJob()->one($classIDs[$i]);

            $newJob->id = $currentJob->ID;

            if($currentJob->ClassJobParent != null) {
                $newJob->parent_class_id = $currentJob->ClassJobParent->ID;
            }

            $newJob->slug = $currentJob->Name;
            $newJob->name = $currentJob->NameEnglish;
            $newJob->abbreviation = $currentJob->Abbreviation;
            $newJob->job_index = $currentJob->JobIndex;
            $newJob->role = $currentJob->Role;

            if($currentJob->ClassJobCategory->ID == 30) {
                $newJob->is_disciple_of_war = 1;
            }
            else {
                $newJob->is_disciple_of_war = 0;
            }

            $newJob->save();

            echo $newJob->id . " " . $newJob->parent_id . " " . $newJob->slug . " " . $newJob->name . " " . $newJob->job_index . " " . $newJob->role . "\n";
        }
    }
}
