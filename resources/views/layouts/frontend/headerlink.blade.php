<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="Responsive Recruitment Management Software">
    <meta name="keyword" content="Online Recruitment Management Software">
    <link rel="icon" href="{{ asset('public/frontend') }}/assets/img/favicon.ico" type="image/x-icon">
    <!-- Favicon-->
    <title>:: Recruitment :: Management</title>
    <!-- Application vendor css url -->
    <link rel="stylesheet" href="{{ asset('public/frontend/') }}/assets/cssbundle/daterangepicker.min.css">
    <link rel="stylesheet" href="{{ asset('public/frontend/') }}/assets/cssbundle/dataTables.min.css">

    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/luno-style.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/custom.css">
    <!-- Jquery Core Js -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">



    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>


    <style>
        .layout-1 .sidebar .menu-list .m-link>i {
            color: #00ac9a;
        }

        .clock {
            /* position: absolute;
            top: 22%;
            left: 20%;
            transform: translateX(-50%) translateY(-50%);
            color: #090c0c;
            font-family: Orbitron;
            letter-spacing: 2px;
            font-size: 30px; */
            align-self: center

        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            color: white;
            text-align: center;
        }

        /* added by shadman */
        /* ul#ui-id-1 {

            bottom: 50%;
            display: block!important;
            position: absolute;
            margin-left: 566px;
            margin-top: 335px;
            z-index: 9999;
            height: 200px;
            overflow-y: scroll;
            overflow-x: hidden;
            padding: 1rem;
            left: 0;
            top: 0;
        }

        .ui-menu-item {
            margin-bottom: 3px !important;
        }

        .ui-widget-content a {
            color: #3692ad;
            font-size: 18px !important;
        } */

        /* added by shadman */

        .ui-autocomplete {
            z-index: 9999;
            /* width: 500px !important; */
            height: 200px;
            overflow-y: scroll;
            overflow-x: hidden;


        }

        .ui-menu .ui-menu-item a {
            display: block;
            padding-left: 5px
        }

        /* input.ui-autocomplete-input.ui-autocomplete-loading.ui-corner-all {
            position: relative;
        } */
        .float-label input {
            position: relative;
        }

        .logoInvoice {
            text-align: right;
            /* float: right;
            position: relative;
            overflow: hidden;
            margin-top: -19px;
            max-width: 540px;
            max-height: 100px; */
        }

    </style>

</head>
