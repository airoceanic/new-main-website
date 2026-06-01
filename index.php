<?php
$MetaPageTitle = "";
$MetaPageDescription = "";
$MetaPageKeywords = "";
?>
<?php
include 'config.php';
include 'lib/functions.php';
session_start();
?>
<?php include 'includes/header.php'; ?>
<section id="promo" class="promo section offset-header-banner">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img src="<?php echo website_base_url; ?>assets/images/banner.jpg">

                <div class="carousel-caption">
                    <h3>Welcome to Air Oceanic</h3>
                    <p><a href="#features" class="scrollto">Begin your journey across Oceania today!<i
                                class="fa fa-arrow-down bounce" aria-hidden="true"></i></a></p>
                </div>
            </div>
            <div class="item">
                <img src="<?php echo website_base_url; ?>assets/images/banner2.jpg">
                <div class="carousel-caption">
                    <h3>A Modern Fleet</h3>
                    <p>With state of the art customizable flight tracking app
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="<?php echo website_base_url; ?>assets/images/banner6.jpg">
                <div class="carousel-caption">
                    <h3>Over 100s of Destinations Across the South Pacific</h3>
                    <p>A modern dispatch system including SimBrief integration
                    </p>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<section id="about" class="about section">
    <div class="container mini-stats-bar">
        <?php include_once 'site_widgets/mini_stats_bar.php'; ?>
    </div>
</section>
<div class="strip"></div>
<section id="features" class="features section">
    <div class="container">
        <div class="row">
            <h2 class="title text-center">Start a new flight sim career with us.</h2>
            <p>&nbsp;</p>
            <div class="item col-md-12 col-sm-6 col-xs-12">
                <div class="content">
                    <p>At Air Oceanic, we are a leading virtual airline dedicated to simulating reliable and efficient air services across East Coast Australia, New Zealand, and the greater South Pacific. Operating on platforms like Microsoft Flight Simulator and X-Plane, we bring the thrill of aviation to your screen with a strong focus on realism, safety, and service excellence. Whether you're a seasoned virtual pilot or just beginning your journey, we're committed to keeping the virtual skies open, immersive, and accessible to all.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="strip"></div>
<section id="map-cont" class="map section">
    <?php include_once 'site_widgets/map_acars.php'; ?>
    <div id="map"></div>
    <div class="container">
        <div class="row">
            <p>Use the controls in the <strong>top left</strong> of the map to <strong>zoom in</strong> and
                <strong>out</strong>. <a href="live_flights.php"><i class="fa fa-external-link"></i> click here to
                    view
                    flights</a>.
            </p>
        </div>
    </div>
</section>
<section id="stats" class="stats section">
    <?php include_once 'site_widgets/bookings.php'; ?>
</section>
<section id="stats" class="stats section">
    <?php include_once 'site_widgets/latest_pireps.php'; ?>
</section>
<section id="stats" class="stats section">
    <?php include_once 'site_widgets/greased_landings.php'; ?>
</section>
<section id="stats" class="stats section">
    <?php include_once 'site_widgets/latest_pilots.php'; ?>
</section>
<section id="join" class="join section">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-xs-8">
                <h2 class="title text-right">Are you looking for a new career in flight simulation?</h2>
            </div>
            <div class="col-md-3 col-xs-3">
                <a class="btn btn-cta-primary" href="../join.php">Join Us!</a>
            </div>
        </div>
    </div>
</section>
<?php include 'includes/footer.php';
