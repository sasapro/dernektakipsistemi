<?php
$ajaxUrl = "user/liste/1";
?>
<script type="text/javascript">
$(function(){
		ajaxList('<?php echo $ajaxUrl; ?>');
		
		var count = 2;
          $(window).scroll(function() {
			if($(window).scrollTop() >= ($(document).height() - $(window).height())-10){
			ajaxListAppend(count,'user/liste');
                     count++;
                  }
          }); 	
   });
   
   
    function formSend(){
        var control = formControl();

        if(control){
            var username = document.getElementById("username").value;
            var tc = document.getElementById("tc").value;
            var association_number = document.getElementById("association_number").value;
            var passport_number = document.getElementById("passport_number").value;
            var name = document.getElementById("name").value;
            var surname = document.getElementById("surname").value;
            var birthdate = document.getElementById("birthdate").value;
			 var job = document.getElementById("job").value;
            var education = document.getElementById("education").value;

            var dataString = 'pid=' + <?php print $person->pid; ?> + '&nationality='+ nationality + '&tc=' + tc + '&association_number=' + association_number + '&passport_number=' + passport_number + '&name=' + name + '&surname=' + surname + '&birthdate=' + birthdate + '&job=' + job + '&education=' + education;
			
            jQuery.ajax({
                type: 'POST',
                url: '<?php print site_url(); ?>kisi/personUpdate',
                data: dataString,
                success: function(e){
					if(e)
						location.reload(); 
					else
						alert("İşlem gerçekleştirilemedi. Lütfen sistem yöneticisi ile görüşünüz.");
                },
            });

        }

    }
	
	function formPhoneInsertSend(){
		
		 var name = document.getElementById("phoneName").value;
         var phone = document.getElementById("phoneValue").value;
		 
		 var dataString = 'pid=' + <?php print $person->pid; ?> + '&name='+ name + '&phone=' + phone;
			
            jQuery.ajax({
                type: 'POST',
                url: '<?php print site_url(); ?>kisi/personPhoneInsert',
                data: dataString,
                success: function(e){
                    if(e)
						location.reload(); 
					else
						alert("İşlem gerçekleştirilemedi. Lütfen sistem yöneticisi ile görüşünüz.");
                },
            });
	}
	
	function formAddressInsertSend(){
		
		 var name = document.getElementById("addressName").value;
         var address = document.getElementById("addressValue").value;
		 
		 var dataString = 'pid=' + <?php print $person->pid; ?> + '&name='+ name + '&address=' + address;
			
            jQuery.ajax({
                type: 'POST',
                url: '<?php print site_url(); ?>kisi/personAddressInsert',
                data: dataString,
                success: function(e){
                    if(e)
						location.reload(); 
					else
						alert("İşlem gerçekleştirilemedi. Lütfen sistem yöneticisi ile görüşünüz.");
                },
            });
	}
	
	function formMeasuresInsertSend(){
		
		var shoe_size = document.getElementById("shoeSizeValue").value;
        var body_size = document.getElementById("bodySizeValue").value;
		var height = document.getElementById("heightValue").value;
		var weight = document.getElementById("weightValue").value;
		 
		var dataString = 'pid=' + <?php print $person->pid; ?> + '&shoe_size='+ shoe_size + '&body_size=' + body_size + '&height=' + height + '&weight=' + weight;
			
            jQuery.ajax({
                type: 'POST',
                url: '<?php print site_url(); ?>kisi/personMeasuresInsert',
                data: dataString,
                success: function(e){
                    if(e)
						location.reload(); 
					else
						alert("İşlem gerçekleştirilemedi. Lütfen sistem yöneticisi ile görüşünüz.");
                },
            });
	}
	
	function phoneUpdateFormPage(id)
	{
		jQuery.ajax({
                type: 'POST',
                url: '<?php print site_url(); ?>kisi/persondetailPhoneUpdate/'+id,
                success: function(e){
                    $("#phoneUpdateForm").html(e);
                },
            });
	}
	
	function formPhoneUpdateSend(){
		
		 var id = document.getElementById("updatePhoneId").value;
		 var name = document.getElementById("updatePhoneName").value;
         var phone = document.getElementById("updatePhoneValue").value;
		 
		 var dataString = 'id=' + id + '&name='+ name + '&phone=' + phone;
			
            jQuery.ajax({
                type: 'POST',
                url: '<?php print site_url(); ?>kisi/personPhoneUpdate',
                data: dataString,
                success: function(e){
                    if(e)
						location.reload(); 
					else
						alert("İşlem gerçekleştirilemedi. Lütfen sistem yöneticisi ile görüşünüz.");
                },
            });
	}
	
	
	function addressUpdateFormPage(id)
	{
		jQuery.ajax({
                type: 'POST',
                url: '<?php print site_url(); ?>kisi/persondetailAddressUpdate/'+id,
                success: function(e){
                    $("#addressUpdateForm").html(e);
                }
            });
	}
	
	function formAddressUpdateSend(){
		
		 var id = document.getElementById("updateAddressId").value;
		 var name = document.getElementById("updateAddressName").value;
         var address = document.getElementById("updateAddressValue").value;
		 
		 var dataString = 'id=' + id + '&name='+ name + '&address=' + address;
			
            jQuery.ajax({
                type: 'POST',
                url: '<?php print site_url(); ?>kisi/personAddressUpdate',
                data: dataString,
                success: function(e){
                    if(e)
						location.reload(); 
					else
						alert("İşlem gerçekleştirilemedi. Lütfen sistem yöneticisi ile görüşünüz.");
                },
            });
	}
	
	function measuresUpdateFormPage(id)
	{
		jQuery.ajax({
                type: 'POST',
                url: '<?php print site_url(); ?>kisi/persondetailMeasuresUpdate/'+id,
                success: function(e){
                    $("#measuresUpdateForm").html(e);
                }
            });
	}
	
	function formMeasuresUpdateSend(){
		
		 var id = document.getElementById("updateMeasuresId").value;
		 var shoe_size = document.getElementById("updateShoeSizeValue").value;
         var body_size = document.getElementById("updateBodySizeValue").value;
		 var height = document.getElementById("updateHeightValue").value;
		 var weight = document.getElementById("updateWeightValue").value;
		 
		 var dataString = 'id=' + id + '&shoe_size='+ shoe_size + '&body_size=' + body_size + '&height=' + height + '&weight=' + weight;
			
            jQuery.ajax({
                type: 'POST',
                url: '<?php print site_url(); ?>kisi/personMeasuresUpdate',
                data: dataString,
                success: function(e){
                    if(e)
						location.reload(); 
					else
						alert("İşlem gerçekleştirilemedi. Lütfen sistem yöneticisi ile görüşünüz.");
                },
            });
	}
	
	
