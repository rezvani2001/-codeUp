<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>CODE UP</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
</head>
<body>

<section id="banner">
    <img src="../img/logo/logo3.gif" class="logo">
    <div class="banner-text">
        <h1>
            WELCOME TO CODE UP
        </h1>
        <div class="banner-btn">
            <a href="#" id="LogIn"> <span></span>ورود</a>
            <a href="#"> <span></span>ثبت نام</a>

        </div>
    </div>
</section>
<div id="sideNav">
    <nav>
        <ul>
            <li><a href="#">سوالات</a></li>
            <li><a href="#">کلاس ها</a></li>
            <li><a href="#">پرسش و پاسخ</a></li>
            <li><a href="#">درباره ما</a></li>
        </ul>
    </nav>
</div>
<div id="menu-btn">
    <img src="../img/menu.png" id="menu">
</div>


@push('scripts')

    <div>
        <a {{mix('js/app.js')}}>

        </a>
    </div>
@endpush
</body>
