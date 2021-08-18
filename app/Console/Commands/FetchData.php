<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Employee;
use App\Http\Traits\EmployeesTrait;
use Exception;

class FetchData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Data API';

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
     * @return int
     */
    public function handle()
    {
        $employees = $this->getEmployeeData();

        foreach( $employees as $employee ){
            
            if( !Employee::find($employee->id)->exists() ){

                Employee::create([
                    'name' => $employee->employee_name,
                    'age' => $employee->employee_age,
                    'salary' => $employee->employee_salary,
                    'profile_picture' => $employee->profile_image
                ]);

                $this->info( 'id: ' . $employee->id . ' employee: ' . $employee->name . '  has been added !' );
                break;
            }
        }

        return 0;
    }
}
