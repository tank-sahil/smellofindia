<?php
include('sidebar.php');
include('admin_session.php');
?>

<html>

<head>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <div id="main1">
        <h1>Dashboard</h1>
        <div class="row maind">
            <?php
            $con = new mysqli("localhost", "root", "", "soi");

            $total_query = "SELECT COUNT(*) AS total FROM allbook";
            $total_result = $con->query($total_query);

            if ($total_result) {
                // Fetch the count directly
                $row = $total_result->fetch_assoc();
                $total_count = $row['total'];
            } else {
                echo "Error executing query: " . $con->error;
            }

            // Close connection
            $con->close();
            ?>
            <div class="col-sm-3 subd mt-5">
                <a href="bookhistory.php" style="color:#111;text-decoration:none">
                    <h1> <b><?= $total_count ?></b> <svg xmlns="http://www.w3.org/2000/svg" width="60px" height="60px" viewBox="0 0 24 24">
                            <path fill="black" d="M7.5 6.5C7.5 8.981 9.519 11 12 11s4.5-2.019 4.5-4.5S14.481 2 12 2S7.5 4.019 7.5 6.5M20 21h1v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1z" />
                        </svg> </h1><br>

                    <h4>All Bookings</h4>
                </a>
            </div>
            <?php
            $con = new mysqli("localhost", "root", "", "soi");

            $total_query = "SELECT COUNT(*) AS total FROM book";
            $total_result = $con->query($total_query);

            if ($total_result) {
                // Fetch the count directly
                $row = $total_result->fetch_assoc();
                $total_count = $row['total'];
            } else {
                echo "Error executing query: " . $con->error;
            }

            // Close connection
            $con->close();
            ?>
            <div class="col-sm-3 subd1 mt-5"><br>
                <a href="bookhistory.php" style="color:#111;text-decoration:none">
                    <h1> <b><?= $total_count ?></b> <svg xmlns="http://www.w3.org/2000/svg" width="70px" height="70px" viewBox="0 0 24 24">
                            <path fill="black" d="M4.5 8.552c0 1.995 1.505 3.5 3.5 3.5s3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5s-3.5 1.505-3.5 3.5M19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 19h10v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1z" />
                        </svg> </h1><br>
                    <h4>New Booking</h4>
                </a>
            </div>
            <?php
            $con = new mysqli("localhost", "root", "", "soi");

            $total_query = "SELECT COUNT(*) AS total FROM acc_book";
            $total_result = $con->query($total_query);

            if ($total_result) {
                // Fetch the count directly
                $row = $total_result->fetch_assoc();
                $total_count = $row['total'];
            } else {
                echo "Error executing query: " . $con->error;
            }

            // Close connection
            $con->close();
            ?>

            <div class="col-sm-3 subd2 mt-5"><br>
                <a href="bookhistory.php" style="color:#111;text-decoration:none">
                    <h1> <b><?php echo $total_count ?></b> <svg xmlns="http://www.w3.org/2000/svg" width="70px" height="70px" viewBox="0 0 24 24">
                            <path fill="black" d="M8 12.052c1.995 0 3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5s-3.5 1.505-3.5 3.5s1.505 3.5 3.5 3.5M9 13H7c-2.757 0-5 2.243-5 5v1h12v-1c0-2.757-2.243-5-5-5m11.294-4.708l-4.3 4.292l-1.292-1.292l-1.414 1.414l2.706 2.704l5.712-5.702z" />
                        </svg> </h1><br>
                    <h4>Accept Booking</h4>
                </a>
            </div>
        </div>
        <br>
        <?php
        $con = new mysqli("localhost", "root", "", "soi");

        $total_query = "SELECT COUNT(*) AS total FROM rej";
        $total_result = $con->query($total_query);

        if ($total_result) {
            // Fetch the count directly
            $row = $total_result->fetch_assoc();
            $total_count = $row['total'];
        } else {
            echo "Error executing query: " . $con->error;
        }

        // Close connection
        $con->close();
        ?>

        <div class="row maind ">
            <a href="bookhistory.php" style="color:#111;text-decoration:none">
                <div class="col-sm-3 rb subd3 mt-5"><br>
                    <h1> <b><?= $total_count ?></b> <svg xmlns="http://www.w3.org/2000/svg" width="70px" height="70px" viewBox="0 0 24 24">
                            <path fill="black" d="M8 12.052c1.995 0 3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5s-3.5 1.505-3.5 3.5s1.505 3.5 3.5 3.5M9 13H7c-2.757 0-5 2.243-5 5v1h12v-1c0-2.757-2.243-5-5-5m11.293-4.707L18 10.586l-2.293-2.293l-1.414 1.414l2.292 2.292l-2.293 2.293l1.414 1.414l2.293-2.293l2.294 2.294l1.414-1.414L19.414 12l2.293-2.293z" />
                        </svg>
                    </h1><br>
                    <h4>Reject Booking</h4>
            </a>
        </div>

        <div class="col-sm-3 mt-5"><br>
            <!-- <h1> <b>5</b> <svg xmlns="http://www.w3.org/2000/svg" width="70px" height="70px" viewBox="0 0 24 24">
                        <path fill="black" d="M1 15q0-2.725 2.275-4.362T8.5 9q2.95 0 5.225 1.638T16 15zm0 4v-2h15v2zm0 4v-2h15v2zm17 0v-8q0-2.85-1.95-4.925T11.275 7.3L11 5h5V1h2v4h5l-1.8 18z" />
                    </svg>
                </h1><br>
                <h4>Add Food</h4> -->
        </div>

        <div class="col-sm-3 subd5 mt-5">
        </div>

    </div>
    </div>
</body>

</html>
<?php
$con = new mysqli("localhost", "root", "", "soi");

$total_query = "SELECT COUNT(*) AS total FROM rej";
$total_result = $con->query($total_query);

if ($total_result) {
    // Fetch the count directly
    $row = $total_result->fetch_assoc();
    $total_count = $row['total'];
} else {
    echo "Error executing query: " . $con->error;
}

// Close connection
$con->close();
?>