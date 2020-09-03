<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class HappyBirthday extends Command
{
    protected $email;
    protected $name;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a Happy birthday message to users via Email';

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
     * Execute the console command for send birthday emails.
     *
     * @return int
     */
    public function handle()
    {
        $users = User :: whereMonth('dob' , '=' , date('m'))->whereDay('dob' , '=' , date('d') + 1 )->get();
        foreach($users as $user){
             $this->email = $user->email;
             $this->name = $user->first_name. ' '.$user->last_name;
            Mail::raw('On your birthday we wish for you that whatever you want most in life it comes to you just the way you imagined it or better. Happy birthday'.' '.$this->name.'.!' , function ($message) {
                $message->to($this->email , $this->name)
                  ->subject('Happy Birthday Wish!');
                $message->from('info@gmail.com' , 'Admin');
              });
        }
        $this->info('Birthday Message Send Successfully!');
    }
    
}
