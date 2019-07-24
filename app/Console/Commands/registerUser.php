<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use DB;
use Mail;


class registerUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:newuser';

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
    
          $date1 = strtotime(date("d-m-Y 12:00:00"));	
	  $date2 = $date1 - (24*60*60);
	  //echo date("d-m-Y H:i:s",$date2);
	  //$all_user = DB::table("users")->whereBetween('created_at', array($date1 , $date2))->get();
	  $all_user = DB::table("users")->where('created_at', '>=', $date2)->get();
          $data = array("all_user"=>$all_user);
          Mail::send('emails.newregisterUser', $data, function ($message){
							 $message->from('info@kanpurize.com', 'Kanpurize Users Registeration');
							 $message->to('jitendrasahu17996@gmail.com')->cc(array('vivek.gupta@kanpurize.com','adhip.gupta@kanpurize.com'))->subject('New User  Registeration !');
						    });
    }
}
