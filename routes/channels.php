<?php

use Eclipse\Core\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('Eclipse.Core.Models.User.{id}', function (User $user, $id) {
    return (int) $user->id === (int) $id;
});
