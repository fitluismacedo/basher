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
    protected $description = "Create tag on Git";

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
        $commitID = $this->ask('commit ID [and press enter]');
        $branch = $this->ask('branch name [and press enter]');

        $this->alert('~# init basher:revert');

        exec('git reset ' . $commitID . ' --hard');
        if (empty($branch) || $branch == '') {
            $this->info('~# push --force to branch master');
            exec('git push origin master --force');
        } else {
            $this->info('~# push --force to branch ' . $branch);
            exec('git push origin ' . $branch . '  --force');
        }
        exec('git status');

        $this->alert('~# end basher:revert');
    }
}
