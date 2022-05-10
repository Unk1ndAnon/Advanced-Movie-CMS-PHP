function del_entry(id,type)
{


    $.ajax({
        type:'post',
        url:'ajax/delete_data.php',
      
        data:{id:id,type:type},

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

    $('*').modal('hide')


}

function publish_entry(id,type,action)
{


    $.ajax({
        type:'post',
        url:'ajax/publish_data.php',
      
        data:{id:id,type:type,action:action},

        success:function(res){
            
         //   $(this).addClass("btn-progress")
           // $('.preloader').hide()
           if(JSON.parse(res))
           {
            swal("Success", "Entry "+action+"ed  Succesfully!!", "success");
           }
           else
           {
            swal ( "Oops" ,  "Something went wrong!" ,  "error" )
           }

        }
    })

    $('*').modal('hide')


}

$('input[data-checkboxes="mygroup"]').change(function(){

    len=$('input[data-checkboxes="mygroup"]:checked').length

    if(len==0)
    {
         $('.card-header select.form-control.form-control-sm.ml-1').attr("disabled","disabled")
    }
    else
    {
        $('.card-header select.form-control.form-control-sm.ml-1').removeAttr("disabled")
    }

})



$('.card-header select.form-control.form-control-sm.ml-1').change(function(){

    act=$(this).val()
    if(act!='none')
    {
    type=$(this).attr('data-type')
    id_arr=[]
    $.each($('input[data-checkboxes="mygroup"]:checked'),function(){
      if($(this).attr('data-checkbox-role')!='dad')
      {
        id_arr.push($(this).attr('data-id'))
      }
        

    })

    publish_entry(id_arr,type,act)
}


  
})


