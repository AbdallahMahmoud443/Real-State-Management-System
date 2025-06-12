<?php

namespace App\Repositories\MultiGuardAuthentication\Update_profile;

use  App\Repositories\MultiGuardAuthentication\Update_profile\BaseUpdateProfileRepository;
use App\Models\Agent;
use App\Repositories\MultiGuardAuthentication\Update_profile\Contracts\AgentUpdateProfileContract;
use Illuminate\Support\Facades\Hash;



class AgentUpdateProfileRepository extends BaseUpdateProfileRepository implements AgentUpdateProfileContract
{
    public function __construct(protected Agent $agent)
    {
        parent::__construct($this->agent, 'agent');
    }
    public function UpdateAgentProfile(array $data)
    {
        $agent = $this->getAuthenticatedUser();
        $agent->name = $data['name'];
        $agent->email = $data['email'];
        $agent->designation = $data['designation'];
        $agent->company = $data['company'];
        $agent->phone = $data['phone'];
        $agent->biography = $data['biography'];
        $agent->country = $data['country'];
        $agent->address = $data['address'];
        $agent->state = $data['state'];
        $agent->city = $data['city'];
        $agent->zip = $data['zip'];
        $agent->website = $data['website'];
        $agent->facebook = $data['facebook'];
        $agent->twitter = $data['twitter'];
        $agent->pinterest = $data['pinterest'];
        $agent->instagram = $data['instagram'];
        $agent->youtube = $data['youtube'];
        if ($data['password']) {
            $agent->password = Hash::make($data['password']);
        }
        $agent->save();
    }
    
}
