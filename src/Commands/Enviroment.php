<?php

namespace Fitluismacedo\Basher\Commands;

use Illuminate\Console\Command;

class Enviroment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'basher:env {env=local}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Set enviroment params to .env for laravel installation";

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

        $enviroment = $this->argument('env');
        if($enviroment == 'local'){
            $this->alert('=> argument env is missing, by default local env is set');
        }
        if (!file_exists(base_path('.env.' . $enviroment))) {
            $this->error('=> need create .env.' . $enviroment . ' first');
            return;
        }

        $this->greetings();
        $this->alert('=> copy params from .env.' . $enviroment . ' to .env');
        if (file_exists(base_path('.env'))) {
            unlink(base_path('.env'));
        }
        copy(base_path('.env.' . $enviroment), base_path('.env'));
        $this->call('basher:clean');
        $this->alert('=> .env copied');
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
