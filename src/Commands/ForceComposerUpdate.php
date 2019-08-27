<?php

namespace Fitluismacedo\Basher\Commands;

use Illuminate\Console\Command;

class ForceComposerUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'basher:force-composer-update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Force project to composer update on server";

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

        $this->greetings();
        exec('sudo /bin/dd if=/dev/zero of=/var/swap.1 bs=1M count=1024');
        exec('sudo /sbin/mkswap /var/swap.1');
        exec('sudo /sbin/swapon /var/swap.1');
        exec('composer update');
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
