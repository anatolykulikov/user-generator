<?php
// Get randor array item
function user_generator_get_random( array $arr ) {
    $rand_item = array_rand( $arr, 2 );
    return $arr[$rand_item[0]];
}

// Get the user surname
function user_generator_get_surname() {
    $surnames = [
        __( 'surname-1', 'usergenerator' ),
        __( 'surname-2', 'usergenerator' ),
        __( 'surname-3', 'usergenerator' ),
        __( 'surname-4', 'usergenerator' ),
        __( 'surname-5', 'usergenerator' ),
        __( 'surname-6', 'usergenerator' ),
        __( 'surname-7', 'usergenerator' ),
        __( 'surname-8', 'usergenerator' ),
        __( 'surname-9', 'usergenerator' ),
        __( 'surname-10', 'usergenerator' ),
        __( 'surname-11', 'usergenerator' ),
        __( 'surname-12', 'usergenerator' ),
        __( 'surname-13', 'usergenerator' ),
        __( 'surname-14', 'usergenerator' ),
        __( 'surname-15', 'usergenerator')
    ];

    return user_generator_get_random( $surnames );
}

// Get the female user firstname
function user_generator_get_female_name() {
    $female_names = [
        __( 'female-name-1', 'usergenerator' ),
        __( 'female-name-2', 'usergenerator' ),
        __( 'female-name-3', 'usergenerator' ),
        __( 'female-name-4', 'usergenerator' ),
        __( 'female-name-5', 'usergenerator' ),
        __( 'female-name-6', 'usergenerator' ),
        __( 'female-name-7', 'usergenerator' ),
        __( 'female-name-8', 'usergenerator' ),
        __( 'female-name-9', 'usergenerator' ),
        __( 'female-name-10', 'usergenerator' ),
        __( 'female-name-11', 'usergenerator' ),
        __( 'female-name-12', 'usergenerator' ),
        __( 'female-name-13', 'usergenerator' ),
        __( 'female-name-14', 'usergenerator' ),
        __( 'female-name-15', 'usergenerator')
    ];
    
    return user_generator_get_random($female_names);
}

// Get the male user firstname
function user_generator_get_male_name() {
    $male_names = [
        __( 'male-name-1', 'usergenerator' ),
        __( 'male-name-2', 'usergenerator' ),
        __( 'male-name-3', 'usergenerator' ),
        __( 'male-name-4', 'usergenerator' ),
        __( 'male-name-5', 'usergenerator' ),
        __( 'male-name-6', 'usergenerator' ),
        __( 'male-name-7', 'usergenerator' ),
        __( 'male-name-8', 'usergenerator' ),
        __( 'male-name-9', 'usergenerator' ),
        __( 'male-name-10', 'usergenerator' ),
        __( 'male-name-11', 'usergenerator' ),
        __( 'male-name-12', 'usergenerator' ),
        __( 'male-name-13', 'usergenerator' ),
        __( 'male-name-14', 'usergenerator' ),
        __( 'male-name-15', 'usergenerator')
    ];
    
    return user_generator_get_random( $male_names );
}

// Creating a user biography
function user_generator_get_about_user() {
    $phrases = [
        __( 'I like to dream big', 'usergenerator' ),
        __( 'I like to listen to music with headphones', 'usergenerator' ),
        __( 'In my free time I usually read', 'usergenerator' ),
        __( 'Go to the gym when I have some free time', 'usergenerator' ),
        __( 'But sometimes I can be lazy', 'usergenerator' ),
        __( 'My family is very important for me', 'usergenerator' ),
        __( 'Interested in history', 'usergenerator' ),
        __( 'I spend a lot of time studying foreign languages', 'usergenerator' ),
        __( 'My best qualities are patience and creativity', 'usergenerator' ),
        __( 'My dream is to travel around the world', 'usergenerator' ),
        __( 'I dream of having a big housе', 'usergenerator' ),
        __( 'In my spare time I’m watching movie', 'usergenerator' ),
        __( 'I like meeting friends on weekends', 'usergenerator' ),
        __( 'My unusual hobby is cheese making', 'usergenerator' ),
        __( 'Fan of watching TV series', 'usergenerator' ),
    ];

    // Variable for a string with a biography
    $biography = [];

    // Let's take a few random phrases
    $phrases_count = rand( 1, 5 );
    for( $i = 0; $i < $phrases_count; $i++ ) {
        $biography[] = user_generator_get_random( $phrases );
    }

    // Returning the string
    return implode( '. ', $biography ) . '.';
}