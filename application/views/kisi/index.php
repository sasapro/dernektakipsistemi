<?php
$ajaxUrl = "kisi/liste/1";
?>
<script type="text/javascript">
$(function(){
		ajaxList('<?php echo $ajaxUrl; ?>');
		
		var count = 2;
          $(window).scroll(function() {
			if($(window).scrollTop() >= ($(document).height() - $(window).height())-10){
			ajaxListAppend(count,'kisi/liste');
                     count++;
                  }
          }); 	
   });
   
   
    function formSend(){
        var control = formControl();

        if(control){
            var nationality = document.getElementById("nationality").value;
            var tc = document.getElementById("tc").value;
            var association_number = document.getElementById("association_number").value;
            var passport_number = document.getElementById("passport_number").value;
            var name = document.getElementById("name").value;
            var surname = document.getElementById("surname").value;
			var birthdate = document.getElementById("birthdate").value;
            var job = document.getElementById("job").value;
			var education = document.getElementById("education").value;
			var phone = document.getElementById("phone").value;
			var address = document.getElementById("address").value;
			var shoe_size = document.getElementById("shoe_size").value;
			var body_size = document.getElementById("body_size").value;
			var height = document.getElementById("height").value;
			var weight = document.getElementById("weight").value;

            var dataString = 'nationality='+ nationality + '&tc=' + tc + '&association_number=' + association_number + '&passport_number=' + passport_number + '&name=' + name + '&surname=' + surname + '&birthdate=' + birthdate + '&job=' + job + '&phone=' + phone + '&address=' + address + '&shoe_size=' + shoe_size + '&body_size=' + body_size + '&height=' + height + '&weight=' + weight;
            jQuery.ajax({
                type: 'POST',
                url: '<?php print site_url(); ?>kisi/personInsert',
                data: dataString,
                success: function(e){
                    alert(e);
                },
            });

        }

    }
</script>
<div class="container-fluid">
<div class="row titleBar">
<div class="col-md-8"><h1>Kişiler</h1></div>
<div class="col-md-4 buttons"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#ekle">Yeni Ekle</button></div>
</div>
<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-body">
<table class="table" id="table">
<thead>
<tr>
	<th>Ad</th>
	<th>Soyad</th>
	<th></th>
	<th></th>
</tr>
</thead>
	<tbody id="ajaxList">
	
	</tbody>

</table>
</div><!-- card body -->
</div><!-- card -->

</div><!-- col -->
</div><!-- row -->

</div><!-- container -->

<!-- Modal -->
<div class="modal fade" id="ekle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yeni Ekle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form>
				 <div class="form-row">
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Uyruk</label>
                            <input type="text" class="form-control required" id="nationality"   maxlength="2" data-lenght="2" >
                            <div class="invalid-feedback">
                                Lütfen uyruk giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>TC</label>
                            <input type="text" class="form-control required" id="tc"  maxlength="11" data-lenght="11" >
                            <div class="invalid-feedback">
                                Lütfen tc giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					
				</div><!-- row -->
				<div class="form-row">
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Dernek No</label>
                            <input type="text" class="form-control required" id="association_number"  maxlength="20" data-lenght="20" >
                            <div class="invalid-feedback">
                                Lütfen dernek no giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Pasaport No</label>
                            <input type="text" class="form-control" id="passport_number"  maxlength="20" data-lenght="20" >
                        </div>
                    </div><!-- col -->
				</div><!-- row -->
                <div class="form-row">
                    <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Ad</label>
                            <input type="text" class="form-control required" id="name"  maxlength="50" data-lenght="50" >
                            <div class="invalid-feedback">
                                Lütfen ad giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Soyad</label>
                            <input type="text" class="form-control required" id="surname"  maxlength="50" data-lenght="50" >
                            <div class="invalid-feedback">
                                Lütfen soyad giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
				</div><!-- row -->
				<div class="form-row">
                    <div class="col col-lg-6 col-md-12 col-sm-12 col-12"  maxlength="50" data-lenght="50" >
                        <div class="form-group">
                            <label>Doğum Tarihi</label>
                            <input type="text" class="form-control required" id="birthdate">
                            <div class="invalid-feedback">
                                Lütfen doğum tarihi giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Mesleği</label>
                            <input type="text" class="form-control required" id="job"  maxlength="50" data-lenght="50" >
                            <div class="invalid-feedback">
                                Lütfen meslek giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
				</div><!-- row -->
				<div class="form-row">
                    <div class="col col-lg-6 col-md-12 col-sm-12 col-12"  maxlength="50" data-lenght="50" >
                        <div class="form-group">
                            <label>Eğitim Seviyesi</label>
                            <input type="text" class="form-control required" id="education">
                            <div class="invalid-feedback">
                                Lütfen Eğitim Seviyesi giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Telefon</label>
                            <input type="text" class="form-control required" id="phone"  maxlength="50" data-lenght="50" >
                            <div class="invalid-feedback">
                                Lütfen telefon giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
				</div><!-- row -->
				<div class="form-row">
                  
					<div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Adres</label>
							<textarea class="form-control required" id="address" maxlength="50" data-lenght="50"  ></textarea>
                            <div class="invalid-feedback">
                                Lütfen Adres giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
				</div><!-- row -->
				<div class="form-row">
                    <div class="col col-lg-6 col-md-12 col-sm-12 col-12"   >
                        <div class="form-group">
                            <label>Ayakkabı Numarası</label>
                            <input type="text" class="form-control required" id="shoe_size" maxlength="2" data-lenght="2">
                            <div class="invalid-feedback">
                                Lütfen ayakkabı numarası giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Beden</label>
                            <input type="text" class="form-control required" id="body_size"  maxlength="5" data-lenght="5" >

                            <div class="invalid-feedback">
                                Lütfen beden giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
				</div><!-- row -->
				
				<div class="form-row">
                    <div class="col col-lg-6 col-md-12 col-sm-12 col-12" >
                        <div class="form-group">
                            <label>Boy</label>
                            <input type="text" class="form-control required" id="height" maxlength="3" data-lenght="3" >
                            <div class="invalid-feedback">
                                Lütfen boy giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Kilo</label>
                            <input type="text" class="form-control required" id="weight"  maxlength="3" data-lenght="3" >
                            <div class="invalid-feedback">
                                Lütfen kilo giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
				</div><!-- row -->
				
				
				
				
				
				
				
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
        <button type="button" class="btn btn-primary" onclick="formSend();">Kaydet</button>
      </div>
    </div>
  </div>
</div>

