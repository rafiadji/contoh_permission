<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        
        $writer = Role::create(['name' => 'writer']);
        $editor = Role::create(['name' => 'edtor']);
        $publisher = Role::create(['name' => 'publisher']);
        $admin = Role::create(['name' => 'admin']);

        $write_perm = Permission::create(['name' => 'write post']);
        $edit_perm = Permission::create(['name' => 'edit post']);
        $publish_perm = Permission::create(['name' => 'publish post']);

        $writer_user = User::create([
            'name' => 'Writer',
            'email' => 'writer@posting.com',
            'password'  => bcrypt('studiokerja')
        ]);
        $editor_user = User::create([
            'name' => 'Editor',
            'email' => 'editor@posting.com',
            'password'  => bcrypt('studiokerja')
        ]);
        $publisher_user = User::create([
            'name' => 'Publisher',
            'email' => 'publisher@posting.com',
            'password'  => bcrypt('studiokerja')
        ]);
        $admin_user = User::create([
            'name' => 'Admin',
            'email' => 'admin@posting.com',
            'password'  => bcrypt('studiokerja')
        ]);
        
        $writer->givePermissionTo($write_perm);
        $writer->givePermissionTo($edit_perm);
        $writer_user->assignRole($writer);

        $editor->givePermissionTo($edit_perm);
        $editor_user->assignRole($editor);

        $publisher->givePermissionTo($publish_perm);
        $publisher_user->assignRole($publisher);
        
        $admin->givePermissionTo($write_perm, $edit_perm, $publish_perm);
        $admin_user->assignRole($admin);
    }
}
