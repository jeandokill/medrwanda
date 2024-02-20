<?php
    include("security.php");
   
    $adminUsername = getAdminUsername($connection);
    include("includes/header.php");
    include("includes/navbar.php");

// Step 1: Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_email_verification";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Execute a query to count the total number of users
$sql = "SELECT COUNT(*) AS total_users FROM tbl_user";
$result = $conn->query($sql);

// Step 3: Fetch the result
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_users = $row["total_users"];
} else {
    $total_users = 0; // Set default value if no users found
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "newsletter";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get the count of subscribers
$sql = "SELECT COUNT(*) AS subscriberCount FROM subscribers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $subscriberCount = $row["subscriberCount"];
} else {
    $subscriberCount = 0;
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get counts of pending, completed, and overdue tasks from task_counts table
$sql = "SELECT * FROM task_counts";
$result = $conn->query($sql);

// Initialize variables to hold counts
$pendingCount = 0;
$completedCount = 0;
$overdueCount = 0;

// Fetch counts from the result
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['status'] == 'pending') {
            $pendingCount = $row['count'];
        } elseif ($row['status'] == 'completed') {
            $completedCount = $row['count'];
        } elseif ($row['status'] == 'overdue') {
            $overdueCount = $row['count'];
        }
    }
}

// Close connection
$conn->close();
?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                
                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php echo getAdminUsername($connection); ?>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="container mt-5">
    <div class="row">
        <!-- First Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                TOTAL REGISTERY ADMINS</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $query = "SELECT id FROM register ORDER BY id";
                                $query_run = mysqli_query($connection, $query);
                                $row = mysqli_num_rows($query_run);
                                echo '<h1> ' . $row . '</h1>';
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Second Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                TOTAL USERS
                                </div>
                                <div id="total-donations" class="h5 mb-0 font-weight-bold text-gray-800">
                                <H1 style="margin-top: 20px;"><?php echo $total_users; ?></H1>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            SUBSCRIBERS</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $subscriberCount; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        OVERDUE TASKS</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $overdueCount; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar-times fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- Third Card -->
        <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        COMPLETED TASKS</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $completedCount; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- Fourth Card -->
        <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        PENDING TASKS</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pendingCount; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>

    </div>
</div>

                </div>

                <!-- Content Row -->
            </div>




            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<!-- Include taskScript.js -->




        <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
          

    


    <?php

    include("includes/scripts.php");
    include("includes/footer.php") ;
    // Include task.php without displaying the table

    ?>

   

