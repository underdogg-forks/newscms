<?php

namespace NewsCMS\Console\Commands;

use Illuminate\Console\Command;

class NewUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'newscms:newuser 
    {--e|email= : Users email} 
    {--p|password= : Users password} 
    {--f|first_name= : Users first name} 
    {--l|last_name= : Users last name} 
    {--u|username= : Users username}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user';

    /**
     * Create a new command instance.
     *
     * @return mixed
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $credentials = [];
        if (!$this->option('email') && !$this->option('password')) {
            $credentials['email'] = $this->ask('Whats the users email?', null);
            $credentials['password'] = $this->secret('Whats the users password? (it will not be displayed)', null);
        } else {
            $credentials['email'] = $this->option('email');
            $credentials['password'] = $this->option('password');
            $credentials['username'] = $this->option('username');
            $credentials['first_name'] = $this->option('first_name');
            $credentials['last_name'] = $this->option('last_name');
        }
        $user = \Sentinel::register($credentials);
        $activation = \Activation::create($user);
        \Activation::complete($user, $activation->code);
        $this->info('User created successfully and user activated.');
    }
}
