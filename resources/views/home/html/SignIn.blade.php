<html lang="fa">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/SingIn.css">
    <title>CODE UP</title>
</head>
<body>

    <div class="main">
        <input type="checkbox" id="check" aria-hidden="true">
       <div class="signup">
           <form >
               <label for="check" aria-hidden="true">ثبت نام</label>
               <input type="text" class="input-field" placeholder="نام"  dir="rtl" align="right" required>
               <input type="text" class="input-field" placeholder="نام خانوادگی" dir="rtl" align="right" required>
               <input type="tel" class="input-field" placeholder="شماره تماس" dir="rtl" align="right" required>
               <input type="email" class="input-field" placeholder="ایمیل" dir="rtl" align="right" required>
               <input type="password" class="input-field" placeholder="رمز عبور"  dir="rtl" align="right"required>
               <button type="submit" class="submit-btn">ثبت نام</button>
           </form>
       </div>
        <div class="login">
            <form >
                <label for="check" aria-hidden="true">ورود</label>
                <input type="email" class="input-field" placeholder="ایمیل"  dir="rtl" align="right"required>
                <input type="password" class="input-field" placeholder="رمز عبور"  dir="rtl" align="right"required>
                <button type="submit" class="submit-btn">ورود</button>
            </form>
        </div>

        <script>
            const query = window.location.search;
            const button = document.getElementById("check");

            if (query.includes("login")) {
                button.checked = true;
            }


        </script>
    </div>
</body>
</html>