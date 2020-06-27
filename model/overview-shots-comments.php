<?php

// CONFIGURATION
include '../assets/includes/config.php';

// CONNECT TO DATABASE (UPLOAD COMMENTS)
$getComments = "SELECT * FROM cmdeel_comments WHERE upload_id='$upload_id'";
$resultComments = mysqli_query($dbc, $getComments) or die ('Hmm, hier gaat iets niet helemaal goed...');

// GET AMOUNT OF COMMENTS OF UPLOAD
$amountComments = mysqli_num_rows($resultComments);
if ($amountComments == 1)  {
    echo '<h3>' . $amountComments . ' Reactie</h3>';
} else if ($amountComments > 0){
    echo '<h3>' . $amountComments . ' Reacties</h3>';
} else {
    echo '<h3>Nog geen reacties</h3>';
}

echo '<div class="shot-details-comments">';

// GET COMMENTS OF UPLOAD
while($row3 = mysqli_fetch_array($resultComments)) {
    $comment_user_id = $row3['user_id'];
    $comment_text = $row3['comment_text'];
    $comment_date = $row3['comment_date'];
    $comment_likes = $row3['comment_likes'];

    // BEAUTIFY DATE OF COMMENT
    $comment_date_split = explode(',',trim($comment_date));
    $comment_date_full_date = $comment_date_split[0];
    $comment_date_full_split = explode('-',trim($comment_date_full_date));
    $comment_date_day = $comment_date_full_split[0];
    $comment_date_time = $comment_date_split[1];
    $current_date_day = date("j");
    $current_date = date("j-n-Y");
    $comment_date_difference = $current_date_day - $comment_date_day;
    if ($comment_date_full_date == $current_date) {
        $comment_date_final = 'Vandaag - ' . $comment_date_time;
    } else if ($comment_date_difference != 0) {
        if ($comment_date_difference < 2) {
            $comment_date_final = 'Gisteren - ' . $comment_date_time;
        }
        if (($comment_date_difference <= -1) || ($comment_date_difference > 1)) {
            $comment_date_final = $comment_date_full_date . ' - ' . $comment_date_time;
        }
    } else {
        $comment_date_final = $comment_date_full_date . ' - ' . $comment_date_time;
    }

    // GET USER OF COMMENT
    $getCommentUser = "SELECT username, profile_picture FROM cmdeel_users WHERE user_id='$comment_user_id'";
    $resulCommenttUser = mysqli_query($dbc, $getCommentUser) or die ('Hmm, hier gaat iets niet helemaal goed...');

    while($row4 = mysqli_fetch_array($resulCommenttUser)) {
        $comment_user_name = $row4['username'];
        $comment_user_picture = $row4['profile_picture'];

        echo '
        <div class="shot-details-comment">
            <div class="shot-details-comment-info">
                <a href="index.php?page=user&username=' . $comment_user_name . '">
                    <img src="assets/user-uploads/user-profiles/' . $comment_user_picture . '" alt="Profielfoto van ' . $comment_user_name . '">
                </a>
                <div class="shot-details-comment-info-user">
                    <a href="index.php?page=user&username=' . $comment_user_name . '"><h4>' . $comment_user_name . '</h4></a>
                    <span>' . $comment_date_final . '</span>
                </div>
                <div class="shot-details-comment-info-likes">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 455.52">
                            <path d="M256,455.52a30,30,0,0,1-19.79-7.44C215.52,430,195.58,413,178,398l-.09-.07C126.32,354,81.77,316,50.78,278.61,16.14,236.81,0,197.17,0,153.87,0,111.8,14.43,73,40.62,44.58,67.12,15.83,103.49,0,143,0c29.56,0,56.62,9.34,80.45,27.77a164.53,164.53,0,0,1,32.52,34,164.57,164.57,0,0,1,32.53-34C312.35,9.34,339.42,0,369,0c39.54,0,75.91,15.83,102.42,44.58C497.58,73,512,111.8,512,153.87c0,43.3-16.13,82.94-50.78,124.74-31,37.4-75.53,75.35-127.1,119.31-17.63,15-37.6,32-58.33,50.17A30,30,0,0,1,256,455.52ZM143,30C112,30,83.43,42.39,62.66,64.91,41.59,87.76,30,119.36,30,153.87c0,36.42,13.53,69,43.88,105.61,29.33,35.39,73,72.57,123.48,115.62l.09.08c17.66,15.05,37.68,32.11,58.52,50.33,21-18.25,41-35.34,58.7-50.42,50.52-43,94.14-80.22,123.47-115.61C468.48,222.86,482,190.29,482,153.87c0-34.51-11.6-66.11-32.67-89C428.58,42.39,400,30,369,30c-22.76,0-43.65,7.24-62.1,21.5C290.43,64.21,279,80.29,272.26,91.54a18.93,18.93,0,0,1-32.52,0C233,80.29,221.57,64.21,205.13,51.49,186.68,37.23,165.79,30,143,30Z"/><path d="M161.08,131.11A9.45,9.45,0,1,0,153,120.4,9.46,9.46,0,0,0,161.08,131.11Z"/><path d="M123.34,125.73A9.48,9.48,0,1,0,115.26,115,9.5,9.5,0,0,0,123.34,125.73Z"/><path d="M85.6,120.3a9.47,9.47,0,1,0-8.08-10.71A9.45,9.45,0,0,0,85.6,120.3Z"/><path d="M188,211.51A9.47,9.47,0,1,0,180,200.78,9.53,9.53,0,0,0,188,211.51Z"/><path d="M142.24,195.4a9.53,9.53,0,1,0,10.77-8A9.49,9.49,0,0,0,142.24,195.4Z"/><path d="M104.53,190a9.53,9.53,0,1,0,10.76-8A9.47,9.47,0,0,0,104.53,190Z"/><path d="M85.65,187.28a9.54,9.54,0,1,0-10.79,8A9.52,9.52,0,0,0,85.65,187.28Z"/><path d="M174.55,171.31a9.47,9.47,0,1,0-8.09-10.71A9.46,9.46,0,0,0,174.55,171.31Z"/><path d="M136.85,165.91a9.46,9.46,0,1,0-8.1-10.72A9.46,9.46,0,0,0,136.85,165.91Z"/><path d="M91,149.79a9.54,9.54,0,1,0,10.75-8A9.5,9.5,0,0,0,91,149.79Z"/><path d="M53.29,144.36a9.52,9.52,0,1,0,10.77-8A9.52,9.52,0,0,0,53.29,144.36Z"/><path d="M109.85,85.52a9.46,9.46,0,1,0-8.09-10.7A9.51,9.51,0,0,0,109.85,85.52Z"/><path d="M72.12,80.13A9.48,9.48,0,1,0,64,69.38,9.49,9.49,0,0,0,72.12,80.13Z"/><path d="M215,291.88a9.46,9.46,0,1,0-8.09-10.71A9.47,9.47,0,0,0,215,291.88Z"/><path d="M169.19,275.77a9.54,9.54,0,1,0,10.77-8A9.53,9.53,0,0,0,169.19,275.77Z"/><path d="M142.24,262.33a9.47,9.47,0,1,0,8.11,10.72A9.48,9.48,0,0,0,142.24,262.33Z"/><path d="M93.78,264.94a9.52,9.52,0,1,0,10.78-8A9.46,9.46,0,0,0,93.78,264.94Z"/><path d="M201.54,251.7a9.47,9.47,0,1,0-8.1-10.72A9.51,9.51,0,0,0,201.54,251.7Z"/><path d="M155.72,235.57a9.52,9.52,0,1,0,10.77-8A9.5,9.5,0,0,0,155.72,235.57Z"/><path d="M128.77,222.13a9.47,9.47,0,1,0,8.08,10.73A9.51,9.51,0,0,0,128.77,222.13Z"/><path d="M91,216.71a9.48,9.48,0,1,0,8.1,10.74A9.54,9.54,0,0,0,91,216.71Z"/><path d="M196.18,356.15a9.52,9.52,0,1,0,10.78-8A9.5,9.5,0,0,0,196.18,356.15Z"/><path d="M166.54,361.45a9.47,9.47,0,1,0-8.08-10.71A9.51,9.51,0,0,0,166.54,361.45Z"/><path d="M182.69,316a9.54,9.54,0,1,0,10.79-8A9.5,9.5,0,0,0,182.69,316Z"/><path d="M155.75,302.54a9.46,9.46,0,1,0,8.07,10.71A9.46,9.46,0,0,0,155.75,302.54Z"/><path d="M107.24,305.13a9.53,9.53,0,1,0,10.8-8A9.49,9.49,0,0,0,107.24,305.13Z"/><path d="M56.06,259.53a9.52,9.52,0,1,0,10.78-8A9.46,9.46,0,0,0,56.06,259.53Z"/><path d="M228.48,332.1a9.47,9.47,0,1,0-8.06-10.73A9.53,9.53,0,0,0,228.48,332.1Z"/><path d="M255.49,412.47a9.46,9.46,0,1,0-8.08-10.71A9.47,9.47,0,0,0,255.49,412.47Z"/><path d="M209.65,396.36a9.53,9.53,0,1,0,10.78-8A9.52,9.52,0,0,0,209.65,396.36Z"/><path d="M242,372.29a9.47,9.47,0,1,0-8.1-10.72A9.52,9.52,0,0,0,242,372.29Z"/><path d="M134.12,50.72A9.46,9.46,0,1,0,126,40,9.47,9.47,0,0,0,134.12,50.72Z"/><path d="M96.39,45.34A9.47,9.47,0,1,0,88.3,34.62,9.5,9.5,0,0,0,96.39,45.34Z"/><path d="M147.59,90.93a9.47,9.47,0,1,0-8.08-10.72A9.48,9.48,0,0,0,147.59,90.93Z"/><path d="M109.9,85.52a9.46,9.46,0,1,0-8.1-10.72A9.46,9.46,0,0,0,109.9,85.52Z"/><path d="M47.87,114.87a9.47,9.47,0,1,0-8.08-10.72A9.46,9.46,0,0,0,47.87,114.87Z"/><path d="M66.8,184.52a9.53,9.53,0,1,0,10.76-8A9.49,9.49,0,0,0,66.8,184.52Z"/><path d="M47.92,181.84a9.53,9.53,0,1,0-10.79,8A9.52,9.52,0,0,0,47.92,181.84Z"/><path d="M53.27,144.35a9.54,9.54,0,1,0,10.75-8A9.5,9.5,0,0,0,53.27,144.35Z"/><path d="M15.56,138.92a9.52,9.52,0,1,0,10.78-8A9.52,9.52,0,0,0,15.56,138.92Z"/><path d="M91,216.69a9.47,9.47,0,1,0,8.08,10.73A9.51,9.51,0,0,0,91,216.69Z"/><path d="M53.3,211.27A9.48,9.48,0,1,0,61.4,222,9.55,9.55,0,0,0,53.3,211.27Z"/>
                        </svg>
                        <span>' . $comment_likes . '</span>
                    </button>
                </div>
            </div>
            <p>' . $comment_text . '</p>
        </div>    
        ';
    }

}

