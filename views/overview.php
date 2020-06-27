<?php 

$page_title = 'CMDeel';

?>
<section class="overview-featured">
    <div class="overview-featured-nav">
        <form class="category-form" method="post">
            <label class="active">
                Alles
                <input type="radio" name="overview_category" value="">
            </labeL>
            <label>
                Illustraties
                <input type="radio" name="overview_category" value="Illustratie">
            </label>
            <label>
                3D render
                <input type="radio" name="overview_category" value="3D render">
            </label>
            <label>
                Concept
                <input type="radio" name="overview_category" value="Concept">
            </label>
            <label>
                Schets
                <input type="radio" name="overview_category" value="Schets">
            </label>
            <label>
                App
                <input type="radio" name="overview_category" value="App">
            </label>
            <label>
                Web
                <input type="radio" name="overview_category" value="Web">
            </label>
            <label>
                Sketchnote
                <input type="radio" name="overview_category" value="Sketchnote">
            </label>
            <label>
                Logo
                <input type="radio" name="overview_category" value="Logo">
            </label>
            <label>
                Typografie
                <input type="radio" name="overview_category" value="Typografie">
            </label>
            <label>
                Overig
                <input type="radio" name="overview_category" value="Overig">
            </label>
            <input type="submit" value="Submit" name="overview_category_submit">
        </form>
    </div>
    <div class="overview-featured-message">
        <h1>Een platform voor al je CMD creaties!</h1>
        <h3><a href="#">Klik hier</a> als je niet weet waar je naar op zoek bent.</h3>
    </div>
</section>
<section class="overview-shots">
    <div class="overview-shots-navigation">
        <div class="layout-button">
            <button title="Weergave wijzigen">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 156.95 43.78"><g id="Laag_2" data-name="Laag 2"><g id="Layer_1" data-name="Layer 1"><g class="four-inline"><path d="M47.83,4a3,3,0,0,1,3,3V36.78a3,3,0,0,1-3,3H7a3,3,0,0,1-3-3V7A3,3,0,0,1,7,4H47.83m0-4H7A7,7,0,0,0,0,7V36.78a7,7,0,0,0,7,7H47.83a7,7,0,0,0,7-7V7a7,7,0,0,0-7-7Z"/><path d="M33.5,26.53H31.56v3.34H28.23V26.53H21.36V24.16l7.06-10.4h3.14V23.89H33.5Zm-5.27-2.64V21.16c0-.46,0-1.12.06-2s.07-1.37.09-1.51h-.09a12.34,12.34,0,0,1-1,1.77l-2.95,4.46Z"/></g><g class="three-inline"><path d="M150,4a3,3,0,0,1,3,3V36.78a3,3,0,0,1-3,3H109.12a3,3,0,0,1-3-3V7a3,3,0,0,1,3-3H150m0-4H109.12a7,7,0,0,0-7,7V36.78a7,7,0,0,0,7,7H150a7,7,0,0,0,7-7V7a7,7,0,0,0-7-7Z"/><path d="M134.63,17.37a3.77,3.77,0,0,1-.91,2.56,4.77,4.77,0,0,1-2.57,1.46v.06a5.17,5.17,0,0,1,2.95,1.19,3.31,3.31,0,0,1,1,2.54,4.32,4.32,0,0,1-1.68,3.62,7.81,7.81,0,0,1-4.82,1.29,11.76,11.76,0,0,1-4.65-.87v-2.9a10.72,10.72,0,0,0,2.06.78,9.1,9.1,0,0,0,2.23.29,4.36,4.36,0,0,0,2.49-.57,2.09,2.09,0,0,0,.8-1.84,1.66,1.66,0,0,0-.92-1.61,7,7,0,0,0-3-.47h-1.23V20.29h1.25a5.89,5.89,0,0,0,2.74-.49,1.79,1.79,0,0,0,.86-1.68c0-1.22-.76-1.83-2.29-1.83a5.17,5.17,0,0,0-1.62.26,8,8,0,0,0-1.82.92L124,15.12a8.74,8.74,0,0,1,5.25-1.59,6.74,6.74,0,0,1,4,1A3.23,3.23,0,0,1,134.63,17.37Z"/></g><path class="divider" d="M78.47,36.76a1.5,1.5,0,0,1-1.5-1.5V8.52a1.5,1.5,0,1,1,3,0V35.26A1.5,1.5,0,0,1,78.47,36.76Z"/></g></g></svg>
            </button>
        </div>
        <form class="search-form" method="post">
            <input type="search" name="overview_search" autofocus="true" placeholder="Ben je op zoek naar iets? Zoek niet verder.." />
            <input type="submit" name="overview_submit_search" style="display: none">
        </form>
        <form class="sort-form" method="post">
            <select name="overview_sort" onchange="this.form.submit();">
                <option value="">Sorteren</option>
                <option value="date_desc">Nieuwste eerst</option>
                <option value="date_asc">Oudste eerst</option>
                <option value="date_random">Willekeurige volgorde</option>
            </select>
        </form>
    </div>
    <div class="overview-shots-content">
        <?php include 'model/overview-shots.php'; ?>
    </div>
    <div class="overview-shots-overlay">
        <div class="overview-shots-overlay-details"></div>
        <div class="overview-shots-overlay-background"></div>
    </div>
    <div class="alert alert-succes alert-comment">Je reactie is geplaatst! Nu even wachten tot iemand reageerd..</div>
    <div class="alert alert-succes alert-share">De deelbare link is gekopieerd! Delen maar..</div>
