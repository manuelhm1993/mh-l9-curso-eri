<?php

namespace Database\Seeders;

class DataSeeders {
    // Campos de clase
    private static $dataCategory = [
        [
            'name'        => 'Deportes',
            'description' => 'Categoría basada en deportes como: fútbol, baloncesto, tenis...',
            'active'      => true,
        ],
        [
            'name'        => 'Acción',
            'description' => 'Categoría basada en juegos repletos de acción.',
            'active'      => true,
        ],
        [
            'name'        => 'Aventuras',
            'description' => 'Categoría basada en juegos trepidantes y llenos de misterios.',
            'active'      => true,
        ],
        [
            'name'        => 'RPG',
            'description' => 'Categoría basada en juegos de rol.',
            'active'      => true,
        ],
    ];

    // Métodos
    public static function getDataCategory(): array {
        return DataSeeders::$dataCategory;
    }
}
