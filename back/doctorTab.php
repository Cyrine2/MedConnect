<?php
include_once './../back/crudDoctor.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$Doctor = new CrudUser();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check the action to determine what to do
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'addUser') {

            // Call createUser() if the action is to add a user
            $Doctor->createUser();
        } elseif ($_POST['action'] === 'deleteUser' && isset($_POST['id_user'])) {
            // Call deleteUser() if the action is to delete a user
            $Doctor->deleteUser($_POST['id_user']);
        }
    }
}

// Fetch the list of users after processing the form
$list = $Doctor->listUsers();
?>e




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Dashboard</title>
</head>

<body>
    <section class="header">
        <div class="logo">
            <i class="ri-menu-line icon icon-0 menu"></i>
            <h2>Med<span>Coonect</span></h2>
        </div>
        <div class="search--notification--profile">
            <div class="search">
                <input type="text" placeholder="Search Scdule..">
                <button><i class="ri-search-2-line"></i></button>
            </div>
            <div class="notification--profile">
                <div class="picon lock">
                    <i class="ri-lock-line"></i>
                </div>
                <div class="picon bell">
                    <i class="ri-notification-2-line"></i>
                </div>
                <div class="picon chat">
                    <i class="ri-wechat-2-line"></i>
                </div>
                <div class="picon profile">
                    <img src="assets/images/profile.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <li>
                    <a href="#" id="active--link">
                        <span class="icon icon-1"><i class="ri-layout-grid-line"></i></span>
                        <span class="sidebar--item">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon icon-2"><i class="ri-calendar-2-line"></i></span>
                        <span class="sidebar--item">Schedule</span>
                    </a>
                </li>
                <li>
                    <a href="Doctors.html">
                        <span class="icon icon-3"><i class="ri-user-2-line"></i></span>
                        <span class="sidebar--item" style="white-space: nowrap;">Reliable Doctor</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon icon-4"><i class="ri-user-line"></i></span>
                        <span class="sidebar--item">Patients</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon icon-5"><i class="ri-line-chart-line"></i></span>
                        <span class="sidebar--item">Activity</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon icon-6"><i class="ri-customer-service-line"></i></span>
                        <span class="sidebar--item">Support</span>
                    </a>
                </li>
            </ul>
            <ul class="sidebar--bottom-items">
                <li>
                    <a href="#">
                        <span class="icon icon-7"><i class="ri-settings-3-line"></i></span>
                        <span class="sidebar--item">Actions</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon icon-8"><i class="ri-logout-box-r-line"></i></span>
                        <span class="sidebar--item">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main--content">
            <div class="overview">
                <div class="title">
                    <h2 class="section--title">Overview</h2>
                    <select name="date" id="date" class="dropdown">
                        <option value="today">Today</option>
                        <option value="lastweek">Last Week</option>
                        <option value="lastmonth">Last Month</option>
                        <option value="lastyear">Last Year</option>
                        <option value="alltime">All Time</option>
                    </select>
                </div>
                <div class="cards">
                    <div class="card card-1">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Total Doctors</h5>
                                <h1>152</h1>
                            </div>
                            <i class="ri-user-2-line card--icon--lg"></i>
                        </div>

                    </div>



                </div>
            </div>
            <div class="doctors">
                <div class="title">
                    <h2 class="section--title">Doctors</h2>
                    <div class="doctors--right--btns">
                        <select name="date" id="date" class="dropdown doctor--filter">
                            <option>Filter</option>
                            <option value="free">Free</option>
                            <option value="scheduled">Scheduled</option>
                        </select>
                        <button class="add"><a href="addDoctor.html"><i class="ri-add-line"></i>Add Doctor</a></button>
                    </div>
                </div>
                <div class="doctors--cards">
                    <a href="#" class="doctor--card">
                        <div class="img--box--cover">
                            <div class="img--box">
                                <img src="assets/images/doctor1.jpg" alt="">
                            </div>
                        </div>
                        <p class="free">Free</p>
                    </a>
                    <a href="#" class="doctor--card">
                        <div class="img--box--cover">
                            <div class="img--box">
                                <img src="assets/images/doctor2.jpg" alt="">
                            </div>
                        </div>
                        <p class="scheduled">Scheduled</p>
                    </a>
                    <a href="#" class="doctor--card">
                        <div class="img--box--cover">
                            <div class="img--box">
                                <img src="assets/images/doctor3.jpg" alt="">
                            </div>
                        </div>
                        <p class="scheduled">Scheduled</p>
                    </a>
                    <a href="#" class="doctor--card">
                        <div class="img--box--cover">
                            <div class="img--box">
                                <img src="assets/images/doctor4.jpg" alt="">
                            </div>
                        </div>
                        <p class="free">Free</p>
                    </a>
                    <a href="#" class="doctor--card">
                        <div class="img--box--cover">
                            <div class="img--box">
                                <img src="assets/images/doctor5.jpg" alt="">
                            </div>
                        </div>
                        <p class="scheduled">Scheduled</p>
                    </a>
                    <a href="#" class="doctor--card">
                        <div class="img--box--cover">
                            <div class="img--box">
                                <img src="assets/images/doctor6.jpg" alt="">
                            </div>
                        </div>
                        <p class="free">Free</p>
                    </a>
                    <a href="#" class="doctor--card">
                        <div class="img--box--cover">
                            <div class="img--box">
                                <img src="assets/images/doctor7.jpg" alt="">
                            </div>
                        </div>
                        <p class="scheduled">Scheduled</p>
                    </a>
                </div>
            </div>
            <div class="recent--patients">
                <div class="title">
                    <h2 class="section--title">Doctors List</h2>
                </div>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>email</th>
                                
                                <th>role</th>

                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $row): ?>
                                <tr>
                                    <td class="text-center"><?php echo isset($row['id_user']) ? $row['id_user'] : ''; ?>
                                    </td>
                                    <td><?php echo isset($row['nom']) ? $row['nom'] : ''; ?></td>
                                    <td><?php echo isset($row['prenom']) ? $row['prenom'] : ''; ?></td>
                                    <td><?php echo isset($row['email']) ? $row['email'] : ''; ?></td>
                                   
                                    <td><?php echo isset($row['role']) ? $row['role'] : ''; ?></td>
                                    <td class="btn-group">
                                    <a class="btn btn-danger btn-sm" href="suppriDoc.php?id_user=<?php echo htmlspecialchars($row['id_user']); ?>">Delete</a>
                                    <form method="POST" action="update.php" class="d-inline">
                                        <input type="hidden" name="id_user" value="<?php echo htmlspecialchars($row['id_user']); ?>">
                                        <button type="submit" name="update" class="btn btn-primary btn-sm" >Update</button>
                                    </form>
                                </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/js/main.js"></script>
