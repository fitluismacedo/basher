<?php

namespace Fitluismacedo\Basher\Commands;

use Illuminate\Console\Command;

class File extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'basher:file {option=default} {filepath=default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Ignore file from Git";

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
        $filename = $this->argument('filepath');

        if ($option == 'default') {
            $this->alert('=> need a option');
            return;
        }

        if ($filename == 'default') {
            $this->alert('=> need a filename to ignore');
            return;
        }

        $this->greetings();
        switch ($option) {
            case 'hide':
                exec('git update-index --assume-unchanged ' . $filename);
                $this->alert('=> hide ' . $filename . ' from fit repository');
                break;
            case 'show':
                exec('git update-index --no-assume-unchanged ' . $filename);
                $this->alert('=> show ' . $filename . ' from fit repository');
                break;
            default:
                $this->alert('=> option invalid ');
                break;
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
