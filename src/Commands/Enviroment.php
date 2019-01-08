<?php

namespace App\Console\Commands\Basher;

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
    protected $description = "Set enviroment params to .env";

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

        $this->alert('~# init basher:env');
        $this->info('~# change .env params to ' . $enviroment);

        if (file_exists(base_path('.env'))) {
            unlink(base_path('.env'));
        }
        copy(base_path('.env.' . $enviroment), base_path('.env'));

        $this->alert('~# end basher:env');
    }
}
