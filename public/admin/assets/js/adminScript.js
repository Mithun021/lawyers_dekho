// >>>>>>>>>>>>>>>>>>> Edit Team Members >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
function editTeamMembers(teamid,name,phone,teamimage,status,base_url) {
  $('#user_id').val(teamid);
  $('#user_name').val(name);
  $('#phone_number').val(phone);
  $('#teamProfileImage').html('<img src="'+ base_url +'public/assets/images/team_members/'+ teamimage +'" height="60px">');
 $('#editTeamModal').modal('show');
}

function fetchSillDevelopment(){
  $.ajax({
    type: "get",
    url: "fetchSkillCategory",
    dataType: "json",
    success: function (response) {
      var $select = $('#projectCategory');
      $select.empty(); 

      $select.append('<option value="">Select a category</option>');
      $.each(response, function(index, data) {
          $select.append(
              $('<option></option>').val(data.name).text(data.name)
          );
      });
    }
  });
}

// >>>>>>>>>>>>>>>>>>> Delete Team Members >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
function deleteTeam(teamid) { 
  if (confirm('Are you sure..!')) {
    $.ajax({
      type: "post",
      url: "deleteTeamMember",
      data: {teamid : teamid},
      success: function (response) {
        if (response == true) {
          alert('data successfully delete');
          window.location.reload();
        }
        else{
          alert(response);
        }
      }
    });
  }
 }


$(document).ready(function() {
  // alert('ok');
  var base_url = $('#base_url').text();

  $('#user_account_status').on('change', function (e) { 
    var status = $(this).val();
    var user_id = $('#user_id').val();
    if (confirm('Are you sure..!')) {
      $.ajax({
        type: "post",
        url: base_url + "admin/user_account_status",
        data: {status:status, user_id:user_id},
        success: function (response) {
          if(response == true){
            alert('data successfully updated');
            window.location.reload();
          }else{
            alert(response);
          }
        }
      });
    }
  });
  $('#idcard_status').on('change', function (e) { 
    var status = $(this).val();
    var user_id = $('#user_id').val();
    if (confirm('Are you sure..!')) {
      $.ajax({
        type: "post",
        url: base_url + "admin/idcard_status",
        data: {status:status, user_id: user_id},
        success: function (response) {
          if(response == true){
            alert('data successfully updated');
            window.location.reload();
          }else{
            alert(response);
          }
        }
      });
    }
  });

  fetchSillDevelopment();

  $('#postcategory').on('change',function () {  
    var jobpost = $(this).val();
    $.ajax({
        type: "post",
        url: base_url + "findJobSubCategory",
        data: {jobpost:jobpost},
        dataType: "json",
        success: function (response) {
            let dataList = $('#postsubcategory');
            dataList.empty();
            dataList.append('<option value="">Select Anyone</option>');
            $.each(response, function(index, item) {
                dataList.append('<option value="'+ item.id +'">'+ item.sub_category +'</option>');
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error fetching data:', textStatus, errorThrown);
        }
    });
 });


  $('#state').on('change',function () {  
    var state = $(this).val();
    $.ajax({
        type: "post",
        url: base_url + "findCity",
        data: {state:state},
        dataType: "json",
        success: function (response) {
            // console.log(response);
            let dataList = $('#district');
            dataList.empty();
            dataList.append('<option value="">Select District</option>');
            $.each(response, function(index, item) {
                dataList.append('<option value="'+ item.city +'">'+ item.city +'</option>');
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error fetching data:', textStatus, errorThrown);
        }
    });
 });

  // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
  $("#addSkillCarForm").validate({
    rules: {
      skillcategory: {
            required: true,
            minlength: 3
        }
      },
      messages :{
        skillcategory: {
          required: "Please enter your  category",
          minlength: "Your category must be at least 2 characters long"
        }
    },
    submitHandler: function(form) {
      var formData = $(form).serialize();
        $.ajax({
          type: "post",
          url: "addSkillCategory",
          data: formData,
          success: function (response) {
            if (response == true) {
              Swal.fire("Successfullt Add");
              $('#SkillCatModal').modal('hide');
              fetchSillDevelopment();
            }else{
              Swal.fire(response);
            }
            
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
          }
        });
    }
  });

  $('#final_payment_button').on('click',function(e){
    e.preventDefault();
    var user_id = $('#user_id').val();
    var job_id = $('#job_id').val();
    var appliedAmount = $('input[name="appliedAmount"]:checked').val();
    if (confirm('Are you Sure...')) {
        
      //console.log(user_id + " - " + job_id + " - " + appliedAmount);
      $('#final_payment_button').text('Please wait...');
      $('#final_payment_button').prop('disabled',true);
      $.ajax({
        type: "post",
        url: base_url + "admin/update_payment_status",
        data: {user_id:user_id,job_id:job_id,appliedAmount:appliedAmount},
        success: function (response) {
          if (response == true) {
            Swal.fire({
              title: "Success!",
              text: "Successfully updated",
              icon: "success",
              confirmButtonText: "OK"
            }).then(() => {
                window.location.reload();  // Reload after user clicks OK
            });
          }else{
            Swal.fire(response);
            $('#final_payment_button').text('Submit');
            $('#final_payment_button').prop('disabled',false);
          }
          
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus);
          $('#final_payment_button').text('Submit');
          $('#final_payment_button').prop('disabled',false);
        }
      });
    }
  });

  $('#updateJobPostBtn').on('click',function (e) { 
    e.preventDefault();
    var user_id = $('#user_id').val();
    var post_id = $('#postcategory').val();
    var postcat_id = $('#postsubcategory').val();
    if (confirm('Are you Sure...')) {
        
      //console.log(user_id + " - " + job_id + " - " + appliedAmount);
      $('#updateJobPostBtn').text('Please wait...');
      $('#updateJobPostBtn').prop('disabled',true);
      $.ajax({
        type: "post",
        url: base_url + "admin/update_customer_job_post",
        data: {user_id:user_id,post_id:post_id,postcat_id:postcat_id},
        success: function (response) {
          if (response == true) {
            Swal.fire({
              title: "Success!",
              text: "Successfully updated",
              icon: "success",
              confirmButtonText: "OK"
            }).then(() => {
                window.location.reload();  // Reload after user clicks OK
            });
          }else{
            Swal.fire(response);
            $('#updateJobPostBtn').text('Update');
            $('#updateJobPostBtn').prop('disabled',false);
          }
          
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus);
          $('#updateJobPostBtn').text('Update');
          $('#updateJobPostBtn').prop('disabled',false);
        }
      });
    }
  });

});
