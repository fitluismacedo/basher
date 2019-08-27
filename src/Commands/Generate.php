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
    protected $signature = 'basher:generate {option=default} {directory=default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Generate models from database connection, default directory app/Models/Unknown";

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

        $option = $this->argument('option');
        $directory = $this->argument('directory');

        if ($option == 'default') {
            $option = 'all';
        }
        if ($directory == 'default') {
            $directory = ucwords($project_name, '-');
            $directory = ucwords($directory, '_');
            $directory = str_replace('-', '', $directory);
            $directory = str_replace('_', '', $directory);
        }

        $basepath = app_path();
        $namespace = 'app/Models';
        $modelpath = $basepath . '\\Models';

        $this->greetings();
        $this->alert('=> generating on "' . $namespace . '/' . $directory . '" directory');
        if (!is_dir($modelpath . '\\' . $directory)) {
            exec('mkdir ' . $modelpath . '\\' . $directory);
        }
        switch ($option) {
            case 'all':
                exec('php artisan generate:modelfromtable --all --namespace=' . ucwords($namespace) . '/' . ucwords($directory) . ' --folder=' . $namespace . '/' . ucwords($directory));
                break;
            default:
                exec('php artisan generate:modelfromtable --table=' . $option . ' --namespace=' . ucwords($namespace) . '/' . ucwords($directory) . ' --folder=' . $namespace . '/' . ucwords($directory));
                break;
        }
        $this->alert('=> generated');
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
