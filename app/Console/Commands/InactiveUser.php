<?php

namespace App\Console\Commands;


use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class InactiveUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:inactive-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'all inactive user will show';

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
        $limiDay = Carbon::now()->subDay(7);

       $last_login = User::where('last_login', '<', $limiDay)->get();

       foreach ($last_login as $user)
       {
            $user->notify(new \App\Notifications\InactiveUser($user));
       }

    }
}
