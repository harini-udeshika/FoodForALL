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
        echo($organizations);
    }
}