</script>
<div class="container-fluid">
<div class="row titleBar">
<div class="col-md-12"><h1>Kişi Düzenle</h1></div>
</div>
<div class="row">
<div class="col-md-12">
	<h6  class="subtitle">Genel Bilgiler: </h6>
	<div class="subHeaderButton"><a data-toggle="modal" data-target="#duzenle"><i class="fas fa-edit"></i> Düzenle</a></div>
</div><!-- col -->
<div class="col-md-12">
<div class="card infornation">
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
                            <label>Mezun Olduğu Okul</label>
                            <span><?php print $person->education; ?></span>
                    </div><!-- col -->
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                            <label>Meslek</label>
                            <span><?php print $person->job; ?></span>
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
	<h6 class="subtitle">Telefon Bilgileri: </h6>
	<div class="subHeaderButton"><a  data-toggle="modal" data-target="#phoneInsert"><i class="far fa-plus-square"></i> Yeni Ekle</a></div>
</div><!-- col -->
<div class="col-md-12">
<div class="card">
  <div class="card-body">
		
	<table class="table">
		<thead>
			<tr>
				<th>İletişim Adı</th>
				<th>Telefon</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($personPhones AS $personPhone): ?>
			<tr>
				<td><?php print $personPhone['name']; ?></td>
				<td><?php print $personPhone['phone']; ?></td>
				<td  width="110"><a onclick="phoneUpdateFormPage(<?php print $personPhone['id']; ?>)" data-toggle="modal" data-target="#phoneUpdate" ><i class="fas fa-edit"></i> Düzenle</a></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
  
  </div><!-- card body -->
