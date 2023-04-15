<?php

namespace App\Http\Controllers\User;

use App\Models\UserWorkflow;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\AddWorkflowRequest;

class WorkflowController extends Controller
{
    // public function store(AddWorkflowRequest $request)
    // {
    //     try {
    //         if ($request->user_id ==  Auth::user()->id) {
    //             $workflow = UserWorkflow::create($request->all())->with('user')->where('user_id', Auth::user()->id)->get();
    //         } else {
    //             return errorResponse("Invalid User Id");
    //         }
    //     } catch (\Exception $ex) {
    //         return errorResponse("Action failed", $ex->getMessage());
    //     }
    //     return successResponse("Workflow added successfully", $workflow);
    // }
}
