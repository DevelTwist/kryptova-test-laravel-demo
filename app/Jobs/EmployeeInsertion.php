<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use App\Models\Employee;
use Illuminate\Support\Facades\Log;

class EmployeeInsertion implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $name, $age, $salary, $thumbnail_profile;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name, $age, $salary, $thumbnail_profile)
    {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
        $this->thumbnail_profile = $thumbnail_profile;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Employee::create([
            'name' => $this->name,
            'age' => $this->age,
            'salary' => $this->salary,
            'profile_picture' => $this->thumbnail_profile
        ]);
    }
}
