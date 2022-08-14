<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Repositories\UsersRepository;
use App\Http\Controllers\AppBaseController;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Flash;
use Response;

class UsersController extends AppBaseController{
    /** @var  UsersRepository */
    private $usersRepository;

    public function __construct(UsersRepository $usersRepo){
        $this->usersRepository = $usersRepo;
    }

    /**
     * Display a listing of the Users.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
        $users = $this->usersRepository->all();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new Users.
     *
     * @return Response
     */
    public function create(){
        $sRoles=Role::orderBy('name')->get();
        $roles=[];
        return view('users.create', compact('sRoles', 'roles'));
    }

    /**
     * Store a newly created Users in storage.
     *
     * @param CreateUsersRequest $request
     *
     * @return Response
     */
    public function store(CreateUsersRequest $request){
        $input = $request->all();
        $users = $this->usersRepository->create($input);
        $roles=[];
        if($request->has('s_role_id')){
            $roles=$input['s_role_id'];
        }
        Flash::success('Users saved successfully.');
        return redirect(route('users.index'));
    }

    /**
     * Display the specified Users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id){
        $users = $this->usersRepository->find($id);
        if (empty($users)) {
            Flash::error('Users not found');
            return redirect(route('users.index'));
        }
        return view('users.show')->with('users', $users);
    }

    /**
     * Show the form for editing the specified Users.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id){
        $users = $this->usersRepository->find($id);
        if (empty($users)) {
            Flash::error('Users not found');
            return redirect(route('users.index'));
        }
        $sRoles=Role::orderBy('name')->get();
        $roles=$users->roles->pluck('id')->toArray();
        return view('users.edit', compact('sRoles', 'roles'))->with('users', $users);
    }

    /**
     * Update the specified Users in storage.
     *
     * @param int $id
     * @param UpdateUsersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsersRequest $request){
        $users = $this->usersRepository->find($id);
        if (empty($users)) {
            Flash::error('Users not found');
            return redirect(route('users.index'));
        }
        $input=$request->all();
        $roles=[];
        if($request->has('s_role_id')){
            $roles=$input['s_role_id'];
        }
        DB::transaction(function () use($input,$roles,$id){
            $users = $this->usersRepository->update($input, $id);
            $users->syncRoles($roles);
            if(isset($input['password'])){
                $users->password = bcrypt($input['password']);
            }
            $users->save();
        },3);
        Flash::success('Users updated successfully.');
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified Users from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id){
        $users = $this->usersRepository->find($id);
        if (empty($users)) {
            Flash::error('Users not found');
            return redirect(route('users.index'));
        }
        $this->usersRepository->delete($id);
        Flash::success('Users deleted successfully.');
        return redirect(route('users.index'));
    }
}
