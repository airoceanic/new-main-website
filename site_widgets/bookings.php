<?php
use Proxy\Api\Api;

Api::__constructStatic();
$bids = null;
$res = Api::sendSync('GET', 'v1/bids', null);
if ($res->getStatusCode() == 200) {
    $bids = json_decode($res->getBody(), false);
}
?>
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Dispatched Flights</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><strong>Pilot</strong></th>
                            <th><strong>Flight No.</strong></th>
                            <th><strong>Type</strong></th>
                            <th><strong>Dep ICAO</strong></th>
                            <th><strong>Arr ICAO</strong></th>
                            <th><strong>PAX</strong></th>
                            <th><strong>Cargo</strong></th>
                            <th><strong>Aircraft</strong></th>
                            <th><strong>Status</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($bids)) {?>
                        <?php foreach ($bids as $key => $bid) {?>
                        <tr>
                            <td>
                                <?php if ($bid->profileImage != "") {?>
                                <img src="<?php echo website_base_url; ?>uploads/profiles/<?php echo $bid->profileImage; ?>"
                                    class="img-circle pilot-profile-image-small" />
                                <?php } else {?>
                                <i class="fa fa-user-circle profile-small" aria-hidden="true"></i>
                                <?php }?>&nbsp;
                                <a href="<?php echo website_base_url; ?>profile.php?id=<?php echo $bid->pilotId; ?>"
                                    class="js_showloader"><?php echo explode(" ", $bid->name)[0]; ?></a>
                            </td>
                            <td><i class="fa fa-plane"></i>
                                <?php if ($bid->bidType == "activity") {?>
                                <a href="<?php echo website_base_url; ?>activity_leg.php?id=<?php echo $bid->activityLegId; ?>"
                                    class="js_showloader"><?php echo empty($bid->flightNumber) ? "NA" : $bid->flightNumber; ?></a>
                                <?php } elseif ($bid->bidType == "scheduled") {?>
                                <a href="<?php echo website_base_url; ?>flight_info.php?id=<?php echo $bid->scheduleId; ?>"
                                    class="js_showloader"><?php echo empty($bid->flightNumber) ? "NA" : $bid->flightNumber; ?></a>
                                <?php } else {?>
                                <?php echo empty($bid->flightNumber) ? "NA" : $bid->flightNumber; ?>

                                <?php }?>
                            </td>
                            <td>
                                <?php if ($bid->bidType == "activity") {?>
                                Tour/Event
                                <?php } elseif ($bid->bidType == "scheduled") {?>
                                Scheduled
                                <?php } else {?>
                                Charter
                                <?php }?>
                            </td>
                            <td><i class="fa fa-map-marker"></i>
                                <?php if (!empty($bid->departureIcao)) {?>
                                <a href="airport_info.php?airport=<?php echo $bid->departureIcao; ?>"
                                    class="js_showloader"><?php echo $bid->departureIcao; ?></a>
                                <?php } else {?>
                                Any
                                <?php }?>
                            </td>
                            <td><i class="fa fa-map-marker"></i>
                                <?php if (!empty($bid->arrivalIcao)) {?>
                                <a href="airport_info.php?airport=<?php echo $bid->arrivalIcao; ?>"
                                    class="js_showloader"><?php echo $bid->arrivalIcao; ?></a>
                                <?php } else {?>
                                Any
                                <?php }?>
                            </td>
                            <td><?php echo $bid->totalPax; ?>
                            </td>
                            <td><?php echo getCargoDisplayValue($bid->cargo); ?>
                            </td>
                            <td><?php echo empty($bid->aircraft) ? "NA" : $bid->aircraft; ?>
                            </td>
                            <td><?php echo $bid->status < 1 ? '<i class="fa fa-clock-o" aria-hidden="true"></i> Dispatched' : '<i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i> In Progress'; ?>
                            </td>
                        </tr>
                        <?php }?>
                        <?php } else {?>
                        <tr>
                            <td colspan="9">
                                There are no active bookings.
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>