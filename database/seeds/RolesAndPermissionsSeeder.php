<?php
use App\User;
use App\Agent;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Guard: admin
        // create Users permissions
        Permission::create(['guard_name' => 'admin', 'name' => 'create users']);
        Permission::create(['guard_name' => 'admin', 'name' => 'view users']);
        Permission::create(['guard_name' => 'admin', 'name' => 'update users']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete users']);
        Permission::create(['guard_name' => 'admin', 'name' => 'forceDelete users']);

        // create Agents permissions
        Permission::create(['guard_name' => 'admin', 'name' => 'create agents']);
        Permission::create(['guard_name' => 'admin', 'name' => 'view agents']);
        Permission::create(['guard_name' => 'admin', 'name' => 'update agents']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete agents']);
        Permission::create(['guard_name' => 'admin', 'name' => 'forceDelete agents']);

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

        // Agent Admins
        $role = Role::create(['guard_name' => 'admin', 'name' => 'agent-admin'])
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
                'create agents',
                'view agents',
                'update agents',
                'delete agents'
            ]);

        // Create a super-admin (webmaster) role and give it all permissions
        $role = Role::create(['guard_name' => 'admin', 'name' => 'webmaster'])->givePermissionTo(Permission::all());

        // Assign roles to the first few agents
        $agent = Agent::find(1)->assignRole('webmaster');
        $agent = Agent::find(2)->assignRole('agent-admin');
        $agent = Agent::find(3)->assignRole('agent');
    }
}
