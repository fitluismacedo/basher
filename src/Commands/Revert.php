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
    protected $description = "[Git][Revert] revert content to a specific commit ID";

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
        $commitID = $this->ask('commit ID [and press enter]', '');
        $branch = $this->ask('branch name [and press enter]', 'master');

        $this->greetings($branch);

        if($commitID == ''){
            $this->alert('~# Need commit ID to revert');
        }else{
            exec('git reset ' . $commitID . ' --hard');
            exec('git push origin ' . $branch . '  --force');
            exec('git status');
        }

        $this->farewell();
    }

    public function greetings($branch)
    {
        $this->info('~# Init Command');
        $this->info('~# push --force to branch ' . $branch);
    }

    public function farewell()
    {
        $this->info('~# End Command');
    }
}
