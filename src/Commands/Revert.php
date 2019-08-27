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
    protected $signature = 'basher:revert {commitId} {branch}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Revert project to a specific commit ID";

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
        $project_name = env('PROJECT_DIRECTORY_NAME');
        if(empty($project_name)){
            $this->error('=> need set PROJECT_DIRECTORY_NAME variable on .env file');
            return;
        }

        $commitID = $this->argument('commitId', '');
        $branch = $this->argument('branch', 'master');

        $this->greetings();
        if(empty($commitID)){
            $this->alert('=> need commitId to revert');
            return;
        }

        $this->alert('=> reset to commit '.$commitID);
        exec('git reset ' . $commitID . ' --hard');
        $this->info('=> push --force to branch ' . $branch);
        exec('git push origin ' . $branch . '  --force');
        exec('git status');
        $this->alert('=> commit reverted');
        $this->farewell();
    }

    public function greetings()
    {
        $this->info('#############');
        $this->info('Init Command');
        $this->info('-------------');
    }

    public function farewell()
    {
        $this->info('-------------');
        $this->info('End Command');
        $this->info('#############');
    }
}
