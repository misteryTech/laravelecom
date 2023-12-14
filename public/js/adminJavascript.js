$(document).ready(function () {
    $("#datatable").DataTable({


    });
});



//PICTURE PREVIEW
$('input[type="file"][name="product_picture"]').val('');
//image Preview
$('input[type="file"][name="product_picture"]').on('change', function(){
    var img_path = $(this)[0].value;
    var img_holder = $('.img-holder');
    var extenstion = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();

    if(extenstion == 'jpeg' || extenstion == 'jpg' || extenstion == 'png'){
                if(typeof(FileReader) != 'undefined'){
                    img_holder.empty();
                    var reader = new FileReader();
                    reader.onload = function(e){
                           $('<img/>',{'src':e.target.result,'class':'img-fluid',
                           'style':'max-width:400px;margin-bottom:10px;'}).appendTo(img_holder);
                        }
                        img_holder.show();
                        reader.readAsDataURL($(this)[0].files[0]);
                }else{
                    $(img_holder).html('This browser does not support FileReader');
                }
    }else{
        $(img_holder).empty();
    }
})
