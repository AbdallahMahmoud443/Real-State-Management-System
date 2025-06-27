<?php

namespace App\Http\Controllers\Admin\dashboard\Users\Agents;

use App\Http\Controllers\Controller;
use App\Services\Users\Agents\AgentServices;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function __construct(protected AgentServices $agentServices) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $agents = $this->agentServices->fetchAllAgents();
        return view('admin.dashboard.agents.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $agent = $this->agentServices->fetchAgentById($id);
        return view('admin.dashboard.agents.edit', compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'password' => 'max:255',
            'confirm_password' => 'max:255|same:password',
            'status' => 'required|in:1,0',
        ]);
        $data = $request->only(['status', 'password']);
        $result = $this->agentServices->updateAgentInformation($id, $data);
        if ($result) {
            return redirect()->route('admin.agents.index')->with('success', 'Agent updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update agent');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->agentServices->deleteAgent($id);
        if ($result) {
            return redirect()->back()->with('success', 'Agent deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to Delete Agent');
        }
    }
}
