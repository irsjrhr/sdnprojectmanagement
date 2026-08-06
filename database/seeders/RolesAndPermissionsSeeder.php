<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Delete obsolete legacy permissions first
        $obsoletePermissions = [
            'manage projects', 'manage epics', 'manage sprints', 'manage tasks',
            'manage roles', 'manage permissions',
            'manage features', 'view features', 'create features (old)',
            'manage blueprints', 'view blueprints',
            'manage brd',
            'update tasks', // old standalone
            'edit feature gap',
            'access roadmap',
            'access kanban',
        ];
        Permission::whereIn('name', $obsoletePermissions)->delete();

        // Create granular CRUD permissions
        $permissions = [
            'create roles', 'read roles', 'update roles', 'delete roles',
            'create permissions', 'read permissions', 'update permissions', 'delete permissions',
            'create projects', 'read projects', 'update projects', 'delete projects',
            'create epics', 'read epics', 'update epics', 'delete epics',
            'create sprints', 'read sprints', 'update sprints', 'delete sprints',
            'create tasks', 'read tasks', 'update tasks', 'delete tasks',
            'read kanban', 'update kanban',
            'read roadmap', 'update roadmap',
            'create features', 'read features', 'update features', 'delete features',
            'create blueprints', 'read blueprints', 'update blueprints', 'delete blueprints',
            'create brd', 'read brd', 'update brd', 'delete brd',
            'create erds', 'read erds', 'update erds', 'delete erds',
            'create fsds', 'read fsds', 'update fsds', 'delete fsds',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create Roles
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin']);
        $developer = Role::firstOrCreate(['name' => 'Developer']);
        $client = Role::firstOrCreate(['name' => 'Client']);

        // Assign Permissions to Roles
        // Developer
        $developer->syncPermissions([
            'read projects',
            'read epics',
            'read sprints',
            'create tasks', 'read tasks', 'update tasks', 'delete tasks',
            'read kanban', 'update kanban',
            'read roadmap',
            'read features',
            'read blueprints',
            'create brd', 'read brd', 'update brd', 'delete brd',
        ]);

        // Client
        $client->syncPermissions([
            'read projects',
            'read blueprints',
            'create features', 'read features',
        ]);

        // Note: Super Admin bypasses permissions via Gate::before in AppServiceProvider

        // Assign Roles to Users
        $usersMap = [
            'teguh@arxino.com' => 'Super Admin',
            'admin@arxino.com' => 'Super Admin',
            'william@arxino.com' => 'Developer',
            'irshandy@arxino.com' => 'Developer',
            'rifki@arxino.com' => 'Developer',
            'yoseph@arxino.com' => 'Developer',
            'client1@arxino.com' => 'Client',
        ];

        foreach ($usersMap as $email => $roleName) {
            $user = User::where('email', $email)->first();
            if ($user) {
                // Ensure user doesn't have duplicate roles, sync roles clears old ones
                $user->syncRoles([$roleName]);
            }
        }
    }
}
