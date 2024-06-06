<?php

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\web\View;

/* @var $this View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title>
        <?= Html::encode($this->title) ?>
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamics360 Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/backend/web/css/site.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
    <meta name="csrf-token" content="<?= Yii::$app->request->csrfToken ?>">

    <style>
        /* ... Paste the provided CSS code here ... */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 270px;
            /* Fixed width for larger screens */
            background-color: #ECFFDC;
            padding: 20px;
            overflow-y: auto;
        }

        @media (max-width: 992px) {

            /* Adjust the breakpoint as needed */
            .sidebar {
                width: 100%;
                /* Use full width for smaller screens */
                position: static;
                /* Remove fixed positioning */
                margin-bottom: 20px;
                /* Add some space at the bottom */
                scrollbar-width: thin;
                /* Firefox scrollbar width */
                scrollbar-color: green #D4EDDA;
                /* Firefox scrollbar color (thumb, track) */
                height: 10px;

            }
        }

        /* Webkit browsers (Chrome, Safari) */
        .sidebar::-webkit-scrollbar {
            width: 6px;
            /* Width of the scrollbar */
        }

        .sidebar::-webkit-scrollbar-track {
            background: #D4EDDA;
            /* Background of the scrollbar track */
        }

        .sidebar::-webkit-scrollbar-thumb {
            background-color: green;
            /* Color of the scrollbar thumb */
            border-radius: 10px;
            /* Rounded corners */
        }


        .giz-logo-container {
            margin-bottom: 20px;
        }

        .nav {
            flex-direction: column;
        }

        .nav-link {
            padding: 5px 0;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
        }

        .filters {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .stat-box {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
        }

        .stat-box h5 {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .table-responsive {
            margin-bottom: 40px;
        }

        h4 {
            margin-bottom: 20px;
        }

        .menu-item {
            position: relative;
            cursor: pointer;
            padding: 8px 0;
            /* Add padding to the top and bottom of the menu items */
            margin: 4px 0;
            font-family: "markProBold";
        }

        .arrow {
            border: solid #333;
            border-width: 0 2px 2px 0;
            display: inline-block;
            padding: 3px;
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
        }

        .arrow.down {
            transform: translateY(-50%) rotate(45deg);
        }

        .arrow.up {
            transform: translateY(-50%) rotate(-135deg);
        }

        .sub-menu {
            display: none;
            padding-left: 20px;
            padding: 8px 0;
            /* Add padding to the top and bottom of the sub-menu items */
            margin: 4px 0;
            font-family: "markProBold";
        }

        .nav a {
            color: #000;
            text-decoration: none;
            font-size: 16px;
            /* Adjust this value to your desired font size */
            padding: 8px 0;
            /* Add padding to the top and bottom of the menu items */
            margin: 4px 0;
        }


        .nav a:hover {
            color: lightgreen !important;

        }

        .menu-item:hover .arrow {
            border-color: lightgreen !important;

        }

        body {
            /* font-family: Arial, sans-serif; */
            font-family: "markProBold" !important;
            padding: 20px;
            
        }
                /* Custom scrollbar for the entire page */
                body, html {
            /* Webkit browsers (Chrome, Safari) */
            ::-webkit-scrollbar {
                width: 7px; /* Width of the scrollbar */
            }

            ::-webkit-scrollbar-track {
                background: #D4EDDA; /* Background of the scrollbar track (light green) */
            }

            ::-webkit-scrollbar-thumb {
                background-color: green; /* Color of the scrollbar thumb */
                border-radius: 10px; /* Rounded corners */
            }

            /* Firefox */
            /* scrollbar-width: thin; Firefox scrollbar width */
            /* scrollbar-color: green #D4EDDA; Firefox scrollbar color (thumb, track) */
        }

        a {
            color: green !important;

        }

        /* White button with green background */
        .btn.btn-success {
            color: white !important;
        }

        i {
            color: green !important;
        }
    </style>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header>
        <?php
        NavBar::begin([
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand-md hover navbar-dark bg-success fixed-top', // Add justify-content-between class
            ],
        ]);
        ?>

        <!-- Logo section -->
        <!-- <div class="navbar-brand">
    <?php
    echo Html::img(Yii::$app->request->baseUrl . '/logo1-modified.png', [
        'alt' => 'GIZ Logo',
        'width' => '120',
        'class' => 'img-rounded !important'

    ]);
    ?>
</div> -->


        <?php
        $menuItems = [
            ['label' => 'Dynamics 360', 'url' => ['/site/index'], 'linkOptions' => ['class' => 'ms-2 text-light custom-font mb-1']],
            ['label' => 'Home', 'url' => ['/site/index'], 'linkOptions' => ['class' => 'ms-2 text-light custom-font mb-1']],
        ];

        if (Yii::$app->user->isGuest) {
            $menuItems[] = [
                'label' => 'Login',
                'url' => ['/site/login'],
                'linkOptions' => [
                    'class' => 'nav-link text-light ms-auto',
                ],
            ];
        } else {
            $menuItems[] = [
                'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'linkOptions' => [
                    'class' => 'nav-link text-light ms-auto',
                    'data-method' => 'post', // This is the key part for sending a POST request
                ],
            ];
        }

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav '], // Align items to the right
            'items' => $menuItems,
        ]);
        NavBar::end(); // Close the navbar here
        ?>

    </header>

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= Alert::widget() ?>
            <div class="sidebar" style="background : light;">

                <nav class="nav flex-column">
                    <br><br>
                    <div class="menu-item" onclick="toggleSubMenu('career')">
                        <a class="font-weight-bold" href="#">Career</a>
                        <i class="arrow down icon"></i>
                    </div>
                    <div class="sub-menu" id="career">
                        <a href="<?= Yii::$app->urlManager->createUrl(['career/add-career']) ?>">Add Job</a>
                        <br>
                        <a href="<?= Yii::$app->urlManager->createUrl(['career/view-career']) ?>">View Jobs</a>
                    </div>

                    <div class="menu-item" onclick="toggleSubMenu('casestudy')">
                        <a class="font-weight-bold" href="#">Case Study</a>
                        <i class="arrow down"></i>
                    </div>
                    <div class="sub-menu" id="casestudy">
                        <div class="menu-item" onclick="toggleSubMenu('cardssearchtags')">
                            <a href="#">Regions</a>
                            <i class="arrow down"></i>
                        </div>
                        <div class="sub-menu" id="cardssearchtags">
                            <a href="<?= Yii::$app->urlManager->createUrl(['cardssearchtags/add-cardssearchtags']) ?>">Add
                                Regions</a>
                            <br>
                            <a href="<?= Yii::$app->urlManager->createUrl(['cardssearchtags/view-cardssearchtags']) ?>">View
                                Regions</a>
                        </div>
                        <div class="menu-item" onclick="toggleSubMenu('casestudycards')">
                            <a href="#">Case Study</a>
                            <i class="arrow down"></i>
                        </div>
                        <div class="sub-menu" id="casestudycards">
                            <a
                                href="<?= Yii::$app->urlManager->createUrl(['casestudiescards/add-casestudiescards']) ?>">Add
                                Case Study</a>
                            <br>
                            <a
                                href="<?= Yii::$app->urlManager->createUrl(['casestudiescards/view-casestudiescards']) ?>">View
                                Case Study</a>
                        </div>


                    </div>

                    <div class="menu-item" onclick="toggleSubMenu('messages')">
                        <a class="font-weight-bold" href="#">Messages</a>
                        <i class="arrow down"></i>
                    </div>
                    <div class="sub-menu" id="messages">
                        <a href="<?= Yii::$app->urlManager->createUrl(['freedemo/view-freedemo']) ?>">View
                            Messages</a>
                    </div>



                    <div class="menu-item" onclick="toggleSubMenu('dynamics365')">
                        <a class="font-weight-bold" href="#">Dynamics 365 Solutions</a>
                        <i class="arrow down"></i>
                    </div>
                    <div class="sub-menu" id="dynamics365">
                        <div class="menu-item" onclick="toggleSubMenu('businesscentral')">
                            <a href="#">Business Central</a>
                            <i class="arrow down"></i>
                        </div>
                        <div class="sub-menu" id="businesscentral">
                            <a href="<?= Yii::$app->urlManager->createUrl(['bc/add-bc']) ?>">Add
                                Business Central</a>
                            <br>
                            <a href="<?= Yii::$app->urlManager->createUrl(['bc/view-bc']) ?>">View
                                Business Central</a>
                        </div>

                        <div class="menu-item" onclick="toggleSubMenu('fieldservice')">
                            <a href="#">Field Service</a>
                            <i class="arrow down"></i>
                        </div>
                        <div class="sub-menu" id="fieldservice">
                            <a href="<?= Yii::$app->urlManager->createUrl(['fieldservice/add-fieldservice']) ?>">Add
                                Field Service</a>
                            <br>
                            <a href="<?= Yii::$app->urlManager->createUrl(['fieldservice/view-fieldservice']) ?>">View
                                Field Service</a>
                        </div>

                        <div class="menu-item" onclick="toggleSubMenu('customerservice')">
                            <a href="#">Customer Service</a>
                            <i class="arrow down"></i>
                        </div>
                        <div class="sub-menu" id="customerservice">
                            <a href="<?= Yii::$app->urlManager->createUrl(['customerservice/add-customerservice']) ?>">Add
                                Customer Service</a>
                            <br>
                            <a href="<?= Yii::$app->urlManager->createUrl(['customerservice/view-customerservice']) ?>">View
                                Customer Service</a>
                        </div>

                        <div class="menu-item" onclick="toggleSubMenu('sales')">
                            <a href="#">Sales</a>
                            <i class="arrow down"></i>
                        </div>
                        <div class="sub-menu" id="sales">
                            <a href="<?= Yii::$app->urlManager->createUrl(['sales/add-sales']) ?>">Add Sales</a>
                            <br>
                            <a href="<?= Yii::$app->urlManager->createUrl(['sales/view-sales']) ?>">View Sales</a>
                        </div>
                    </div>

                    <div class="menu-item" onclick="toggleSubMenu('dynamics')">
                        <a class="font-weight-bold" href="#">Dynamics Solutions</a>
                        <i class="arrow down"></i>
                    </div>
                    <div class="sub-menu" id="dynamics">

                        <div class="menu-item" onclick="toggleSubMenu('nav')">
                            <a href="#">Nav</a>
                            <i class="arrow down"></i>
                        </div>
                        <div class="sub-menu" id="nav">
                            <a href="<?= Yii::$app->urlManager->createUrl(['nav/add-nav']) ?>">Add
                                Nav</a>
                            <br>
                            <a href="<?= Yii::$app->urlManager->createUrl(['nav/view-nav']) ?>">View
                                Nav</a>
                        </div>

                        <div class="menu-item" onclick="toggleSubMenu('rms')">
                            <a href="#">RMS</a>
                            <i class="arrow down"></i>
                        </div>
                        <div class="sub-menu" id="rms">
                            <a href="<?= Yii::$app->urlManager->createUrl(['rms/add-rms']) ?>">Add
                                RMS</a>
                            <br>
                            <a href="<?= Yii::$app->urlManager->createUrl(['rms/view-rms']) ?>">View
                                RMS</a>
                        </div>

                        <div class="menu-item" onclick="toggleSubMenu('crm')">
                            <a href="#">CRM</a>
                            <i class="arrow down"></i>
                        </div>
                        <div class="sub-menu" id="crm">
                            <a href="<?= Yii::$app->urlManager->createUrl(['crm/add-crm']) ?>">Add
                                CRM</a>
                            <br>
                            <a href="<?= Yii::$app->urlManager->createUrl(['crm/view-crm']) ?>">View
                                CRM</a>
                        </div>

                        <div class="menu-item" onclick="toggleSubMenu('c5')">
                            <a href="#">C5</a>
                            <i class="arrow down"></i>
                        </div>
                        <div class="sub-menu" id="c5">
                            <a href="<?= Yii::$app->urlManager->createUrl(['c5/add-c5']) ?>">Add
                                C5</a>
                            <br>
                            <a href="<?= Yii::$app->urlManager->createUrl(['c5/view-c5']) ?>">View
                                C5</a>
                        </div>

                        <div class="menu-item" onclick="toggleSubMenu('ax')">
                            <a href="#">AX</a>
                            <i class="arrow down"></i>
                        </div>
                        <div class="sub-menu" id="ax">
                            <a href="<?= Yii::$app->urlManager->createUrl(['ax/add-ax']) ?>">Add
                                AX</a>
                            <br>
                            <a href="<?= Yii::$app->urlManager->createUrl(['ax/view-ax']) ?>">View
                                AX</a>
                        </div>

                    </div>

                    <div class="menu-item" onclick="toggleSubMenu('other')">
                        <a class="font-weight-bold" href="#">Other Solutions</a>
                        <i class="arrow down"></i>
                    </div>
                    <div class="sub-menu" id="other">

                        <div class="menu-item" onclick="toggleSubMenu('powerbi')">
                            <a href="#">Power BI</a>
                            <i class="arrow down"></i>
                        </div>
                        <div class="sub-menu" id="powerbi">
                            <a href="<?= Yii::$app->urlManager->createUrl(['powerbi/add-powerbi']) ?>">Add
                                Power BI</a>
                            <br>
                            <a href="<?= Yii::$app->urlManager->createUrl(['powerbi/view-powerbi']) ?>">View
                                Power BI</a>
                        </div>

                        <div class="menu-item" onclick="toggleSubMenu('office365')">
                            <a href="#">Office 365</a>
                            <i class="arrow down"></i>
                        </div>
                        <div class="sub-menu" id="office365">
                            <a href="<?= Yii::$app->urlManager->createUrl(['office365/add-office365']) ?>">Add
                                Office 365</a>
                            <br>
                            <a href="<?= Yii::$app->urlManager->createUrl(['office365/view-office365']) ?>">View
                                Office 365</a>
                        </div>

                    </div>

                    <div class="menu-item" onclick="toggleSubMenu('insights')">
                        <a class="font-weight-bold" href="#">Insights</a>
                        <i class="arrow down"></i>
                    </div>
                    <div class="sub-menu" id="insights">

                        <div class="menu-item" onclick="toggleSubMenu('successstats')">
                            <a class="" href="#">Success Stats</a>
                            <i class="arrow down"></i>
                        </div>
                        <div class="sub-menu" id="successstats">
                            <a href="<?= Yii::$app->urlManager->createUrl(['successstats/add-successstats']) ?>">Add
                                Success Stats</a>
                            <br>
                            <a href="<?= Yii::$app->urlManager->createUrl(['successstats/view-successstats']) ?>">View
                                Success Stats</a>
                        </div>

                        <div class="menu-item" onclick="toggleSubMenu('testimonial')">
                            <a class="" href="#">Testimonials</a>
                            <i class="arrow down"></i>
                        </div>
                        <div class="sub-menu" id="testimonial">
                            <a href="<?= Yii::$app->urlManager->createUrl(['testimonials/add-testimonials']) ?>">Add
                                Testimonial</a>
                            <br>
                            <a href="<?= Yii::$app->urlManager->createUrl(['testimonials/view-testimonials']) ?>">View
                                Testimonial</a>
                        </div>

                        <div class="menu-item" onclick="toggleSubMenu('pdfresources')">
                            <a class="" href="#">Pdf Resources</a>
                            <i class="arrow down"></i>
                        </div>
                        <div class="sub-menu" id="pdfresources">
                            <a href="<?= Yii::$app->urlManager->createUrl(['pdfresources/add-pdfresources']) ?>">Add
                                Pdf Resources</a>
                            <br>
                            <a href="<?= Yii::$app->urlManager->createUrl(['pdfresources/view-pdfresources']) ?>">View
                                Pdf Resources</a>
                        </div>

                        <div class="menu-item" onclick="toggleSubMenu('cs-filter')">
                            <a class="" href="#">CS Filter</a>
                            <i class="arrow down"></i>
                        </div>
                        <div class="sub-menu" id="cs-filter">
                            <a href="<?= Yii::$app->urlManager->createUrl(['csfilter/add-csfilter']) ?>">Add
                                CS Filter</a>
                            <br>
                            <a href="<?= Yii::$app->urlManager->createUrl(['csfilter/view-csfilter']) ?>">View
                                CS Filter</a>
                        </div>

                        <div class="menu-item" onclick="toggleSubMenu('clientlogos')">
                            <a class="" href="#">Client Logos</a>
                            <i class="arrow down"></i>
                        </div>
                        <div class="sub-menu" id="clientlogos">
                            <a href="<?= Yii::$app->urlManager->createUrl(['clientlogos/add-clientlogos']) ?>">Add
                                Client Logos</a>
                            <br>
                            <a href="<?= Yii::$app->urlManager->createUrl(['clientlogos/view-clientlogos']) ?>">View
                                Client Logos</a>
                        </div>
                    </div>

                    <div class="menu-item" onclick="toggleSubMenu('user')">
                        <a class="font-weight-bold" href="#">Users</a>
                        <i class="arrow down"></i>
                    </div>
                    <div class="sub-menu" id="user">
                        <a href="<?= Yii::$app->urlManager->createUrl(['user/add-user']) ?>">Add User</a>
                        <br>
                        <a href="<?= Yii::$app->urlManager->createUrl(['user/view-user']) ?>">View User</a>
                    </div>

                    <div class="menu-item" onclick="toggleSubMenu('admin')">
                        <a class="font-weight-bold" href="#">RBAC</a>
                        <i class="arrow down"></i>
                    </div>
                    <div class="sub-menu" id="admin">
                        <a href="<?= Yii::$app->urlManager->createUrl(['/admin/assignment']) ?>">Assign Roles</a>

                    </div>
                </nav>

            </div>
            <?= $content ?>
        </div>
    </main>

    <footer class="footer mt-auto py-3 text-muted">
        <div class="container">

        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
<script>
    function toggleSubMenu(id) {
        const subMenu = document.getElementById(id);
        const arrow = subMenu.previousElementSibling.querySelector('.arrow');
        subMenu.style.display = subMenu.style.display === "block" ? "none" : "block";
        arrow.classList.toggle('down');
        arrow.classList.toggle('up');
    }
</script>

</html>
<?php $this->endPage(); ?>