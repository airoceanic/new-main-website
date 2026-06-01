<?php
include 'lib/functions.php';
include 'config.php';
session_start();
?>
<?php
$MetaPageTitle = "";
$MetaPageDescription = "";
$MetaPageKeywords = "";
?>
<?php include 'includes/header.php'; ?>
<section id="content" class="cp section offset-header">
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Airline Performance Statistics</h3>
                </div>
                <div class="panel-body row-space">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <h4>7 Day Statistics</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <strong>Active Pilots</strong>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <span name="week-active-pilots"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <strong>Hours</strong>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <span name="week-hours"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <strong>Flights</strong>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <span name="week-flights"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <strong>Miles (nm)</strong>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <span name="week-miles"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <strong>Fuel Used</strong>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <span name="week-fuel"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <strong>Passengers</strong>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <span name="week-pax"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <strong>Cargo</strong>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <span name="week-cargo"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <h4>30 Day Statistics</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <strong>Active Pilots</strong>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <span name="thirty-active-pilots"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <strong>Hours</strong>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <span name="thirty-hours"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <strong>Flights</strong>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <span name="thirty-flights"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <strong>Miles</strong>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <span name="thirty-miles"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <strong>Fuel Used</strong>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <span name="thirty-fuel"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <strong>Passengers</strong>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <span name="thirty-pax"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <strong>Cargo</strong>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <span name="thirty-cargo"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <h4>All-time Statistics</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <strong>Total Pilots</strong>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <span name="all-pilots"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <strong>Hours</strong>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <span name="all-hours"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <strong>Flights</strong>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <span name="all-flights"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <strong>Miles (nm)</strong>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <span name="all-miles"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <strong>Fuel Used</strong>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <span name="all-fuel"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <strong>Passengers</strong>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <span name="all-pax"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <strong>Cargo</strong>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <span name="all-cargo"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <strong>Total Schedules</strong>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <span name="all-schedules"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once  'site_widgets/greased_landings.php'; ?>
    <?php include_once 'site_widgets/latest_pireps.php'; ?>
</section>
</script>
<script type="text/javascript">
    $(document).ready(function() {
        LoadAllTimeStats();
        Load7DayStats();
        Load30DayStats();
    });

    async function LoadAllTimeStats() {

        await fetch('<?php echo website_base_url; ?>includes/all_time_stats.php').then(function(response) {
            return response.json();
        }).then(function(json) {
            $("[name=all-pilots]").html(json["activePilots"]);
            $("[name=all-hours]").html(json["hours"]);
            $("[name=all-flights]").html(json["flights"]);
            $("[name=all-cargo]").html(json["cargo"]);
            $("[name=all-miles]").html(json["miles"]);
            $("[name=all-fuel]").html(json["fuel"]);
            $("[name=all-pax]").html(json["passengers"]);
            $("[name=all-schedules]").html(json["totalSchedules"]);
        }).catch(function(error) {
            console.error(error);
        });
    }
    async function Load7DayStats() {

        await fetch('<?php echo website_base_url; ?>includes/seven_day_stats.php').then(function(response) {
            return response.json();
        }).then(function(json) {
            $("[name=week-active-pilots]").html(json["activePilots"]);
            $("[name=week-hours]").html(json["hours"]);
            $("[name=week-flights]").html(json["flights"]);
            $("[name=week-cargo]").html(json["cargo"]);
            $("[name=week-miles]").html(json["miles"]);
            $("[name=week-fuel]").html(json["fuel"]);
            $("[name=week-pax]").html(json["passengers"]);
            $("[name=week-schedules]").html(json["totalSchedules"]);
        }).catch(function(error) {
            console.error(error);
        });
    }
    async function Load30DayStats() {

        await fetch('<?php echo website_base_url; ?>includes/thirty_day_stats.php').then(function(response) {
            return response.json();
        }).then(function(json) {
            $("[name=thirty-active-pilots]").html(json["activePilots"]);
            $("[name=thirty-hours]").html(json["hours"]);
            $("[name=thirty-flights]").html(json["flights"]);
            $("[name=thirty-cargo]").html(json["cargo"]);
            $("[name=thirty-miles]").html(json["miles"]);
            $("[name=thirty-fuel]").html(json["fuel"]);
            $("[name=thirty-pax]").html(json["passengers"]);
            $("[name=thirty-schedules]").html(json["totalSchedules"]);
        }).catch(function(error) {
            console.error(error);
        });
    }
</script>
<?php include 'includes/footer.php'; ?>