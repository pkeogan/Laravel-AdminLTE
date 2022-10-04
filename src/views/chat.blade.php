<div id='altechat' class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div id="altechat-data">
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@push('scriptsdocumentready')  
{{-- <script> --}}
  class AlteChat {
    constructor(config) {
        this.url = config.url;
        this.uuid = config.uuid;
      if(this.uuid){
        this.url += '/'+this.uuid;
      }
      
      this.box = config.box ? $('#'+config.box): $('#alte-chat-box');
      this.title = config.title ? config.title: 'Comments';
      this.title = config.title ? config.title: 'Comments';
      return this;
    }
    
    clearEmptyError(){
      $('#alte-chat-message-input').parent().removeClass('has-error');
      $('#alte-chat-send-message').removeClass('btn-danger');
      $('#alte-chat-send-message').addClass('btn-primary');
      $('#alte-chat-help-block').addClass('hidden');
      $('#alte-chat-help-block').text('');
    }
    
    triggerEmptyError(){
      $('#alte-chat-message-input').parent().addClass('has-error');
      $('#alte-chat-send-message').addClass('btn-danger');
      $('#alte-chat-send-message').removeClass('btn-primary');
      $('#alte-chat-help-block').removeClass('hidden');
      $('#alte-chat-help-block').text('Please type a message to send and then resend.');
    }
    
    downloadPDF(print = false){
      var doc = new jsPDF('portrait', 'mm', 'a4');
      var totalHeight = 35;
      var row = 35;
      var page = 1;
      
      function footer(doc){
        
        doc.page ++;
        };
      
      //title
      doc.setFontSize(22);
      doc.setTextColor(33,33,33);
      doc.setFont("arial");
      doc.setFontType("normal");
      doc.text('PLASMA Chat Export', 10, 20);
      
      doc.setFontSize(14);
      doc.setTextColor(117,117,117);
      doc.text('exported on '+ moment().format('LLLL'), 10, 30);
      
           doc.setTextColor(117,117,117);
           doc.setFontSize(10);
           doc.text('' + page, 200, 280, {align:'right'});
            
      
      $.each(this.messages, function( index, value ) {
                var messageSplit = doc.splitTextToSize(value.message, 180);
               const messageLength = (doc.getTextDimensions(messageSplit).h);


        //check if this should be place on a new page or not
        if(totalHeight + messageLength + 25 > 290)
         {
           totalHeight = 10;
           row = 10;
           page++;
           doc.addPage();
           doc.setTextColor(117,117,117);
           doc.setFontSize(10);
           doc.text('' + page, 200, 280, {align:'right'});
         }
          
           
        
        
        doc.setTextColor(200,200,200);
        doc.rect(0, row, 210, 1, 'F');
        totalHeight += 8;
        row += 8;
        doc.setTextColor(33,33,33);
        doc.setFontSize(14);
        doc.text(value.user, 10, row, {align:'left'});
        doc.setTextColor(117,117,117);
        doc.setFontSize(10);
        doc.text(value.date, 200, row, {align:'right'});
          doc.setFontSize(14);
        doc.setTextColor(33,33,33);
        totalHeight += 10;
        row += 10;
        doc.text(messageSplit, 20, row, {align:'left', maxWidth:180});        
        totalHeight += 5 + messageLength;
        row += 5 + messageLength;
       });

      if(print){
        doc.autoPrint();
        doc.output('dataurlnewwindow');
      } else {
        doc.save('chat-log.pdf');
      }
        
      
    }
    
    getMessages(){
      var act = this;
      var url = this.url
      $('#alte-chat-box').addLoadingOverlay();
          $.ajax({
          type: "GET",
          url: url,
          contentType: "application/json",
          processData: false,
          success: function(data) {
             $('#alte-chat-box').removeLoadingOverlay();
            act.messages = data;
            console.log(data);
            act.displayMessages();
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
                         $('#alte-chat-box').removeLoadingOverlay();

          },
        });
    }
    
    
    sendMessage(){
      var message = $('#alte-chat-message-input').val();
      if(message == null || message == ''){
        return this.triggerEmptyError();
      } else {
         this.clearEmptyError();
      }
      
      var url = this.url
      var act = this;
        $.ajax({
          type: "POST",
          url: url,
          contentType: "application/json",
          data: JSON.stringify({
            'comment': message
          }),
          processData: false,
          success: function(data) {
            //alertify.notify(data.message, 'success', 5);
            act.getMessages();
            $('#alte-chat-message-input').val('');
            
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
alertify.notify('Opps, and error occured when updating the text', 'error', 5);
          },
        });
    }
    
    
    displayMessages(scroll = false){
      $('#alte-chat-messages-container').html('');
      var messages = this.renderMessages();
      $('#alte-chat-messages-container').html(messages);
         $("#alte-chat-messages-container").scrollTop($("#alte-chat-messages-container")[0].scrollHeight);
         
    }
    
    renderMessage(message){
      message.pos = message.self ? '' : 'right';
      return`
          <div class="direct-chat-msg `+ message.pos +`">
            <div class="direct-chat-info clearfix">
              <span class="direct-chat-name pull-left">`+message.user+`</span>
              <span class="direct-chat-timestamp pull-right">`+message.date+`</span>
            </div>
            <img class="direct-chat-img" src="`+message.picture+`">
            <div class="direct-chat-text">
              `+message.message+`
            </div>
          </div>`
          
    }
    
    renderMessages(){
      var output = '';
      var act = this;
      $.each(this.messages, function( index, value ) {
        output += act.renderMessage(value);
      });
      return output;
    }
  
  render(){
    return `    <div id="alte-chat-box" class="box box-primary direct-chat direct-chat-primary ">
<div class="box-header with-border">
              <h3 class="box-title">`+this.title+`</h3>

              <div class="box-tools pull-right">
                <button id="alte-chat-download" type="button" class="btn btn-box-tool"><i class="fas fa-file-download"></i></button>
                <button id="alte-chat-print" type="button" class="btn btn-box-tool"><i class="fas fa-print"></i></button>
                <button id="alte-chat-refresh" type="button" class="btn btn-box-tool"><i class="fas fa-sync"></i></button>
                <button type="button" class="btn btn-box-tool" data-dismiss="modal"><i class="fas fa-times"></i></button>
              </div>
            </div>
      <div class="box-body">
        <div class="direct-chat-messages" style="height:500px;max-height:75%;" id="alte-chat-messages-container"></div></div>
      <div class="box-footer">
          <div class="input-group">
            <input type="text" id='alte-chat-message-input' name="message" placeholder="Type Message ..." class="form-control">
            <span class="input-group-btn">
                        <button id="alte-chat-send-message" class="btn btn-primary btn-flat">Send</button>
                      </span>

          </div>
<span id="alte-chat-help-block" style="color:#dd4b39;" class="help-block"></span>
      </div>
      <!-- /.box-footer-->
    </div>`;
  }
}
  

  
 jQuery.fn.extend({
		openAlteChat: function(iurl = false, iuuid = false, model = false, box = false) {
			var url = iurl;
			var uuid = iuuid;
    
			if (!url) {
				url = $(this).attr('data-comments-url');
			}
			if (!uuid) {
				uuid = $(this).attr('data-comments-uuid');
			}
      if (!model) {
				model = $(this).attr('data-comments-model');
			}

      var chat = new AlteChat({'url':url, 'uuid':uuid, 'box':false});
      
      $('#altechat-data').html(chat.render());
      $('#altechat').modal('show')
      
       $('#alte-chat-download').on('click', function(){
            chat.downloadPDF(false);
        });
      
        $('#alte-chat-print').on('click', function(){
            chat.downloadPDF(true);
        });
      
        $('#alte-chat-refresh').on('click', function(){
            chat.getMessages();
        });
      
       $('#alte-chat-send-message').on('click', function(){
            chat.sendMessage();
        });
      
      $('#alte-chat-message-input').on("keyup", function(e) {
    if (e.keyCode == 13) {
        chat.sendMessage();
    }
});
      
      
      
      chat.getMessages();
        window.Echo.channel('chat-channels-'+model+'-'+uuid)
        .listen('.Update', (e) => {
              console.log(e);
              var name = e.name;
              var by = e.by;
      //if you made a change, lets make sure we remind that it was you. only relevant if user has two pages open or is testing rtwa
      if(e.by == "{{auth()->user()->uuid}}"){name = name + " (You)";} 
      //check and see if change was made on your page. if so, dont reload the page since you already did this in ajax:success.
      if(e.originPageUUID != window.pageUUID){
        chat.getMessages();

      }

        });


		}
	});
  

  
