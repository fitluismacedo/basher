<?php

namespace Fitluismacedo\Basher\Commands;

use Illuminate\Console\Command;

class Reinstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'basher:reinstall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Clean all cache's from laravel projects and optimize composer";

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
        if (is_dir('/var/www/html/')) {
            exec('sudo chmod 777 -R composer.json');
        }
        exec('composer remove fitluismacedo/basher && composer require fitluismacedo/basher');
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
