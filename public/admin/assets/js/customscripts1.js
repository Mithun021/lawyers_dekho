function updateEnquiryStatus(enquiryId) { 
    $('#enquiryId').val(enquiryId);
    $('#enquiryModal').modal('show');
 }

 function updateUser(userId) { 
    $('#userId').val(userId);
    $.ajax({
        type: "post",
        url: "fetch-user-data",
        data: {userId:userId},
        dataType: "json",
        success: function (response) {
            var responseData = response.userData;
            $('#first_name').val(responseData.first_name);
            $('#last_name').val(responseData.last_name);
            $('#email_address').val(responseData.email_address);
            $('#user_phone').val(responseData.user_phone);
            $('#user_address').val(responseData.user_address);
            $('#updateUserModal').modal('show');
        }
    });
  }

function deleteUser(userId) { 
    if(confirm('Are you sure....')){
        $.ajax({
            type: "post",
            url: "delete-user-data",
            data: {userId:userId},
            success: function (response) {
                if(response == true) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Account Successfully Delete",
                    }).then(function(){
                        window.location.reload();
                    });
                }  
                else{
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: response,
                        timer: 2500
                    });
                }
                
            }
        });
    }
    
 }

 function deleteProduct(productId) { 
    if(confirm('Are you sure....')){
        $.ajax({
            type: "post",
            url: "delete-product-data",
            data: {productId:productId},
            success: function (response) {
                if(response == true) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Product Successfully Delete",
                    }).then(function(){
                        window.location.reload();
                    });
                }  
                else{
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: response,
                        timer: 2500
                    });
                }
                
            }
        });
    }
    
 }

 function deleteCategory(catId) { 
    if(confirm('Are you sure....')){
        $.ajax({
            type: "post",
            url: "delete-category-data",
            data: {catId:catId},
            success: function (response) {
                if(response == true) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Category Successfully Delete",
                    }).then(function(){
                        window.location.reload();
                    });
                }  
                else{
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: response,
                        timer: 2500
                    });
                }
                
            }
        });
    }
    
 }

