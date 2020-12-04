<?php


namespace App\Http\Controllers\web;

use App\Http\Controllers\api\DailyCasesController;
use App\Http\Controllers\Controller;
use App\Models\DailyCases;
use App\Repositories\User\IUserRepository;
use App\Services\DailyCasesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\PassportOAuthClient;
use Auth;
use Log;

class NavigationController extends Controller
{

    private $userRepo;

    public function __construct(IUserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    function index()
    {
        return View::make('dashboard.main_dashboard');
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    function getTicketList()
    {
        return View::make('manage_tickets.ticket_list');
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    function getUserList()
    {
        $users = $this->userRepo->getAllSupportAgents();
        return View::make('manage_users.user_list', compact('users'));
    }
}
