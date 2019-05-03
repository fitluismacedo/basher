<?php

namespace Fitluismacedo\Basher\Commands;

use Illuminate\Console\Command;

class Tag extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'basher:tag';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "[Git][Tag] create tag and push to repository";

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
        $tagname = $this->ask('Tag version [and press enter]', '');

        $this->greetings();

        if($tagname == ''){
            $this->alert('~# Need a tagname to push');
        }else{
            exec('git tag -a ' . $tagname . ' -m "Versión ' . $tagname . '"');
            exec('git push origin '.$tagname);
        }

        $this->farewell();
    }

    public function greetings()
    {
        $this->info('~# Init Command');
    }

    public function farewell()
    {
        $this->info('~# End Command');
    }

}
