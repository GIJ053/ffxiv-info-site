<?php

namespace Database\Seeders;

use App\Models\Action;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActionSeeder extends Seeder
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
            $results = $api->search->columns(['ID'])->filter('ClassJobCategoryTargetID', 1, '>')->filter('ClassJobCategory.'.$jobAbbreviation, 1, '=')->filter('IsPvP', 0, '=')->filter('ClassJobLevel', 0, '>')->filter('IsRoleAction', 0, '=')->results()->Results;
            $jobActionIDs = [];
            foreach ($results as $result) {
                 if ($result->ID == 173) {
                     continue;
                }
                $jobActionIDs[] = $result->ID;
            }

            echo $job->name . " skills:\n";
            foreach ($jobActionIDs as $jobActionID) {
                $currentAction = $api->content->Action()->one($jobActionID);
                echo $job->name .  " => " . $currentAction->Name;
                $actionRecord = new Action;
                $actionRecord->id = $currentAction->ID;
                $actionRecord->job_id = $job->id;
                $actionRecord->name = $currentAction->Name;
                $actionRecord->level = $currentAction->ClassJobLevel;
                $actionRecord->description = $currentAction->Description;
                $actionRecord->cooldown = $currentAction->Recast100ms / 10;
                $actionRecord->hd_icon_url = $currentAction->IconHD;
                $actionRecord->save();
            }
        }
    }
}
