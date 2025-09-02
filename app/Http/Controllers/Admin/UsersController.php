<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\User;
use Doctrine\DBAL\Query;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $title = 'مدیریت کاربران';

        $usersQuery = User::query();

        switch ($request->query('sort','newest')){
            case 'name_asc':{
                $usersQuery
                    ->orderBy('first_name')
                    ->orderBy('last_name');
                break;
            }

            case 'name_desc':{
                $usersQuery
                    ->orderByDesc('first_name')
                    ->orderByDesc('last_name');
                break;
            }

            default:{
                $usersQuery->orderByDesc('created_at');
            }
        }

        $users = $usersQuery
            ->when($request->filled('search'),function (Builder $query) use ($request){
                $Keyword = $request->query('search');
                $query->whereAny([
                    'first_name',
                    'last_name',
                    'email',
                    'phone'
                ],"LIKE","%$Keyword%");
            })
            ->orderByDesc('created_at')
            ->paginate();

        return view('admin.users.index',compact('title','users'));
    }

    public function show(int $userId)
    {
        $user = User::query()
            ->where('id',$userId)
            ->with('latestOrders')
            ->firstOrFail();

        $title = 'جزییات کاربر |' . getUsersFullName($user);

        return view('admin.users.show', compact('title','user'));
    }

    public function edit(int $userId)
    {
        $user = User::findOrFail($userId);

        $title = 'ویرایش کاربران';

        return view('admin.users.edit',compact('title','user'));
    }

    public function update(UserUpdateRequest $request, int $userId)
    {
        $user = User::findOrFail($userId);

        $inputs = $request->validated();

        if ($request->filled('password')){
            $inputs['password'] = Hash::make($inputs['password']);
        }else{
            unset($inputs['password']);
        }

        try {
            $user->update($inputs);
        }catch (Exception $exception){
            Log::error($exception);

            return backWithError();
        }

        return redirect()->route('admin.users.index');
    }

    public function delete(int $userId)
    {
        $user = User::findOrFail($userId);

        try {
            $user->delete();
        }catch (Exception $exception){
            Log::error($exception);

            return backWithError();
        }

        return redirect()->route('admin.users.index');
    }

}
