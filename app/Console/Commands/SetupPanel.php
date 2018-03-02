<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class SetupPanel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:panel';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $this->info("\n" . 'Admin panel installation');
        $this->warn('Before any action you must create mysql database manually and set database info to .env');

        if ($this->confirm('Are you sure you want to delete everything from database if exist?')) {

            $password = $this->ask('Enter verification code :');
            if ($password == '126653') {
                $this->setup_migrations();
                $this->setup_settings();
                $this->setup_widgets();
                $this->setup_features();
                $this->setup_contents();
                $this->setup_user();

                Artisan::call('cache:clear');
                Artisan::call('config:clear');
                Artisan::call('view:clear');
            } else {
                $this->error('the specified password in not correct.');
            }

        } // end confirm
    }


    // Mysql Database connection
    private function setup_mysql_database()
    {
        if ($this->confirm('Do you want to setup mysql database connection?')) {
            $db_name = $this->ask('Enter DB name: ');
            $this->replace_key_environment('DB_DATABASE', $db_name);


            $dbUser = $this->ask('Enter DB username: ', 'root');
            $this->replace_key_environment('DB_USERNAME', $dbUser);

            $dbPassword = $this->ask('Enter DB Password: ', false);
            $this->replace_key_environment('DB_PASSWORD', $dbPassword);

        }
    }


    private function setup_migrations()
    {
        $this->info('Dropped all tables and re-run all migrations successfully.');
        Artisan::call('migrate:fresh');
    }

    private function setup_settings()
    {
        $this->info('Settings rows created from settings.php for any active language successfully.');
        Artisan::call('setup:settings');
    }

    private function setup_widgets()
    {
        $this->info('Widgets rows created from widgets.php for any active language successfully.');
        Artisan::call('setup:widgets');
    }


    private function setup_user()
    {

        Artisan::call('setup:user');
        $this->info('Permissions, roles and users created successfully.');
        $this->info("\n".'role     : admin');
        $this->info('username : admin@asrenet.net');
        $this->info('password : 459963');
    }

    private function setup_contents()
    {
        $this->info('Features and links created successfully.');
        Artisan::call('setup:contents');
    }

    private function setup_features()
    {
        $this->info('Features and links created successfully.');
        Artisan::call('setup:features');
    }






    // Run DatabaseSeeder in database
    private function insert_default_sql()
    {
        $users = DB::table('users')->count();
        if ($users) {
            $this->line("Database is not empty.");
        } else {
            $question = 'Do you want to insert default data now?';
            if ($this->confirm($question)) {
                Artisan::call('db:seed');
                $this->info(Artisan::output());
            }
        }
    }

    // Replace a key in .env file
    protected function replace_key_environment($key, $value)
    {
        $value = $this->normalize_value($value);
        file_put_contents(
            $this->laravel->environmentFilePath(),
            preg_replace(
                $this->key_replacement_pattern($key),
                $key . '=' . $value,
                file_get_contents($this->laravel->environmentFilePath())
            ));
    }

    // Set the application name. application name will be used in mailables and stuff.
    private function setup_application_name()
    {
        $this->info('Setting up the application name...');
        $name = $this->ask('Please enter application name:', 'Laravel');
        $this->key_replacement_pattern('APP_NAME', $name);
    }

    // normalize Value
    private function normalize_value($value)
    {
        if (preg_match('/\s/', $value)) {
            $value = '"' . $value . '"';
        }

        return $value;
    }

    // Get a regex pattern that will match env APP_KEY with any random key
    protected function key_replacement_pattern($key)
    {
        return "/^{$key}=(.*)/m";
    }

    // Setup Unique Key in .env
    private function setup_unique_key()
    {
        $token = $this->ask('Please enter the application code to load website data from backend api:');
        $this->replace_key_environment('FUND_CODE', $token);
    }

    // Set application url
    private function setup_application_url()
    {
        $this->info('Now we set the default application url.');
        $url = $this->ask('Please enter the default application url:', 'http://localhost');
        $this->replace_key_environment('APP_URL', $url);
    }


}
