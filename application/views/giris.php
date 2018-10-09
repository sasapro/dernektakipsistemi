<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kullanıcı Girişi</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>statics/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>statics/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>statics/css/style.css">
    <script src="<?php echo base_url(); ?>statics/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>statics/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>statics/js/script.js"></script>

</head>
<body>

<div class="container" style="width: 400px; margin-top: 50px;">
    <div class="card">
        <div class="card-body">
            <form class="needs-validation" novalidate>
                <div class="form-group">
        <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" data-type="username" class="form-control required" id="username" placeholder="Kullanıcı Adı">
                <div class="invalid-feedback">
                   Lütfen Kullanıcı Adınızı Giriniz.
                </div>
        </div><!-- input group -->
        </div><!-- form group -->
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" data-type="text" class="form-control required" id="password" placeholder="Parola">
                        <div class="invalid-feedback">
                            Lütfen Şifrenizi Giriniz.
                        </div>
                    </div><!-- input group -->
                </div><!-- form group -->
				

        <div class="form-group">
        <a onclick="formSend()" class="btn btn-primary">Giriş Yap</a>
        </div>
    </form>
        </div><!-- card-body -->
    </div><!-- card -->
</div>
</body>
<script>
    function formSend(){

        var control =  formControl();
        if(control){
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            var dataString = 'username='+ username + '&password=' + password;
            jQuery.ajax({
                type: 'POST',
                url: '<?php echo site_url(); ?>giris/kontrol',
                data: dataString,
                success: function(e){
                    if(e==1)
						window.location.href = "<?php print site_url(); ?>aile";
					else
						alert("Geçersiz kullanıcı adı ve şifre");
                },
            });

        }


    }
</script>
</html>