<?php

namespace Fitluismacedo\Basher\Commands;

use Illuminate\Console\Command;

class Deploy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'basher:deploy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Deploy laravel project on server";

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
        $this->alert('~# init basher:deploy');

        $this->validateGitInstallation();
        $this->validateComposerInstallation();

        $project = $this->ask('Cloning project on /var/www/html, set url for cloning [and press enter]');
        $rememberCredentials = $this->ask('Remember git credentials? [y/n]');

        $this->installProject($project, $rememberCredentials);

        $this->alert('~# end basher:deploy');
    }

    public function validateGitInstallation()
    {
        $git = exec('git --version');
        if (empty($git) || is_null($git)) {
            $this->alert('~# No git installed');
            return false;
        }
        $this->info($git);
    }

    public function validateComposerInstallation()
    {
        $composer = exec('composer -V');
        if (empty($composer) || is_null($composer)) {
            $this->alert('~# No Composer installed');
            return false;
        }
        $this->info($composer);
    }

    public function getProjectName($project)
    {
        $parts = explode('/', $project);
        $projectName = explode('.git', $parts[count($parts) - 1])[0];
        return $projectName;
    }

    public function installProject($project, $rememberCredentials)
    {
        $projectName = $this->getProjectName($project);

        exec('cd /var/www/html');

        if ($rememberCredentials == 'y') {
            exec('git config credential.helper store');
        }

        exec('git clone ' . $project);
        exec('cd ' . $projectName);
        exec('mkdir vendor');
        exec('chown -R ec2-user:apache /var/www/html/' . $projectName);
        exec('chmod -R 777 /var/www/html/' . $projectName . '/storage');
        exec('chmod -R 777 /var/www/html/' . $projectName . '/bootstrap/cache');
        exec('chmod -R 777 /var/www/html/' . $projectName . '/vendor');
        exec('composer install');
        exec('php artisan basher:clean');
    }
}
