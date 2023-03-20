<?php
class Admin_events_model extends Model
{
    protected $table = "event";

    public function selectOngoing()
    {
        // $ongoing_date = date('y-m-d');
        $ongoing_date = '23-01-01';
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
