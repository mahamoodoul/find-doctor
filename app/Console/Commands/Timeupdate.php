<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Timeupdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'time:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'doctor time update';

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
        DB::table('doctor_slot')
        ->where('date', '<', date('Y-m-d'))->update(['date' => date('Y-m-d')]);
    }
}
