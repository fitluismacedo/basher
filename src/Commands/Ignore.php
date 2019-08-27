<?php

namespace Fitluismacedo\Basher\Commands;

use Illuminate\Console\Command;

class Ignore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'basher:ignore {filename}';

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

        $filename = $this->argument('filename');
        $this->greetings();
        if (empty($filename)) {
            $this->alert('=> need a filename to ignore');
            return;
        }

        exec('git update-index --assume-unchanged ' . $filename);
        $this->alert('=> '.$filename.' ignored');
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
