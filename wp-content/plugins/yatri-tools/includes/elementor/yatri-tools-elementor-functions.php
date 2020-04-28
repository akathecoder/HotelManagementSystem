<?php

function yatri_tools_elementor_get_all_widgets()
{

    $yatri_tools_widgets = [
        'testimonial' => [
            'title' => 'Yatri Testimonial',
            'description' => '',
            'enable' => true,
            'class' => 'Yatri_Tools_Elementor_Testimonial_Widget',
        ],
        'team' => [
            'title' => 'Yatri Team',
            'description' => '',
            'enable' => true,
            'class' => 'Yatri_Tools_Elementor_Team_Widget',
        ],
        'skillbar' => [
            'title' => 'Yatri Skillbar',
            'description' => '',
            'enable' => true,
            'class' => 'Yatri_Tools_Elementor_Skillbar_Widget',

        ],
        'counter' => [
            'title' => 'Yatri Counter',
            'description' => '',
            'enable' => true,
            'class' => 'Yatri_Tools_Elementor_Counter_Widget',

        ],
    ];

    return $yatri_tools_widgets;
}