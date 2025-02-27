<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fake Book Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color:rgb(111, 182, 253);
    }

    .table th {
        background-color:rgb(236, 0, 225) !important; 
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

    <h2 class="text-center mb-4">Fake Book Records</h2>
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Publication Year</th>
                    <th>ISBN</th>
                    <th>Summary</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'vendor/autoload.php';

                $faker = Faker\Factory::create();
                $genres = ['Fiction', 'Mystery', 'Science Fiction', 'Fantasy', 'Romance', 'Thriller', 'Historical', 'Horror'];

                for ($i = 0; $i < 15; $i++) {
                    echo "<tr>
                            <td>{$faker->sentence(3)}</td>
                            <td>{$faker->name}</td>
                            <td>{$genres[array_rand($genres)]}</td>
                            <td>{$faker->numberBetween(1900, 2024)}</td>
                            <td>{$faker->isbn13}</td>
                            <td class='text-start'>{$faker->paragraph(3)}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
