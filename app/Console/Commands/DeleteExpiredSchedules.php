<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Schedule;
use Illuminate\Support\Carbon;

class DeleteExpiredSchedules extends Command
{
    protected $signature = 'schedules:delete-expired';
    protected $description = 'Delete expired schedules';

    public function handle()
    {
        $expiredSchedules = Schedule::whereDate('date', '<', Carbon::today())->get();

        foreach ($expiredSchedules as $schedule) {
            $schedule->delete();
        }

        $this->info('Expired schedules deleted successfully.');
    }
}
