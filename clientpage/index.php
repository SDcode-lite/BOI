<?php
include('../security.php');
include('../admin/config/config.php');
include('include/clientheader.php');
include('include/clientsidebar.php');

set_time_limit(30);

?>
<div class="justify-content-center col-md-5 col-lg-8">
    <h1 class="mt-4">Welcome, Mr. 
        <?php
            if(isset($_SESSION['fname'])) {
                echo $_SESSION['fname']."!";
            }else {
                echo $_SESSION['username']."!</h1>";
                echo "<div class='alert alert-warning ms-3' role='alert'><span> You are not registered yet</span></div>";
            }

        ?>
    
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <?php
            if(isset($_SESSION['message']) && $_SESSION['message'] !='')
            {
                echo '<div class="alert alert-warning ms-3" role="alert">'.$_SESSION['message'].'</div>';
                unset($_SESSION['message']);
            }
        ?>
    </ol>
</div>
<?php
include('include/clientdesc.php');
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var timeout;

    $(document).on('mousemove keydown scroll', function() {
        clearTimeout(timeout);
        timeout = setTimeout(function(){
            // Send an AJAX request to the server to reset the timeout
            $.ajax({
                url: 'reset_timeout.php',
                method: 'POST'
            });
        }, 5000); // Timeout after 5 seconds of inactivity
    });
</script>



<?php

include('include/modals.php');
include('include/clientfooter.php');
include('include/script.php');
?>
