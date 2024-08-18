<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once './../back/crudDoctor.php';

$error = "";
$DoctorC = new CrudUser();
$doctor = null;

// Check if the form is submitted via POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["id_user"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["mdp"]) && isset($_POST["role"])) {
        if (!empty($_POST["id_user"]) && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["email"]) && !empty($_POST["mdp"]) && !empty($_POST["role"])) {
            // Hash the password before storing it
            $hashedPassword = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

            // Prepare the new data array
            $newData = [
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email' => $_POST['email'],
                'mdp' => $hashedPassword,
                'role' => $_POST['role']
            ];

            // Update user information
            $result = $DoctorC->updateUser($_POST['id_user'], $newData);
            if ($result) {
                header('Location: doctorTab.php'); // Redirect to your table page
                exit();
            } 
        } else {
            $error = "Missing information";
        }
    }
}

// Check if id_user is passed via POST
if (isset($_POST['id_user'])) {
    $doctor = $DoctorC->showUser($_POST['id_user']);
    if (!$doctor) {
        $error = "No user found with the provided ID";
    }
} else {
    $error = "No user ID provided";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Doctor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .back-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
        }
        .form-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .submit-button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <button class="back-button"><a href="doctorTab.php" style="color: #fff; text-decoration: none;">Return to List</a></button>
        <?php if (!empty($error)) { ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php } elseif (!empty($doctor)) { ?>
            <div class="form-container">
                <h1>Modify</h1>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="id_user">Id Doctor</label>
                        <input type="text" name="id_user" id="id_user" value="<?php echo htmlspecialchars($doctor["id_user"]) ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nom">Last Name</label>
                        <input type="text" name="nom" id="nom" value="<?php echo htmlspecialchars($doctor["nom"]) ?>">
                    </div>
                    <div class="form-group">
                        <label for="prenom">First Name</label>
                        <input type="text" name="prenom" id="prenom" value="<?php echo htmlspecialchars($doctor["prenom"]) ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($doctor["email"]) ?>">
                    </div>
                    <div class="form-group">
                        <label for="mdp">Password</label>
                        <input type="password" name="mdp" id="mdp" placeholder="Enter new password (leave blank if not changing)">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" name="role" id="role" value="<?php echo htmlspecialchars($doctor["role"]) ?>">
                    </div>
                    <input type="submit" value="Submit" class="submit-button">
                </form>
            </div>
        <?php } ?>
    </div>
</body>
</html>
