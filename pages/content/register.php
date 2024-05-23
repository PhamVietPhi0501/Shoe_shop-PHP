<?php
include ('admin/config/config.php');
?>
<div class="wide grid">
    <div class="form-register">
        <div class="form-register-name">
            <span>ĐĂNG KÝ</span>
        </div>

        <form action="pages/content/xulyRegister.php" method="POST">
        <div class="form-register-input">
                <div class="form-register-input-left">
                    <div class="form-info">
                        <h4>Họ và Tên:</h4><p>*</p>
                        <input type="text" id="fullname" value="<?php if(isset($_GET['fullname'])){ echo $_GET['fullname'];} ?>" name="fullname" placeholder="Họ và Tên">
                        <span class="error"></span>
                    </div>

                    <div class="form-info">
                        <h4>Email:</h4><p>*</p>
                        <input type="text" id="email" value="<?php if(isset($_GET['email'])){ echo $_GET['email'];} ?>" name="email" placeholder="Email">
                        <span class="error error-email"></span>
                    </div>

                    <div class="form-info">
                        <h4>Tỉnh/TP:</h4><p>*</p>
                        <select name="province" id="province">
                            <option value="0">-Chọn Tỉnh/TP-</option>
                            <?php
                            $sql = "SELECT * FROM province";
                            $query = mysqli_query($mysqli,$sql);
                            while($row = mysqli_fetch_array($query)){
                            ?>
                            <option value="<?php echo $row['province_id'] ?>"><?php echo $row['name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <span class="error error-province"></span>
                    </div>

                    <div class="form-info">
                        <h4>Giới tính:</h4>
                        <select name="gender">
                            <?php
                            if($_GET['gender']=='female'){
                            ?>
                            <option selected value="female">Nữ</option>
                            <option value="male">Nam</option>
                            <option value="orther">Khác</option>
                            <?php
                            }else if($_GET['gender']=='male') {
                            ?>
                            <option value="female">Nữ</option>
                            <option selected  value="male">Nam</option>
                            <option value="orther">Khác</option>
                            <?php
                            }else {
                            ?>
                            <option value="female">Nữ</option>
                            <option value="male">Nam</option>
                            <option selected value="orther">Khác</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                </div>

                <div class="form-register-input-middle">
                    <div class="form-info">
                        <h4>Quận/Huyện:</h4><p>*</p>
                        <select name="district" id="district">
                        <option value="0">-Chọn Quận/Huyện-</option>
                        </select>
                        <span class="error error-district"></span>
                    </div>
                    <div class="form-info">
                        <h4>Phường Xã:</h4><p>*</p>
                        <select name="award" id="award">
                        <option value="0">-Phường xã-</option>
                        </select>
                        <span class="error error-award"></span>
                    </div>
                    <div class="form-info">
                        <h4>Địa chỉ:</h4><p>*</p>
                        <input type="text" id="address" value="<?php if(isset($_GET['addres'])){ echo $_GET['addres'];} ?>"   name="address" placeholder="Địa chỉ">
                        <span class="error error-address"></span>
                    </div>
                    <div class="form-info">
                        <h4>Số điện thoại:</h4><p>*</p>
                        <input type="text" id="phonenumber" value="<?php if(isset($_GET['phone'])){ echo $_GET['phone'];} ?>"  name="phonenumber" placeholder="Số điện thoại">
                        <span class="error error-phone"></span>
                    </div>
                </div>

                <div class="form-register-input-right">
                    <div class="form-info">
                        <h4>Mật khẩu:</h4><p>*</p>
                        <input type="password" id="pass" value="<?php if(isset($_GET['pass'])){ echo $_GET['pass'];} ?>" name="pass" placeholder="Mật khẩu">
                        <!-- <i class="seenPass fa-solid fa-eye-slash "></i>
                        <i class="seenPass fa-solid fa-eye display-none"></i> -->
                        <span class="error error-pass"></span>
                    </div>

                    <div class="form-info">
                        <h4>Nhập lại mật khẩu:</h4><p>*</p>
                        <input type="password" id="pass2" value="<?php if(isset($_GET['pass'])){ echo $_GET['pass'];} ?>" name="pass2" placeholder="Nhập lại mật khẩu">
                        <!-- <i class="seenPass2 fa-solid fa-eye-slash "></i>
                        <i class="seenPass2 fa-solid fa-eye display-none2"></i> -->
                        <span class="error error-pass2"></span>
                    </div>

                    <button onclick="return checkform()" type="submit" >ĐĂNG KÝ</button>

                </div>
        </div>
        </form>
    </div>
</div>

<script>

$(document).ready(function(){
    $('#province').on('change', function(){
        var province_id = $(this).val();

        if(province_id){
            $.ajax({
                url: 'pages/content/ajax_get_distris.php',
                method: 'get',
                dataType: 'json',
                data: {
                    province_id: province_id
                },
                success: function(data) {
                    $('#district').empty();

                    $.each(data,function(i, district) {
                        $('#district').append($('<option>', {
                            value: district.id,
                            text: district.name
                        }))
                    })
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log('Error: '+ errorThrown);
                }
            })
            //$('#award').empty();

        }else{
            $('#district').empty();
        }
    })

    $('#district').on('change', function(){
        var district_id = $(this).val();

        if(district_id) {
            $.ajax({
                url: 'pages/content/ajax_get_award.php',
                method: 'get',
                dataType: 'json',
                data: {
                    district_id: district_id
                },
                success: function(data) {   
                    $('#award').empty();

                    $.each(data,function(i, award) {
                        $('#award').append($('<option>', {
                            value: award.id,
                            text: award.name
                        }))
                    })
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log('Error: '+ errorThrown);
                }
            })
        } else{
            $('#award').empty();
        }
    })
})

    //Validater fullname
        var fullname = $('#fullname');
        var fullnameInput = document.getElementById('fullname');
        var error = document.querySelector('.error')

        fullname.blur(function(e) {
            const checkFullName =  e.target.value;
            const child = e.target.parentElement;
            if(checkFullName == ''){
                fullname.addClass('error-active')
                for(const conn of child.children){
                    if(conn.classList.contains('error')){
                        conn.innerHTML = "Vui lòng nhập trường này";
                    }
                }
            }
        })
        fullnameInput.addEventListener("input", function(){
            const value = fullnameInput.value;  
            value.trim();
            this.value = this.value.toUpperCase();
            if(value !== fullnameInput.defaultValue){
                error.innerHTML = "";
                fullname.removeClass('error-active')
            }
        })


        

    //Validater email

        var email = $("#email");
        var regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        email.blur(function(e) {
            const checkEmail = e.target.value;
            const child  = e.target.parentElement;   
            if(!regex.test(checkEmail)){
                email.addClass('error-active')
                for(const conn of child.children){
                    if(conn.classList.contains('error')){
                        conn.innerHTML = "Đây không phải là email";
                    }
                }
            }
        })

        email.on("keyup", function(e){
            const value = email.val();
            const child  = e.target.parentElement;   

            if(value !== email.defaultValue){
                email.removeClass('error-active')
                for(const conn of child.children){
                    if(conn.classList.contains('error')){
                        conn.innerHTML = "";
                    }
                }
            }
        })
    
    //Validater address
    var address = $('#address');
    address.blur(function(e) {
            var checkAddress = e.target.value;
            const child  = e.target.parentElement;   

            if(checkAddress == ''){
                address.addClass('error-active')
                for(const conn of child.children){
                    if(conn.classList.contains('error')){
                        conn.innerHTML = "Vui lòng nhập trường này";
                    }
                }
            }
        })
        address.on("keyup", function(e){
            const value = address.val();
            const child  = e.target.parentElement;   

            if(value !== address.defaultValue){
                address.removeClass('error-active')
                for(const conn of child.children){
                    if(conn.classList.contains('error')){
                        conn.innerHTML = "";
                    }
                }
            }
        })
    //Validator phone
    var phone = $('#phonenumber');
    phone.blur(function(e) {
            var checkPhone = e.target.value;
            const child  = e.target.parentElement;  

            if(checkPhone.length != 10){
                phone.addClass('error-active')
                for(const conn of child.children){
                    if(conn.classList.contains('error')){
                        conn.innerHTML = "Số điện thoại phải là 10 số";
                    }
                }
            }

            if(checkPhone[0] != 0){
                phone.addClass('error-active')
                for(const conn of child.children){
                    if(conn.classList.contains('error')){
                        conn.innerHTML = "Không phải số điện thoại";
                    }
                }
            }

            if(isNaN(checkPhone)) {
                phone.addClass('error-active')
                for(const conn of child.children){
                    if(conn.classList.contains('error')){
                        conn.innerHTML = "Giá trị nhập vào phải là số";
                    }
                }
            }
        })
    phone.on("keyup", function(e){
        const value = phone.val();
        const child  = e.target.parentElement;   

        if(value !== phone.defaultValue){
            phone.removeClass('error-active')
            for(const conn of child.children){
                if(conn.classList.contains('error')){
                    conn.innerHTML = "";
                }
            }
        }
    })

    //Seen pass

        var seenPass = document.querySelectorAll(".seenPass");
        var pass = $('#pass');

        seenPass.forEach(function(e){
            e.onclick = function(){
                document.querySelector('.seenPass.display-none').classList.remove('display-none');
                this.classList.add('display-none')
                if(pass.attr("type") === "password"){
                    pass.attr("type", "text");
                }else{
                    pass.attr("type", "password");
                }
            }
        })
    //Seen pass2
        var seenPass2 = document.querySelectorAll(".seenPass2");
        var pass2 = $('#pass2');

        seenPass2.forEach(function(e){
            e.onclick = function(){
                document.querySelector('.seenPass2.display-none2').classList.remove('display-none2');
                this.classList.add('display-none2')
                if(pass2.attr("type") === "password"){
                    pass2.attr("type", "text");
                }else{
                    pass2.attr("type", "password");
                }
            }
        })

    //Validator pass
        pass.blur(function(e) {
            var checkPass = e.target.value;
            const child  = e.target.parentElement;   

            if(checkPass.length > 10 || checkPass.length < 5){
                pass.addClass('error-active')
                for(const conn of child.children){
                    if(conn.classList.contains('error')){
                        conn.innerHTML = "Mật khẩu phải lớn hơn 5 và nhỏ hớn 10 ký tự";
                    }
                }
            }
        })

        pass.on("keyup", function(e){
            const value = pass.val();
            const child  = e.target.parentElement;   

            if(value !== pass.defaultValue){
                pass.removeClass('error-active')
                for(const conn of child.children){
                    if(conn.classList.contains('error')){
                        conn.innerHTML = "";
                    }
                }
            }
        })

    //Validator pass2
        var pass2 = $('#pass2');

        pass2.blur(function(e) {
            const pass = $('#pass');
            const checkPass2 = e.target.value;
            const child  = e.target.parentElement;   

            if(!(pass.val() === checkPass2)) {
                pass2.addClass('error-active')
                for(const conn of child.children){
                    if(conn.classList.contains('error')){
                        conn.innerHTML = "Mật khẩu không trùng khớp";
                    }
                }
            }
        })


        pass2.on("keyup", function(e){
            const value = pass2.val();
            const child  = e.target.parentElement;   

            if(value !== pass2.defaultValue){
                pass2.removeClass('error-active')
                for(const conn of child.children){
                    if(conn.classList.contains('error')){
                        conn.innerHTML = "";
                    }
                }
            }
        })

    // Validator province

        $(province).on('change',function(){
            $(this).removeClass('error-active');
            $('.error-province').text("")
        })
    // Validator district
        $(district).on('change',function(){
            $(this).removeClass('error-active');
            $('.error-district').text("")
        })
    
    // Validator award
        $(award).on('change',function(){
            $(this).removeClass('error-active');
            $('.error-award').text("")
        })

    //Cho phép submit
        function checkform () {      
            const fullname = $('#fullname');
            const province = $('#province')
            const district = $('#district');
            const award = $('#award');
            const email = $('#email');
            const address = $('#address')
            const phone = $('#phonenumber')
            const pass = $('#pass');
            const pass2 = $('#pass2');
            const error_email = document.querySelector('.error-email');
            const error_address = document.querySelector('.error-address');
            const error_phone = document.querySelector('.error-phone');
            const error_pass = document.querySelector('.error-pass');
            const error_pass2 = document.querySelector('.error-pass2');
            const error_province = document.querySelector('.error-province');
            const error_district = document.querySelector('.error-district');
            const error_award = document.querySelector('.error-award');

            
            var i = 0;
            if(fullname.val() == ''){
                fullname.addClass('error-active')
                const child = error.parentElement;
                for(const conn of child.children){
                    if(conn.classList.contains('error')){
                        conn.innerHTML = "Vui lòng nhập trường này"; 
                    }
                }
                i++;              
            }if(email.val() == ''){
                email.addClass('error-active')
                const child = error_email.parentElement;
                for(const conn of child.children){
                    if(conn.classList.contains('error')){
                        conn.innerHTML = "Vui lòng nhập trường này";     
                   }
                }  
                i++;  
            }if(phone.val() == ''){
                phone.addClass('error-active')
                const child = error_phone.parentElement;
                for(const conn of child.children){
                    if(conn.classList.contains('error')){
                        conn.innerHTML = "Vui lòng nhập trường này";     
                   }
                }    
                i++;  
            }if(phone.val().length != 10 ){
                phone.addClass('error-active')
                const child = error_phone.parentElement;
                for(const conn of child.children){
                    if(conn.classList.contains('error')){
                        conn.innerHTML = "Số điện thoại phải là 10 số";     
                   }
                }    
                i++;  
            }if(phone.val()[0] != 0 ){
                phone.addClass('error-active')
                const child = error_phone.parentElement;
                for(const conn of child.children){
                    if(conn.classList.contains('error')){
                        conn.innerHTML = "Số không phải là số điện thoại";     
                   }
                }    
                i++;  
            }if(address.val() == ''){
                address.addClass('error-active')
                const child = error_address.parentElement;
                for(const conn of child.children){
                    if(conn.classList.contains('error')){
                        conn.innerHTML = "Vui lòng nhập trường này";     
                   }
                }    
                i++;  
            }if(pass.val() == ''){
                pass.addClass('error-active')
                const child = error_pass.parentElement;
                for(const conn of child.children){
                    if(conn.classList.contains('error')){
                        conn.innerHTML = "Vui lòng nhập trường này";     
                   }
                }    
                i++;  
            }if(pass.val().length < 5 ){
                pass.addClass('error-active')
                const child = error_pass.parentElement;
                for(const conn of child.children){
                    if(conn.classList.contains('error')){
                        conn.innerHTML = "Mật khẩu phải lớn hơn 5 và nhỏ hớn 10 ký tự";     
                   }
                }    
                i++;  
            }if(pass2.val() == ''){
                pass2.addClass('error-active')
                const child = error_pass2.parentElement;
                for(const conn of child.children){
                    if(conn.classList.contains('error')){
                        conn.innerHTML = "Vui lòng nhập trường này";     
                   }
                }  
                i++;  
            }if(province.val() == '0'){
                province.addClass(('error-active'))
                error_province.innerHTML = "Vui lòng nhập trường này"
                i++;  
            }if(district.val() == '0'){
                district.addClass(('error-active'))
                error_district.innerHTML = "Vui lòng nhập trường này"
                i++;  
            }if(award.val() == '0'){
                award.addClass(('error-active'))
                error_award.innerHTML = "Vui lòng nhập trường này"
                i++;  
            }
            if(i != 0){
                return false; 
            }           
        return true;
        }

    //Xử lí api
        const url = window.location.href;
        const params = url.split('?')[1].split('&');  
        const value = params[1]; 

        if(value === 'trung=1'){
            email.addClass('error-active')
            const duplicate = document.querySelector('.error-email');
            duplicate.innerHTML = "Email đã tồn tại";
        }

        if(value === 'trung=2'){
            phone.addClass('error-active')
            const duplicate = document.querySelector('.error-phone');
            duplicate.innerHTML = "Số điện thoại đã tồn tại";
        }

        if(value === 'trung=3'){
            phone.addClass('error-active')
            const duplicate = document.querySelector('.error-phone');
            duplicate.innerHTML = "Số điện thoại đã tồn tại";
            email.addClass('error-active')
            const duplicate2 = document.querySelector('.error-email');
            duplicate2.innerHTML = "Email đã tồn tại";
        }
        
</script>



                

            