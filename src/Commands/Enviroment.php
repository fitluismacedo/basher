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
    protected $signature = 'basher:env {env}';

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
        $enviroment = $this->argument('env');
        $this->greetings();
        if (!file_exists(base_path('.env.' . $enviroment))) {
            $this->error('=> please, create .env.' . $enviroment . ' first');
        } else {
            $this->alert('=> copy params from .env.' . $enviroment . ' to .env');
            if (file_exists(base_path('.env'))) {
                unlink(base_path('.env'));
            }
            copy(base_path('.env.' . $enviroment), base_path('.env'));
            $this->call('basher:clean');
            $this->alert('=> .env copied');
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
