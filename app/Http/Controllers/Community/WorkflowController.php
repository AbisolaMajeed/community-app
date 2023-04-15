<?php

namespace App\Http\Controllers\Community;

use App\Models\User;
use App\Models\Community;
use App\Models\CommunityCountry;
use App\Models\CommunityWorkflow;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CommunityWorkflowEntry;
use App\Http\Requests\Community\AddWorkflowRequest;
use App\Http\Requests\Community\AddWorkflowEntryRequest;

class WorkflowController extends Controller
{
    public function index($community_country_id)
    {
        try {
            $community_id = request()->community_id ?? Auth::user()->community_id;
            
            $community_country = CommunityCountry::where('id', $community_country_id)
                ->where('community_id', $community_id)->firstOrFail();
        } catch (\Exception $ex) {
            return errorResponse("Action failed", $ex->getMessage());
        }

        return successResponse(
            "Workflow fetched successfully",
            CommunityWorkflow::where('community_country_id', $community_country->id)->get()
        );
    }

    public function store(AddWorkflowRequest $request)
    {
        try {
            $workflow = CommunityWorkflow::create($request->all());
        } catch (\Exception $ex) {
            return errorResponse("Action failed", $ex->getMessage());
        }
        return successResponse("Workflow added successfully", $workflow);
    }

    public function deleteWorkFlow($community_country_id, $workflow_id)
    {
        try {
            $workflow = CommunityWorkflow::with('communityCountry')->where('community_country_id', $community_country_id)->where('id', $workflow_id)->first();
            $community = User::with('community')->where('community_id', $workflow->communityCountry->community_id)->first();
            if (!is_null($community)) {
                return errorResponse('User exists for ' . $workflow->name . ' Workflow');
            }
        } catch (\Throwable $th) {
            return errorResponse("Workflow does not exist", $th->getMessage());
        }
        $workflow->delete();
        return successResponse("Workflow deleted successfully");
    }

    public function addEntries(AddWorkflowEntryRequest $request)
    {
        try {
            $workflow_entry = CommunityWorkflowEntry::create($request->all());
        } catch (\Exception $ex) {
            return errorResponse("Action failed", $ex->getMessage());
        }
        return successResponse("Workflow entry added successfully", $workflow_entry);
    }

    public function listEntries($community_workflow_id)
    {
        try {
            $community_country = CommunityWorkflowEntry::where('community_workflow_id', $community_workflow_id)->get();
        } catch (\Exception $ex) {
            return errorResponse("Action failed", $ex->getMessage());
        }

        return successResponse("Workflow entry fetched successfully", $community_country);
    }

    public function deleteWorkFlowEntry($community_workflow_entry_id)
    {
        // return $community_workflow_entry_id;
        try {
            CommunityWorkflowEntry::find($community_workflow_entry_id)->delete();
        } catch (\Throwable $th) {
            return errorResponse("Workflow does not exist", $th->getMessage());
        }

        return successResponse("Workflow entry deleted successfully");
    }
}
