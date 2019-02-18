<?php

namespace Fitluismacedo\Basher\Commands;

use Illuminate\Console\Command;

class Revert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'basher:revert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Revert Git content to a specific commit ID";

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
        $tagname = $this->ask('Tag version [and press enter]');
        $this->alert('~# init basher:tag');

        exec('git tag -a ' . $tagname . ' -m "Versión ' . $tagname . '"');
        exec('git push origin '.$tagname);

        $this->alert('~# end basher:tag');
    }
}
