<?php

use Proxy\Api\Api;

Api::__constructStatic();
$obj = null;
$res = Api::sendSync('GET', 'v1/stats/latestpilots', null);
if ($res->getStatusCode() == 200) {
    $obj = json_decode($res->getBody(), false);
}
?>
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">

                <h3 class="panel-title">Latest Members</h3>

            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><strong>Pilot</strong></th>
                            <th><strong>Country</strong></th>
                            <th><strong>Hub</strong></th>
                            <th><strong>Hired Date</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($obj)) { ?>
                            <?php foreach ($obj as $key => $pilot) { ?>
                                <tr>
                                    <td>
                                        <?php if ($pilot->profileImage != "") { ?>
                                            <img src="<?php echo website_base_url; ?>uploads/profiles/<?php echo $pilot->profileImage ?>"
                                                class="img-circle pilot-profile-image-small" />
                                        <?php } else { ?>
                                            <i class="fa fa-user-circle profile-small" aria-hidden="true"></i>
                                            <?php } ?>&nbsp;
                                            <a href="<?php echo website_base_url; ?>profile.php?id=<?php echo $pilot->id; ?>"
                                                class="js_showloader"><?php echo explode(" ", $pilot->name)[0];  ?>
                                                (<?php echo $pilot->callsign;  ?>)</a>
                                    </td>
                                    <td><img src="<?php echo website_base_url; ?>images/flags/<?php echo $pilot->location; ?>.gif"
                                            alt="<?php echo $pilot->location; ?>" width="20" height="20">
                                        <?php echo $pilot->location; ?>
                                    </td>
                                    <td> <?php echo $pilot->hubName; ?>
                                    </td>
                                    <td> <?php echo (new DateTime($pilot->joinDate))->format('d M Y') ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <p>There are no pilots to display.</p>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>