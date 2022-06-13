<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css" type="text/css">

</head>
<body>
<h1 class="font" style="font-weight: bold">滨城防疫志愿者管理系统</h1>
<div class="container right-panel-active">
    <!-- Sign Up -->
    <div class="container__form container--signup">
        <form action="admin_login_end.php" method="post" class="form" id="form1">
            <h2 class="form__title">管理员</h2>
            <input type="text" placeholder="用户名" class="input" name="user">
            <input type="password" placeholder="密码" class="input" name="password">
            <div style="width: 310px;border: none;">
                <input type="text" name="code" class="input" placeholder="验证码" style="width: 45%;float: left">
                <img style="height: 40px;float: left;padding: 3px 2px;margin: 0.4rem 0;" src="login_code_start.php" alt="验证码" title="看不清图片可以刷新" onclick="this.src='login_code_start.php?d='+Math.random();">
            </div>



            <button type="submit" class="btn">登录</button>
        </form>
    </div>
    <!-- Sign In -->
    <div class="container__form container--signin">
        <form action="use_login_end.php" method="post" class="form" id="form2">
            <h2 class="form__title">志愿者</h2>
            <input type="text" placeholder="用户名" class="input" name="user"/>
            <input type="password" placeholder="密码" class="input" name="password"/>
            <a href="admin_user_find_password_face.php" class="link">忘记密码</a>
            <button class="btn">登录</button>
            <button class="btn" type="button"
                    onclick="window.location.href='<?php echo 'user_infor_insear_face.php'; ?>'" ;>注册
            </button>
        </form>
    </div>
    <!-- Overlay -->
    <div class="container__overlay">
        <div class="overlay">
            <div class="overlay__panel overlay--left">
                <button class="btn" id="signIn">志愿者登录</button>
            </div>
            <div class="overlay__panel overlay--right">
                <button class="btn" id="signUp">管理员登陆</button>
            </div>
        </div>
    </div>
</div>
<script>
    const signInBtn = document.getElementById("signIn");
    const signUpBtn = document.getElementById("signUp");
    const fistForm = document.getElementById("form1");
    const secondForm = document.getElementById("form2");
    const container = document.querySelector(".container");
    signInBtn.addEventListener("click", () => {
        container.classList.remove("right-panel-active");
    });

    signUpBtn.addEventListener("click", () => {
        container.classList.add("right-panel-active");
    });
</script>
</body>
</html>
