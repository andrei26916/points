<?php


namespace App\Services;


use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class UserService
{

    /**
     * @param $id
     * @return mixed
     */
    public function index($id)
    {
        return User::find($id);
    }


    /**
     * @param float $lat
     * @param float $lon
     * @return LengthAwarePaginator
     */
    public function nearestPoints(float $lat, float $lon): LengthAwarePaginator
    {
        return DB::table("users")
            ->select(
                "*",
                DB::raw(
                    "6371 * acos(cos(radians(" . $lat . "))
                         * cos(radians(users.lat))
                         * cos(radians(users.lon) - radians(" . $lon . "))
                         + sin(radians(" . $lat . "))
                         * sin(radians(users.lat))) AS distance"
                )
            )
            ->orderBy('distance', 'ASC')
            ->paginate(50);
    }

}
