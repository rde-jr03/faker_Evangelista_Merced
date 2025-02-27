<?php
require_once 'vendor/autoload.php';

$faker = Faker\Factory::create('en_PH'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fake User Profiles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Fake User Profiles</h2>
    
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Phone Number</th>
                    <th>Complete Address</th>
                    <th>Birthdate</th>
                    <th>Job Title</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < 5; $i++) {
                    echo "<tr>
                            <td>{$faker->name}</td>
                            <td>{$faker->email}</td>
                            <td>+63 {$faker->numerify('9## ### ####')}</td>
                            <td>{$faker->address}</td>
                            <td>{$faker->date('Y-m-d')}</td>
                            <td>{$faker->jobTitle}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
