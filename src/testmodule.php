<?php

namespace Vocalogenesis\Testmodule;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class testmodule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testmodule:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install testing module.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = new User;
        $user->password = Hash::make('testmodule');
        $user->name = $this->ask('What is your name?');
        $user->email = $user->name.'@testmodule.com';
        $user->save();
        $this->info('Created user for login: ');
        $this->info('Name: '.$user->name);
        $this->info('Email: '.$user->name.'@testmodule.com');
        $this->info('Pass: testmodule');
        $this->info('Testing module is successfully installed!');
    }
}
