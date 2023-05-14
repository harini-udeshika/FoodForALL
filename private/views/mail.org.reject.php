<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registration Rejected</title>
</head>

<body style="font-family: Arial, sans-serif; font-size: 16px; line-height: 1.5; color: #333; background-color: #f5f5f5; padding: 20px; ">
    <div style="width: 550px;margin: 50px auto 0 auto; background-color: white; padding:36px; box-sizing: border-box;">
        <a href=""><img src="<?= ROOT ?>/images/logo.png" alt="foodforall" style="display: block; margin: 0 auto; max-height:120px; max-width: 100%; "></a>
        <h1 style="text-align: center; margin-top: 40px; margin-bottom: 30px;">Registration of <?=$organization->name?> Rejected</h1>
        <div>
            Dear <?=$organization->name?>,
            <p>We regret to inform you that your registration request for FoodForAll has been denied. FoodForAll administrators have determined that your organization does not meet our eligibility criteria.</p>
            <p>We apologize for any inconvenience this may have caused, and we thank you for your interest in FoodForAll.</p>
            <p>Best regards,<br>FoodForAll</p>
        </div>

    </div>
    <div style="width:550px; background-color: #f5f5f5; display: block; margin: 0px auto; max-height:120px;  padding:36px; box-sizing: border-box;">
        <small>This email was intended for <?=$organization->name?></small>
    </div>
</body>

</html>