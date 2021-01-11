<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateFeeSlip extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feeslip:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Fee Slip for all active students monthly';

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
        $this->comment("Generating fee slips");
        $this->line("Fee slip generated for Jawad khan");
        $this->line("Fee slip generated for Fazal Samad");
        $this->line("Fee slip generated for Dr Yousaf khan");
		
		for($i = 0; $i < 5000; $i++) {
			for($j = 0; $j < 5000; $j++) {
				$this->line("Task $i, $j processing...");
				$this->line("Task $i, $j done.");
			}
			$this->info("Block $i completed");
		}
        $this->info("Process completed");
    }
}
