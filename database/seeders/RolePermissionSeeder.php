<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // ── DEFINISI PERMISSIONS ──
        $permissions = [
            // Dashboard
            'dashboard.view',

            // Securitas
            'securitas.view',
            'securitas.create',
            'securitas.edit',
            'securitas.delete',

            // Contacts
            'contacts.view',
            'contacts.create',
            'contacts.edit',
            'contacts.delete',

            // Type Products
            'type-products.view',
            'type-products.create',
            'type-products.edit',
            'type-products.delete',

            // Purchase Orders
            'purchase-orders.view',
            'purchase-orders.create',
            'purchase-orders.edit',
            'purchase-orders.delete',
            'purchase-orders.approve',   // khusus manager

            // Purchase Trips
            'purchase-trips.view',
            'purchase-trips.create',
            'purchase-trips.edit',
            'purchase-trips.delete',

            // Sale Products
            'sale-products.view',
            'sale-products.create',
            'sale-products.edit',
            'sale-products.delete',

            // Sale Product Details
            'sale-product-details.view',
            'sale-product-details.create',
            'sale-product-details.edit',
            'sale-product-details.delete',

            // Users & Roles (admin only)
            'users.view',
            'users.create',
            'users.edit',
            'users.delete',
            'roles.view',
            'roles.edit',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm, 'guard_name' => 'web']);
        }

        // ── DEFINISI ROLES & ASSIGN PERMISSIONS ──

        // ADMIN — akses penuh
        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $admin->syncPermissions(Permission::all());

        // MANAGER — lihat semua + approve, tidak bisa delete & kelola user
        $manager = Role::firstOrCreate(['name' => 'manager', 'guard_name' => 'web']);
        $manager->syncPermissions([
            'dashboard.view',
            'securitas.view',
            'contacts.view',
            'type-products.view',
            'purchase-orders.view', 'purchase-orders.approve',
            'purchase-trips.view',
            'sale-products.view',
            'sale-product-details.view',
        ]);

        // OPERATOR — input data, tidak bisa delete & tidak bisa approve
        $operator = Role::firstOrCreate(['name' => 'operator', 'guard_name' => 'web']);
        $operator->syncPermissions([
            'dashboard.view',
            'securitas.view', 'securitas.create', 'securitas.edit',
            'contacts.view', 'contacts.create', 'contacts.edit',
            'type-products.view', 'type-products.create', 'type-products.edit',
            'purchase-orders.view', 'purchase-orders.create', 'purchase-orders.edit',
            'purchase-trips.view', 'purchase-trips.create', 'purchase-trips.edit',
            'sale-products.view', 'sale-products.create', 'sale-products.edit',
            'sale-product-details.view', 'sale-product-details.create', 'sale-product-details.edit',
        ]);

        // VIEWER — hanya lihat
        $viewer = Role::firstOrCreate(['name' => 'viewer', 'guard_name' => 'web']);
        $viewer->syncPermissions([
            'dashboard.view',
            'securitas.view',
            'contacts.view',
            'type-products.view',
            'purchase-orders.view',
            'purchase-trips.view',
            'sale-products.view',
            'sale-product-details.view',
        ]);

        // ── BUAT USER ADMIN DEFAULT ──
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@plastikpro.com'],
            [
                'name'     => 'Super Admin',
                'password' => Hash::make('password123'),
            ]
        );
        $adminUser->assignRole('admin');

        $this->command->info('✅ Roles, permissions, dan admin user berhasil dibuat!');
        $this->command->info('   Email   : admin@plastikpro.com');
        $this->command->info('   Password: password123');
    }
}
