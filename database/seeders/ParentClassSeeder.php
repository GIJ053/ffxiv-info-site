<?php

namespace Database\Seeders;

use App\Models\ParentClass;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ParentClassSeeder extends Seeder
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

            if ($currentClass->DohDolJobIndex == -1 && $currentClass->JobIndex == 0) {
                $classIDs[] = $currentClass->ID;
            }
        }

        for ($i = 0; $i < count($classIDs); $i++) {
            $newClass = new ParentClass;
            $currentParentClass = $api->content->ClassJob()->one($classIDs[$i]);

            $newClass->id = $currentParentClass->ID;
            $newClass->slug = $currentParentClass->Name;
            $newClass->name = $currentParentClass->NameEnglish;
            $newClass->abbreviation = $currentParentClass->Abbreviation;
            $newClass->role = $currentParentClass->Role;

            if($currentParentClass->ClassJobCategory->ID == 30) {
                $newClass->is_disciple_of_war = 1;
            }
            else {
                $newClass->is_disciple_of_war = 0;
            }

            $newClass->save();
            echo $newClass->id . " " . $newClass->slug . " " . $newClass->name . " " . $newClass->abbreviation . " " . $newClass->role . "\n";
        }
    }
}