</div><!-- card -->

</div><!-- col -->
</div><!-- row -->

<div class="row">
<div class="col-md-12">
	<h6 class="subtitle">Adres Bilgileri: </h6>
	<div class="subHeaderButton"><a data-toggle="modal" data-target="#addressInsert" ><i class="far fa-plus-square"></i> Yeni Ekle</a></div>
</div><!-- col -->
<div class="col-md-12">
<div class="card">
  <div class="card-body">
		
	<table class="table">
		<thead>
			<tr>
				<th>İletişim Adı</th>
				<th>Adres</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($personAddresses AS $personAddress): ?>
			<tr>
				<td><?php print $personAddress['name']; ?></td>
				<td><?php print $personAddress['address']; ?></td>
				<td  width="110"><a onclick="addressUpdateFormPage(<?php print $personAddress['id']; ?>)" data-toggle="modal" data-target="#addressUpdate"><i class="fas fa-edit"></i> Düzenle</a></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
  
  </div><!-- card body -->
</div><!-- card -->

</div><!-- col -->
</div><!-- row -->


<div class="row">
<div class="col-md-12">
	<h6 class="subtitle">Beden Bilgileri: </h6>
	<div class="subHeaderButton"><a data-toggle="modal" data-target="#measuresInsert" ><i class="far fa-plus-square"></i> Yeni Ekle</a></div>
</div><!-- col -->
<div class="col-md-12">
<div class="card">
  <div class="card-body">
		
	<table class="table">
		<thead>
			<tr>
				<th>Ayakkabı Numarası</th>
				<th>Beden</th>
				<th>Boy</th>
				<th>Kilo</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($personMeasureses AS $personMeasures): ?>
			<tr>
				<td><?php print $personMeasures['shoe_size']; ?></td>
				<td><?php print $personMeasures['body_size']; ?></td>
				<td><?php print $personMeasures['height']; ?></td>
				<td><?php print $personMeasures['weight']; ?></td>
				<td width="110"><a onclick="measuresUpdateFormPage(<?php print $personMeasures['id']; ?>)" data-toggle="modal" data-target="#measuresUpdate"><i class="fas fa-edit"></i> Düzenle</a></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
  
  </div><!-- card body -->
</div><!-- card -->

</div><!-- col -->
</div><!-- row -->


</div><!-- container -->

<!-- Modal Genel Bilgiler -->
<div class="modal fade" id="duzenle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Genel Bilgiler Düzenle</h5>
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
                            <input type="text" class="form-control required" id="nationality" value="<?php print $person->nationality; ?>"  maxlength="2" data-lenght="2" >
                            <div class="invalid-feedback">
                                Lütfen uyruk giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>TC</label>
                            <input type="text" class="form-control required" id="tc" value="<?php print $person->tc; ?>"  maxlength="11" data-lenght="11" >
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
                            <input type="text" class="form-control required" id="association_number" value="<?php print $person->association_number; ?>"  maxlength="20" data-lenght="20" >
                            <div class="invalid-feedback">
                                Lütfen dernek no giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Pasaport No</label>
                            <input type="text" class="form-control" id="passport_number" value="<?php print $person->passport_number; ?>"  maxlength="20" data-lenght="20" >
                        </div>
                    </div><!-- col -->
				</div><!-- row -->
                <div class="form-row">
                    <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Ad</label>
                            <input type="text" class="form-control required" id="name" value="<?php print $person->name; ?>"  maxlength="50" data-lenght="50" >
                            <div class="invalid-feedback">
                                Lütfen ad giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Soyad</label>
                            <input type="text" class="form-control required" id="surname" value="<?php print $person->surname; ?>"  maxlength="50" data-lenght="50" >
                            <div class="invalid-feedback">
                                Lütfen soyad giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
				</div><!-- row -->
				<div class="form-row">
                    <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Mesleği</label>
                            <input type="text" class="form-control required" id="job"  value="<?php print $person->job; ?>"  maxlength="50" data-lenght="50" >
                            <div class="invalid-feedback">
                                Lütfen meslek giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12"  maxlength="50" data-lenght="50" >
                        <div class="form-group">
                            <label>Eğitim Seviyesi</label>
                            <input type="text" class="form-control required"  value="<?php print $person->education; ?>"  id="education">
                            <div class="invalid-feedback">
                                Lütfen Eğitim Seviyesi giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
				</div><!-- row -->
				<div class="form-row">
                    <div class="col col-lg-6 col-md-12 col-sm-12 col-12"  maxlength="50" data-lenght="50" >
                        <div class="form-group">
                            <label>Doğum Tarihi</label>
                            <input type="text" class="form-control required" value="<?php print $person->birthdate; ?>" id="birthdate">
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
        <button type="button" class="btn btn-primary" onclick="formSend();">Güncelle</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Genel Bilgiler -->


