<!DOCTYPE html>
<!--
Template Name: Tinker - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="{{ $dark_mode ? 'dark' : '' }}{{ $color_scheme != 'default' ? ' ' . $color_scheme : '' }}">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('head')

    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

    <style>
        #sketch {
            position: relative;
            height: 450px;
            width: 400px;
            border: 1px solid #e8e8e8;
            background-color: #fafafa;
            background-image: url("{{ URL::asset('status_lokalis.png') }}"); // Add your image path here
            background-size: cover; // Ensure the image covers the whole pad
        }

        #resep_sketch {
            position: relative;
            height: 500px;
            width: 100%;
            border: 1px solid #e8e8e8;
            background-color: #fafafa;
            background-size: cover; // Ensure the image covers the whole pad
        }

        #status_lokalisasi {
            position: relative;
            height: 100%;
            widows: 100%;
            border: 1px solid #e8e8e8;
            background-color: #fafafa;
            background-image: url("{{ URL::asset('status_lokalis.png') }}"); // Add your image path here
            background-size: cover; // Ensure the image covers the whole pad
        }

        #clear-lokalis {
            position: absolute;
            right: 10px;
            top: 10px;
        }

        #clear-resep {
            position: absolute;
            right: 10px;
            top: 10px;
        }

        .canvas {
            cursor: crosshair;
            position: absolute;
            left: 0px;
            top: 0px;
            z-index: 2;
        }
    </style>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat');

        body {
            background: #07889B;
        }

        #container {
            position: relative;
            display: inline-block;
            text-align: center;
            color: #EEAA7B;
            font-family: 'Montserrat', sans-serif;
        }

        #scale {
            transform: rotateX(180deg);
            stroke-width: 50;
            fill: none;
        }

        #YAS {
            stroke: #29ce58;
            stroke-dasharray: 471, 943;
        }

        #Yeah {
            stroke: #87d19c;
            stroke-dasharray: 393, 943;
        }

        #Mmkay {
            stroke: #ffd651;
            stroke-dasharray: 315, 943;
        }

        #Ouch {
            stroke: #ef961a;
            stroke-dasharray: 237, 943;
        }

        #Owwwww {
            stroke: #f26d0e;
            stroke-dasharray: 159, 943;
        }

        #AHHHHHHH {
            stroke: #ce2d2d;
            stroke-dasharray: 81, 943;
        }

        #needle {
            fill: #66B9BF;
        }

        .faces {
            position: absolute;
            width: 20%;
            height: 20%;
            top: 37%;
            left: 40%;
        }

        .faces #YAS,
        .faces #Yeah,
        .faces #Mmkay,
        .faces #Owwwww,
        .faces #AHHHHHHH {
            visibility: hidden;
        }

        #slider,
        #level {
            position: absolute;
        }

        h1 {
            position: absolute;
            top: 60%;
            left: 0;
            margin: auto;
            right: 0;
            font-size: 1.5em;
        }

        #slider {
            cursor: pointer;
            left: 0;
            margin: auto;
            right: 0;
            top: 70%;
            width: 50%;
            -webkit-appearance: none;
            border-radius: 10px;
            height: 15px;
            background-color: #66B9BF;
        }

        #slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            height: 20px;
            width: 15px;
            border-radius: 3px;
            background: #ffffff;
            cursor: pointer;
        }

        #slider:focus {
            outline: none;
        }

        #level {
            color: black;
            font-size: 15pt;
            font-weight: bold;
            top: 75%;
            width: 10%;
            left: 45%;
            visibility: hidden;
            font-size: .9em;
            color: #EEAA7B;
        }
    </style>


    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

@yield('body')

</html>