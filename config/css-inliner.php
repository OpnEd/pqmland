<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Css Files
    |--------------------------------------------------------------------------
    |
    | Css file of your style for your emails
    | The content of these files will be added directly into the inliner
    | Use absolute paths, ie. public_path('css/main.css')
    |
    */

    'css-files' => [
        resource_path('css/mails.css'),
    ],

    /*
     * If true, all <style> tags will be removed after inlining.
     */
    'strip_style_tags' => true,

    /*
     * If true, all class attributes will be removed after inlining.
     */
    'strip_css_classes' => false,

];
