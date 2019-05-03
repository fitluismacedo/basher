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
    protected $description = "[Laravel] Set enviroment params to .env for laravel installation";

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

        $this->greetings($enviroment);

        if (file_exists(base_path('.env'))) {
            unlink(base_path('.env'));
        }
        if (!file_exists(base_path('.env.' . $enviroment))) {
            $this->alert('~# please, create .env.' . $enviroment . ' first');
        } else {
            copy(base_path('.env.' . $enviroment), base_path('.env'));
            $this->call('basher:clean');
            $this->alert('~# .env copied');
        }
        $this->farewell();
    }

    public function greetings($enviroment)
    {
        $this->info('~# Init Command');
        $this->info('~# Copy params from .env.' . $enviroment . ' to .env');
    }

    public function farewell()
    {
        $this->info('~# End Command');
    }

}
