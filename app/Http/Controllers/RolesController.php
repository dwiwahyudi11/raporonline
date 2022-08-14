<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRolesRequest;
use App\Http\Requests\UpdateRolesRequest;
use App\Repositories\RolesRepository;
use App\Http\Controllers\AppBaseController;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use DB;
use Flash;
use Response;

class RolesController extends AppBaseController{
    /** @var  RolesRepository */
    private $rolesRepository;

    public function __construct(RolesRepository $rolesRepo){
        $this->rolesRepository = $rolesRepo;
    }

    /**
     * Display a listing of the Roles.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request){
        $roles = $this->rolesRepository->all();
        return view('roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new Roles.
     *
     * @return Response
     */
    public function create(){
        $sPermissions=Permission::orderBy('name')->get();
        $permissions=[];
        return view('roles.create', compact('sPermissions', 'permissions'));
    }

    /**
     * Store a newly created Roles in storage.
     *
     * @param CreateRolesRequest $request
     *
     * @return Response
     */
    public function store(CreateRolesRequest $request){
        $input = $request->all();
        try{
            DB::beginTransaction();
            $role = Role::create(['name'=>$input['name'],'guard_name'=>$input['guard_name']]);
            if($request->has('s_permission_id')) {
                $permissions=Permission::whereIn('id',$input['s_permission_id'])->get();
                $role->syncPermissions($permissions);
            }
            DB::commit();
            Flash::success('Role updated successfully.');
        }catch (Exception $e){
            DB::rollBack();
            Flash::error('Role updated not save.');
        }
        return redirect(route('roles.index'));
    }

    /**
     * Display the specified Roles.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id){
        $roles = $this->rolesRepository->find($id);
        if (empty($roles)) {
            Flash::error('Roles not found');
            return redirect(route('roles.index'));
        }
        return view('roles.show')->with('roles', $roles);
    }

    /**
     * Show the form for editing the specified Roles.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id){
        $roles = $this->rolesRepository->find($id);
        if (empty($roles)) {
            Flash::error('Roles not found');
            return redirect(route('roles.index'));
        }
        $sPermissions=Permission::orderBy('name')->get();
        $permissions=$roles->permissions->pluck('id')->toArray();
        return view('roles.edit', compact('sPermissions', 'permissions'))->with('roles', $roles);
    }

    /**
     * Update the specified Roles in storage.
     *
     * @param int $id
     * @param UpdateRolesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRolesRequest $request){
        $roles = $this->rolesRepository->find($id);
        if (empty($roles)) {
            Flash::error('Roles not found');
            return redirect(route('roles.index'));
        }
        $input=$request->all();
        try{
            DB::beginTransaction();
            $roles->update(['name'=>$input['name'],'guard_name'=>$input['guard_name']]);
            if($request->has('s_permission_id')){
                $permissions=Permission::whereIn('id',$input['s_permission_id'])->get();
                $roles->syncPermissions($permissions);
            }
            DB::commit();
            Flash::success('Role updated successfully.');
        }catch (Exception $e){
            DB::rollBack();
            Flash::error('Role updated not save.');
        }
        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified Roles from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id){
        $roles = $this->rolesRepository->find($id);
        if (empty($roles)) {
            Flash::error('Roles not found');
            return redirect(route('roles.index'));
        }
        $this->rolesRepository->delete($id);
        Flash::success('Roles deleted successfully.');
        return redirect(route('roles.index'));
    }
}
