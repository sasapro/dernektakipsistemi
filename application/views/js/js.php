
$(function(){
	 //called when key is pressed in textbox
  $('input[data-type=number]').keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
               return false;
    }
   });
   
   $(".form-group").each(function() {
  
  var $inp = $(this).find("input"),
      $cle = $(this).find(".fa-times-circle");

  $inp.on("input", function(){
    $cle.toggle(!!this.value);
  });
  
  $cle.on("touchstart click", function(e) {
    e.preventDefault();
    $inp.val("").trigger("input");
  });
  
});
   
   
});

/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    $(".mobile-menu-icon").attr("onclick","closeNav()");
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    $(".mobile-menu-icon").attr("onclick","openNav()");
}

function ValidateIPaddress(ipaddress) {
    if (/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(ipaddress)) {
        return (true)
    }
    return (false)
}

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validateUsername(username) {
    var re = /^[a-zA-Z0-9]+$/;
    return re.test(username);
}



function warningShow(a){
    $(a).parent().find('.invalid-feedback').show();
}
function warningHide(a){
    $(a).parent().find('.invalid-feedback').hide();
}

function formControl(){
    var formData = "";
    var i=0;
    var required=0;
    var type;
    var value;
    var datalength;
    $(".required").each(function(){

        value = $(this).val();
        type = $(this).attr("data-type");
        datalength = $(this).attr("data-length");

        if(type=='username' && !validateUsername(value)){
            warningShow(this);
        }else if(type=='email' && !validateEmail(value)){
            warningShow(this);
        }else if(type=='number' && (isNaN(value) || value == "") || (datalength && datalength!=value.length) ){
            warningShow(this);
        }else if(type=='ip' && !ValidateIPaddress(value)){
            warningShow(this);
        }else if(value == ""){
            warningShow(this);
        }else{
            warningHide(this);
            required++;
        }
        i++;
    });


    if(i==required)
        return true;
    else
        return false

}

function formAlert(status,message){
	if(status==1){
		$('.alert').html(message).prepend('<i class="fas fa-check-circle"></i> ').css('color','#155724').show();
		setTimeout(function(){ $('.alert').hide(); }, 6000);
	}else{
		$('.alert').html(message).prepend('<i class="fas fa-times-circle"></i> ').css('color','#721c24').show();
		setTimeout(function(){ $('.alert').hide(); }, 6000);
	}
}



/* Liste İşlemleri Başlangıç */
function ajaxList(url){
		jQuery.ajax({
			type: 'POST',
			url: '<?php echo site_url(); ?>'+url+'/1',
			success: function(e){  	
				$("#ajaxList").html(e); 
			},});
		}
		
function ajaxListRefresh(url,id){
		jQuery.ajax({
			type: 'POST',
			url: '<?php echo site_url(); ?>'+url,
			success: function(e){  	
				$(id).html(e); 
			},});
		}
function ajaxListAppend(limit,url){
		jQuery.ajax({
		type: 'POST',
url: '<?php echo site_url(); ?>'+url+'/'+limit,
success: function(e){
	$("#ajaxList").append(e);
},});
}
/* Liste İşlemleri Bitiş */



function ajaxListDelete(url,yUrl){
var selected = Array();
$(':checkbox:checked[name^=selected]').val(function() {
selected.push(this.value);
});
var dataString = 'toplam='+ selected.length;
if(selected.length==0){
alert("Lütfen en az bir kayıt seçiniz!");
}else{
function dongu(value, index, ar){
dataString += '&selected['+index+']='+ value;
}
selected.forEach(dongu);
jQuery.ajax({
type: 'POST',
url: '<?php echo site_url(); ?>'+url,
data: dataString,
success: function(e){
if(e==1){ ajaxList(yUrl); formAlert(1,'Silme işlemi Başarıyla Gerçekleştirildi.'); }
else if(e==0){ formAlert(0,'HATA! Silme işlemi Başarısız...');
}else{ alert(e); }
},
});
}
}



