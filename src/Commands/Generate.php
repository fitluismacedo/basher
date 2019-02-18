<?php

namespace Fitluismacedo\Basher\Commands;

use Illuminate\Console\Command;

class Generate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'basher:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "[Laravel][Generator] generate file models from mysql connection to App/Models directory";

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
        $directory = $this->ask('Models directory [and press enter]', 'Default');
        $this->alert('~# init basher:generate');

        $basepath = app_path();
        $namespace = 'App/Models';
        $modelpath = $basepath . '\\Models';

        if (!is_dir($modelpath)) {
            exec('mkdir ' . $modelpath);
        }

        if (!is_dir($modelpath . '/' . $directory)) {
            exec('mkdir ' . $modelpath . '\\' . $directory);
        }

        $this->info('~# generating on "' . $namespace . '/' . $directory . '" directory');

        exec('php artisan generate:modelfromtable --all --namespace=' . $namespace . '/' . ucwords($directory) . ' --folder=' . str_replace('\\\\', '/', $modelpath) . '/' . ucwords($directory));

        $this->alert('~# end basher:generate');
    }

}
