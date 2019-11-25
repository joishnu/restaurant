
 $('#video_blk').hide();
  $(document).on("change", ".file_multi_video", function(evt) {
    $('#video_blk').show();
  var $source = $('#video_here');
  $source[0].src = URL.createObjectURL(this.files[0]);
  $source.parent()[0].load();
});
  // Image upload
    $('.file_input').filer({
            showThumbs: true,
            templates: {
                box: '<ul class="jFiler-item-list"></ul>',
                item: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <li><span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span></li>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\
                                </div>\
                            </div>\
                        </li>',
                itemAppend: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\
                                </div>\
                            </div>\
                        </li>',
                progressBar: '<div class="bar"></div>',
                itemAppendToEnd: true,
                removeConfirmation: true,
                _selectors: {
                    list: '.jFiler-item-list',
                    item: '.jFiler-item',
                    progressBar: '.bar',
                    remove: '.jFiler-item-trash-action',
                }
            },
            addMore: true,
           /* files: [{
                name: "appended_file.jpg",
                size: 5453,
                type: "image/jpg",
                file: "http://dummyimage.com/158x113/f9f9f9/191a1a.jpg",
            },{
                name: "appended_file_2.png",
                size: 9503,
                type: "image/png",
                file: "http://dummyimage.com/158x113/f9f9f9/191a1a.png",
            }]*/
      });

    $('.subcategory_blk').hide();
   $("#category").on('change',function(){
          var id=$(this).val();
         $.ajax({
            type:"POST",
            url:"<?php echo site_url();?>product/get_sub_category",
            data:{'id':id},
            dataType:'json',
       success: function(response)
       { 
        var ln=response.length;
        if(ln>=1)
        {
           var cnt;
            for(var i=0;i<=ln-1;i++)
            {
              cnt+='<option value="'+response[i]['id']+'">'+response[i]['name']+'</option>';
             
            }

            $('.subcategory_blk').show();
            $('#subcategory').html('');
            $('#subcategory').html(cnt);
           
        }
        else
        {
          $('.subcategory_blk').hide();
        }

        }
      });
   });
    var id=$('#category').val();
     $.ajax({
            type:"POST",
            url:"<?php echo site_url();?>product/get_sub_category",
            data:{'id':id},
            dataType:'json',
       success: function(response)
       { 
        var ln=response.length;
        if(ln>=1)
        {
           var cnt;
            for(var i=0;i<=ln-1;i++)
            {
              cnt+='<option value="'+response[i]['id']+'">'+response[i]['name']+'</option>';
             
            }

            $('.subcategory_blk').show();
            $('#subcategory').html('');
            $('#subcategory').html(cnt);
           
        }
        else
        {
          $('.subcategory_blk').hide();
        }

        }
      });