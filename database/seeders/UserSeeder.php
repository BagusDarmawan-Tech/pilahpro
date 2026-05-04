<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'username'  => 'superadmin',
                'email'     => 'admin@plastikpro.com',
                'password'  => Hash::make('password123'),
                'role'      => 'admin',
            ],
            [
                'username'  => 'budi.manager',
                'email'     => 'manager@plastikpro.com',
                'password'  => Hash::make('password123'),
                'role'      => 'manager',
            ],
            [
                'username'  => 'siti.operator',
                'email'     => 'operator@plastikpro.com',
                'password'  => Hash::make('password123'),
                'role'      => 'operator',
            ],
            [
                'username'  => 'andi.viewer',
                'email'     => 'viewer@plastikpro.com',
                'password'  => Hash::make('password123'),
                'role'      => 'viewer',
            ],
        ];

        foreach ($users as $data) {
            $role = $data['role'];
            unset($data['role']);

            $user = User::firstOrCreate(
                ['email' => $data['email']],
                $data
            );

            if (!$user->hasRole($role)) {
                $user->assignRole($role);
            }

            $fullname = trim($user->firstname . ' ' . $user->lastname);
            $this->command->info("[{$role}] {$fullname} — {$user->email}");
        }

        $this->command->newLine();
        $this->command->info('Semua user berhasil dibuat. Password default: password123');
    }
}
