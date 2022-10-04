jQuery.fn.extend({
  displayButton: function(config, selection) {
    if(config.single && config.bulk){
      if(selection.length > 0){
        $('#'+config.id).removeClass(config.disabledClass);
      } else {
        $('#'+config.id).addClass(config.disabledClass);
      }
    }
    if(!config.single && config.bulk){
      if(selection.length > 1){
        $('#'+config.id).removeClass(config.disabledClass);
      } else {
        $('#'+config.id).addClass(config.disabledClass);
      }
    }
    if(config.single && !config.bulk){
        if(selection.length == 1){
          $('#'+config.id).removeClass(config.disabledClass);
        } else {
          $('#'+config.id).addClass(config.disabledClass);
        }
    }
    if(!config.single && !config.bulk){
      if(selection.length == 0){
        
        $('#'+config.id).removeClass(config.disabledClass);
      } else {
        $('#'+config.id).addClass(config.disabledClass);
      }
    }
  }
});
  
  
  jQuery.fn.extend({
		confirmRedirectButton: function(config = false) {
      if(config == false){ return console.log('confirmRedirectButton: ERROR NO CONFIG PASSED'); }
      if(config.datatable == undefined){  return console.log('confirmRedirectButton: ERROR NO DATATABLE PASSED'); }
      if(config.message_function == undefined){  config.message_function = false; }
      if(config.bulk == undefined){  config.bulk = false; }
      if(config.list == undefined){ config.list = false;  }
      if(config.list_item == undefined){ config.list_item = false;  } else {config.list = true; }
      if(config.single == undefined){  config.single = true; }
      if(config.target == undefined){  config.target = '_blank'; }
      if(config.disabledClass == undefined){  config.disabledClass = 'disabled'; }
      if(config.title == undefined){  config.title = 'Are you sure?'; }
      if(config.message == undefined){  config.message = ''; }
      if(config.id == undefined){  config.id = $(this).attr('id'); }
         document.addEventListener('DatableSelected', function (e) { 
        $(this).displayButton(config, window.datatables[config.datatable].selected);
      }, false);
      if(config.bulk){
        this.on('click', function(){
          if($('#'+config.id).hasClass('disabled')){return;}
          
          var data = window.datatables[config.datatable].selectedData;
          var temp_message = '<p>'+config.message +'</p>';
          if(config.list){
            temp_message += '<div class="callout callout-info"><h4>Users that will be effected</h4><ol>';
            $.each(data, function(uuid, value) {
              if(config.list_item){
                temp_message += config.list_item(config, value);
              } else {
                if(data.name != undefined){  temp_message+= '<li>' + value.name + '</li>'; } else
                if(data.email != undefined){  temp_message+= '<li>' + value.email + '</li>';} else
                if(data.id != undefined){ temp_message+= '<li>' + value.id + '</li>';} else
                if(data.uuid != undefined){temp_message+= '<li>' + value.uuid + '</li>'; }
              }
            });
            temp_message+= '</ol></div>';
          }
          
          swal({
            title: config.title,
            html: temp_message,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.value) {
              var url = config.url;
              var uuid = window.datatables[config.datatable].selected.join('&');
              url = url.replace('-uuid-', uuid);
              window.open(url, config.target);
            }
          });
        });
      } else {
        this.on('click', function(){
          if($('#'+config.id).hasClass('disabled')){return;}
          var data = window.datatables[config.datatable].selectedData[0];
          var temp_message = '<p>'+config.message +'</p>';
          if(config.message_function){
            temp_message = config.message_function(config, data);
          } else {
          if(config.list){
            temp_message += '<div class="callout callout-info"><h4>Items that will be effected</h4><ol>';
              if(config.list_item){
                temp_message += config.list_item(config, data);
              } else {
                if(data.name != undefined){  temp_message+= '<li>' + value.name + '</li>'; } else
                if(data.email != undefined){  temp_message+= '<li>' + value.email + '</li>';} else
                if(data.id != undefined){ temp_message+= '<li>' + value.id + '</li>';} else
                if(data.uuid != undefined){temp_message+= '<li>' + value.uuid + '</li>'; }
              }
            temp_message+= '</ol></div>';
          }
          }
                   swal({
            title: config.title,
            html: temp_message,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.value) {
             var url = config.url;
              var uuid = window.datatables[config.datatable].selected[0];
              url = url.replace('-uuid-', uuid);
              window.open(url, config.target);
            }
          });
        });
      }
		}
	});
  
 jQuery.fn.extend({
		postAjaxDataButton: function(config = false) {
      if(config == false){ return console.log('postAjaxDataButton: ERROR NO CONFIG PASSED'); }
      if(config.datatable == undefined){  return console.log('postAjaxDataButton: ERROR NO DATATABLE PASSED'); }
      if(config.list == undefined){ config.list = false;  }
      if(config.list_item == undefined){ config.list_item = false;  } else {config.list = true; }
      if(config.bulk == undefined){  config.bulk = false; }
      if(config.single == undefined){  config.single = true; }
      if(config.target == undefined){  config.target = '_blank'; }
      if(config.disabledClass == undefined){  config.disabledClass = 'disabled'; }
      if(config.title == undefined){  config.title = 'Are you sure?'; }
      if(config.message == undefined){  config.message = ''; }
      if(config.action == undefined){  config.action = 'POST'; }
      if(config.id == undefined){  config.id = $(this).attr('id'); }
         document.addEventListener('DatableSelected', function (e) { 
        $(this).displayButton(config, window.datatables[config.datatable].selected);
      }, false);
      
        this.on('click', function(){
          if($('#'+config.id).hasClass('disabled')){return;}
          
          var data = window.datatables[config.datatable].selectedData;
          var temp_message = '<p>'+config.message +'</p>';
          if(config.list){
            temp_message += '<div class="callout callout-info"><h4>Users that will be effected</h4><ol>';
            $.each(data, function(uuid, value) {
              if(config.list_item){
                temp_message += config.list_item(config, value);
              } else {
                if(value.name != undefined){  temp_message+= '<li>' + value.name + '</li>'; } else
                if(value.email != undefined){  temp_message+= '<li>' + value.email + '</li>';} else
                if(value.id != undefined){ temp_message+= '<li>' + value.id + '</li>';} else
                if(value.uuid != undefined){temp_message+= '<li>' + value.uuid + '</li>'; }
              }
            });
            temp_message+= '</ol></div>';
          }
          

          
          
          swal({
            title: config.title,
            html: temp_message,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.value) {
              var url = config.url;
              var uuids = window.datatables[config.datatable].selected;
              
              $.ajax({
                      type: config.action,
                      url: config.url,
                      contentType: "application/json",
                      data: JSON.stringify({
                        "uuids":uuids,
                      }),
                      processData: false,
                      success: function(data, status, XMLHttpRequest) {
                        $(document).processSuccess(data, status, XMLHttpRequest);
                        window.datatables[config.datatable].table.ajax.reload();
                      },
                      error: function(XMLHttpRequest, textStatus, errorThrown) {
                        $(document).processError(XMLHttpRequest);
                      },
                  });
              
            }
          });
        });
		}
	});
  
   jQuery.fn.extend({
		postModalDataButton: function(config = false) {
      if(config == false){ return console.log('postModalDataButton: ERROR NO CONFIG PASSED'); }
      if(config.datatable == undefined){  return console.log('postModalDataButton: ERROR NO DATATABLE PASSED'); }
      if(config.modal_id == undefined){  return console.log('postModalDataButton: ERROR NO MODAL ID PASSED'); }
      if(config.submit_id == undefined){  return console.log('postModalDataButton: ERROR NO SUBMIT ID PASSED'); }
      if(config.close_id == undefined){  return console.log('postModalDataButton: ERROR NO CLOSE ID PASSED'); }
      if(config.box_id == undefined){  return console.log('postModalDataButton: ERROR NO BOX ID PASSED'); }
      if(config.list_item == undefined){ config.list_item = false;  }
      if(config.before_submit == undefined){ config.before_submit = false;  }
      if(config.after_submit == undefined){ config.after_submit = false;  }
      if(config.before_close == undefined){ config.before_close = false;  }
      if(config.after_close == undefined){ config.after_close = false;  }
      if(config.list_id == undefined){ config.list_id = false;  }
      if(config.bulk == undefined){  config.bulk = false; }
      if(config.single == undefined){  config.single = true; }
      if(config.target == undefined){  config.target = '_blank'; }
      if(config.disabledClass == undefined){  config.disabledClass = 'disabled'; }
      if(config.title == undefined){  config.title = 'Are you sure?'; }
      if(config.message == undefined){  config.message = ''; }
      if(config.action == undefined){  config.action = 'POST'; }
      if(config.id == undefined){  config.id = $(this).attr('id'); }
         document.addEventListener('DatableSelected', function (e) { 
        $(this).displayButton(config, window.datatables[config.datatable].selected);
      }, false);
      
        this.on('click', function(){          
          if($('#'+config.id).hasClass('disabled')){return;}
          
          var data = window.datatables[config.datatable].selectedData;
          if(config.list_id){
            var list = '';
            $.each(data, function(uuid, value) {
              if(config.list_item){
                list += config.list_item(config, value);
              } else {
                if(value.name != undefined){  list+= '<li>' + value.name + '</li>'; } else
                if(value.email != undefined){  list+= '<li>' + value.email + '</li>';} else
                if(value.id != undefined){ list+= '<li>' + value.id + '</li>';} else
                if(value.uuid != undefined){list+= '<li>' + value.uuid + '</li>'; }
              }
            });
            $('#'+config.list_id).html(list);
          }
          $('#'+config.modal_id).modal('show');

        });
      
          $('#'+config.submit_id).on('click', function(){
            if(config.box_id){$('#'+config.box_id).addLoadingOverlay();}
            if(config.before_submit){ if(!config.before_submit()){ return; } }
            if(config.after_submit){ config.after_submit(config); }
          });
      
          $('#'+config.close_id).on('click', function(){
            if(config.before_close){ if(!config.before_submit()){ return; } }
            $('#'+config.modal_id).modal('hide');
            if(config.after_close){ config.after_close(config); }
          });
		}
	});
  