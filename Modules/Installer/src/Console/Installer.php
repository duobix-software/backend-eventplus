<?php

namespace Duobix\Installer\Console;

use Illuminate\Console\Command;
use function Laravel\Prompts\text;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Duobix\Installer\Database\Seeders\DatabaseSeeder as ETicketDatabaseSeeder;
use Illuminate\Support\Facades\Storage;

class Installer extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'eventplus:install
        { --skip-admin-creation : Skip admin creation. }';

    /**
     * The console command description.
     */
    protected $description = 'Duobix Event Plus installer.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->warn('Step: Migrating all tables...');
        $this->call('migrate:fresh');

        $this->warn('Step: Seeding basic data for E-ticket kickstart...');
        $this->info(app(ETicketDatabaseSeeder::class)->run([]));

        $this->warn('Step: Indexing events');
        $this->call('indexer:index');

        $this->warn('Step: Linking storage directory...');
        $this->call('storage:link');

        $this->warn('Step: Clearing cached bootstrap files...');
        $this->call('optimize:clear');

        if (! $this->option('skip-admin-creation')) {
            $this->warn('Step: Create admin credentials...');
            $this->createAdminCredentials();
        }        
    }

    /**
     * Get the console command arguments.
     */
    protected function getArguments(): array
    {
        return [
            ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     */
    protected function getOptions(): array
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }

        /**
     * Create a admin credentials.
     *
     * @return mixed
     */
    protected function createAdminCredentials()
    {
        $adminName = text(
            label    : 'Enter the name of the admin user',
            default  : 'Example',
            required : true
        );

        $adminEmail = text(
            label    : 'Enter the email address of the admin user',
            default  : 'admin@example.com',
            validate : fn (string $value) => match (true) {
                ! filter_var($value, FILTER_VALIDATE_EMAIL) => 'The email address you entered is not valid please try again.',
                default                                     => null
            }
        );

        $adminUsername = text(
            label: "Enter the username of the admin user",
            default: strstr($adminEmail, '@', true),
            required: true,
        );

        $adminPassword = text(
            label    : 'Configure the password for the admin user',
            default  : 'password',
            required : true
        );

        $password = bcrypt($adminPassword);

        try {
            DB::table('admins')->updateOrInsert(
                ['id' => 1],
                [
                    'name'       => $adminName,
                    'email'      => $adminEmail,
                    'username'   => $adminUsername,
                    'password'   => $password,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );

            $this->info('-----------------------------');
            $this->info('Congratulations!');
            $this->info('The installation has been finished and you can now use Duobix ticket.');
            $this->info('Go to '.env('APP_URL').'/admin'.' and authenticate with:');
            $this->info('Username: '.$adminUsername);
            $this->info('Password: '.$adminPassword);
            $this->info('Cheers!');

        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
