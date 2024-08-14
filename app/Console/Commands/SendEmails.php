<?php

namespace App\Console\Commands;

use App\Jobs\ProcessNewsletter;
use App\Models\User;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send newsletters to all users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $users = User::all();
        $subject = "Test";
        $content = "Test";

        foreach ($users as $user) {
            ProcessNewsletter::dispatch($user, $subject, $content);
        }

        $this->info('Newsletters have been dispatched successfully.');
        return Command::SUCCESS;
    }
}
