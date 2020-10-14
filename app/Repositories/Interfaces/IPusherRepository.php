<?php


namespace App\Repositories\Interfaces;


use App\Models\User;

interface IPusherRepository
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll();

    /**
     * Get all
     * @return mixed
     */
    public function getUserlasted();

    /**
     * Find a user by email
     * @return User
     */
    public function findByEmail(string $email);
}
