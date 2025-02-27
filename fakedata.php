<?php
require 'vendor/autoload.php';
require 'conn.php';

$faker = Faker\Factory::create('en_PH');

echo "Seeding Office Data...<br>";
for ($i = 0; $i < 50; $i++) {
    $name = $faker->company;
    $contactnum = $faker->phoneNumber;
    $email = $faker->email;
    $address = $faker->streetAddress;
    $city = $faker->city;
    $country = "Philippines";
    $postal = $faker->postcode;

    $stmt = $conn->prepare("INSERT INTO office (name, contactnum, email, address, city, country, postal) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $contactnum, $email, $address, $city, $country, $postal);
    $stmt->execute();
}
echo "Office Data Inserted!";
$result = $conn->query("SELECT id FROM office");
$office_ids = [];
while ($row = $result->fetch_assoc()) {
    $office_ids[] = $row['id'];
}

echo "Seeding Employee Data...<br>";
for ($i = 0; $i < 200; $i++) {
    $lastname = $faker->lastName;
    $firstname = $faker->firstName;
    $office_id = $faker->randomElement($office_ids);
    $address = $faker->streetAddress;

    $stmt = $conn->prepare("INSERT INTO employee (lastname, firstname, office_id, address) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $lastname, $firstname, $office_id, $address);
    $stmt->execute();
}
echo "Employee Data Inserted!";

$result = $conn->query("SELECT id FROM employee");
$employee_ids = [];
while ($row = $result->fetch_assoc()) {
    $employee_ids[] = $row['id'];
}

echo "Seeding Transaction Data";
for ($i = 0; $i < 500; $i++) {
    $employee_id = $faker->randomElement($employee_ids);
    $office_id = $faker->randomElement($office_ids);
    $datelog = $faker->dateTimeThisDecade()->format('Y-m-d');
    $action = $faker->word();
    $remarks = $faker->sentence();
    $documentcode = strtoupper($faker->bothify('DOC###??'));

    $stmt = $conn->prepare("INSERT INTO transaction (employee_id, office_id, datelog, action, remarks, documentcode) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissss", $employee_id, $office_id, $datelog, $action, $remarks, $documentcode);
    $stmt->execute();
}
echo "Transaction Data Inserted!";

$conn->close();
echo "Seeding Completed Successfully!";
?>
