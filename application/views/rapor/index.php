<?php
$ajaxUrl = "rapor/liste/1";
?>
<script type="text/javascript">
$(function(){
		ajaxList('<?php echo $ajaxUrl; ?>');
		
		var count = 2;
          $(window).scroll(function() {
			if($(window).scrollTop() >= ($(document).height() - $(window).height())-10){
			ajaxListAppend(count,'rapor/liste');
                     count++;
                  }
          });


   });
   

</script>
<div class="container-fluid">
<div class="row titleBar">
<div class="col-md-8"><h1>Raporlar</h1></div>
</div>
    <div class="row">
        <div class="col-md-12">
            <form action="<?php print site_url(); ?>rapor" method="GET">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="name">Ad</label>
                        <input type="text" class="form-control" id="name" name="name"  value="<?php print @$_GET['name']; ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="surname">Soyad</label>
                        <input type="text" class="form-control" id="surname" name="surname" value="<?php print @$_GET['surname']; ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="association_number">Vakıf No</label>
                        <input type="text" class="form-control" id="association_number" name="association_number" value="<?php print @$_GET['association_number']; ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="tc">Tc</label>
                        <input type="text" class="form-control" id="tc" name="tc" value="<?php print @$_GET['tc']; ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="phone">Telefon</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?php print @$_GET['phone']; ?>">
                    </div>
                    <div class="form-group col-md-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="oksuz" name="oksuz" <?php if(@$_GET['oksuz']==1) print 'checked'; ?>>
                            <label class="form-check-label" for="oksuz">
                                Öksüz
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="yetim" name="yetim" <?php if(@$_GET['yetim']==1) print 'checked'; ?>>
                            <label class="form-check-label" for="yetim">
                                Yetim
                            </label>
                        </div>

                    </div>
                    <div class="form-group col-md-1">
                        <button type="submit" class="btn btn-primary btn-sm">Filtrele</button>
                        <a href="<?php print site_url(); ?>rapor" class="btn btn-secondary btn-sm" style="margin-top: 2px;">Temizle</a>
                    </div>
                </div><!-- form-row -->
            </form>
        </div><!-- col -->
    </div><!-- row -->
<div class="row">
<div class="col-md-12">
  <div class="accordion" id="accordionExample">


    <?php
    $personGroupID = "";
    foreach($reports AS $report){
        if($personGroupID != $report["pgid"]):
            if($personGroupID!="")
                print  '</tbody></table></div></div></div>';
        ?>
      <div class="card">
          <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#group<?php print $report["pgid"]; ?>" aria-expanded="true" aria-controls="collapseOne">
                      <?php print $report["group_name"]; ?>
                  </button>
              </h5>
          </div>

          <div id="group<?php print $report["pgid"]; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
        <table class="table" id="table">
            <thead>
            <tr>
                <th>Ad, Soyad</th>
                <th>Vakıf No</th>
                <th>Uyruk</th>
                <th>TC</th>
                <th>Meslek</th>
                <th>Telefon</th>
            </tr>
            </thead>
            <tbody>
<?php endif; ?>
            <tr>
                <td><?php print $report['name'].' '.$report['surname']; ?></td>
                <td><?php print $report['association_number']; ?></td>
                <td><?php print $report['nationality']; ?></td>
                <td><?php print $report['tc']; ?></td>
                <td><?php print $report['job']; ?></td>
                <td><?php print $report['phone']; ?></td>
            </tr>



    <?php
    $personGroupID = $report["pgid"];
    } ?>


            </tbody></table></div></div></div>

</div><!-- accordion -->

</div><!-- col -->
</div><!-- row -->

</div><!-- container -->