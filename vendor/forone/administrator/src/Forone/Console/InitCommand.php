<?php

namespace Forone\Admin\Console;

use Forone\Admin\Role;
use Forone\Admin\User;
use Forone\Admin\Permission;
use Illuminate\Console\Command;

class InitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'forone:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize';

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
     * @return mixed
     */
    public function handle()
    {
        $this->call('migrate');
        $role = Role::create(['name'=>'admin', 'display_name'=>'super manager']);
        $permission = Permission::create(['name'=>'admin', 'display_name'=>'super manager permission']);
        $user = User::create(['name' => '超级管理员', 'email' => env('ADMIN_EMAIL','admin@admin.com'), 'password' => bcrypt(env('ADMIN_PASSWORD','admin')),]);
        $role->attachPermission($permission);
        $user->attachRole($role);
        $this->info('Forone initialized!');
    }
}
