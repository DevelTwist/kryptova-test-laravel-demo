<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Employee;
use App\Http\Traits\EmployeesTrait;
use App\Jobs\EmployeeInsertion;

class FetchData extends Command
{
    use EmployeesTrait;

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
            
            if( !Employee::find($employee->id) ){
                EmployeeInsertion::dispatch($employee->employee_name, $employee->employee_age, $employee->employee_salary, $employee->profile_image)->onQueue('processing');
                $this->info(' employee: ' . $employee->employee_name . '  has been added on Queue!' );
            }
        }

        return 0;
    }
}
