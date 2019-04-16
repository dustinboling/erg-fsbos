<?php
use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create Users permissions
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'forceDelete users']);

        // create Roles permissions
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);
        Permission::create(['name' => 'forceDelete roles']);

        // create Permissions permissions
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);
        Permission::create(['name' => 'forceDelete permissions']);

        // create Cities permissions
        Permission::create(['name' => 'create cities']);
        Permission::create(['name' => 'view cities']);
        Permission::create(['name' => 'update cities']);
        Permission::create(['name' => 'delete cities']);
        Permission::create(['name' => 'forceDelete cities']);

        // create Listings permissions
        Permission::create(['name' => 'create listings']);
        Permission::create(['name' => 'view listings']);
        Permission::create(['name' => 'update listings']);
        Permission::create(['name' => 'delete listings']);
        Permission::create(['name' => 'forceDelete listings']);

        // create Leads permissions
        Permission::create(['name' => 'create leads']);
        Permission::create(['name' => 'view leads']);
        Permission::create(['name' => 'update leads']);
        Permission::create(['name' => 'delete leads']);
        Permission::create(['name' => 'forceDelete leads']);

        // create roles and assign created permissions

        // this can be done as separate statements
        // $role = Role::create(['name' => 'agent']);
        // $role->givePermissionTo('update listings');

        // or may be done by chaining

        // create a super-admin role and give it all permissions
        $role = Role::create(['name' => 'webmaster'])->givePermissionTo(Permission::all());

        // Subscriber
        $role = Role::create(['name' => 'subscriber'])
            ->givePermissionTo([
                'create leads',
                'view cities',
                'view listings',
            ]);

        // Agents
        $role = Role::create(['name' => 'agent'])
            ->givePermissionTo([
                'view cities',
                'update cities',
                'view listings',
                'update listings',
                'view leads',
                'update leads',
            ]);

        // Admins
        $role = Role::create(['name' => 'admin'])
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
                'delete users',
            ]);

        $user = User::find(1)->assignRole('webmaster');
        $user = User::find(2)->assignRole('admin');
        $user = User::find(3)->assignRole('agent');
        $user = User::find(4)->assignRole('subscriber');

    }
}
