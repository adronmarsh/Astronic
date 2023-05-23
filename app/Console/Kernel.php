<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Notice;
use Aws\S3\S3Client;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            $notices = Notice::where('created_at', '<=', now()->subHours(24))->get();
            foreach ($notices as $notice) {
                if (!empty($notice->media)) {

                    $fileName = basename(parse_url($notice->media, PHP_URL_PATH));
                    $filePath = 'notices/' . $fileName;

                    $s3Client = new S3Client([
                        'region' => env('AWS_DEFAULT_REGION'),
                        'version' => 'latest',
                        'credentials' => [
                            'key' => env('AWS_ACCESS_KEY_ID'),
                            'secret' => env('AWS_SECRET_ACCESS_KEY'),
                        ],
                    ]);

                    $s3Client->deleteObject([
                        'Bucket' => env('AWS_BUCKET'),
                        'Key' => $filePath,
                    ]);
                }
                $notice->delete();
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
