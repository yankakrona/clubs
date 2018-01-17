<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Girl;
use Carbon\Carbon;

class AttendGirl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attend:girl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update attend girls to database';

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
          DB::table('girl')->update(['updated_at' => date("Y-m-d H:i:s")]);
          $this->info('All inactive girls are updated attendance successfully!');
    }
}
