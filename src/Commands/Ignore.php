<?php

namespace Fitluismacedo\Basher\Commands;

use Illuminate\Console\Command;

class Ignore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'basher:ignore';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "[Git][Ignore] ignore file to avoid git push sensitive data";

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
        $filename = $this->ask('Filename to ignore, type relative path [and press enter]', '');
        $this->alert('~# init basher:ignore');

        if($filename == ''){
            $this->alert('~# Need a filename to ignore');
        }else{
            exec('git update-index --assume-unchanged '.$filename);
        }

        $this->alert('~# end basher:ignore');
    }

}
