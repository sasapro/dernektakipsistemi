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

            var dataString = 'nationality='+ nationality + 'tc=' + tc + '&association_number=' + association_number + '&passport_number=' + passport_number + '&name=' + name + '&surname=' + surname + '&birthdate=' + birthdate;
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
<div class="col-md-12"><h1>Kişi Düzenle</h1></div>
</div>
<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-body">

				 <div class="row">
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                            <label>Uyruk</label>
                            <span><?php print $person->nationality; ?></span>
                    </div><!-- col -->
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                            <label>TC</label>
                            <span><?php print $person->tc; ?></span>
                    </div><!-- col -->
					
				</div><!-- row -->
				<div class="row">
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                            <label>Dernek No</label>
                            <span><?php print $person->association_number; ?></span>
                    </div><!-- col -->
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                            <label>Pasaport No</label>
                            <span><?php print $person->passport_number; ?></span>
                    </div><!-- col -->
				</div><!-- row -->
                <div class="row">
                    <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                            <label>Ad</label>
                            <span><?php print $person->name; ?></span>
                    </div><!-- col -->
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                            <label>Soyad</label>
                            <span><?php print $person->surname; ?></span>
                    </div><!-- col -->
				</div><!-- row -->
				<div class="row">
                    <div class="col col-lg-6 col-md-12 col-sm-12 col-12"  maxlength="50" data-lenght="50" >
                            <label>Doğum Tarihi</label>
                            <span><?php print $person->birthdate; ?></span>
                    </div><!-- col -->
				</div><!-- row -->
  
</div><!-- card body -->
</div><!-- card -->

</div><!-- col -->
</div><!-- row -->

<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-body">
		
	<table class="table">
		<thead>
			<tr>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td></td>
			</tr>
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





