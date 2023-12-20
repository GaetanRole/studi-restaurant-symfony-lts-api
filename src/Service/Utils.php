<?php

namespace App\Service;

class Utils
{
    public static function slugify(string $text, string $divider = '-'): string
    {
        $text = preg_replace('/[^\pL\d]+/u', $divider, $text); // Remplace les caractères non alphabétiques ou non numériques par le séparateur
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text); // Translitération
        $text = preg_replace('/[^-\w]+/', '', $text); // Supprime les caractères indésirables
        $text = trim($text, $divider); // Supprime les espaces aux extrémités et les séparateurs en excès
        $text = preg_replace('/-+/', $divider, $text); // Supprime les séparateurs en excès
        $text = strtolower($text); // Met en minuscules

        return empty($text) ? 'n-a' : $text; // Retourne 'n-a' si la chaîne est vide, sinon retourne la chaîne
    }
}
