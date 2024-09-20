<?php

namespace App\Console\Commands;

use App\CouponApp\Modules\Coupons\Web\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ExpireCoupons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coupons:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Coupon::where('end_at', '<', Carbon::now())
            ->where('is_expired', false)
            ->update(['is_expired' => true]);

        $this->info('Expired coupons have been updated.');
    }
}
