<?php

namespace Database\Seeders;

use App\Models\Passive;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PassiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs = \App\Models\Job::all();
        foreach($jobs as $job){
            if ($job->id != 28) {continue;}
            $api = new \XIVAPI\XIVAPI();
            $jobAbbreviation = $job->abbreviation;
            $results = $api->search->columns(['ID'])->filter('ClassJobCategoryTargetID', 1, '>')->filter('ClassJobCategory.' . $jobAbbreviation, 1, '=')->filter('Level', 0, '>')->results()->Results;
            $jobPassiveIDs = [];
            foreach ($results as $result) {
                 if ($result->ID == 66 || $result->ID == 69) {
                     continue;
                }
                $jobPassiveIDs[] = $result->ID;
            }

            echo $job->name . " passive:\n";
            foreach ($jobPassiveIDs as $jobPassiveID) {
                $currentPassive = $api->content->Trait()->one($jobPassiveID);
                echo $job->name .  " => " . $currentPassive->Name;
                $passiveRecord = new Passive;
                $passiveRecord->id = $currentPassive->ID;
                $passiveRecord->job_id = $job->id;
                $passiveRecord->name = $currentPassive->Name;
                $passiveRecord->level = $currentPassive->Level;
                $passiveRecord->description = $currentPassive->Description;
                $passiveRecord->hd_icon_url = $currentPassive->IconHD;
                $passiveRecord->save();

            }
        }
    }
}