$(document).ready(function () {
    // Find SubCategories ---------------------------

    $('#productCategory').on('change',function(){
        var category = $(this).val();
        if (category!=="") {
            $.ajax({
                type: "post",
                url: "find-subcategory",
                data: {category:category},
                success: function (response) {
                    $('#parentCategory').html("");
                    var responseData = response.fetchSubcat;
                    $("#parentCategory").empty().append("<option value=''>Select Anyone</option>");
                    $.each(responseData, function (key, value) { 
                         $('#parentCategory').append('<option value="'+value['catId']+'">'+value['categories']+'</option>');
                    });
                    
                }
            });
        }
    });
    $('#uproductCategory').on('change',function(){
        var category = $(this).val();
        if (category!=="") {
            $.ajax({
                type: "post",
                url: "find-subcategory2",
                data: {category:category},
                success: function (response) {
                    $('#parentCategory').html("");
                    var responseData = response.fetchSubcat;
                    $("#parentCategory").empty().append("<option value=''>Select Anyone</option>");
                    $.each(responseData, function (key, value) { 
                         $('#parentCategory').append('<option value="'+value['catId']+'">'+value['categories']+'</option>');
                    });
                    
                }
            });
        }
    });



    $("#addUserForm").validate({
        rules:{
            firstname:{
                required:true,
                minlength:3
            },
            lastname:{
                required: true,
                minlength: 2
            },
            phone:{
                required: true,
                minlength: 10, // Minimum length for phone number
                maxlength: 10, // Maximum length for phone number
                digits: true // Allows only digits
            },
            emailid:{
                required: true,
                email: true
            },
            address:{
                required: true,
                minlength: 5
            },
            password: {
                required: true,
                minlength: 6 // adjust this as needed
            },
            confirmPassword: {
                required: true,
                equalTo: '#password'
            }
            
        },
        message :{
            firstname:{
                required:"Please enter your First Name",
                minlength:"Your name must be at least 2 characters long"
            },
            lastname:{
                required:"Please provide a Last Name",
                minlength:"Your name must be at least 2 characters long"
            },
            phone:{
                required: "Please enter a phone number",
                minlength: "Phone number must be at least 10 digits",
                maxlength: "Phone number cannot exceed 10 digits",
                digits: "Please enter only digits"
            },
            emailid:{
                required: "Please provide an Email address.",
                email: "Invalid Email format. Please check and try again."
            },
            address:{
                required:"Please enter your First Name",
                minlength:"Your name must be at least 5 characters long"
            },
            password: {
                required: "Please enter a password",
                minlength: "Your password must be at least 8 characters long"
            },
            confirmPassword: {
                required: "Please confirm your password",
                equalTo: "Passwords do not match"
            } 
        },
        submitHandler: function (form) {
            var responseData = $('#addUserForm').serialize();
            $('#addUserBtn').text('Please wait....');
            $('#addUserBtn').attr("disabled","disabled");
            $.ajax({
                type: "POST",
                url: "save-user",
                data: responseData,
                success: function (response) {
                    if(response == true) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Account Successfully Create",
                        }).then(function(){
                            window.location.reload();
                        });
                    }  
                    else{
                        Swal.fire({
                            position: "top-end",
                            icon: "error",
                            title: response,
                            timer: 2500
                        });
                    }
                    $('#addUserBtn').text('Save & Submit');
                    $('#addUserBtn').removeAttr("disabled");
                },
                error :function(){
                    console.log("Error!");
                    $('#addUserBtn').text('Save & Submit');
                    $('#addUserBtn').removeAttr("disabled");
                }
            });
        }

    });

    // Update users -------------------------------------
    $("#updateuserForm").validate({
        rules:{
            first_name:{
                required:true,
                minlength:3
            },
            last_name:{
                required: true,
                minlength: 2
            },
            user_phone:{
                required: true,
                minlength: 10, // Minimum length for phone number
                maxlength: 10, // Maximum length for phone number
                digits: true // Allows only digits
            },
            email_address:{
                required: true,
                email: true
            },
            user_address:{
                required: true,
                minlength: 5
            },
            userpassword: {
                required: true,
                minlength: 6 // adjust this as needed
            }
            
        },
        message :{
            first_name:{
                required:"Please enter your First Name",
                minlength:"Your name must be at least 2 characters long"
            },
            last_name:{
                required:"Please provide a Last Name",
                minlength:"Your name must be at least 2 characters long"
            },
            user_phone:{
                required: "Please enter a phone number",
                minlength: "Phone number must be at least 10 digits",
                maxlength: "Phone number cannot exceed 10 digits",
                digits: "Please enter only digits"
            },
            email_address:{
                required: "Please provide an Email address.",
                email: "Invalid Email format. Please check and try again."
            },
            user_address:{
                required:"Please enter your First Name",
                minlength:"Your name must be at least 5 characters long"
            },
            userpassword: {
                required: "Please enter a password",
                minlength: "Your password must be at least 8 characters long"
            }
        },
        submitHandler: function (form) {
            var responseData = $('#updateuserForm').serialize();
           
            $.ajax({
                type: "POST",
                url: "update-user",
                data: responseData,
                success: function (response) {
                    if(response == true) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Account Successfully Update",
                        }).then(function(){
                            window.location.reload();
                        });
                    }  
                    else{
                        Swal.fire({
                            position: "top-end",
                            icon: "error",
                            title: response,
                            timer: 2500
                        });
                    }
                    
                },
                error :function(){
                    console.log("Error!");
                    
                }
            });
        }

    });

    



    // ======================= Manage Category =============================
    $("#addCategoryForm").validate({
        rules:{
            categoryname:{
                required:true,
                minlength:3
            },
            categoryImage: {
                required: true
            }
            
        },
        message :{
            categoryname:{
                required:"Please enter your Category Name",
                minlength:"Your name must be at least 3 characters long"
            },
            categoryImage: {
                required: "Please select a category image"
            }
        },
        submitHandler: function (form) {
            var formData = new FormData(form);
            $('#addCategotyBtn').text('Please wait....');
            $('#addCategotyBtn').attr("disabled","disabled");
            $.ajax({
                type: "POST",
                url: "save-category",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if(response == true) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Category Successfully Create",
                        }).then(function(){
                            window.location.reload();
                        });
                    }  
                    else{
                        Swal.fire({
                            position: "top-end",
                            icon: "error",
                            title: response,
                            timer: 2500
                        });
                    }
                    $('#addCategotyBtn').text('Save & Submit');
                    $('#addCategotyBtn').removeAttr("disabled");
                },
                error :function(){
                    console.log("Error!");
                    $('#addCategotyBtn').text('Save & Submit');
                    $('#addCategotyBtn').removeAttr("disabled");
                }
            });
        }

    });

    // ====================== Manage Products ===========================
    $("#addProductForm").validate({
        rules:{
            prodctTitle:{
                required:true,
                minlength:3
            },
            shortDescription:{
                required: true,
                minlength: 6
            },
            fullDescription:{
                required: true,
                minlength: 10
            },
            regularPrice:{
                required: true,
                digits: true // Allows only digits
            },
            salesPrice:{
                required: true,
                digits: true // Allows only digits
            },
            productImage:{
                required: true,
            },
            productCategory:{
                required: true,
            }
            
        },
        message :{
            prodctTitle:{
                required:"Please enter your Product Title",
                minlength:"Your name must be at least 6 characters long"
            },
            shortDescription:{
                required:"Please provide a Short Description",
                minlength:"Your name must be at least 2 characters long"
            },
            fullDescription:{
                required:"Please provide a Full Description",
                minlength:"Your name must be at least 2 characters long"
            },
            regularPrice:{
                required: "Please enter a Product Regular Price",
                digits: "Please enter only digits"
            },
            salesPrice:{
                required: "Please enter a Sales Price",
                digits: "Please enter only digits"
            },
            productImage:{
                required:"Please upload Product Image"
            },
            productCategory: {
                required: "Please Select Product Category"
            } 
        },
        submitHandler: function (form) {
            var formData = new FormData(form);
            $('#addProductBtn').text('Please wait....');
            $('#addProductBtn').attr("disabled","disabled");
            $.ajax({
                type: "POST",
                url: "save-product",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if(response == true) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Product Successfully Add",
                        }).then(function(){
                            window.location.reload();
                        });
                    }  
                    else{
                        Swal.fire({
                            position: "top-end",
                            icon: "error",
                            title: response,
                            timer: 2500
                        });
                    }
                    $('#addProductBtn').text('Save & Submit');
                    $('#addProductBtn').removeAttr("disabled");
                },
                error :function(){
                    console.log("Error!");
                    $('#addProductBtn').text('Save & Submit');
                    $('#addProductBtn').removeAttr("disabled");
                }
            });

        }
    });

    // Update Products -------------------------------
    // $("#updateProductForm").validate({
    //     rules:{
    //         prodctTitle:{
    //             required:true,
    //             minlength:3
    //         },
    //         shortDescription:{
    //             required: true,
    //             minlength: 6
    //         },
    //         fullDescription:{
    //             required: true,
    //             minlength: 10
    //         },
    //         regularPrice:{
    //             required: true,
    //             digits: true // Allows only digits
    //         },
    //         salesPrice:{
    //             required: true,
    //             digits: true // Allows only digits
    //         },
    //         productCategory:{
    //             required: true,
    //         }
            
    //     },
    //     message :{
    //         prodctTitle:{
    //             required:"Please enter your Product Title",
    //             minlength:"Your name must be at least 6 characters long"
    //         },
    //         shortDescription:{
    //             required:"Please provide a Short Description",
    //             minlength:"Your name must be at least 2 characters long"
    //         },
    //         fullDescription:{
    //             required:"Please provide a Full Description",
    //             minlength:"Your name must be at least 2 characters long"
    //         },
    //         regularPrice:{
    //             required: "Please enter a Product Regular Price",
    //             digits: "Please enter only digits"
    //         },
    //         salesPrice:{
    //             required: "Please enter a Sales Price",
    //             digits: "Please enter only digits"
    //         },
    //         productCategory: {
    //             required: "Please Select Product Category"
    //         } 
    //     },
    //     submitHandler: function (form) {
    //         var formData = new FormData(form);
    //         $('#updateProductBtn').text('Please wait....');
    //         $('#updateProductBtn').attr("disabled","disabled");
    //         $.ajax({
    //             type: "POST",
    //             url: "update-product",
    //             data: formData,
    //             processData: false,
    //             contentType: false,
    //             success: function (response) {
    //                 if(response == true) {
    //                     Swal.fire({
    //                         position: "top-end",
    //                         icon: "success",
    //                         title: "Product Successfully Update",
    //                     }).then(function(){
    //                         window.location.reload();
    //                     });
    //                 }  
    //                 else{
    //                     Swal.fire({
    //                         position: "top-end",
    //                         icon: "error",
    //                         title: response,
    //                         timer: 2500
    //                     });
    //                 }
    //                 $('#updateProductBtn').text('Save & Submit');
    //                 $('#updateProductBtn').removeAttr("disabled");
    //             },
    //             error :function(){
    //                 console.log("Error!");
    //                 $('#updateProductBtn').text('Save & Submit');
    //                 $('#updateProductBtn').removeAttr("disabled");
    //             }
    //         });

    //     }
    // });




    // Update Enquiry Status ===============================
    $('#updateEnquiryBtn').click(function (e) { 
        e.preventDefault();
        var enquiryId = $('#enquiryId').val();
        var enquiryStatus = $('#enquiryStatus').val();
        $.ajax({
            type: "post",
            url: "update-enquiry-status",
            data: {enquiryId:enquiryId,enquiryStatus:enquiryStatus},
            success: function (response) {
                if(response == true) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Enquiry Successfully Update",
                    }).then(function(){
                        window.location.reload();
                    });
                }  
                else{
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: response,
                        timer: 2500
                    });
                }
            }
        });
     });

});