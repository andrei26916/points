<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Utils;

class UserController extends Controller
{

    protected $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return $this->userService->index($request->id);
    }

    /**
     * @param UserRequest $request
     * @return LengthAwarePaginator
     */
    public function nearestPoints(UserRequest $request): LengthAwarePaginator
    {
        return $this->userService->nearestPoints($request->lat, $request->lon);
    }
}
