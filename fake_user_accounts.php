<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Faker User Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f8f9fa;
    }

    .table th {
        background-color:rgb(2, 198, 2) !important; 
        color: white !important;
    }

    .table td {
        font-size: 14px; 
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color:rgb(24, 0, 240) !important; 
    }
    </style>
</head>
<body class="container mt-5">

    <h2 class="text-center mb-4">Generated User Data</h2>
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>User ID (UUID)</th>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Username</th>
                    <th>Password (SHA-256 Encrypted)</th>
                    <th>Account Created</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'vendor/autoload.php'; 

                $faker = Faker\Factory::create();

                for ($i = 0; $i < 10; $i++) {
                    $uuid = $faker->uuid;
                    $fullName = $faker->name;
                    $email = $faker->unique()->safeEmail;
                    $username = strtolower(explode('@', $email)[0]);
                    $rawPassword = $faker->password; 
                    $hashedPassword = hash('sha256', $rawPassword);
                    $accountCreated = $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s');

                    echo "<tr>
                            <td>{$uuid}</td>
                            <td>{$fullName}</td>
                            <td>{$email}</td>
                            <td>{$username}</td>
                            <td>{$hashedPassword}</td>
                            <td>{$accountCreated}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