</body>
<style>
        .recent-patients {
            padding: 30px;
            background: #f8f9fa;
        }
        .section-title {
            margin-bottom: 30px;
        }
        .table thead th {
            background-color:#17a2b8;
            color: white;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table tbody tr:hover {
            background-color: #e9ecef;
        }
        .btn-group {
            display: flex;
            justify-content: center;
        }
        .btn-group .btn {
            margin-right: 10px;
        }
    </style>

</html>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Function to show confirmation dialog
        function showConfirmationDialog(message, callback) {
            if (confirm(message)) {
                callback();
            }
        }

        // Get all delete links
        const deleteLinks = document.querySelectorAll('.delete-link');

        // Add click event listener to each delete link
        deleteLinks.forEach(function (link) {
            link.addEventListener('click', function (event) {
                // Prevent default link behavior
                event.preventDefault();

                // Get the category ID to delete from the href attribute
                const href = link.getAttribute('href');
                const categoryId = href.split('=')[1];

                // Call the custom confirmation dialog function
                showConfirmationDialog("Are you sure you want to delete this category?", function () {
                    // Redirect to suppcateg.php with the category ID after confirmation
                    window.location.href = href;
                });
            });
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!--The value you're seeing, something like $2y$10$gmf8RPVF69UI9..., is a hashed version of the password. This hash is generated using the password_hash() function in PHP. It's not the actual password but a secure, encrypted representation of it. -->