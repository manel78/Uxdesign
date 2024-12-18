<?php
require 'vendor/autoload.php';
include 'db.php';
use Faker\Factory;
$faker = Factory::create();
$numberOfEntries = rand(500, 1000);

$sql = "INSERT INTO produits (name, description, price, image_url) VALUES (:name, :description, :price, :image_url)";
$stmt = $pdo->prepare($sql);
for ($i = 0; $i < $numberOfEntries; $i++) {
    $name = $faker->word();
    $description = $faker->sentence();
    $price = $faker->randomFloat(2, 1, 100);
    $image_url = $faker->imageUrl(200, 200, 'products', true);







    $stmt->execute([
        ':name' => $name,
        ':description' => $description,
        ':price' => $price,
        ':image_url' => $image_url
    ]);
}
echo "$numberOfEntries produits ajoutés avec succès dans la base de données.";
