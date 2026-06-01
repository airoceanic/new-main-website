<?php
use Proxy\Api\Api;

require_once __DIR__ . '/proxy/api.php';
include 'lib/functions.php';
include 'config.php';
include 'lib/emailer.php';
session_start();
Api::__constructStatic();
$status = null;
$bases = null;
$res = Api::sendSync('GET', 'v1/operations/bases', null);
if ($res->getStatusCode() == 200) {
    $bases = json_decode($res->getBody(), false);
}
$firstname = null;
$surname = null;
$email = null;
$background = null;
$ivao_id = null;
$vatsim_id = null;
$hub = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = cleanString($_POST['firstname']);
    $surname = cleanString($_POST['surname']);
    $email = cleanString($_POST['email']);
    $location = cleanString($_POST['location']);
    $password = cleanString($_POST['password']);
    $confirm = cleanString($_POST['confirm']);
    $background = cleanString($_POST['background']);
    $hub = cleanString($_POST['hub']);
    $ivao_id = cleanString($_POST['ivao_id']);
    $vatsim_id = cleanString($_POST['vatsim_id']);
    $bots = cleanString($_POST['count1']); //used to try and trick bots
    $name = $firstname . ' ' . $surname;

    if (!empty($bots)) {
        $status = "bots";
    }

    if (((((empty($firstname)) || (empty($surname)) || (empty($password)) || (empty($location)) || (empty($email)))))) {
        $status = "required_fields";
    }
    if ($password != $confirm) {
        $status = "password_match";
    }
    if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $password)) {
        $status = "password_regex";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $status = "email_invalid";
    }
    if ($location == -1) {
        $status = "location";
    }

    if (empty($status)) {
    Api::__constructStatic();

    $data = [
        'Name' => $name,
        'Email' => $email,
        'VatsimId' => $vatsim_id,
        'IvaoId' => $ivao_id,
        'HubId' => $hub,
        'Location' => $location,
        'Background' => $background,
        'Password' => $password,

        // ✅ REQUIRED BY BACKEND (FIX)
        'Custom1' => '',
        'Custom2' => '',
        'Custom3' => '',
        'Custom4' => '',
        'Custom5' => '',
    ];

    $res = Api::sendSync('POST', 'v1/account/registration', $data);

    switch ($res->getStatusCode()) {
        case 200:
            $status = "success";
            $subject = "[vaBase Alert] New pilot application";
            $message = "You have a new pilot application for <strong>" . $name . "</strong>. Login to your admin system to review the application.";
            echo sendEmail($subject, $message, airline_admin_email);

            if (enable_discord_new_pilot_alerts) {
                $data = [
                    'Message' => '**' . $name . '** has just applied to join the VA.',
                ];
                $res = Api::sendSync('POST', 'v1/integrations/discord', $data);
            }

            $firstname = null;
            $surname = null;
            $email = null;
            $background = null;
            $ivao_id = null;
            $vatsim_id = null;
            $hub = null;
            break;

        case 400:
            $resBody = json_decode($res->getBody());
            if ($resBody == "Email") {
                $status = "email_exists";
            } else {
                $status = "error";
            }
            break;

        default:
            $status = "error";
            break;
    }
}
}
?>
<?php
$MetaPageTitle = "";
$MetaPageDescription = "";
$MetaPageKeywords = "";?>
<?php include 'includes/header.php';?>
<section id="content" class="cp section offset-header">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Pilot Application Form</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if ($status == 'success') {?>
                                <div class="alert alert-success">Your application has been submitted, please wait for a
                                    member of staff to review your application!
                                    <br /><br />Once you have been approved, you will receive an email and will be able
                                    to login to your account.
                                </div>
                                <?php } else {?>
                                <?php if (!empty($status)) {?>
                                <div class="alert alert-danger" role="alert">
                                    <?php
if ($status == 'required_fields') {
    echo '<p>Please check you have completed all required fields.</p>';
}
    if ($status == 'password_match') {
        echo '<p>Your passwords do not match. Please enter them again.</p>';
    }
    if ($status == 'password_regex') {
        echo '<p>Your password does not meet complexity requirements.</p>';
    }
    if ($status == 'email_invalid') {
        echo '<p>Your email address is invalid.</p>';
    }
    if ($status == 'email_exists') {
        echo '<p>An account with your email already exists.</p>';
    }
    if ($status == 'location') {
        echo '<p>Please select a valid location.</p>';
    }
    if ($status == 'error') {
        echo '<p>There was an error creating your application. Please try again later.</p>';
    }
    if ($status == 'hub') {
        echo '<p>Please select a valid hub.</p>';
    }?>
                                </div>
                                <?php }?>
                                <form action="join.php" method="post" class="form">
                                    <div class="form-group">
                                        <label>First Name*</label>
                                        <input name="firstname" type="text" id="firstname" class="form-control"
                                            maxlength="50" value="<?php echo htmlspecialchars(strval($firstname)) ?>"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name*</label>
                                        <input name="surname" type="text" id="surname" class="form-control"
                                            maxlength="50" value="<?php echo htmlspecialchars(strval($surname)) ?>"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address*</label>
                                        <input name="email" type="email" id="email" class="form-control" maxlength="100"
                                            value="<?php echo htmlspecialchars(strval($email)) ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Location*</label>
                                        <select name="location" class="form-control">
                                            <option value="-1" selected="true">Please select...</option>
                                            <?php include 'lib/country-list.php';?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Vatsim ID</label>
                                        <input name="vatsim_id" type="text" id="vatsim_id" maxlength="11"
                                            class="form-control"
                                            value="<?php echo htmlspecialchars(strval($vatsim_id)) ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>IVAO ID</label>
                                        <input name="ivao_id" type="text" id="ivao_id" maxlength="11"
                                            class="form-control"
                                            value="<?php echo htmlspecialchars(strval($ivao_id)) ?>" />
                                    </div>
                                    <div class="form-group country">
                                        <label>Country *</label>
                                        <input name="count1" type="text" id="count1" class="form-control" maxlength="50"
                                            value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Requested Base *</label>
                                        <select name="hub" id="hub" class="form-control">
                                            <option value="" selected="true">Please select...</option>
                                            <?php
foreach ($bases as $base) {
    ?>
                                            <option value="<?php echo $base->id; ?>">
                                                <?php echo $base->hub; ?> (<?php echo $base->icao; ?>)
                                            </option>
                                            <?php
}?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Password*</label>
                                        <input name="password" type="password" id="password" class="form-control"
                                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" maxlength="30" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password*</label>
                                        <input name="confirm" type="password" id="confirm" class="form-control"
                                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" maxlength="30" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Background</label>
                                        <textarea name="background" rows="5" id="background"
                                            class="form-control"><?php echo htmlspecialchars(strval($background)) ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input name="join" type="submit" id="join" value="Submit Application"
                                            class="btn btn-success">
                                    </div>
                                </form>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Terms of Service</h3>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">

                    <p>By completing this application you agree to the following:</p>

                    <ul style="line-height: 1.7;">
                        <li>Be at least 13 years old</li>
                        <li>Hold a valid VATSIM account</li>
                        <li>Speak and understand English</li>
                        <li>Maintain compliance with all applicable Air Oceanic policies</li>
                    </ul>

                    <div style="margin-top:10px;">
                        <strong>Air Oceanic reserves the right to deny or revoke membership at any time.</strong>
                    </div>

                    <p style="margin-top:10px;">
                        It may take up to 24 hours for your application to be approved if you are successful.
                    </p>

                    <h4 style="margin-top:15px;">Password Requirements</h4>

                    <p>Your password must contain at least:</p>

                    <ul style="line-height: 1.7;">
                        <li>1 upper case letter</li>
                        <li>1 lower case letter</li>
                        <li>1 number</li>
                        <li>8 characters</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
</section>
<?php include 'includes/footer.php';?>
<script type="text/javascript">
$(document).ready(function() {
    document.getElementById("count1").required = false;
    $(".country").hide();
});
</script>