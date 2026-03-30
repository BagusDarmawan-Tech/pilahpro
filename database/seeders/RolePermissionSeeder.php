<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // -------------------------------------------------------
        // DEFINE ALL PERMISSIONS
        // -------------------------------------------------------
        $permissions = [

            // Contact
            'contact.view',
            'contact.create',
            'contact.edit',
            'contact.delete',

            // Purchase
            'purchase.view',
            'purchase.create',
            'purchase.edit',
            'purchase.delete',

            // Pickup Session
            'pickup_session.view',
            'pickup_session.create',
            'pickup_session.edit',
            'pickup_session.delete',

            // Sorting Result
            'sorting_result.view',
            'sorting_result.create',
            'sorting_result.edit',
            'sorting_result.delete',

            // Sale
            'sale.view',
            'sale.create',
            'sale.edit',
            'sale.delete',

            // Master Data - Plastic Type
            'plastic_type.view',
            'plastic_type.create',
            'plastic_type.edit',
            'plastic_type.delete',

            // Master Data - Purchase Category
            'purchase_category.view',
            'purchase_category.create',
            'purchase_category.edit',
            'purchase_category.delete',

            // Report
            'report.view',

            // User Management (admin only)
            'user.view',
            'user.create',
            'user.edit',
            'user.delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // -------------------------------------------------------
        // OPERATOR
        // Can manage everything except user management
        // -------------------------------------------------------
        $operatorPermissions = [
            'contact.view', 'contact.create', 'contact.edit', 'contact.delete',
            'purchase.view', 'purchase.create', 'purchase.edit', 'purchase.delete',
            'pickup_session.view', 'pickup_session.create', 'pickup_session.edit', 'pickup_session.delete',
            'sorting_result.view', 'sorting_result.create', 'sorting_result.edit', 'sorting_result.delete',
            'sale.view', 'sale.create', 'sale.edit', 'sale.delete',
            'plastic_type.view', 'plastic_type.create', 'plastic_type.edit', 'plastic_type.delete',
            'purchase_category.view', 'purchase_category.create', 'purchase_category.edit', 'purchase_category.delete',
            'report.view',
        ];

        Role::create(['name' => 'operator'])->givePermissionTo($operatorPermissions);

        // -------------------------------------------------------
        // VIEWER
        // Can only view reports
        // -------------------------------------------------------
        Role::create(['name' => 'viewer'])->givePermissionTo([
            'report.view',
        ]);

        // -------------------------------------------------------
        // ADMIN
        // Full access — all permissions including user management
        // -------------------------------------------------------
        Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());
    }
}