</section>



<script>
    $(document).ready(function() {  
        // GET UPLOAD (SHOT) ID - MODAL VIEW DETAILS
        // https://www.webslesson.info/2016/09/php-ajax-display-dynamic-mysql-data-in-bootstrap-modal.html
        $('.overview-shots-content-item .shot-file').click(function () {  
            var shot_id = $(this).attr("id");  
            $.ajax({
                url: "model/overview-shots-details.php",  
                method: "post",
                data: {shot_id:shot_id},  
                success: function(data) {  
                    $('.overview-shots-overlay-details').html(data);  
                    $('main section.overview-shots .overview-shots-overlay').addClass('visible');
                    $('body').addClass('no-scroll');

                    // SET MIN-HEIGHT OF MODAL VIEW BACKGROUND (FIX SCROLL OUT OF VIEW)
                    var shotsOverlay = document.querySelector('main section.overview-shots .overview-shots-overlay-details');
                    var shotsOverlayHeight = shotsOverlay.offsetHeight;
                    var shotsOverlayBackgroundHeight = shotsOverlayHeight + 200;
                    console.log('Hoogte modaal venster: ' + shotsOverlayBackgroundHeight + 'px');
                    document.querySelector('main section.overview-shots .overview-shots-overlay-background').style.minHeight = shotsOverlayBackgroundHeight + 'px';
                    
                    // STRIP UPLOAD DETAILS (SHOT) TITLE IF MORE THEN 18 CHARACTERS
                    var shotTitle = document.querySelector("main section.overview-shots .overview-shots-overlay-details .shot-details-header .shot-details-user h2");
                    var shotTitleValue = shotTitle.textContent;
                    if (shotTitleValue.length > 36) {
                        var shotTitleAltered = shotTitleValue.substr(0, 36); // https://stackoverflow.com/questions/7708819/keep-only-first-n-characters-in-a-string
                        shotTitleFinal = shotTitleAltered + "..";
                        shotTitle.textContent = shotTitleFinal;
                    } 

                    // COPY UPLOAD LINK ON CLICK (SHARE)
                    // https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_copy_clipboard
                    document.querySelector('main section.overview-shots .overview-shots-overlay-details .shot-details-content .shot-details-content-right .button-share-upload').onclick = function() {
                        var uploadLink = document.getElementById("hidden-link");
                        uploadLink.select();
                        uploadLink.setSelectionRange(0, 99999);
                        document.execCommand("copy");

                        // ALERT AFTER LINK HAS BEEN COPIED
                        document.querySelector('main section.overview-shots .alert-share').classList.add('visible');
                        setTimeout(function() {
                            document.querySelector('main section.overview-shots .alert-share').classList.remove('visible');
                        }, 4500);
                    };
                }
            });  
        });  

        // CATEGORY POST (NO RELOAD)
        $(".category-form").submit(function(e) {
            e.preventDefault();
            var form = $(this);

            $.ajax({
            type: "post",
            url: "model/overview-shots.php",
            data: form.serialize(),
            success: function (data) {
                $('.overview-shots-content').html(data);  

                // GET UPLOAD (SHOT) ID - MODAL VIEW DETAILS
                // https://www.webslesson.info/2016/09/php-ajax-display-dynamic-mysql-data-in-bootstrap-modal.html
                $('.overview-shots-content-item .shot-file').click(function () {  
                var shot_id = $(this).attr("id");  
                $.ajax({  
                    url: "model/overview-shots-details.php",  
                    method: "post",
                    data: {shot_id:shot_id},  
                    success: function(data) {  
                        $('.overview-shots-overlay-details').html(data);  
                        $('main section.overview-shots .overview-shots-overlay').addClass('visible');
                        $('body').addClass('no-scroll');

                        // SET MIN-HEIGHT OF MODAL VIEW BACKGROUND (FIX SCROLL OUT OF VIEW)
                        var shotsOverlay = document.querySelector('main section.overview-shots .overview-shots-overlay-details');
                        var shotsOverlayHeight = shotsOverlay.offsetHeight;
                        var shotsOverlayBackgroundHeight = shotsOverlayHeight + 200;
                        console.log('Hoogte modaal venster: ' + shotsOverlayBackgroundHeight + 'px');
                        document.querySelector('main section.overview-shots .overview-shots-overlay-background').style.minHeight = shotsOverlayBackgroundHeight + 'px';
                        
                        // STRIP UPLOAD DETAILS (SHOT) TITLE IF MORE THEN 18 CHARACTERS
                        var shotTitle = document.querySelector("main section.overview-shots .overview-shots-overlay-details .shot-details-header .shot-details-user h2");
                        var shotTitleValue = shotTitle.textContent;
                        if (shotTitleValue.length > 36) {
                            var shotTitleAltered = shotTitleValue.substr(0, 36); // https://stackoverflow.com/questions/7708819/keep-only-first-n-characters-in-a-string
                            shotTitleFinal = shotTitleAltered + "..";
                            shotTitle.textContent = shotTitleFinal;
                        } 
                    }
                });  
            });  
            }
        });
        });

        

        

    });
</script>





