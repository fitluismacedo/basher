<?php

namespace Fitluismacedo\Basher\Commands;

use Illuminate\Console\Command;

class Clean extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'basher:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "[Laravel][Composer] Clean all cache's and optimize composer";

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
        LogIt::greetings($this);
        $project_name = env('PROJECT_NAME');
        if(!empty($project_name)){
            exec('sudo rm -rf /var/www/html/'.env('PROJECT_NAME').'/bootstrap/cache/*');
            $this->call('cache:clear');
            $this->call('route:clear');
            $this->call('view:clear');
            $this->call('config:clear');
            $this->call('clear-compiled');
            exec('composer dump-autoload -o');
        }else{
            $this->error('Please, set PROJECT_NAME variable on .env file');
        }
        LogIt::farewell($this);
    }

}
