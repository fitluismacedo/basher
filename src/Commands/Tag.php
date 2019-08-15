<?php

namespace Fitluismacedo\Basher\Commands;

use Illuminate\Console\Command;

class Tag extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'basher:tag';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Create tag and push to repository";

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
        $tagname = $this->ask('Tag version [and press enter]', 'versión 0.0.1');
        $this->greetings();
        $option = $this->argument('option', '');
        switch ($option) {
            case 'create':
                exec('git tag -a ' . $tagname . ' -m "Versión ' . $tagname . '"');
                exec('git push origin ' . $tagname);
                break;
            case 'delete':
                exec('git tag -d ' . $tagname);
                exec('git push origin :refs/tags/' . $tagname);
                break;
            default:
                $this->alert('=> option not exist');
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
