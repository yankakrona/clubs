<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Girl;
use App\GirlHistory;
use Carbon\Carbon;
class AttendGirlHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attend:girl_history';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert attend girls to database of table girl history';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(GirlHistory $attend)
    {
        parent::__construct();
        $this->_attend = $attend;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $sqlBuilders = $this->_attend->SQL_SELECT_GIRL();
      $inserts = [];
      foreach($sqlBuilders as $builder) {
        $inserts[] = [
            'girl_id'   => $builder->girl_id,
            'work_date' => $builder->updated_at,
      ];}
      DB::table('girl_history')->insert($inserts);
      $this->info('Insert all data form table girl to girl_history successfully!');
    }


}
