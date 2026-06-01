<?php

use Proxy\Api\Api;

Api::__constructStatic();
$obj = null;
$res = Api::sendSync('GET', 'v1/stats/latestflights', null);
if ($res->getStatusCode() == 200) {
	$obj = json_decode($res->getBody(), false);
}
?>

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Latest 10 Flights</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><strong>Pilot</strong></th>
                            <th><strong>Flight Number</strong></th>
                            <th><strong>Dep ICAO</strong></th>
                            <th><strong>Arr ICAO</strong></th>
                            <th><strong>Aircraft</strong></th>
                            <th class="text-center"><strong>ACARS</strong></th>
                            <th class="text-center"><strong>Landing Rate</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($obj)) { ?>
                        <?php foreach ($obj as $key => $flight) { ?>
                        <tr>
                            <td>
                                <?php if ($flight->profileImage != "") { ?>
                                <img src="<?php echo website_base_url; ?>uploads/profiles/<?php echo $flight->profileImage; ?>"
                                    class="img-circle pilot-profile-image-small" />
                                <?php } else { ?>
                                <i class="fa fa-user-circle profile-small" aria-hidden="true"></i>
                                <?php } ?>&nbsp;
                                <a href="<?php echo website_base_url; ?>profile.php?id=<?php echo $flight->pilot; ?>"
                                    class="js_showloader"><?php echo explode(" ", $flight->name)[0]; ?>
                                    (<?php echo $flight->callsign; ?>)</a>
                            </td>
                            <td><i class="fa fa-plane"></i> <a
                                    href="<?php echo website_base_url; ?>pirep_info.php?id=<?php echo $flight->id; ?>"
                                    class="js_showloader">
                                    <?php
											if ($flight->flightNumber == '') {
												echo  $flight->id;
											} else {
												echo  $flight->flightNumber;
											}
											?>
                                </a></td>
                            <td><i class="fa fa-map-marker"></i> <a
                                    href="airport_info.php?airport=<?php echo $flight->depIcao; ?>"
                                    class="js_showloader"><?php echo $flight->depIcao; ?></a>
                            </td>
                            <td><i class="fa fa-map-marker"></i> <a
                                    href="airport_info.php?airport=<?php echo $flight->arrIcao; ?>"
                                    class="js_showloader"><?php echo $flight->arrIcao; ?></a>
                            </td>
                            <td><span
                                    title="<?php echo $flight->aircraft; ?>"><?php echo limit($flight->aircraft, 25); ?></span>
                            </td>
                            <td class="text-center">
                                <?php echo !$flight->acarsFlight ? "<i class=\"fa fa-times\" title=\"Not Acars recorded flight\"></i>" : "<i class=\"fa fa-check\" title=\"Acars recorded flight\"></i>"; ?>
                            </td>
                            <td class="text-center">
                                <?php echo empty($flight->landingRate) ? "N/A" : ($flight->landingRate < 0 ? number_format($flight->landingRate) . "fpm" : "N/A"); ?>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php } else { ?>
                        <p>There are no flights to display.</p>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>