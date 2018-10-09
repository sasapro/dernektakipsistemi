<?php
$ajaxUrl = "user/list/1";
?>
<script type="text/javascript">
$(function(){
		ajaxList('<?php echo $ajaxUrl; ?>');
		
		var count = 2;
          $(window).scroll(function() {
			if($(window).scrollTop() >= ($(document).height() - $(window).height())-10){
			ajaxListAppend(count,'user/list/');
                     count++;
                  }
          });


   });
   
   
    function formSend(){


            var username = document.getElementById("username").value;
            var mail = document.getElementById("mail").value;
			var password = document.getElementById("password").value;
            var name = document.getElementById("name").value;
            var surname = document.getElementById("surname").value;
            var rid = document.getElementById("rid").value;


            var dataString = 'username='+ username + '&mail=' + mail + '&password=' + password + '&name=' + name + '&surname=' + surname + '&rid=' + rid;
            jQuery.ajax({
                type: 'POST',
                url: '<?php print site_url(); ?>user/insert',
                data: dataString,
                success: function(e){
                    if(e)
                        location.reload();
                    else
                        alert("İşlem gerçekleştirilemedi. Lütfen sistem yöneticisi ile görüşünüz.");
                },
            });



    }

function updateForm(id)
{
    jQuery.ajax({
        type: 'POST',
        url: '<?php print site_url(); ?>user/updateForm/'+id,
        success: function(e){
            $("#updateForm").html(e);
        },
    });
}

function formUpdateSend(){

    var uid = document.getElementById("uidUpdate").value;
    var username = document.getElementById("usernameUpdate").value;
    var mail = document.getElementById("mailUpdate").value;
    var password = document.getElementById("passwordUpdate").value;
    var name = document.getElementById("nameUpdate").value;
    var surname = document.getElementById("surnameUpdate").value;
    var rid = document.getElementById("ridUpdate").value;




        var dataString = 'uid='+ uid + '&username='+ username + '&mail=' + mail + '&password=' + password + '&name=' + name + '&surname=' + surname + '&rid=' + rid;
        jQuery.ajax({
            type: 'POST',
            url: '<?php print site_url(); ?>user/update',
            data: dataString,
            success: function(e){
                if(e)
                    location.reload();
                else
                    alert("İşlem gerçekleştirilemedi. Lütfen sistem yöneticisi ile görüşünüz.");
            }
        });

}

function sil()
{
    var onay = window.confirm("UYARI! Bu işlem kesinlikle geri alınamaz. Silmek istediğinize emin misiniz?");
    if(onay)
        ajaxListDelete('user/delete','<?php echo $ajaxUrl; ?>');
}

</script>
<div class="container-fluid">
<div class="row titleBar">
<div class="col-md-8"><h1>Kullanıcılar</h1></div>
<div class="col-md-4 buttons"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#ekle">Yeni Ekle</button> <button onclick="sil();" type="button" class="btn btn-danger">Sil</button></div>
</div>
<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-body">
<table class="table" id="table">
<thead>
<tr>
    <th><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);"></th>
	<th>Kullanıcı Adı</th>
	<th>Ad Soyad</th>
	<th>E-Posta</th>
    <th>Rol</th>
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
                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Kullanıcı Adı</label>
                            <input type="text" class="form-control required" id="username" >
                            <div class="invalid-feedback">
                                Lütfen Kullanıcıadı giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>E-Posta</label>
                            <input type="text" class="form-control required" id="mail" >
                            <div class="invalid-feedback">
                                Lütfen E-Posta giriniz.
                            </div>
                        </div>
                    </div><!-- col -->


				</div><!-- row -->
				<div class="form-row">
                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Ad</label>
                            <input type="text" class="form-control required" id="name" >
                            <div class="invalid-feedback">
                                Lütfen Ad giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Soyad</label>
                            <input type="text" class="form-control required" id="surname" >
                            <div class="invalid-feedback">
                                Lütfen Soyad giriniz
                            </div>
                        </div>
                    </div><!-- col -->
				</div><!-- row -->

              <div class="form-row">
                  <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="form-group">
                          <label>Parola</label>
                          <input type="password" class="form-control required" id="password" >
                          <div class="invalid-feedback">
                              Lütfen Parola giriniz
                          </div>
                      </div>
                  </div><!-- col -->



              </div><!-- row -->

              <div class="form-row">
                  <div class="col col-lg-12 col-md-12 col-sm-12 col-12" >
                      <div class="form-group">
                          <label>Rol</label>
                          <select id="rid"  class="form-control js-example-basic-single" style="width: 100%;">
                            <?php
                            foreach($roles AS $role):
                                print '<option value="'.$role["rid"].'">'.$role["name"].'</option>';
                            endforeach;
                            ?>
                          </select>
                          <div class="invalid-feedback">
              Lütfen bir rol seçiniz.
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


<!-- Modal Düzenle -->
<div class="modal fade" id="duzenle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Düzenle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="updateForm">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-primary" onclick="formUpdateSend();">Güncelle</button>
            </div>
        </div>
    </div>
</div>
