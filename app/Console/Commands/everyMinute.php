<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\stock_cur;
class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test12 12';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $stock_cur =stock_cur::orderBy('id','desc')->take(5)->get();
        echo"done";
    }
}
