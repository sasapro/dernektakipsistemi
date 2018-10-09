<div class="container-fluid">
<div class="row titleBar">
<div class="col-md-8"><h1>Raporlar</h1></div>
</div>
    <div class="row">
        <div class="col-md-12">
            <form action="<?php print site_url(); ?>rapor/yardim" method="GET">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="name">Gün</label>
                            <select class="form-control" id="day" name="day">
                             <option value="0">--</option>
                            <option value="7" <?php if($day==7) print "selected"; ?>>Son 7 Gün</option>
                            <option value="30" <?php if($day==30) print "selected"; ?>>Son 30 Gün</option>
                            <option value="60" <?php if($day==60) print "selected"; ?>>Son 2 Ay</option>
                            <option value="90" <?php if($day==90) print "selected"; ?>>Son 3 Ay</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="surname">Yardım Türü</label>
                        <select class="form-control" id="type" name="type">
                            <option value="0">--</option>
                        <?php
                            foreach($donationTypes AS $donationType):
                                print '<option value="'.$donationType['dtid'].'"';
                                    if($donationType['dtid']==$dtid)
                                        print ' selected ';
                                print ' >'.$donationType["name"].'</option>';
                            endforeach;
                        ?>
                        </select>
                    </div>

                    <div class="form-group col-md-1">
                        <button type="submit" class="btn btn-primary btn-sm">Filtrele</button>
                        <a href="<?php print site_url(); ?>rapor/yardim" class="btn btn-secondary btn-sm" style="margin-top: 2px;">Temizle</a>
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
            </tr>



    <?php
    $personGroupID = $report["pgid"];
    } ?>


            </tbody></table></div></div></div>

</div><!-- accordion -->

</div><!-- col -->
</div><!-- row -->

</div><!-- container -->