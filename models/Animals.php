<?php

class Animals {

    // Nous déterminons les propriétés de la classe Animals selon les colonnes de la table animals de la base de données.
    private int $ani_id;
    private string $ani_name;
    private string $ani_sex;
    private string $ani_birthdate;
    private string $ani_adoptiondate;
    private string $ani_arrivaldate;
    private bool $ani_microchipped;
    private bool $ani_tattooed;
    private bool $ani_vaccinated; 
    private bool $ani_reserved;
    private string $ani_description;

    private int $spe_id;
    private int $col_id;
    private int $bre_id;
}