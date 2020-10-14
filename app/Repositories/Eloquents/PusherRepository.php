<?php


namespace App\Repositories\Eloquents;

use App\Models\User;
use App\Repositories\Interfaces\IPusherRepository;

class PusherRepository extends BaseRepository implements IPusherRepository
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
        return $this->model->select('id', 'email', 'role', 'created_at', 'updated_at')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function findByEmail($email)
    {
        return $this->model->whereEmail($email)->first();
    }
}
