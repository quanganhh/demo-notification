<?php

namespace App\Repositories\Eloquents;

use App\Models\User;
use App\Repositories\Interfaces\IUserRepository;

class UserRepository extends BaseRepository implements IUserRepository
{
    public function __construct()
    {
        $this->model = new User();
    }

    public  function getAll()
    {
        return $this->model->all();
    }

    public function getUserlasted()
    {
        dd('Day la Pusher');
        return $this->model->select('id', 'email', 'role', 'created_at', 'updated_at')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function findByEmail($email)
    {
        return $this->model->whereEmail($email)->first();
    }
}