<!-- Modal Telefon Ekle -->
<div class="modal fade" id="phoneInsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Telefon Ekle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form>
				 <div class="form-row">
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>İletişim Adı</label>
                            <input type="text" class="form-control required" id="phoneName"  maxlength="30" data-lenght="30" >
                            <div class="invalid-feedback">
                                Lütfen iletişim adı giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Telefon</label>
                            <input type="text" class="form-control required" id="phoneValue"  maxlength="10" data-lenght="10" >
                            <div class="invalid-feedback">
                                Lütfen telefon giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					
				</div><!-- row -->
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
        <button type="button" class="btn btn-primary" onclick="formPhoneInsertSend();">Ekle</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Telefon Ekle -->


<!-- Modal Telefon Düzenle -->
<div class="modal fade" id="phoneUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Telefon Güncelle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="phoneUpdateForm">
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
        <button type="button" class="btn btn-primary" onclick="formPhoneUpdateSend();">Güncelle</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Telefon Düzenle -->


<!-- Modal Adres Ekle -->
<div class="modal fade" id="addressInsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adres Ekle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form>
				 <div class="form-row">
					<div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>İletişim Adı</label>
                            <input type="text" class="form-control required" id="addressName"  maxlength="30" data-lenght="30" >
                            <div class="invalid-feedback">
                                Lütfen iletişim adı giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					</div><!-- row -->
					<div class="form-row">
					<div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Adres</label>
                            <textarea class="form-control required" id="addressValue"></textarea>
                            <div class="invalid-feedback">
                                Lütfen adres giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					
				</div><!-- row -->
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
        <button type="button" class="btn btn-primary" onclick="formAddressInsertSend();">Ekle</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Adres Ekle -->

<!-- Modal Adres Güncelle -->
<div class="modal fade" id="addressUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adres Güncelle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="addressUpdateForm">
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
        <button type="button" class="btn btn-primary" onclick="formAddressUpdateSend();">Güncelle</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Adres Güncelle -->




<!-- Modal Ölçü Ekle -->
<div class="modal fade" id="measuresInsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ölçü Ekle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form>
				 <div class="form-row">
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Ayakkabı Numarası</label>
                            <input type="text" class="form-control required" id="shoeSizeValue"  maxlength="30" data-lenght="30" >
                            <div class="invalid-feedback">
                                Lütfen ayakkabı numarası giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Beden</label>
                            <input type="text" class="form-control required" id="bodySizeValue"  maxlength="10" data-lenght="10" >
                            <div class="invalid-feedback">
                                Lütfen beden giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					
				</div><!-- row -->
				<div class="form-row">
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Boy</label>
                            <input type="text" class="form-control required" id="heightValue"  maxlength="30" data-lenght="30" >
                            <div class="invalid-feedback">
                                Lütfen boy giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Ağırlık</label>
                            <input type="text" class="form-control required" id="weightValue"  maxlength="10" data-lenght="10" >
                            <div class="invalid-feedback">
                                Lütfen ağırlık giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
					
				</div><!-- row -->
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
        <button type="button" class="btn btn-primary" onclick="formMeasuresInsertSend();">Ekle</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Ölçü Ekle -->


<!-- Modal Ölçü Güncelle -->
<div class="modal fade" id="measuresUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ölçü Güncelle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="measuresUpdateForm">
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
        <button type="button" class="btn btn-primary" onclick="formMeasuresUpdateSend();">Güncelle</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Ölçü Güncelle -->








