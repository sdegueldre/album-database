<?php

use Faker\Generator as Faker;

$genres = array('Rock',
'Alternative',
'Classic Rock',
'Classical',
'Jazz',
'Heavy Metal',
'Blues',
'Rock and Roll',
'Classical Rock/Progressive',
'Rap/hip-hop',
'Progressive Rock',
'Dance/Electronica',
'Oldies',
'Indie Rock',
'Folk',
'Hard Rock',
'Soundtracks/theme Songs',
'Soul/funk',
'Country',
'Thrash Metal',
'Púnk Rock',
'Grunge',
'Reggae',
'Heavy Metal',
'Classical Crossover',
'R&B',
'Blues Rock',
'New Wave',
'Power Metal',
'Psychedelic Rock',
'Post Punk',
'Big band',
'Hardcore',
'Industrial',
'Religious',
'Folk Metal',
'Bluegrass',
'Opera',
'Metalcore',
'Glam Rock',
'Symphonic Metal',
'Black Metal',
'Soul',
'House',
'Techno',
'Post-Rock',
'Soft Rock',
'Drum and Bass',
'Britpop',
'Disco',
'Celtic',
'Acoustic Rock',
'Classical guitar',
'Art Rock',
'Rhythm and Blues',
'Garage Rock',
'Death Metal',
'Swing',
'Melodic Death Metal',
'Hard Blues Rock',
'Synth Pop',
'Ska',
'Ambient',
'Latin',
'Baroque',
'New Age',
'Jazz guitar',
'Trip Hop',
'Gospel',
'Shoegaze',
'18th Century Classical',
'Modern Jazz',
'Neo-Classical',
'UK Garage',
'Flamenco',
'Vocal Jazz',
'Krautrock',
'World Music',
'World',
'Acid Jazz',
'Ragtime',
'Symphonic Rock',
'Southern Rock',
'Rockabilly',
'Avant Garde',
'Lounge',
'J-Pop',
'Tango',
'Samba',
'J-Rock',
'Doom Metal',
'Metalcore',
'New Orleans Jazz',
'Chanson',
'Southern Rock',
'Nightcore',
'hardcore metal',
'Afrobeat',
'Gothic Rock',
'Experimental Rock');

$factory->define(App\Album::class, function (Faker $faker) use ($genres) {
    return [
        'image' => $faker->imageUrl(500, 500),
        'artist' => $faker->name,
        'name' => $faker->realText(25),
        'genre' => $faker->randomElement($genres),
        'year' => $faker->year,
        'label' => $faker->company,
        'songs' => join(', ', $faker->words(rand(5,15))),
        'rating' => $faker->biasedNumberBetween(0, 5),
    ];
});