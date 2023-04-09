<?php
class Admin_events_model extends Model
{
    protected $table = "event";

    public function selectOngoing()
    {
        $ongoing_date = date('y-m-d');
        // $ongoing_date = '23-01-01';
        // echo($ongoing_date);
        $query = "SELECT * FROM event WHERE date >= '$ongoing_date'";
        $data = $this->query($query);

        if ($data != NULL) {
            foreach ($data as $event) {
                // select count of volunteer for each event
                $query = "SELECT user_id FROM volunteer WHERE event_id=$event->event_id";

                $vol_data = $this->query($query);
                if ($vol_data == NULL) {
                    $vol_data = array();
                }

                // $vol_count = count());
                $event->vol_count = count($vol_data);

                // calc progress bar percentage
                if ($event->no_of_volunteers != 0) {
                    $event->vol_percentage = (int)$event->vol_count * 100 / $event->no_of_volunteers;
                } else {
                    $event->vol_percentage = 0;
                }

                // select amount of donations for each event
                $query = "SELECT * FROM donate WHERE event_id=$event->event_id";

                $donate_data = $this->query($query);
                if ($donate_data == NULL) {
                    $donate_data = array();
                }

                $total_donated = 0;
                foreach ($donate_data as $donation) {
                    $total_donated += $donation->amount;
                }

                $event->total_donated = $total_donated;

                // calc progress bar percentage of donations
                if ($event->total_amount != 0) {
                    $event->donation_percentage = (int)$event->total_donated * 100 / $event->total_amount;
                } else {
                    $event->donation_percentage = 0;
                }
            }
        }
        return $data;
    }

    public function selectCompleted()
    {
        // $ongoing_date = date('y-m-d');
        $today_date = '23-01-01';
        // echo($ongoing_date);
        $query = "SELECT * FROM event WHERE date < '$today_date'";
        $data = $this->query($query);

        return $data;
    }
}
