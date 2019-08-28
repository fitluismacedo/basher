<?php

namespace Fitluismacedo\Basher\Commands;

use Illuminate\Console\Command;

class Pull extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'basher:pull';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Move to project directory and pull content from repository";

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
        if (is_dir('/var/www/html/' . $project_name)) {
            exec('cd /var/www/html/' . $project_name);
            exec('sudo git pull');
            $this->call('basher:clean');
        }else{
            $this->error('=> project directory not found');
        }
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
