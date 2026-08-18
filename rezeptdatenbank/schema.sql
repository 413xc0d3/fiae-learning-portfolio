CREATE DATABASE IF NOT EXISTS barista_db
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE barista_db;

CREATE TABLE IF NOT EXISTS rezepte (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(120) NOT NULL,
    wasser INT UNSIGNED NOT NULL DEFAULT 0,
    bohnen INT UNSIGNED NOT NULL DEFAULT 0,
    milch INT UNSIGNED NOT NULL DEFAULT 0,
    zucker INT UNSIGNED NOT NULL DEFAULT 0,
    kakao INT UNSIGNED NOT NULL DEFAULT 0
);

INSERT INTO rezepte (name, wasser, bohnen, milch, zucker, kakao) VALUES
('Espresso', 30, 8, 0, 0, 0),
('Cappuccino', 30, 8, 120, 0, 0);
