<?php

use Eclipse\Core\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('Eclipse.Core.Models.User.{id}.tenant.{tenantId}', function (User $user, $id, $tenantId) {
    return (int) $user->id === (int) $id
        && $user->sites()->whereKey($tenantId)->exists();
});
