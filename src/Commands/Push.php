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
    protected $signature = 'basher:push';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "[Git][Push] push content to repository";

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
        $commit = $this->ask('commit name [and press enter]', 'Avances ' . date('Y-m-d H:i:s'));
        $branch = $this->ask('branch name [and press enter]', 'master');

        $this->greetings($branch);

        exec('git stash');
        exec('git pull origin ' . $branch);
        exec('git stash apply');

        exec('git add .');
        exec('git commit -am "' . $commit . '"');
        exec('git push origin "' . $branch . '"');
        exec('git status');

        $this->call('basher:clean');
        $this->farewell();
    }

    public function greetings($branch)
    {
        $this->info('~# Init Command');
        $this->info('~# push to branch ' . $branch);
        $this->info('~# pulling content, if command stacks, execute "git stash apply" to avoid lost changes');
    }

    public function farewell()
    {
        $this->info('~# End Command');
    }
}
