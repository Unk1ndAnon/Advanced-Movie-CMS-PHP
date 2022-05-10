$(document).on('click','.add-movie button[type="submit"],.add-season button[type="submit"],.add-episode button[type="submit"]',function(e){
   $('#overlay').show()

    event.preventDefault(e)
    
 //   $(this).addClass("btn-progress")
 
   //  $('.preloader').show()
 
    var form = $('form#main')[0]; // You need to use standard javascript object here
     var dtr = new FormData(form);

     console.log(dtr)
 
 
  $.ajax({
        type:'post',
        url:'ajax/add_data.php',
        enctype: 'multipart/form-data',
        cache: false,
      contentType: false,
      processData: false,
        data:dtr,

        success:function(res){
           $('#overlay').hide()
            
         //   $(this).addClass("btn-progress")
           // $('.preloader').hide()
           if(JSON.parse(res))
           {
            swal("Success", "Data Inserted Succesfully!!", "success");
           }
           else
           {
            swal ( "Oops" ,  "Something went wrong!" ,  "error" )
           }

        }
    })

 
 })


 $(document).on('click','.edit-movie button[type="submit"],.edit-season button[type="submit"],.edit-episode button[type="submit"]', function(e){

    event.preventDefault(e)
    $('#overlay').show()
    
 //   $(this).addClass("btn-progress")
 
   //  $('.preloader').show()
 
   var form = $('form#main')[0]; // You need to use standard javascript object here
     var dtr = new FormData(form);

     console.log(dtr)
 
 
  $.ajax({
        type:'post',
        url:'ajax/update_data.php',
        enctype: 'multipart/form-data',
        cache: false,
      contentType: false,
      processData: false,
        data:dtr,

        success:function(res){
         $('#overlay').hide()
         //   $(this).addClass("btn-progress")
           // $('.preloader').hide()
           if(JSON.parse(res))
           {
            swal("Success", "Data Updated Succesfully!!", "success");
           }
           else
           {
            swal ( "Oops" ,  "Something went wrong!" ,  "error" )
           }

        }
    })

 
 })






 $('.setting-general button[type="submit"],.setting-ads button[type="submit"],.setting-seo button[type="submit"],.edit-header button[type="submit"], .edit-footer button[type="submit"],.edit-theme button[type="submit"]').click(function(e){

   event.preventDefault(e)
   
//   $(this).addClass("btn-progress")

  //  $('.preloader').show()

   var form = $('form')[1]; // You need to use standard javascript object here
    var dtr = new FormData(form);

  //  console.log(dtr)


 $.ajax({
   type:'post',
   url:'ajax/update_data.php',
   enctype: 'multipart/form-data',
   cache: false,
 contentType: false,
 processData: false,
   data:dtr,

       success:function(res){
           
        //   $(this).addClass("btn-progress")
          // $('.preloader').hide()
          if(JSON.parse(res))
          {
           swal("Success", "Data Updated Succesfully!!", "success");
          }
          else
          {
           swal ( "Oops" ,  "Something went wrong!" ,  "error" )
          }

       }
   })


})


$('.custom-js button').click(function(e){

   event.preventDefault(e)




  $.ajax({
   type:'post',
   url:'ajax/update_data.php',
 
   data:{type:'custom_js',custom_js:editor.getValue()},

   success:function(res){
       
    //   $(this).addClass("btn-progress")
      // $('.preloader').hide()
      if(JSON.parse(res))
      {
       swal("Success", "Data Deleted Succesfully!!", "success");
      }
      else
      {
       swal ( "Oops" ,  "Something went wrong!" ,  "error" )
      }

   }
})



})


$('.custom-css button').click(function(e){

   event.preventDefault(e)

  $.ajax({
   type:'post',
   url:'ajax/update_data.php',
 
   data:{type:'custom_css',custom_css:editor.getValue()},

   success:function(res){
       
    //   $(this).addClass("btn-progress")
      // $('.preloader').hide()
      if(JSON.parse(res))
      {
       swal("Success", "Data Deleted Succesfully!!", "success");
      }
      else
      {
       swal ( "Oops" ,  "Something went wrong!" ,  "error" )
      }

   }
})



})

$('.custom-file-input').on("change",function(){

   id= $(this).attr("id")

   console.log(this.files[0].name)

   if (this.files && this.files[0]) {

   $('label[for="'+id+'"]').text(this.files[0].name)
   }


})
