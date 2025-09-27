<?php

namespace App\Models\PostsModel;

use \PDO;

function findAll(PDO $connexion): array
{
    $sql = "SELECT p.*, c.name AS category_name
            FROM posts p
            JOIN categories c on c.id = p.category_id
            ORDER BY p.created_at DESC
            LIMIT 10;";
    return $connexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function findOneById(PDO $connexion, int $id): array
{
    $sql = "SELECT p.*, c.name AS category_name
            FROM posts p
            LEFT JOIN categories c ON p.category_id = c.id
            WHERE p.id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(PDO::FETCH_ASSOC);
}
