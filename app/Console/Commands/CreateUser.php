<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

use function Laravel\Prompts\info;
use function Laravel\Prompts\password;
use function Laravel\Prompts\text;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = text(
            label: 'What is your name?',
            transform: fn (string $value) => trim($value),
            placeholder: 'John Doe',
            validate: ['name' => 'required|min:3|max:255']
        );

        $email = text(
            label: 'What is your email?',
            transform: fn (string $value) => trim($value),
            placeholder: 'johndoe@example.com',
            validate: ['email' => 'required|email|max:255']
        );

        $password = password(
            label: 'What is your password?',
            transform: fn (string $value) => trim($value),
            validate: ['password' => 'required|min:8|max:255'],
            hint: 'Password must be at least 8 characters'
        );

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'email_verified_at' => now(),
        ]);

        info("User create {$user->name} with email {$user->email}");
    }
}
