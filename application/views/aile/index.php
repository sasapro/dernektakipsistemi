<?php
$ajaxUrl = "aile/liste/1";
?>
<script type="text/javascript">
$(function(){
		ajaxList('<?php echo $ajaxUrl; ?>');
		
		var count = 2;
          $(window).scroll(function() {
			if($(window).scrollTop() >= ($(document).height() - $(window).height())-10){
			ajaxListAppend(count,'aile/liste');
                     count++;
                  }
          }); 	
   });
   
   
    function formSend(){
        var control = formControl();

        if(control){
            var name = document.getElementById("name").value;
            var yetim = document.getElementById("yetim").checked;
            if(yetim)
                yetim = 1;
            else
                yetim = 0;
			var oksuz = document.getElementById("oksuz").checked;
            if(oksuz)
                oksuz = 1;
            else
                oksuz = 0;

            var dataString = 'name='+ name + '&yetim=' + yetim + '&oksuz=' + oksuz;
            jQuery.ajax({
                type: 'POST',
                url: '<?php print site_url(); ?>aile/personGroupInsert',
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

function personGroupUpdateForm(id)
{
    jQuery.ajax({
        type: 'POST',
        url: '<?php print site_url(); ?>aile/personGroupUpdateForm/'+id,
        success: function(e){
            $("#updateForm").html(e);
        },
    });
}

function formUpdateSend(){

        var pgid = document.getElementById("pgidUpdate").value;
        var name = document.getElementById("nameUpdate").value;
        var yetim = document.getElementById("yetimUpdate").checked;
        if(yetim)
            yetim = 1;
        else
            yetim = 0;
        var oksuz = document.getElementById("oksuzUpdate").checked;
        if(oksuz)
            oksuz = 1;
        else
            oksuz = 0;



        var dataString = 'pgid='+ pgid + '&name='+ name + '&yetim=' + yetim + '&oksuz=' + oksuz;
        jQuery.ajax({
            type: 'POST',
            url: '<?php print site_url(); ?>aile/personGroupUpdate',
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
        ajaxListDelete('aile/sil','<?php echo $ajaxUrl; ?>');
}
</script>
<div class="container-fluid">
<div class="row titleBar">
<div class="col-md-8"><h1>Aileler</h1></div>
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
	<th>Aile Adı</th>
	<th>Öksüz</th>
	<th>Yetim</th>
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
                            <label>Ad</label>
                            <input type="text" class="form-control required" id="name"  maxlength="50" data-lenght="50" >
                            <div class="invalid-feedback">
                                Lütfen ad giriniz.
                            </div>
                        </div>
                    </div><!-- col -->

				</div><!-- row -->
				<div class="form-row">
                    <div class="col col-lg-6 col-md-12 col-sm-12 col-12" >
                        <div class="form-group">
                            <label>Öksüz</label>
                            <input type="checkbox" value="1" class="form-control" id="oksuz">
                        </div>
                    </div><!-- col -->
					<div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Yetim</label>
                            <input type="checkbox" value="1" class="form-control" id="yetim"  >
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
                <h5 class="modal-title" id="exampleModalLabel">Yeni Ekle</h5>
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
