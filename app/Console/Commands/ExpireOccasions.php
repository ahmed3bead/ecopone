<?php

namespace App\Console\Commands;

use App\CouponApp\Modules\Occasions\Web\Models\Occasion;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ExpireOccasions extends Command
{
    protected $signature = 'occasions:expire';
    protected $description = 'Expire occasions that have passed their end date';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Find all occasions that have ended
        $expiredOccasions = Occasion::where('end_at', '<', Carbon::today())->get();

        // Perform any necessary actions on expired occasions
        foreach ($expiredOccasions as $occasion) {
            $occasion->update(['is_active' => 0]); // Optionally mark them inactive
            $this->info('Expired occasion: ' . $occasion->name);
        }

        $this->info('Occasion expiry check complete.');
    }
}
