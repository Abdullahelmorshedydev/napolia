<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionsSeeder extends Seeder
{
    /**
     * List of applications to add.
     */
    private $permissions = [
        // 'role-list',
        // 'role-create',
        // 'role-edit',
        // 'role-delete',
        // 'product-list',
        // 'product-create',
        // 'product-edit',
        // 'product-delete',
        'admin-list',
        'admin-create',
        'admin-edit',
        'admin-delete',
        // 'category-list',
        // 'category-create',
        // 'category-edit',
        // 'category-delete',
        // 'blog-list',
        // 'blog-create',
        // 'blog-edit',
        // 'blog-delete',
        // 'city-list',
        // 'city-create',
        // 'city-edit',
        // 'city-delete',
        // 'country-list',
        // 'country-create',
        // 'country-edit',
        // 'country-delete',
        // 'coupon-list',
        // 'coupon-create',
        // 'coupon-edit',
        // 'coupon-delete',
        // 'shipping-list',
        // 'shipping-create',
        // 'shipping-edit',
        // 'shipping-delete',
        // 'slider-list',
        // 'slider-create',
        // 'slider-edit',
        // 'slider-delete',
        // 'state-list',
        // 'state-create',
        // 'state-edit',
        // 'state-delete',
        // 'aboutus_settings-list',
        // 'aboutus_settings-edit',
        // 'contact_settings-list',
        // 'contact_settings-edit',
        // 'files_settings-list',
        // 'files_settings-edit',
        // 'links_settings-list',
        // 'links_settings-edit',
        // 'general_settings-list',
        // 'general_settings-edit',
        // 'return_exchange_settings-list',
        // 'return_exchange_settings-edit',
        // 'terms_settings-list',
        // 'terms_settings-edit',
        // 'message-list',
        // 'message-read',
        // 'message-unread',
        // 'message-delete',
        // 'review-list',
        // 'review-view',
        // 'review-unview',
        // 'review-delete',
        // 'order-list',
        // 'order-edit',
        // 'order-delete',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['guard_name' => 'admin', 'name' => $permission]);
        }

        // $role = Role::create(['guard_name' => 'admin', 'name' => 'Super Admin']);

        $role = Role::where('name', 'Super Admin')->first();

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $admin = Admin::where('id', 1)->first();

        $admin->assignRole([$role->id]);
    }
}
