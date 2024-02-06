<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * List of applications to add.
     */
    private $permissions = [
        'role-list',
        'role-create',
        'role-edit',
        'role-delete',
        'product-list',
        'product-create',
        'product-edit',
        'product-delete',
        'user-list',
        'user-create',
        'user-edit',
        'user-delete',
        'category-list',
        'category-create',
        'category-edit',
        'category-delete',
        'blog-list',
        'blog-create',
        'blog-edit',
        'blog-delete',
        'city-list',
        'city-create',
        'city-edit',
        'city-delete',
        'country-list',
        'country-create',
        'country-edit',
        'country-delete',
        'coupon-list',
        'coupon-create',
        'coupon-edit',
        'coupon-delete',
        'shipping-list',
        'shipping-create',
        'shipping-edit',
        'shipping-delete',
        'slider-list',
        'slider-create',
        'slider-edit',
        'slider-delete',
        'state-list',
        'state-create',
        'state-edit',
        'state-delete',
        'aboutus_settings-list',
        'aboutus_settings-edit',
        'contact_settings-list',
        'contact_settings-edit',
        'files_settings-list',
        'files_settings-edit',
        'links_settings-list',
        'links_settings-edit',
        'general_settings-list',
        'general_settings-edit',
        'return_exchange_settings-list',
        'return_exchange_settings-edit',
        'terms_settings-list',
        'terms_settings-edit',
        'message-list',
        'message-read',
        'message-unread',
        'message-delete',
        'review-list',
        'review-view',
        'review-unview',
        'review-delete',
    ];


    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['guard_name' => 'admin', 'name' => $permission]);
        }

        // Create admin User and assign the role to him.
        $admin = Admin::create([
            'name' => 'Morshedy',
            'email' => 'morshedy@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('morshedy'),
            'remember_token' => Str::random(10),
        ]);

        $role = Role::create(['guard_name' => 'admin', 'name' => 'Super Admin']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $admin->assignRole([$role->id]);
    }
}
