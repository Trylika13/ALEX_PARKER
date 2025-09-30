<?php

namespace App\Models\CategoriesModel;

use \PDO;

function findAll(PDO $connexion): array
{
    $sql = "SELECT c.*, COUNT(p.id) AS post_count
            FROM categories c
            LEFT JOIN posts p ON p.category_id = c.id
            GROUP BY c.id
            ORDER BY c.name ASC";
    return $connexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
