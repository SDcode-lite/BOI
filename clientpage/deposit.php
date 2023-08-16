<?php
    include('../security.php');
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
                echo $_SESSION['username']."!";
            }

        ?>
    </h1>
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
<div class="row">
    <div class="container col-xxl-6 col-xl-6 col-lg-7 col-md-8 col-sm-9 mb-3 justify-content-center">
        <form action="include/deposit.php" method="post" class="needs-validation" novalidate id="forms">
            <div class="card shadow justify-content-center">
                <div class="card-header">
                    <h4>Deposit Details</h4>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label>Amount : </label>
                        <input required type="text" name="amount" placeholder="Enter Amount In Naira" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Plan: </label>
                        <select class="form-select" name="plan" aria-label="Default select example">
                            <option selected>--Select--</option>
                            <option value="Gold">Gold</option>
                            <option value="Silver">Silver</option>
                        </select>
                    </div>
                    <center>
                    <div class="form-group mb-3">
                        <button type="submit" name="with_btn" class="btn btn-outline-primary">Deposit</button>
                    </div>
                    </center>
                </div>
            </div>
        
        </form>
    </div>
</div>
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
