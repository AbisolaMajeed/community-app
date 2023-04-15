<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CommunityWorkflow;
use App\Models\CommunityWorkflowEntry;

class CommunityWorkflowEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workflows = CommunityWorkflow::all();
        // dd($workflows);
        foreach ($workflows as $cw) {
            // dd($cw->id);
            //Define workflow entries
            if ($cw->name = 'State') {
                $workflow_entries = ['Lagos', 'Kano', 'Imo'];


                for ($entry = 0; $entry < count($workflow_entries); $entry++) {
                    CommunityWorkflowEntry::updateOrCreate(
                        ["community_workflow_id" => $cw->id, "name" => $workflow_entries[$entry]],
                        [
                            'name' => $workflow_entries[$entry]
                        ]
                    );
                }
            }
        }

        foreach ($workflows as $cw) {
            if ($cw->name = 'Zone') {
                $workflow_entries = ['Zone A', 'Zone B', 'Zone C'];

                for ($entry = 0; $entry < count($workflow_entries); $entry++) {
                    CommunityWorkflowEntry::updateOrCreate(
                        ["community_workflow_id" => $cw->id, "name" => $workflow_entries[$entry]],
                        [
                            'name' => $workflow_entries[$entry]
                        ]
                    );
                }
            }
        }
        foreach ($workflows as $cw) {
            if ($cw->name = 'LGA') {
                $workflow_entries = ['Alimosho', 'Ilorin West', 'Ijebu East'];

                for ($entry = 0; $entry < count($workflow_entries); $entry++) {
                    CommunityWorkflowEntry::updateOrCreate(
                        ["community_workflow_id" => $cw->id, "name" => $workflow_entries[$entry]],
                        [
                            'name' => $workflow_entries[$entry]
                        ]
                    );
                }
            }
        }
    }
}
