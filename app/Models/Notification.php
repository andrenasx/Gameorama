<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Notifications\DatabaseNotification;

class Notification extends DatabaseNotification
{
    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    public function get_date()
    {
        $time = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at);
        return $time->shortRelativeDiffForHumans();
    }
}
