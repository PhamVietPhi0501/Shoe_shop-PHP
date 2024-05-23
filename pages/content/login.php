<div class="grid wide">
    <div class="form-login">
        <div class="form-login-left">
            <span>Bạn đã có tài khoản MY SHOE</span>
            <form action="pages/content/xulyLogin.php" method="post">
                <div class="login">
                    <input type="text" id="email" name="user" placeholder="Email..." >
                    <span class="error error-email" ></span>
                    <div class="login-pass">
                        <input  type="password" id="pass3" name="pass" placeholder="Mật khẩu...">
                        <i class="seenPass3 fa-solid fa-eye-slash "></i>
                        <i class="seenPass3 fa-solid fa-eye display-none3"></i>
                    </div>
                    <span class="error error-pass3"></span>
                </div>
                <p class="noti" ></p>
                <!-- <a href="">Quên mật khẩu?</a> -->
                <button onclick="return checkform()" type="submit" name="login" >Đăng Nhập</button>
            </form>
        </div>
        <?php
        if(isset($_GET['success'])){
        ?>
        <div class="form-login-right">
            <span style="display: block; margin-bottom: 16px;color: #76eec6; " >Đăng ký thành công</span>
            <i style="font-size: 32px; color: #76eec6;" class="fa-solid fa-handshake-simple"></i>
        </div>
        <?php
        }else{
        ?>
        <div class="form-login-right">
            <span>Khách hàng mới của MY SHOE</span>
            <p>Nếu bạn chưa có tài khoản tại MY SHOE hãy dùng tùy chọn này</p>
            <a href="indexRegister.php?pages/content/register.php">Đăng ký</a>
        </div>
        <?php
        }
        ?>
    </div>
</div>

<script>
    const email = $("#email");
    const error_email = document.querySelector('.error-email');
    const pass = $("#pass3");
    const error_pass = document.querySelector('.error-pass3');
    const notiBlur = document.querySelector('.noti');

// Validator email
    email.blur(function(e) {
        if(email.val() == ''){
            email.addClass('error-active');
            error_email.innerHTML = "Không được để trống";
        }
    })

    email.on('keyup', function() {
        email.removeClass('error-active');
        error_email.innerHTML = "";
        notiBlur.innerHTML = "";
    })
// Validator pass
    pass.blur(function(e) {
        if(pass.val() == ''){
            pass.addClass('error-active');
            error_pass.innerHTML = "Không được để trống";
        }
    })

    pass.on('keyup', function() {
        pass.removeClass('error-active');
        error_pass.innerHTML = "";
        notiBlur.innerHTML = "";
    })

//Seen pass
        var seenPass3 = document.querySelectorAll(".seenPass3");
        var pass3 = $('#pass3');

        seenPass3.forEach(function(e){
            e.onclick = function(){
                document.querySelector('.seenPass3.display-none3').classList.remove('display-none3');
                this.classList.add('display-none3')
                if(pass3.attr("type") === "password"){
                    pass3.attr("type", "text");
                }else{
                    pass3.attr("type", "password");
                }
            }
        })

//Submit

function checkform(){

    var i = 0;
    if(email.val()==''){
        email.addClass('error-active');
        error_email.innerHTML = "Không được để trống";
        notiBlur.innerHTML = "";
        i++;
    }

    if(pass.val()==''){
        pass.addClass('error-active');
        error_pass.innerHTML = "Không được để trống";
        notiBlur.innerHTML = "";
        i++
    }

    if(i !=0 ){
        return false;
    }
    return true;
}
    const regex = /false=(.*)/;
    const url = regex.exec(window.location.href);
    const value = url[1];
    
    if(value == '0' ){       
        const noti = document.querySelector('.noti');
        noti.innerHTML = "Tài khoản mật khẩu không chính xác";
    }
</script>