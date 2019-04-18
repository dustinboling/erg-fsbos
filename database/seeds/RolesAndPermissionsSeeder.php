<?php
use App\User;
use App\Administrator;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Administrator Permissions and Roles
        // create Users permissions
        Permission::create(['guard_name' => 'admin', 'name' => 'create users']);
        Permission::create(['guard_name' => 'admin', 'name' => 'view users']);
        Permission::create(['guard_name' => 'admin', 'name' => 'update users']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete users']);
        Permission::create(['guard_name' => 'admin', 'name' => 'forceDelete users']);

        // create Roles permissions
        Permission::create(['guard_name' => 'admin', 'name' => 'create roles']);
        Permission::create(['guard_name' => 'admin', 'name' => 'view roles']);
        Permission::create(['guard_name' => 'admin', 'name' => 'update roles']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete roles']);
        Permission::create(['guard_name' => 'admin', 'name' => 'forceDelete roles']);

        // create Permissions permissions
        Permission::create(['guard_name' => 'admin', 'name' => 'create permissions']);
        Permission::create(['guard_name' => 'admin', 'name' => 'view permissions']);
        Permission::create(['guard_name' => 'admin', 'name' => 'update permissions']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete permissions']);
        Permission::create(['guard_name' => 'admin', 'name' => 'forceDelete permissions']);

        // create Cities permissions
        Permission::create(['guard_name' => 'admin', 'name' => 'create cities']);
        Permission::create(['guard_name' => 'admin', 'name' => 'view cities']);
        Permission::create(['guard_name' => 'admin', 'name' => 'update cities']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete cities']);
        Permission::create(['guard_name' => 'admin', 'name' => 'forceDelete cities']);

        // create Listings permissions
        Permission::create(['guard_name' => 'admin', 'name' => 'create listings']);
        Permission::create(['guard_name' => 'admin', 'name' => 'view listings']);
        Permission::create(['guard_name' => 'admin', 'name' => 'update listings']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete listings']);
        Permission::create(['guard_name' => 'admin', 'name' => 'forceDelete listings']);

        // create Leads permissions
        Permission::create(['guard_name' => 'admin', 'name' => 'create leads']);
        Permission::create(['guard_name' => 'admin', 'name' => 'view leads']);
        Permission::create(['guard_name' => 'admin', 'name' => 'update leads']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete leads']);
        Permission::create(['guard_name' => 'admin', 'name' => 'forceDelete leads']);

        // create roles and assign created permissions

        // this can be done as separate statements
        // $role = Role::create(['name' => 'agent']);
        // $role->givePermissionTo('update listings');

        // or may be done by chaining

        // create a super-admin role and give it all permissions
        $role = Role::create(['guard_name' => 'admin', 'name' => 'webmaster'])->givePermissionTo(Permission::all());

        // Agents
        $role = Role::create(['guard_name' => 'admin', 'name' => 'agent'])
            ->givePermissionTo([
                'view cities',
                'update cities',
                'view listings',
                'update listings',
                'view leads',
                'update leads'
            ]);

        // Admins
        $role = Role::create(['guard_name' => 'admin', 'name' => 'admin'])
            ->givePermissionTo([
                'create cities',
                'view cities',
                'update cities',
                'delete cities',
                'create listings',
                'view listings',
                'update listings',
                'delete listings',
                'create leads',
                'view leads',
                'update leads',
                'delete leads',
                'create users',
                'view users',
                'update users',
                'delete users'
            ]);

        $admin = Administrator::find(1)->assignRole('webmaster');
        $admin = Administrator::find(2)->assignRole('admin');
        $admin = Administrator::find(3)->assignRole('agent');


        // Create User Permissions and Roles
        // create Listings permissions
        Permission::create(['guard_name' => 'web', 'name' => 'view listings']);

        // create roles and assign created permissions
        // Subscribers
        $role = Role::create(['guard_name' => 'web', 'name' => 'subscriber'])
        ->givePermissionTo([
            'view listings'
        ]);

        $user = User::find(1)->assignRole('subscriber');
    }
}
