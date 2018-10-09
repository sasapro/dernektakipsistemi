<?php
$ajaxUrl = "yardim/liste/".$pgid."/1";
?>
<script type="text/javascript">
$(function(){
		ajaxList('<?php echo $ajaxUrl; ?>');
		
		var count = 2;
          $(window).scroll(function() {
			if($(window).scrollTop() >= ($(document).height() - $(window).height())-10){
			ajaxListAppend(count,'yardim/liste/<?php print $pgid; ?>');
                     count++;
                  }
          });

    $('#donation_date').datepicker({
        format: 'yyyy-mm-dd',
        firstDay: 1,
        language: 'tr'
    });
          $('#donation_dateUpdate').datepicker({
        format: 'yyyy-mm-dd',
        firstDay: 1,
        language: 'tr'
    });


   });
   
   
    function formSend(){
        var control = formControl();

        if(control){
            var donation_date = document.getElementById("donation_date").value;
            var donor = document.getElementById("donor").value;
			var dtid = document.getElementById("dtid").value;
            var description = document.getElementById("description").value;
            var pgid = document.getElementById("pgid").value;


            var dataString = 'donation_date='+ donation_date + '&donor=' + donor + '&dtid=' + dtid + '&description=' + description + '&pgid=' + pgid;
            jQuery.ajax({
                type: 'POST',
                url: '<?php print site_url(); ?>yardim/donationInsert',
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

function donationUpdateForm(id)
{
    jQuery.ajax({
        type: 'POST',
        url: '<?php print site_url(); ?>yardim/donationUpdateForm/<?php print $pgid; ?>/'+id,
        success: function(e){
            $("#updateForm").html(e);
        },
    });
}

function formUpdateSend(){

    var did = document.getElementById("didUpdate").value;
    var donation_date = document.getElementById("donation_dateUpdate").value;
    var donor = document.getElementById("donorUpdate").value;
    var dtid = document.getElementById("dtidUpdate").value;
    var description = document.getElementById("descriptionUpdate").value;
    var pgid = document.getElementById("pgidUpdate").value;




        var dataString = 'did='+ did + '&donation_date='+ donation_date + '&donor=' + donor + '&dtid=' + dtid + '&description=' + description  + '&pgid=' + pgid;
        jQuery.ajax({
            type: 'POST',
            url: '<?php print site_url(); ?>yardim/donationUpdate',
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
        ajaxListDelete('yardim/sil','<?php echo $ajaxUrl; ?>');
}

</script>
<div class="container-fluid">
<div class="row titleBar">
<div class="col-md-8"><h1><?php if($pgid!=0) print person_group_item_pull($pgid,'name')->name.' - '; ?> Yardımlar</h1></div>
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
	<th>Yardım Tarihi</th>
	<th>Yardım Yapan</th>
	<th>Açıklama</th>
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
                            <label>Yardım Tarihi</label>
                            <input type="text" class="form-control required" id="donation_date" >
                            <div class="invalid-feedback">
                                Lütfen Yardım Tarihi giriniz.
                            </div>
                        </div>
                    </div><!-- col -->



				</div><!-- row -->
				<div class="form-row">
                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Yardım Eden</label>
                            <input type="text" class="form-control required" id="donor" >
                            <div class="invalid-feedback">
                                Lütfen Yardım Edeni giriniz.
                            </div>
                        </div>
                    </div><!-- col -->
                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label>Yardım Türü</label>
                            <select  class="form-control required" id="dtid" >
                            <?php foreach($donationTypes AS $donationType){
                                print '<option value="'.$donationType['dtid'].'">'.$donationType['name'].'</option>';
                            } ?>
                            </select>
                            <div class="invalid-feedback">
                                Lütfen Yardım Türü seçiniz.
                            </div>
                        </div>
                    </div><!-- col -->
				</div><!-- row -->

              <div class="form-row">
                  <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                      <div class="form-group">
                          <label>Açıklama</label>
                          <textarea class="form-control required" id="description"></textarea>
                          <div class="invalid-feedback">
                              Lütfen Açıklama giriniz.
                          </div>
                      </div>
                  </div><!-- col -->



              </div><!-- row -->

              <div class="form-row">
                  <div class="col col-lg-12 col-md-12 col-sm-12 col-12" >
                      <div class="form-group">
                          <label>Aile Tanımla</label>
                          <select id="pgid"  class="form-control js-example-basic-single" style="width: 100%;">
                              <?php if($pgid==0): ?>
                                  <option>-Lütfen Aile Seçiniz-</option>
                              <?php endif; ?>
                              <?php foreach($personGroups AS $personGroup): ?>
                                  <option value="<?php print $personGroup['pgid']; ?>" ><?php print $personGroup['name']; ?></option>
                              <?php endforeach; ?>
                          </select>
                          <div class="invalid-feedback">
                              Lütfen bir aile seçiniz.
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
