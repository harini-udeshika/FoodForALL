<?php
class Admin_events_model extends Model
{
    protected $table = "event";

    public function selectOngoing()
    {
        $ongoing_date = date('y-m-d');
        // $ongoing_date = '23-01-01';
        
        $query = "SELECT * FROM event WHERE date >= '$ongoing_date' ORDER BY date";
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

                // calc volunteer progress bar percentage
                if ($event->no_of_volunteers != 0) {
                    $event->vol_percentage = (int)($event->vol_count * 100 / $event->no_of_volunteers);
                } else {
                    $event->vol_percentage = 0;
                }

                // select count of donations for each event
                $query = "SELECT amount FROM donate WHERE event_id=$event->event_id";
                $donations = $this->query($query);


                $event->donation_percentage = 0;
                $collected_donations = 0;

                if ($donations != null) {
                    foreach ($donations as $donation) {
                        $collected_donations += $donation->amount;
                    }
                    // calculate donation percentage
                    $event->donation_percentage = (int)($collected_donations * 100 / $event->total_amount);
                }
                $event->collected_donations = $collected_donations;
                $event->event_url = ROOT . "/Event_org?id=".$event->event_id;
            }
        }
        return $data;
    }

    public function selectCompleted()
    {
        $today_date = date('y-m-d');
        // $today_date = '23-01-01';
        // echo($ongoing_date);
        $query = "SELECT * FROM event WHERE date < '$today_date'";
        $data = $this->query($query);

        return $data;
    }
}
