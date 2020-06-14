<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\Permission;
use App\PermissionRole;
use DB;
use App\User;

class SettingsController extends Controller
{
    //
    public function createRole(Request $request){
        Role::create(array(
            'role'=>$request->role
        ));
        return redirect('/settings');
    }
    public function displayUserAndRoles($id){
        $get_selected_role = Role::paginate('10');
        $display_user=User::join('roles','users.role_id','roles.id')
        ->where('users.id',$id)
        ->select('users.name','users.email','roles.role','users.id')->paginate('10');
        $get_my_role = User::join('roles','users.role_id','roles.id')
        ->where('users.id',$id)->select('roles.role')->value('role');
        return view('admin_pages.user-role', compact('display_user','get_selected_role','get_my_role'));
    }
    public function displayPermissionRole($id){
        $get_selected_role = Role::where('id',$id)->get();
        $display_permission_roles=PermissionRole::join('roles','permission_roles.role_id','roles.id')
        ->join('permissions','permission_roles.permission_id','permissions.id')
        ->where('roles.id',$id)
        ->select('permissions.id','roles.id','permissions.permission','roles.role')
        ->paginate('10');
        return view('admin_pages.permission-role', compact('display_permission_roles','get_selected_role'));
    }

    public function displayRoles($role_name){
        $role_id = Role::where('role',$role_name)->value('id');
        $display_permission_roles=PermissionRole::where('role_id',$role_id)->join('permissions','permissions.id','permission_roles.permission_id')->paginate('10');
        return view('admin_pages.roles-table', compact('display_permission_roles'));
    }
    public function displayCheckboxes(){
        $display_all_permissions =Permission::paginate('10');
        return view('admin_pages.permission-checkboxes-table', compact('display_all_permissions'));
    }
    public function assign_roles($role_name, Request $request){
        $id = Role::where('role',$role_name)->value('id');
        if(empty($request->user_permisions)){
            return redirect()->back()->withErrors("No updates were made, you didn't select any permision");
        }
        $permissions = $request->user_permisions;
            foreach($permissions as $permission){
                if(PermissionRole::where('role_id',$id)->where('permission_id',$permission)->exists()){
                    continue;
                }
                else{
                    PermissionRole::create(array(
                        'role_id' => $id,
                        'permission_id' => $permission,
                        'created_by'     => Auth::user()->id
                    ));
                }
            }
        return Redirect()->back()->with('message',"Permission(s) added Successfully");
    }

    public function unSignPermission($id){
        $role_id = Role::where('role',request()->role_name)->value('id');
        PermissionRole::where('role_id',$role_id)->where('permission_id',$id)->delete();
        return redirect()->back()->with('message','Role unassigned successfully');
    }

    public function updateRole($id, Request $request){
        User::where('id',$id)->update(array(
            'role_id'=>$request->user_role
        ));
        return redirect('/settings');
    }
}