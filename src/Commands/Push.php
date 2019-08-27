<?php

namespace Fitluismacedo\Basher\Commands;

use Illuminate\Console\Command;

class Push extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'basher:push {commit=default} {branch=default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Push content to Git repository";

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
        if (empty($project_name)) {
            $this->error('=> need set PROJECT_DIRECTORY_NAME variable on .env file');
            return;
        }

        $commit = $this->argument('commit');
        $branch = $this->argument('branch');
        if ($commit == 'default') {
            $commit = 'Avances ' . date('Y-m-d H-i-s');
        }
        if ($branch == 'default') {
            $branch = 'master';
        }

        $this->greetings();
        $this->info('=> push to branch ' . $branch);
        $this->info('=> *********************************************************************************** <=');
        $this->info('=> pulling content, if command stacks, execute "git stash apply" to avoid lost changes <=');
        $this->info('=> *********************************************************************************** <=');
        $this->alert('=> update project');
        exec('git stash');
        exec('git pull origin ' . $branch);
        exec('git stash apply');

        $this->alert('=> push content');
        exec('git add .');
        exec('git commit -am "' . $commit . '"');
        exec('git push origin "' . $branch . '"');
        exec('git status');

        $this->alert('=> clean up');
        $this->call('basher:clean');
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
