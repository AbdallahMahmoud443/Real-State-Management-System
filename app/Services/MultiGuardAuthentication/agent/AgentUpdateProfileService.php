<?php

namespace App\Services\MultiGuardAuthentication\agent;

use App\Repositories\MultiGuardAuthentication\Update_profile\Contracts\AgentUpdateProfileContract;
use App\Services\MultiGuardAuthentication\Contracts\UpdateProfileServiceContract;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AgentUpdateProfileService implements UpdateProfileServiceContract
{
    public function __construct(protected AgentUpdateProfileContract $agentUpdateProfileRepo) {}
    public function UpdateProfile($validated_data): void
    {
        // todo : update admin profile
        $this->agentUpdateProfileRepo->UpdateAgentProfile($validated_data);
    }
    public function uploadImageProfile($image): void
    {
        $agent = $this->agentUpdateProfileRepo->getAuthenticatedUser();
        if ($agent->photo != null) {
            File::delete(public_path($agent->photo));
        }
        $customFileName = 'agent_' . Str::uuid()  .  $image->getClientOriginalExtension();
        $path = $image->storeAs('/agent/profile_images', $customFileName, 'public');
        $this->agentUpdateProfileRepo->UpdateSystemUserImageProfile(['photo' => '/uploads/' . $path]);
    }
}
