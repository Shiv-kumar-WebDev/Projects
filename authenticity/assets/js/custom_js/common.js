$(document).ready(function(){
      $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });
    });
    

function Subscribe(){
    var token = $("input[name=_token]").val();
    var sub_email =($('#sub_email').val()?$('#sub_email').val():'');
    if(sub_email){
      if(isEmail(sub_email)==false){
        // alert('Email id is empty')
        swal({
          type: 'warning',
          title: 'Invalid Email.',
          showConfirmButton: false,
          timer: 2000
        });
      }else{
        var url="landing/addSubscriber";
        data={sub_email:sub_email,"_token": token};
        var pro = viewDetailsByData(data,url);
        pro.then(function (obj){
            if(obj.err==1){
              swal({
                type: 'warning',
                title: 'Already Subscribed.',
                showConfirmButton: false,
                timer: 2000
              });
            }
            if(obj.err==0){
              swal({
                type: 'success',
                title: 'Subscription Request Send.',
                showConfirmButton: false,
                timer: 2000
              });
              $('#sub_email').val('')
            }
            if(obj.err==2){
              swal({
                type: 'warning',
                title: 'Error.',
                showConfirmButton: false,
                timer: 2000
              });
              $('#sub_email').val('')
            }
        }); 
      }
    }else{
      swal({
        type: 'warning',
        title: 'Email id is empty.',
        showConfirmButton: false,
        timer: 2000
      });
    }
  }

 function saveContactUs(formId,url){
   $('.err-msg').remove();
    var form = $('#'+formId)[0];
    var formData = new FormData(form);
    $.ajax({
      url: base_url+url,
      type: "POST",
      dataType: "json",
      contentType: false,
      processData: false,
      data: formData,
      beforeSend: function(){
        //showLoader();
      }, 
      success: function (obj)
      {
      console.log('fdsfdf')
      hideLoader();
      if (obj.err == 0)
        {
        appendMessageBody(formId);
        showSuccessMessage(formId,obj.msg);
          setTimeout(function(){
            $('#login-form-link').click();
          },2000)
       
        }

        if (obj.err == 1)
        {          
          showErrorMessage(formId,obj.msg);   
        }
        if (obj.err == 2)
        { 
          appendMessageBody(formId);
          showDatabaseErrorMessage(formId,obj.msg);  
        }
      }
    });
  }

  function isEmail(sub_email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(sub_email);
  }


 
  function  login(){
    $('.err-msg').remove();
    formId = 'loginForm';
    url = 'landing/doLogin';
    var form = $('#'+formId)[0];
    var formData = new FormData(form);
    $.ajax({
      url: base_url+url,
      type: "POST",
      dataType: "json",
      contentType: false,
      processData: false,
      data: formData,
      beforeSend: function(){
        showLoader();
      }, 
      success: function (obj)
      {
      //console.log('fdsfdf')
      hideLoader();
      if (obj.err == 0)
        {
        appendMessageBody(formId);
        $('#loginBtn').click();
        }

        if (obj.err == 1)
        {          
          showErrorMessage(formId,obj.msg);   
        }
        if (obj.err == 2)
        { 
          appendMessageBody(formId);
          showDatabaseErrorMessage(formId,obj.msg);  
        }
      }
    });
  }

  function  signup(){
    $('.err-msg').remove();
    formId = 'signupform';
    url = 'landing/dosignup';

    var form = $('#'+formId)[0];
    var formData = new FormData(form);
    $.ajax({
      url: base_url+url,
      type: "POST",
      dataType: "json",
      contentType: false,
      processData: false,
      data: formData,
      beforeSend: function(){
        //showLoader();
      }, 
      success: function (obj)
      {
      //console.log('fdsfdf')
      hideLoader();
      if (obj.err == 0)
        {
        
        appendMessageBody(formId);
        showSuccessMessage(formId,obj.msg);
        
       
        }

        if (obj.err == 1)
        {          
          showErrorMessage(formId,obj.msg);   
        }
        if (obj.err == 2)
        { 
          appendMessageBody(formId);
          showDatabaseErrorMessage(formId,obj.msg);  
        }
      }
    });
  }

  function applyCareerForm(formId,url){
    
    var form = $('#'+formId)[0];
    var formData = new FormData(form);
    $.ajax({
      url: base_url+url,
      type: "POST",
      dataType: "json",
      contentType: false,
      processData: false,
      data: formData,
      beforeSend: function(){
        showLoader();
      }, 
      success: function (obj)
      {
      hideLoader();
        if (obj.err == 0)
        {
        appendMessageBody(formId);
        showSuccessMessage(formId,obj.msg);
        }

        if (obj.err == 1)
        {          
          showErrorMessage(formId,obj.msg);   
        }
        if (obj.err == 2)
        { 
          appendMessageBody(formId);
          showDatabaseErrorMessage(formId,obj.msg);  
        }
      }
    });
  }

  function getprofile(){
    var token = $("input[name=_token]").val();
    var url="landing/getprofile";
    data={"_token": token};
    var pro = viewDetailsByData(data,url);
    pro.then(function (obj){
      //console.log(obj['users'][0])

      
    $('#updatedId').val(obj['users'][0].id)
    $('#name').val(obj['users'][0].name);
    $('.profileName').text(obj['users'][0].name)
    $('#email').val(obj['users'][0].email)
    $('.profileEmail').text(obj['users'][0].email)
    $('#mobile').val(obj['users'][0].mobile)
      //alert(obj['users'][0].gender)

    if(obj['users'][0].gender)
      {
        var $radios = $('input:radio[name=gender]');
        $radios.filter('[value='+obj['users'][0].gender+']').prop('checked', true);
      }
      if(obj['users'][0].profile_image){

        if((obj['users'][0].profile_image)){
          $('#imgbox_0').attr('src',obj['users'][0].profile_image);
          $('#profile_img_old').val(obj['users'][0].profile_image);
          $('.profileImage').attr('src',obj['users'][0].profile_image);
        }else{
          $('#imgbox_0').attr('src',base_url+"assets/images/noimage.png");
          $('.profileImage').attr('src',base_url+"assets/images/noimage.png");
          $('#profile_img_old').val('') 
        }
        
        
      }else{
        $('#imgbox_0').attr('src',base_url+"assets/images/noimage.png");
        $('.profileImage').attr('src',base_url+"assets/images/noimage.png");
        $('#profile_img_old').val('')
      }
      if(obj['users'][0].status==1){
        $('#accountActv').html('<a href="javascript:void(0);" onclick="deactivateMyAccount('+obj['users'][0].id+','+obj['users'][0].status+');"><b>Deactivate Account ?</b></a>');
      }else{
        $('#accountActv').html('<a href="javascript:void(0);" onclick="deactivateMyAccount('+obj['users'][0].id+','+obj['users'][0].status+');" style="color:red;"><b> Activate Account ? </b></a>'); 
      }
      //
    
      // if (obj.err == 0)
      // {
      // appendMessageBody(formId);
      // showSuccessMessage(formId,obj.msg);
      // }

      // if (obj.err == 1)
      // {          
      //   showErrorMessage(formId,obj.msg);   
      // }
      // if (obj.err == 2)
      // { 
      //   appendMessageBody(formId);
      //   showDatabaseErrorMessage(formId,obj.msg);  
      // }
    }); 
  }

  function showimagepreview(input,count) {

  var fuData = input;
    var FileUploadPath = fuData.value;
  var Extension = FileUploadPath.substring(
                FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
  if (Extension == "gif" || Extension == "png" || Extension == "bmp"|| Extension == "jpeg" || Extension == "jpg")
     {
      if (input.files && input.files[0]) {
        var filerdr = new FileReader();
        filerdr.onload = function(e) {
          $('#imgbox_'+count).attr('src', e.target.result);
        //console.log($('#imgbox_'+count).attr('src', e.target.result));
        }
        filerdr.readAsDataURL(input.files[0]);
      }
    }else{
      alert('Invalid Image.');
      $('#imgbox_'+count).attr('src',base_url+'assets/images/noimage.png');
    }   
}

function doUpdateProfile(formId,url){
  var form = $('#'+formId)[0];
    var formData = new FormData(form);
    $.ajax({
      url: base_url+url,
      type: "POST",
      dataType: "json",
      contentType: false,
      processData: false,
      data: formData,
      beforeSend: function(){
        showLoader();
      }, 
      success: function (obj)
      {
      hideLoader();
        if (obj.err == 0)
        {
        appendMessageBody(formId);
        showSuccessMessage(formId,obj.msg);
          setTimeout(function(){ 
            getprofile();
          },1000)
        }

        if (obj.err == 1)
        {          
          showErrorMessage(formId,obj.msg);
          setTimeout(function(){ 
           //getprofile();
          },1000)
          
        }
        if (obj.err == 2)
        { 
          appendMessageBody(formId);
          showDatabaseErrorMessage(formId,obj.msg);  
        }
      }
    });
}

function  loginUser(){
    $('.err-msg').remove();
    formId = 'loginForm';
    url = 'landing/doUserLogin';
    var form = $('#'+formId)[0];
    var formData = new FormData(form);
    $.ajax({
      url: base_url+url,
      type: "POST",
      dataType: "json",
      contentType: false,
      processData: false,
      data: formData,
      beforeSend: function(){
        showLoader();
      }, 
      success: function (obj)
      {
      //console.log('fdsfdf')
      hideLoader();
      if (obj.err == 0)
        {
        setTimeout(function(){
          location.reload();
        },1000)
       
        }
      }
    });
  }


function deactivateMyAccount(userId,status){
  var token = $("input[name=_token]").val();
  if(status==1){
    confirm = "Do you wat to Deactivate ?";
    sucMsg = "Successfully Deactivated ?";
  }else{
    confirm = "Do you wat to Activate ?";
     sucMsg = "Successfully Activated ?";
  }
  swal({
    title: confirm,
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: 'btn-success',
    confirmButtonText: 'Yes !',
    cancelButtonClass: "btn-danger",
    cancelButtonText: "No, cancel !",
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm){
    if (isConfirm){
      $.post(base_url + 'landing/deactivateMyAccount', { 'id':userId,"_token":token})
      .done(function(response){
          console.log(response);
          swal({
            type: 'success',
            title: sucMsg,
            showConfirmButton: false,
            timer: 2000
          });
            setTimeout(function(){
             getprofile()
            },1000)
        })
      .fail(function(){
        swal({type:"error", title:"Something went wrong.",showConfirmButton: false,timer: 1000});
      })
    }else{
      swal({type:"error", title:"Your Account is safe.",showConfirmButton: false,timer: 1000});
    }
  });
}
//   $(document).on('click', '#uploadImagIcon', function(){
// 

//   });

function forgetPassword(){
  lockModal('forgetPasswordModal');
  showModal('forgetPasswordModal'); 
  $('#resetPassword').hide(); 
}

function forgetPasswordSubmit(){

  formId = 'loginForm_First';
  var email=$('#femail').val();
  var token = $("input[name=_token]").val();
  data={email:email,"_token":token};
    var url="landing/sendMailResetPassword";
    //showLoader();
    var pro = viewDetailsByData(data,url);
    pro.then(function (obj){
       //hideLoader();
        if(obj.err==0){
          appendMessageBody(formId);
          showSuccessMessage(formId,obj.msg); 
        }

        if(obj.err==1){
          showErrorMessage(formId,obj.msg);  
        }
        if(obj.err==2){
          appendMessageBody(formId);
          showDatabaseErrorMessage(formId,obj.msg); 
        } 
    });
}

function doReset(formId,url){
    var form = $('#'+formId)[0];
    var formData = new FormData(form);

    $.ajax({
        url: base_url+url,
        type: "POST",
        dataType: "json",
        contentType: false,
        processData: false,
        data: formData,
         beforeSend: function(){
        showLoader();
            }, 
        success: function (obj)
        {

        hideLoader();
        if (obj.err == 0)
          {
          appendMessageBody(formId);
          showSuccessMessage(formId,obj.msg); 
            setTimeout(function(){
              window.location=base_url+"landing/login";
            },2000)
          }
          if (obj.err == 1)
          {   
          showErrorMessage(formId,obj.msg);          
          }
      
          if (obj.err == 2)
          {
            appendMessageBody(formId);
            showDatabaseErrorMessage(formId,obj.msg);  
          }
      
      }
    });
  }

  function change_password(){
    lockModal('changePassword');
    showModal('changePassword'); 
  }

function changePassword(formId,url){ 
var form = $('#'+formId)[0];
var formData = new FormData(form);

$.ajax({
  url: base_url+url,
  type: "POST",
  dataType: "json",
  contentType: false,
  processData: false,
  data: formData,
   beforeSend: function(){
  //showLoader();
    }, 
  success: function (obj)
  {

    hideLoader();
    if (obj.err == 0)
      {
        appendMessageBody(formId);
        showSuccessMessage(formId,obj.msg);
       
        setTimeout(function(){
          close_modal('changePassword');
        },2000)
          // setTimeout(function(){
          //   window.location=base_url+"landing/logout";
          // },2000)
      
      }

      if (obj.err == 1)
      {  
        showErrorMessage(formId,obj.msg);           
      }

      if (obj.err == 2)
      {
        appendMessageBody(formId);
        showDatabaseErrorMessage(formId,obj.msg);  
      }

    }
  });
}

 function sign_up(){
    $('.err-msg').remove();
    formId = 'signupForm';
    url = 'landing/dosignup';

    var form = $('#'+formId)[0];
    var formData = new FormData(form);
    $.ajax({
      url: base_url+url,
      type: "POST",
      dataType: "json",
      contentType: false,
      processData: false,
      data: formData,
      beforeSend: function(){
        showLoader();
      }, 
      success: function (obj)
      {
      //console.log('fdsfdf')
      hideLoader();
      if (obj.err == 0)
        {
        showModal('otpModal');
        $('#userid').val(obj.id)
        appendMessageBody(formId);
        showSuccessMessage(formId,obj.msg);
          // setTimeout(function(){
          //   close_modal('mySignup');
          // },2000)
       
        }

        if (obj.err == 1)
        {          
          showErrorMessage(formId,obj.msg);   
        }
        if (obj.err == 2)
        { 
          appendMessageBody(formId);
          showDatabaseErrorMessage(formId,obj.msg);  
        }
      }
    });
  }
