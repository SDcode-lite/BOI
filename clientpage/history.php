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

<?php

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
$user = $_SESSION['username'];
// Select data from database
$sql = "SELECT * FROM history WHERE username = '{$user}'";
$result = mysqli_query($conn, $sql);

// Output data in the table
echo '<div class="container card shadow mb-4">';
// echo '<div class="card col-12 d-flex mx-auto">';
echo '<div class="card-header py-3">';
echo '<i class="fas fa-table fa-beat me-4 py-3"></i>';
echo 'History Table';
echo '</div>';
echo '<div class="table-responsive">';
echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
echo '<thead>';
echo '<tr>';
echo '<th>s/n</th>';
echo '<th>Username</th>';
echo '<th>Plan</th>';
echo '<th>Amount</th>';
echo '<th>Date Approved</th>';
echo '<th>Transaction</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['sn'] . '</td>';
    echo '<td>' . $row['username'] . '</td>';
    echo '<td>' . $row['plan'] . '</td>';
    echo '<td>' . $row['amount'] . '</td>';
    echo '<td>' . $row['date_approved'] . '</td>';
    echo '<td>' . $row['transaction'] . '</td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';
// Output data in the table
echo '<div class="container card shadow mb-4">';
// echo '<div class="card col-12 d-flex mx-auto">';
echo '<div class="card-header py-3">';
echo '<i class="fas fa-table fa-beat me-4"></i>';
echo 'History Table';
echo '</div>';


mysqli_close($conn);


?>
