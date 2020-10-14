<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquents\UserRepository;
use App\Repositories\Interfaces\IUserRepository;

class HomeController extends Controller
{
    protected $userRepository;
    protected $pusherRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return $this->userRepository->getUserlasted();
    }

    public function about()
    {
        return view('about');
    }

    public function conctact()
    {
        return view('contact');
    }
}
