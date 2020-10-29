<?php


namespace App\Http\Repositories;


use App\Models\Task;
use App\Models\User;

class TaskRepository
{

    public function forUser(User $user)
    {
        return Task::where('user_id', $user->id)->orderBy('created_at', 'asc')->get();
    }
}
