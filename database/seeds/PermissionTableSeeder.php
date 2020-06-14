<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = ['Can view dashboard','Can view course','Can view course content','Can view setting','Can add course','Can view enrollment form'];
        for($i=0; $i < count($permissions); $i++){
            $permission = new permission();
            if(permission::where("id",$i)->exists()){
                $permission->id = $i+1;
            }
            else{
                $permission->id = $i;
            } 
            $permission->permission=$permissions[$i];
            $permission->save();
        }
}
}
