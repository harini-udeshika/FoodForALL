<?php
class Fetch extends Controller
{
    function getballa()
    {
        echo ("balla");
    }

    function getkukula()
    {
        echo ("kukula");
    }

    function calcluate_org_count()
    {
        $model = new Admins();
        $query = "SELECT count(gov_reg_no) from organization";
        $organizations = $model->query($query);

        $organizations = json_encode($organizations);
        echo ($organizations);
    }

    function temp1($str)
    {
        echo ($str);
    }

    function searchUser($keyword = "")
    {
        if (Auth::isuser('admin')) {
            $data = array();

            if ($keyword != "") {
                $admin_model = new Admins();
                $keyword = addslashes($keyword);

                $query = "SELECT * FROM event WHERE event_id LIKE '%$keyword%' OR name LIKE '%$keyword%' OR location LIKE '%$keyword%'";

                $data = $admin_model->query($query);

                if ($data == null) {
                    $data = array();
                }
            }
        } else {
            $data = "redirect";
        }

        $data = json_encode($data);
        echo $data;
    }
}
