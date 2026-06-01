<?php if (enable_cookie_banner) {?>
<div class="cookie-banner text-center" style="display: none">
    <p>
        This site uses cookies. By continuing to browse this site, you accept the use of cookies. <button
            id="cookieAccept" class="btn btn-cta-primary">Ok</button>
    </p>
</div>
<?php } ?>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <small class="copyright">Copyright &copy; <?php echo date("Y");?>
                    Air Oceanic</small><br />
                <small><a
                        href="<?php echo website_base_url;?>privacy.php">Privacy
                        Policy</a> | <a
                        href="<?php echo website_base_url;?>staff.php">Contact
                        Us</a></small>
             </div>
            <div class="col-md-4 text-right">
                <?php if (!empty(facebook_footer_link)) {?>
                <a href="<?php echo facebook_footer_link?>"
                    class="social-icons" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                <?php } ?>
                <?php if (!empty(twitter_footer_link)) {?>
                <a href="<?php echo twitter_footer_link?>"
                    class="social-icons" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                <?php } ?>
                <?php if (!empty(youtube_footer_link)) {?>
                <a href="<?php echo youtube_footer_link?>"
                    class="social-icons" target="_blank"><i class="fa fa-brands fa-youtube" aria-hidden="true"></i></a>
                <?php } ?>
                <?php if (!empty(discord_footer_link)) {?>
                <a href="<?php echo discord_footer_link?>"
                    class="social-icons" target="_blank"><i class="fa fa-brands fa-discord" aria-hidden="true"></i></a>
                <?php } ?>
                <?php if (!empty(instagram_footer_link)) {?>
                <a href="<?php echo instagram_footer_link?>"
                    class="social-icons" target="_blank"><i class="fa fa-brands fa-instagram"
                        aria-hidden="true"></i></a>
                <?php } ?>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript"
    src="<?php echo website_base_url;?>assets/plugins/bootstrap/js/bootstrap.min.js">
</script>
<script
    src="<?php echo website_base_url;?>assets/plugins/jquery.waypoints.min.js">
</script>
<script type="text/javascript"
    src="<?php echo website_base_url;?>assets/plugins/jquery.counterup.min.js">
</script>

<script type="text/javascript"
    src="<?php echo website_base_url;?>assets/js/main.js"></script>
<script type="text/javascript"
    src="<?php echo website_base_url;?>assets/js/loader.js"></script>
</body>

</html>