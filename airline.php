<?php
$MetaPageTitle = "About Us";
$MetaPageDescription = "Learn more about Air Oceanic, a virtual airline connecting Australia, New Zealand, and the South Pacific through realistic flight simulation.";
$MetaPageKeywords = "Air Oceanic, virtual airline, flight simulation, Microsoft Flight Simulator, X-Plane, Australia, New Zealand, South Pacific";
?>
<?php
include 'lib/functions.php';
include 'config.php';
session_start();
?>
<?php include 'includes/header.php';?>
<section id="content" class="cp section offset-header">
    <div class="container">
        <div class="row">
            <div class="jumbotron">
                <h1 class="text-center">About Us</h1>

                <img src="<?php echo website_base_url; ?>images/about-img.png"
                    style="float:right; padding:15px;"
                    class="img-circle" />

                <p>
                    At Air Oceanic, we are a leading virtual airline dedicated to simulating reliable and
                    efficient air services across East Coast Australia, New Zealand, and the greater South
                    Pacific. Operating on platforms like Microsoft Flight Simulator and X-Plane, we bring
                    the thrill of aviation to your screen with a strong focus on realism, safety, and
                    service excellence. Whether you're a seasoned virtual pilot or just beginning your
                    journey, we're committed to keeping the virtual skies open, immersive, and accessible
                    to all.
                </p>

                <p>
                    Built around a passion for aviation and attention to operational detail, Air Oceanic
                    offers a structured yet enjoyable environment for virtual pilots of all experience
                    levels. Our operations mirror real-world airline procedures, including realistic
                    routes, flight planning, and professional pilot standards, while still maintaining a
                    friendly and supportive community.
                </p>

                <p>
                    We operate a growing network of domestic and regional routes, connecting major hubs and
                    smaller regional airports throughout Australia, New Zealand, and the South Pacific
                    islands. This allows our pilots to experience a wide variety of flying conditions—from
                    short regional hops to longer international services—enhancing both skill development
                    and enjoyment.
                </p>

                <p>
                    At the core of Air Oceanic is our commitment to community. We value teamwork,
                    communication, and continuous learning, ensuring that every member feels supported
                    throughout their journey. Through training opportunities, community events, and
                    staff-led initiatives, we aim to create an engaging environment where pilots can
                    progress, participate, and enjoy aviation together.
                </p>

                <p>
                    Whether you're flying your first virtual sector or logging hundreds of hours in the
                    logbook, Air Oceanic is your gateway to a realistic, professional, and rewarding
                    virtual airline experience. Join us as we connect the skies of Australia, New Zealand,
                    and the South Pacific—one flight at a time.
                </p>
            </div>
        </div>
    </div>
</section>
<?php include 'includes/footer.php'; ?>