echo '</div>';



// LEAVE COMMENT (CHECK IF LOGGED IN)
if(isset($_SESSION['username'])) {
    echo '
    <h3>Reactie achterlaten</h3>
    <div class="shot-details-newcomment">
        <form method="post">
            <input type="hidden" name="shot_id" value="' . $upload_id . '" /> 
            <label for="comment-text">Jouw reactie</label>
            <textarea id="comment-text" name="comment_text" autocomplete="new-password" placeholder="Wat wil je zeggen ' . $session_first_name . '?" required></textarea>
            <input type="submit" name="comment_submit" value="Versturen maar!" />
        </form>
    </div>

    <script>
        // POST COMMENT (UPLOAD / SHOT)
        $("main .overview-shots-overlay-details .shot-details-newcomment form").on("submit", function (e) {
            e.preventDefault();

            $.ajax({
            type: "post",
            url: "model/overview-shots-newcomment.php",
            data: $(this).serialize(),
            success: function () {
                // ALERT AFTER COMMENT POST
                $("main section .alert-comment").addClass("visible");
                setTimeout(function() {
                    $("main section .alert-comment").removeClass("visible");
                }, 4500);

                // REFRESH COMMENT SECTION AFTER COMMENT POST
                var shot_id_comment = '.$upload_id.';  
                $.ajax({  
                    url: "model/overview-shots-details.php",  
                    method: "post",
                    data: {shot_id:shot_id_comment},  
                    success: function(data) {  
                        $(".overview-shots-overlay-details").html(data);  
                        
                        if (document.querySelector("main section.overview-shots .overview-shots-overlay-details") !== null) {  
                            $("main section.overview-shots .overview-shots-overlay").addClass("visible");
                            $("body").addClass("no-scroll");
                            
                            // SET MIN-HEIGHT OF MODAL VIEW BACKGROUND (FIX SCROLL OUT OF VIEW)
                            var shotsOverlay = document.querySelector("main section.overview-shots .overview-shots-overlay-details");
                            var shotsOverlayHeight = shotsOverlay.offsetHeight;
                            var shotsOverlayBackgroundHeight = shotsOverlayHeight + 200;
                            console.log("Hoogte modaal venster: " + shotsOverlayBackgroundHeight + "px");
                            document.querySelector("main section.overview-shots .overview-shots-overlay-background").style.minHeight = shotsOverlayBackgroundHeight + "px";
                        };
                    }
                });  
            }
            });
        });
    </script>
    ';
} else {
    echo '
    <h3>Reactie achterlaten</h3>
    <div class="shot-details-newcomment">
        <p>Om een reactie achter te laten, moet je <a href="login">eerst even inloggen..</a><p>
    </div>
    ';
}


?>


    