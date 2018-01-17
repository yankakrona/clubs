<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Girl;
use App\GirlHistory;
use Carbon\Carbon;
class AttendanceGirlHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attendance:girl_history';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert attendance girls to database of table girl history';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(GirlHistory $attendance)
    {
        parent::__construct();
        $this->_attendance = $attendance;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $sqlBuilders = $this->_attendance->SQL_SELECT_GIRL();
      $inserts = [];
      foreach($sqlBuilders as $builder) {
        $inserts[] = [
            'girl_id'   => $builder->girl_id,
            'work_flag' => $builder->work_flag,
            'work_date' => $builder->updated_at,
      ];}
      DB::table('girl_history')->insert($inserts);
      $this->info('Insert all data form table girl to girl_history successfully!');
    }


}
