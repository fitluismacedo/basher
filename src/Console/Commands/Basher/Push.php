<?php

namespace App\Console\Commands\Basher;

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
    protected $description = "Push content to Git";

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
        $commit = $this->ask('commit name [and press enter]');
        $branch = $this->ask('branch name [and press enter]');

        $this->alert('~# init basher:push');

        exec('git add .');
        exec('git commit -am "' . $commit . '"');
        if (empty($branch) || $branch == '') {
            $this->info('~# push to branch master');
            exec('git push origin master');
        } else {
            $this->info('~# push to branch ' . $branch);
            exec('git push origin "' . $branch . '"');
        }
        exec('git status');

        $this->alert('~# end basher:push');
    }
}
