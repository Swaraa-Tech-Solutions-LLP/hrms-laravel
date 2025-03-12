<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserCommand extends Command
{
    protected $signature = 'user:create';
    protected $description = 'Create a new user by asking for information';

    public function handle()
    {
        $name = $this->ask('Enter full name');
        $email = $this->ask('Enter email address');
        $username = $this->ask('Enter user name');
        $password = $this->secret('Enter password');
        $confirm = $this->secret('Confirm password');

        if ($password !== $confirm) {
            $this->error('Passwords do not match.');
            return 1;
        }

        User::create([
            'name'     => $name,
            'email'    => $email,
            'username' => $username,
            'password' => Hash::make($password),
        ]);

        $this->info("User {$name} created successfully.");
        return 0;
    }
}
