<?php

use Illuminate\Support\Facades\Broadcast;
use Eclipse\Core\Models\User;

Broadcast::channel('Eclipse.Core.Models.User.{id}', function (User $user, $id) {
    return (int) $user->id === (int) $id;
});
