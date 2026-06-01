<?php

use Proxy\Api\Api;

Api::__constructStatic();
$obj = null;
$res = Api::sendSync('GET', 'v1/stats/greasedlandings', null);
if ($res->getStatusCode() == 200) {
    $obj = json_decode($res->getBody(), false);
}
?>
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-trophy gold" aria-hidden="true"></i> Top 5 Landings This Week
                </h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><strong>Pilot</strong></th>
                            <th><strong>Flight Number</strong></th>
                            <th><strong>Airport</strong></th>
                            <th><strong>Date</strong></th>
                            <th><strong>Landing Rate</strong></th>
                            <th><strong>Performance Score</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($obj)) { ?>
                            <?php foreach ($obj as $key => $flight) { ?>
                                <tr>
                                    <td>
                                        <?php if ($flight->profileImage != "") { ?>
                                            <img src="<?php echo website_base_url; ?>uploads/profiles/<?php echo $flight->profileImage ?>" class="img-circle pilot-profile-image-small" />
                                        <?php } else { ?>
                                            <i class="fa fa-user-circle profile-small" aria-hidden="true"></i>
                                            <?php } ?>&nbsp;
                                            <a href="<?php echo website_base_url; ?>profile.php?id=<?php echo $flight->pilot; ?>" class="js_showloader"><?php echo explode(" ", $flight->name)[0]; ?>
                                                (<?php echo $flight->callsign ?>)</a>
                                    </td>
                                    <td><i class="fa fa-plane"></i> <a href="<?php echo website_base_url; ?>pirep_info.php?id=<?php echo $flight->id; ?>" class="js_showloader"><?php echo $flight->flightNumber; ?></a>
                                    </td>
                                    <td><?php
                                        if ($flight->arrivedAlternate) {
                                            echo $flight->altIcao;
                                        } else {
                                            echo $flight->arrIcao;
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo (new DateTime($flight->date))->format('d M Y'); ?>
                                    </td>
                                    <td><?php echo number_format($flight->landingRate); ?>fpm
                                    </td>
                                    <td><?php echo $flight->score; ?>%
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="6">
                                    Nobody has performed an awesome landing yet!
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>