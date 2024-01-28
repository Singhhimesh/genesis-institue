<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'Admin']);
        $writerRole = Role::create(['name' => 'Writer']);

        Permission::create(['name' => 'Enroll access']);
        Permission::create(['name' => 'Enroll edit']);
        Permission::create(['name' => 'Enroll delete']);

        Permission::create(['name' => 'Testimonials access']);
        Permission::create(['name' => 'Testimonials edit']);
        Permission::create(['name' => 'Testimonials create']);
        Permission::create(['name' => 'Testimonials delete']);

        Permission::create(['name' => 'Settings access']);
        Permission::create(['name' => 'Settings edit']);
        Permission::create(['name' => 'Settings create']);
        Permission::create(['name' => 'Settings delete']);

        Permission::create(['name' => 'Courses access']);
        Permission::create(['name' => 'Courses edit']);
        Permission::create(['name' => 'Courses create']);
        Permission::create(['name' => 'Courses delete']);

        Permission::create(['name' => 'Role access']);
        Permission::create(['name' => 'Role edit']);
        Permission::create(['name' => 'Role create']);
        Permission::create(['name' => 'Role delete']);

        Permission::create(['name' => 'User access']);
        Permission::create(['name' => 'User edit']);
        Permission::create(['name' => 'User create']);
        Permission::create(['name' => 'User delete']);

        Permission::create(['name' => 'Permission access']);
        Permission::create(['name' => 'Permission edit']);
        Permission::create(['name' => 'Permission create']);
        Permission::create(['name' => 'Permission delete']);

        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'status'   => 1,
        ])->assignRole($adminRole)->assignRole($writerRole);

        $adminRole->givePermissionTo(Permission::all());

        User::create([
            'name'     => 'Writer',
            'email'    => 'writer@example.com',
            'password' => bcrypt('admin123'),
            'status'   => 1,
        ])->assignRole($writerRole);

        $writerRole->givePermissionTo(['User create', 'User access']);

        Setting::query()->delete();

        Setting::insert([[
            'key'   => 'developer',
            'value' => 'Suraj Kashyap'
        ], [
            'key'   => 'app_name',
            'value' => 'Genesis Computer Institutions'
        ], [
            'key'   => 'front_hero_title',
            'value' => 'Welcome to the computer, learn whats matters'
        ], [
            'key'   => 'phone_numbers',
            'value' => '+98989898989'
        ], [
            'key'   => 'facebook',
            'value' => 'https://facebook'
        ], [
            'key'   => 'twitter',
            'value' => 'https://twitter'
        ], [
            'key'   => 'instagram',
            'value' => 'https://instagram'
        ]]);

        Testimonial::insert([[
            "name"        => fake()->name(),
            "profile"     => asset('frontend/images/instructor_1.jpg'),
            "description" => "Nam egestas lorem ex, sit amet commodo tortor faucibus a. Suspendisse commodo, turpis a dapibus fermentum, turpis ipsum rhoncus massa, sed commodo nisi lectus id ipsum. Sed nec elit vehicula, aliquam neque euismod, porttitor ex",
            "social" => json_encode([
                fake()->url(),
                fake()->url(),
                fake()->url(),
            ]),
            "status"     => fake()->boolean()
        ], [
            "name"        => fake()->name(),
            "profile"     => asset('frontend/images/instructor_1.jpg'),
            "description" => "Nam egestas lorem ex, sit amet commodo tortor faucibus a. Suspendisse commodo, turpis a dapibus fermentum, turpis ipsum rhoncus massa, sed commodo nisi lectus id ipsum. Sed nec elit vehicula, aliquam neque euismod, porttitor ex",
            "social" => json_encode([
                fake()->url(),
                fake()->url(),
                fake()->url(),
            ]),
            "status"     => fake()->boolean()
        ], [
            "name"        => fake()->name(),
            "profile"     => asset('frontend/images/instructor_1.jpg'),
            "description" => "Nam egestas lorem ex, sit amet commodo tortor faucibus a. Suspendisse commodo, turpis a dapibus fermentum, turpis ipsum rhoncus massa, sed commodo nisi lectus id ipsum. Sed nec elit vehicula, aliquam neque euismod, porttitor ex",
            "social" => json_encode([
                fake()->url(),
                fake()->url(),
                fake()->url(),
            ]),
            "status"     => fake()->boolean()
        ]]);
    }
}
