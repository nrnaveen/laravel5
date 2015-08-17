$(document).ready(function(){
      $("#admin").validate({
           rules:{
                email: { required: true, email: true, },
                password:{ required: true,minlength:8, },
           },
           messages:{
                email: { required: "Please Enter Email Field", email: "Please Enter Valid Email Address", },
                newpassword:{ required: "Please Enter Password Field", minlength: "Your Password Must be Atleast 8 Characters Long", },
           },
      });
      $("#changepass").validate({
           rules:{
                newpassword: { required: true, minlength: 8, },
                conpassword: { required: true, minlength: 8, equalTo: "#newpassword", },
           },
           messages:{
                newpassword:{ required: "Please Enter Password Field", minlength: "Your Password Must be Atleast 8 Characters Long", },
                conpassword:{ required: "Please Enter Confirm Password Field", minlength: "Your Conform Password Must be Atleast 8 Characters Long", equalTo: "Password and Conform Password does not Match", },
           },
      });
});