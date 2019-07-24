<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use Mail;

class cronEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
    public function handle(){
      
      $data = array("shopID"=>"jiten1");
      Mail::send('emails.newUsercronEmail', $data, function ($message){
							 $message->from('info@kanpurize.com', 'Kanpurize vendor Registeration');
							 $message->to('jitendrasahu17996@gmail.com')->subject('New Vendor Shop Registeration !');
						    });
    }
}