jQuery.fn.extend({
		viewActivityLog: function(iurl = false, iuuid = false) {
			var url = iurl;
			var uuid = iuuid;
			if (!url) {
				url = $(this).attr('data-activity-log-url');
			}
			if (!uuid) {
				uuid = $(this).attr('data-activity-log-uuid');
			}
			if (uuid) {
				var logUrl = url + '/' + uuid;
			} else {
				var logUrl = url;
			}
			console.log(logUrl);
			bootbox.dialog({
				title: "Viewing Activity Log",
				size: "large",
				onEscape: true,
				message: '<table id="logTable" class="table table-striped table-bordered" style="width:100%"> <thead> <tr> <th>Action</th> <th>Caused By</th> <th>At</th></tr> </thead> <tfoot> <tr>  <th>Action</th> <th>Caused By</th> <th>At</th> </tr> </tfoot> </table>'
			});
			$('#logTable').DataTable({
				"ajax": logUrl,
        "dom":"<'row'<'col-sm-6'B><'col-sm-6'f>>\\\" + \\\"<'row'<'col-sm-12'tr>>\\\" + \\\"<'row'<'col-sm-5'i><'col-sm-7'p>>","responsive":true,"lengthMenu":[[10,25,50,-1],[10,25,50,"All"]],
				"order": [
					[2, "desc"]
				],
				"columns": [
					{
						"data": "description",
						"visible": true,
            "sortable":false
					},
					{
						"data": "causer",
						"visible": true,
            "sortable":false
					},
					{
						"data": "at",
						"visible": true,
            "sortable":true
					}
				]
			});
		}
	});
  
  

   jQuery.fn.extend({
		placeAlteChat: function(iurl = false, iuuid = false, model = false, ibox = false) {
			var url = iurl;
			var uuid = iuuid;
    
			if (!url) {
				url = $(this).attr('data-comments-url');
			}
			if (!uuid) {
				uuid = $(this).attr('data-comments-uuid');
			}
      if (!model) {
				model = $(this).attr('data-comments-model');
			}
      
   var box = ibox ? $('#'+ibox): $('#alte-chat-box');


      var chat = new AlteChat({'url':url, 'uuid':uuid, 'box':false});
      
      $('#'+box).html(chat.render());
      
       $('#alte-chat-download').on('click', function(){
            chat.downloadPDF(false);
        });
      
        $('#alte-chat-print').on('click', function(){
            chat.downloadPDF(true);
        });
      
        $('#alte-chat-refresh').on('click', function(){
            chat.getMessages();
        });
      
       $('#alte-chat-send-message').on('click', function(){
            chat.sendMessage();
        });
      
      $('#alte-chat-message-input').on("keyup", function(e) {
    if (e.keyCode == 13) {
        chat.sendMessage();
    }
});
      
      
      
      chat.getMessages();
        window.Echo.channel('chat-channels-'+model+'-'+uuid)
        .listen('.Update', (e) => {
              console.log(e);
              var name = e.name;
              var by = e.by;
      //if you made a change, lets make sure we remind that it was you. only relevant if user has two pages open or is testing rtwa
      if(e.by == "{{auth()->user()->uuid}}"){name = name + " (You)";} 
      //check and see if change was made on your page. if so, dont reload the page since you already did this in ajax:success.
      if(e.originPageUUID != window.pageUUID){
        chat.getMessages();

      }

        });


		}
	});
  
 @endpush