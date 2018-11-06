{{--<script>--}}

	
	//this will find the box the element is in and place it unto a loading state/
	jQuery.fn.extend({
		addLoadingOverlay: function(config = false) {
			var box = $(this).getBox(config);
			var htmlObject = $.parseHTML('<div class="overlay"><i class="far fa-sync fa-spin"></i></div>');
			box.append(htmlObject);
		}
	});
	
	jQuery.fn.extend({
		removeLoadingOverlay: function(config = false) {
			var box = $(this).getBox(config);
			box.find('.overlay').remove();
		}
	});
	
	jQuery.fn.extend({
		getBox: function(config = false) {
			var box;
			if(config == false){
				return box = $(this).closest('.box');
			} else {
				if(config.elementID != undefined){
				   return box = $('#'+config.elementID).closest('.box');
				   } 
				if(config.boxID != undefined){
					return box = $('#'+config.boxID);
				}
			}
			console.log('error getting adminlte box');
		}
	});


	function IsJsonString(str) {
		try {
			JSON.parse(str);
		} catch (e) {
			return false;
		}
		return true;
	}
	
		jQuery.fn.extend({
		loadButtons: function(uuid, datatable = false, config = false) {
			var url = false;
			console.log(config.url);
			if(config){
				if(config.url != undefined){ url = config.url; }
			}
			if(!url){ url =  "/api/alpaca/buttons/" + uuid; }
			$.ajax({
				type: "GET",
				url: url,
				contentType: "application/json",
				processData: false,
				success: function(data) {
				var buttons;
				if(datatable != false)
				{
					var table = $('#'+datatable).DataTable();
					
	

						//RELOAD BUTTON
						table.button().add( null, {
							action: function ( e, dt, button, config ) {
								dt.ajax.reload();
							},
							text: 'Reload',
							name: 'reload'
						} );
					
					$.each(data, function(key, value) {
						
				if(key == "custom_actions"){
					$.each(value, function(key2, value2) {
						var buttonnametemp = value2['function'] + ":name";
							if(value2['type'] != undefined && value2['type'] == 'form')
							{

								table.button().add( null, {
									action: function ( e, dt, button, config ) {
										id = dt.rows( { selected: true } ).data().pluck('uuid');
										$(document).alpacaEdit(id[0], {'action':value2['function']});
									},
									text: value2['text'],
									name: value2['function']
								} );
							} else if(value2['type'] != undefined && value2['type'] == 'confirm'){
								table.button().add( null, {
									action: function ( e, dt, button, config ) {
								 	    ids = dt.rows( { selected: true } ).data().pluck('uuid').toArray();
										$(document).confirmAction(ids, {'title':value2['confirm_title'],
																	   'action':value2['function'],
																	   'text':value2['confirm_message']});
									},
									text: value2['text'],
									name: value2['function']
								} );
							} else if(value2['type'] != undefined && value2['type'] == 'redirect'){
									table.button().add( null, {
									action: function ( e, dt, button, config ) {
								 	    id = dt.rows( { selected: true } ).data().pluck('uuid');
										$(document).confirmRedirect(id, {'title':value2['confirm_title'],
																			'url':value2['url'],
																			'redirect_with_uuid':value2['redirect_with_uuid'],
																			'text':value2['confirm_message']});
									},
									text: value2['text'],
									name: value2['function']
								} );
							  }
						
							if(value2['bulk'] != undefined)
							{
								var buttontemp = table.buttons( [buttonnametemp] );
							if(value2['bulk'])
								{
									function checkButton()
									{
										l = table.rows( { selected: true } ).indexes().length;
										if (l === 0 ) {
											buttontemp.disable();
										} else if(l === 1){
											buttontemp.enable();
										} else if(l > 1){
											buttontemp.enable();
										}
									}
									checkButton();
									table.on( 'draw', function () {
											checkButton();
									} );
									table.on( 'select', function () {
											checkButton();
									} );
									table.on( 'deselect', function () {
											checkButton();
									} );
								} else {
									function checkButton()
									{
										l = table.rows( { selected: true } ).indexes().length;
										if (l === 0 ) {
											buttontemp.disable();
										} else if(l === 1){
											buttontemp.enable();
										} else if(l > 1){
											buttontemp.disable();
										}
									}
									checkButton();
									table.on( 'draw', function () {
											checkButton();
									} );
									table.on( 'select', function () {
											checkButton();
									} );
									table.on( 'deselect', function () {
											checkButton();
									} );
								}
							}
					} );
				}

				if(value == "query"){
												//QUERY BUTTON
						table.button().add( null, {
							action: function ( e, dt, button, config ) {
								$(document).alpacaQuery();
							},
							text: 'QUERY',
							name: 'query'
						} );
				}
						

						//DELETE BUTTON
						if(value == "delete"){
							table.button().add(null, {
								action: function ( e, dt, button, config ) {
								 	 ids = dt.rows( { selected: true } ).data().pluck('uuid').toArray();
									 $(document).alpacaDelete(ids, table);
								},
								text: 'Delete',
								name: "delete",
								key: { key: 'd', altKey: true }
							} );
							
							
							var deleteButton = table.buttons( ['delete:name'] );
							
							function checkDeleteButton()
							{
								l = table.rows( { selected: true } ).indexes().length;
								if (l === 0 ) {
									deleteButton.disable();
								} else if(l === 1){
									deleteButton.enable();
								} else if(l > 1){
									deleteButton.enable();
								}
							}
							
							checkDeleteButton();
							
							table.on( 'draw', function () {
									checkDeleteButton();
							} );
							table.on( 'select', function () {
									checkDeleteButton();
							} );
							table.on( 'deselect', function () {
									checkDeleteButton();
							} );
				
						}					
						//EDIT BUTTON
						if(value == "edit"){
							table.button().add( 0, {
								action: function ( e, dt, button, config ) {
								 	 id = dt.rows( { selected: true } ).data().pluck('uuid');
									 $(document).alpacaEdit(id[0]);
								},
								text: 'Edit',
								name: "edit",
								key: { key: 'e', altKey: true }
							} );
							
							
							var editButton = table.buttons( ['edit:name'] );
																		
							function checkEditButton()
							{
								l = table.rows( { selected: true } ).indexes().length;
								if (l === 0 ) {
									editButton.disable();
								} else if(l === 1){
									editButton.enable();
								} else if(l > 1){
									editButton.disable();
								}
							}

							checkEditButton();
							
							table.on( 'draw', function () {
									checkEditButton();
							} );
							table.on( 'select', function () {
									checkEditButton();
							} );
							table.on( 'deselect', function () {
									checkEditButton();
							} );

						}
					
					//CREATE BUTTON
						if(value == "create"){
							table.button().add( 0, {
								action: function ( e, dt, button, config ) {
									 $(document).alpacaCreate(uuid);
								},
								text: 'Create',
								name: "create",
								key: { key: 'c', altKey: true }
							} );
						}

					});
					

					
					
				} else {
					$.each(data, function(key, value) {
						if(value == "create"){ 	console.log('CREATE BUTTON'); }
					});
				}

				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					$(document).handleError(XMLHttpRequest);
				},
			});
		}
	});


	jQuery.fn.extend({
		loadEventDetails: function(url, modal) {
			$.ajax({
				type: "GET",
				url: url,
				contentType: "application/json",
				processData: false,
				success: function(data) {
					$(modal).find('ul').empty();
					$.each(data['data'], function(key, value) {
						$(modal).find('ul').append('<li class="list-group-item"><b>' + key + '</b> <div class="pull-right">' + value + '</div></li>')
					});
					//cycle thru options and display them and their links
					$(modal).find('#event_options').empty();
					if (data['options'] !== undefined) {
						$(modal).find('#event_options').parent().removeClass('hidden');
						$.each(data['options'], function(key, value) {
							var output = '<button type="button" class="btn btn-block btn-lg btn-success"';
							$.each(value, function(key2, value2) {
								output += key2 + '="' + value2 + '"';
							});
							output += '>' + key + '</button>';
							$(modal).find('#event_options').append(output);
						});
					} else {
						$(modal).find('#event_options').parent().addClass('hidden');
					}
					//cyclke thru admin options and display them here.
					$(modal).find('#event_admin').empty();
					if (data['admin'] !== undefined) {

						$(modal).find('#event_admin').parent().removeClass('hidden');
						$.each(data['admin'], function(key, value) {
							var output = '<button type="button" class="btn btn-block btn-lg btn-danger"';
							$.each(value, function(key2, value2) {
								output += key2 + '="' + value2 + '"';
							});
							output += '>' + key + '</button>';
							$(modal).find('#event_admin').append(output);
						});
					} else {
						$(modal).find('#event_admin').parent().addClass('hidden');
					}

				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					$(document).handleError(XMLHttpRequest);
				},
			});
		}
	});


	jQuery.fn.extend({
		handleError: function(XMLHttpRequest) {
			//remove the spinning overlay if it exists
			$("[data-overlay-loader]").remove();
			//if reponse is not defined than give generic error
			if (typeof XMLHttpRequest == "undefined" || typeof XMLHttpRequest.responseJSON == "undefined" || typeof XMLHttpRequest.responseJSON.message == "undefined") {
				return swal('Error', "There was a server error, please reload the page and try again.", 'error');
			}

			var error = "";
			try {
				error = JSON.parse(XMLHttpRequest.responseJSON.message);
			} catch (e) {
				return swal('Error', 'Server Error: Code:1625', 'error');
			}

			//api error response found. lets display it
			if (typeof error.message === 'string' || error.message instanceof String) {
				return swal('Error', error.message, 'error');

			} else if (typeof error.message === 'object' || error.message instanceof Object) {

				//if error is status 400, that attempt field vaildtion marks
				if (typeof XMLHttpRequest.status != "undefined" || XMLHttpRequest.status == 400) {
					var formated = '';
					$.each(error.message, function(index, value) {
						var name = index.replace(".", "_");
						$('[name=' + name + ']').closest('.form-group').addClass('has-error');
						$.each(value, function(key, errmsg) {
							formated += '<b>' + name + '</b><p>' + errmsg + '</p>';
							var error = '<div class="help-block alpaca-message alpaca-message-notOptional"><i class="glyphicon glyphicon-exclamation-sign"></i>' + errmsg + '</div>';
							$('[name=' + name + ']').after(error);
						});
					});
					return swal('Error', formated, 'error');
				} else {
					return swal('Error', error.message, 'error');
				}
			}
		}
	});
	jQuery.fn.extend({
		handleSuccess: function(XMLHttpRequest) {
			var text = 'Action was successful.'
			var success = "";
			try {
				success = JSON.parse(XMLHttpRequest.message);
			} catch (e) {
				 text = 'Action was successful!';
			}
			
		    console.log(success.message);
			if(success.message instanceof Array ){
			   		var formated = '';
					$.each(success.message, function(index, value) {
						formated += "<b>" + index + ":</b>" + value + "</br>";
					});
				text = formated;
			   }
		
				return swal({
					type: 'success',
					title: 'Success',
					html: text,
					showConfirmButton: false,
					timer: 1500
				});	
		}
	});

	jQuery.fn.extend({
		alpacaCreateWithPostRenderSource: function(id, schemaSource, optionsSource, postRenderSource, dataSource = false) {
			var divID = id;
			if (dataSource != false) {
				$.ajax({
					type: "GET",
					url: postRenderSource,
					contentType: "application/json",
					processData: false,
					success: function(data) {
						var postRender = data;
						
						$('#' + divID).alpaca({
							"schemaSource": schemaSource,
							"optionsSource": optionsSource,
							"dataSource": dataSource,
							"postRender": function(control) {
								try {
									eval(postRender); $('#alpaca-loader').remove();
								} catch (error) {
									console.error(error);
								}

							}
						});
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						$(document).handleError(XMLHttpRequest);
					},
				});
			} else {
				$.ajax({
					type: "GET",
					url: postRenderSource,
					contentType: "application/json",
					processData: false,
					success: function(data) {
						var postRender = data;
						console.log('creating alpaca on div ' + divID);
						$('#' + divID).alpaca({
							"schemaSource": schemaSource,
							"optionsSource": optionsSource,
							"postRender": function(control) {
								try {
									eval(postRender); $('#alpaca-loader').remove();
								} catch (error) {
									console.error(error);
								}

							}
						});


					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						$(document).handleError(XMLHttpRequest);
					},
				});
			}

		}
	});

	jQuery.fn.extend({
		alpacaUpdateFormWithSources: function(controlID, schemaSource, optionsSource, postRenderSource) {

			var schema = $(controlID).alpaca().schema;
			var options = $(controlID).alpaca().options;
			var oldData = $(controlID).alpaca().getValue();

			$.ajax({
				type: "GET",
				url: postRenderSource,
				contentType: "application/json",
				processData: false,
				success: function(data) {
					var id = "#" + $(controlID).parent().attr('id');
					var postRender = data;
					$(id).alpaca().destroy();
					$(id).alpaca({
						data: oldData,
						"schemaSource": schemaSource,
						"optionsSource": optionsSource,
						"postRender": function(control) {
							try {
								eval(postRender)
							} catch (error) {
								console.error(error);
							}
						}
					});
					$(id + "-modal").modal('show');

				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					$(document).handleError(XMLHttpRequest);
				},
			});
		}
	});

	jQuery.fn.extend({
		alpacaStore: function(id, url) {
			var data = $('#' + id).alpaca().getValue();
			$.ajax({
				type: "POST",
				url: url,
				data: JSON.stringify(data),
				contentType: "application/json",
				processData: false,
				success: function(data) {
					if ($('#calendar').length) {
						$('#calendar').fullCalendar('refetchEvents');
					}
					if ($('table[id*=datatable').length) {
						$("table[id*=datatable]").DataTable().ajax.reload(null, false);
					}
					swal({
						type: 'success',
						title: 'Success',
						showConfirmButton: false,
						timer: 1500
					});
					$('#' + id).closest('.modal').modal('hide');
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					$(document).handleError(XMLHttpRequest);
				},
			});
		}
	});
	
	jQuery.fn.extend({
		alpacaUpdate: function(id, url) {
			var data = $('#' + id).alpaca().getValue();
			$.ajax({
				type: "PATCH",
				url: url,
				data: JSON.stringify(data),
				contentType: "application/json",
				processData: false,
				success: function(data) {
					if ($('#calendar').length) {
						$('#calendar').fullCalendar('refetchEvents');
					}
					if ($('table[id*=datatable').length) {
						$("table[id*=datatable]").DataTable().ajax.reload(null, false);
					}
					swal({
						type: 'success',
						title: 'Success',
						showConfirmButton: false,
						timer: 1500
					});
					$('#' + id).closest('.modal').modal('hide');
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					$(document).handleError(XMLHttpRequest);
				},
			});
		}
	});

	jQuery.fn.extend({
		alpacaLoadData: function(controlID, schemaSource, optionsSource, postRenderSource) {
			var id = "#" + $(controlID).parent().attr('id');
			var schema = $(controlID).alpaca().schema;
			var options = $(controlID).alpaca().options;
			$.ajax({
				type: "GET",
				url: postRenderSource,
				contentType: "application/json",
				processData: false,
				success: function(data) {
					var mergedPostRender = parentPostRender + data;
					$(id).alpaca().destroy();
					$(id).alpaca({
						"schema": schema,
						"options": options,
						"schemaSource": schemaSource,
						"optionsSource": optionsSource,
						"postRender": function(control) {
							try {
								eval(mergedPostRender)
							} catch (error) {
								console.error(error);
							}
						}
					});
					$(id + "-modal").modal('show');
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					$(document).handleError(XMLHttpRequest);
				},
			});
		}
	});

	jQuery.fn.extend({
		getDataFromUrl: function(url) {

			var dataToReturn = null;
			$.get({
				type: "GET",
				url: url,
				contentType: "application/json",
				processData: false,
				success: function(data) {
					dataToReturn = data;
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					$(document).handleError(XMLHttpRequest);
				},
			});
		}
	});

	jQuery.fn.extend({
		alpacaGetControlID: function(control) {
			return "[data-alpaca-field-id=" + control.getId() + "]";
		}
	});

	jQuery.fn.extend({
		alpacaGetFieldFromControl: function(control, field) {
			var field = control.childrenByPropertyId[field];
			return "#" + field.getId();
		}
	});

	jQuery.fn.extend({
		alpacaGetChildFieldFromControl: function(control, parent, field) {
			var parent = control.childrenByPropertyId[parent];
			var field = parent.childrenByPropertyId[field];
			return "#" + field.getId();
		}
	});

	jQuery.fn.extend({
		alpacaCreate: function(inputUuid = false, options = false) {
			
			var url = "/api";
			var id = Math.random().toString(36).substring(7);
			var storeAction = "/create";
			var uuid = false;
			
			//get the UUID, from the element attribute, or from the options param 
			if(inputUuid == false)
			{
				if($(this).attr('data-alpaca-uuid') !== undefined) {
					uuid = $(this).attr('data-alpaca-uuid');
				} else {
					console.log(uuid);
					return swal('Error', "Unable To Create (ERROR CODE: 102)", 'error');
				}
			} else {
				uuid = inputUuid;
			}

	
			//build the query string
			var queryArray = [];
			var query = '';
			var remove = false;
			//check if we need to remove stuff
			if ($(this).attr('data-alpaca-remove') !== undefined) {
				queryArray.push($(this).attr('data-alpaca-remove').split(','));
			} else if (options['remove'] !== undefined) {
				queryArray.push(options['remove']);
			}
			
			if(queryArray.length == 0)
			{
				query = '?' + $.param( queryArray );
			}
		
			
			var schemaSource = "/api/alpaca/schema/" + uuid + query;
			var optionsSource = "/api/alpaca/options/" + uuid + query;
			var postRenderSource = "/api/alpaca/post-render/" + uuid + query;
			var storeUrl = "/api/" + uuid + query;
			
			




			if (options['title'] !== undefined) {
				var title = options['title'];
			} else if ((this).attr('data-alpaca-title') !== undefined) {
				var title = (this).attr('data-alpaca-title');
			} else if (window.alpaca_create_title !== undefined) {
				var title = window.alpaca_create_title
			} else {
				var title = "Create"
			}
			bootbox.dialog({
				title: '<div id="bootbox-title">'+title+'</div>',
				message: '<div id="' + id + '"><div id="alpaca-loader" class="row text-center"><i class="fas fa-spinner fa-pulse fa-4x"></i></br><h3>Loading Form Please Wait...</h3></div></div>',
				className: "dialogWide",
				buttons: {
					submit: {
						label: 'Submit',
						className: "btn-success btn-lg",
						callback: function() {
							if (!$('#' + id).alpaca().isValid(true)) {
								$('#' + id).alpaca().focus();
								return false;
							}
							$(this).alpacaStore(id, storeUrl);
							return false;
						}
					},
					cancel: {
						label: 'Cancel',
						className: "btn-danger btn-lg pull-left",
						callback: function() {
							return true;
						}
					},
					clear: {
						label: 'Clear',
						className: "btn-warning btn-lg pull-left",
						callback: function() {
							swal('cleared');
							return false;
						}
					}

				}
			});
			//id, schemaSource, optionsSource, postRenderSource, dataSource = false
			$(document).alpacaCreateWithPostRenderSource(id, schemaSource, optionsSource, postRenderSource);

		}
	});

	jQuery.fn.extend({
		alpacaEdit: function(inputUuid = false, options = false) {
			var url = "/api";
			var id = Math.random().toString(36).substring(7);
			var uuid = false;
			
			//get the UUID, from the element attribute, or from the options param 
			if(inputUuid == false)
			{
				if($(this).attr('data-alpaca-uuid') !== undefined) {
					uuid = $(this).attr('data-alpaca-uuid');
				} else {
					console.log(uuid);
					return swal('Error', "No Item Selected To Edit", 'error');
				}
			} else {
				uuid = inputUuid;
			}

	
			//build the query string
			var queryArray = [];
			var query = '?edit=true';
			var remove = false;
			//check if we need to remove stuff
			if ($(this).attr('data-alpaca-remove') !== undefined) {
				queryArray.push($(this).attr('data-alpaca-remove').split(','));
			} else if (options['remove'] !== undefined) {
				queryArray.push(options['remove']);
			}
			
			if(queryArray.length != 0)
			{
				query =+ '&' + $.param( queryArray );
			}
			
			if(options['action'] !== undefined)
			{
				query = '?action=' + options['action'];
			}
		
			var dataSource = "/api/" + uuid;
			var schemaSource = "/api/alpaca/schema/" + uuid + query;
			var optionsSource = "/api/alpaca/options/" + uuid + query;
			var postRenderSource = "/api/alpaca/post-render/" + uuid + query;
			var updateUrl = "/api/" + uuid + query;


			if (options['title'] !== undefined) {
				var title = options['title'];
			} else if ((this).attr('data-alpaca-title') !== undefined) {
				var title = (this).attr('data-alpaca-title');
			} else if (window.alpaca_create_title !== undefined) {
				var title = window.alpaca_create_title
			} else {
				var title = "Edit"
			}
			
		
			bootbox.dialog({
				title: title,
				message: '<div id="' + id + '"></div>',
				className: "dialogWide",
				buttons: {
					updateModel: {
						label: 'Update',
						className: "btn-success btn-lg",
						callback: function() {
							if (!$('#' + id).alpaca().isValid(true)) {
								$('#' + id).alpaca().focus();
								return false;
							}
							$(this).alpacaUpdate(id, updateUrl);
							return false;
						}
					},
					cancel: {
						label: 'Cancel',
						className: "btn-danger btn-lg pull-left",
						callback: function() {
							return true;
						}
					},
					clear: {
						label: 'Reset',
						className: "btn-warning btn-lg pull-left",
						callback: function() {
							$(document).alpacaCreateWithPostRenderSource(id, schemaSource, optionsSource, postRenderSource, dataSource);
							return false;
						}
					}

				}
			});
			//id, schemaSource, optionsSource, postRenderSource, dataSource = false
			$(document).alpacaCreateWithPostRenderSource(id, schemaSource, optionsSource, postRenderSource, dataSource);

		}
	});
	
	jQuery.fn.extend({
		confirmRedirect: function(uuid = false, config = false) {
			if(!config)
			{
				return swal('Error', "This action was improperly setup", 'error');
		    }
			
			console.log(uuid);
			var url = "https://" + window.location.host + config['url'];
			
			if(config['redirect_with_uuid'] != "undefined" && config['redirect_with_uuid'] && uuid != false)
			{			
				if(uuid == false){
					return swal('Error', "This action was improperly setup", 'error');
				} 
				url = url +"/" + uuid[0];
			}
			

			swal({
				title: config['title'],
				text: config['text'],
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes'
			}).then((result) => {
				if (result.value) {
					console.log(url);
					window.open(url, '_blank');
				}
			})
		}
	});
	
		jQuery.fn.extend({
		confirmAction: function(uuids = false, config = false) {
		    var data;
			if(uuids != false)
			{
				if(uuids instanceof Array){
				   data = {"uuids": uuids};
			   } else {
					data = {"uuids": [uuids]};
			   }
			} else if($(this).attr('data-alpaca-uuid') != undefined)
			{
				data = {"uuids": [$(this).attr('data-alpaca-uuid')]};
			}
				
			if(data == undefined || data.length < 1)
			{				
				return swal('Error', "Seems nothing was selected to do this action", 'error');
			}
			
			
			if(!config)
			{
				return swal('Error', "This action was improperly setup", 'error');
		   }

			

			swal({
				title: config['title'],
				text: config['text'],
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes'
			}).then((result) => {
				if (result.value) {
					$.ajax({
						type: "PATCH",
						url: "/api/" + "?action=" + config['action'],
						data: JSON.stringify(data),
						contentType: "application/json",
						processData: false,
						success: function(data) {
							$('#eventDetails').modal('hide');
							$(document).reloadCalendars();
							$(document).reloadDataTables();
							$(document).handleSuccess(data);
						},
						error: function(XMLHttpRequest, textStatus, errorThrown) {
							$(document).handleError(XMLHttpRequest);
						},
					});
				}
			})
		}
	});

	jQuery.fn.extend({
		alpacaDelete: function(uuids = false, datatable = false, ) {
		    var data;
			if(uuids != undefined)
			{
				if(uuids instanceof Array){
				   data = {"uuids": uuids};
			   } else {
					data = {"uuids": [uuids]};
			   }
			} else if($(this).attr('data-alpaca-uuid') != undefined)
			{
				data = {"uuids": [$(this).attr('data-alpaca-uuid')]};
			} else {
				return swal('Error', "Seems nothing was selected for deletion", 'error');
			}

			swal({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes'
			}).then((result) => {
				if (result.value) {
					$.ajax({
						type: "DELETE",
						url: "/api/",
						data: JSON.stringify(data),
						contentType: "application/json",
						processData: false,
						success: function(data) {
							$('#eventDetails').modal('hide');
							$(document).reloadCalendars();
							$(document).reloadDataTables();
							swal({
								type: 'success',
								title: 'Success',
								text: data.message,
								showConfirmButton: false,
								timer: 1500
							});
						},
						error: function(XMLHttpRequest, textStatus, errorThrown) {
							$(document).handleError(XMLHttpRequest);
						},
					});
				}
			})
		}
	});
	
	
	
	jQuery.fn.extend({
		alpacaQuery: function() {
			bootbox.dialog({
				title: 'Query Settings',
				message: '<div id="builder"></div>',
				buttons: {
					submit: {
						label: 'Save',
						className: "btn-success btn-lg",
						callback: function() {
							console.log('save query');
						}
					},
					cancel: {
						label: 'Cancel',
						className: "btn-danger btn-lg pull-left",
						callback: function() {
							return true;
						}
					}

				}
			});

			 $('#builder').queryBuilder({
				plugins: ['bt-tooltip-errors'],
  
  filters: [{
    id: 'name',
    label: 'Name',
    type: 'string'
  }, {
    id: 'category',
    label: 'Category',
    type: 'integer',
    input: 'select',
    values: {
      1: 'Books',
      2: 'Movies',
      3: 'Music',
      4: 'Tools',
      5: 'Goodies',
      6: 'Clothes'
    },
    operators: ['equal', 'not_equal', 'in', 'not_in', 'is_null', 'is_not_null']
  }, {
    id: 'in_stock',
    label: 'In stock',
    type: 'integer',
    input: 'radio',
    values: {
      1: 'Yes',
      0: 'No'
    },
    operators: ['equal']
  }, {
    id: 'price',
    label: 'Price',
    type: 'double',
    validation: {
      min: 0,
      step: 0.01
    }
  }, {
    id: 'id',
    label: 'Identifier',
    type: 'string',
    placeholder: '____-____-____',
    operators: ['equal', 'not_equal'],
    validation: {
      format: /^.{4}-.{4}-.{4}$/
    }
  }]

			  });
			
		}
	});

	jQuery.fn.extend({
		showActivityLog: function(iurl = false, iuuid = false) {
			var url = iurl;
			var uuid = iuuid;
			if (!url) {
				url = $(this).attr('data-alpaca-url');
			}
			if (!uuid) {
				uuid = $(this).attr('data-alpaca-uuid');
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
				message: '<table id="logTable" class="table table-striped table-bordered" style="width:100%"> <thead> <tr> <th>Subject ID</th> <th>Subject Type</th> <th>Action</th> <th>Caused By</th> <th>At</th> <th>Changed Data</th> <th>New Data</th> </tr> </thead> <tfoot> <tr> <th>Subject ID</th> <th>Subject Type</th> <th>Action</th> <th>Caused By</th> <th>At</th> <th>Changed Data</th> <th>New Data</th> </tr> </tfoot> </table>'
			});
			$('#logTable').DataTable({
				"ajax": logUrl,
				"order": [
					[4, "desc"]
				],
				"columns": [{
						"data": "subjectid",
						"visible": false
					},
					{
						"data": "subjectType",
						"visible": false
					},
					{
						"data": "type",
						"visible": true
					},
					{
						"data": "causer",
						"visible": true
					},
					{
						"data": "at",
						"visible": true
					},
					{
						"data": "changed",
						"visible": true
					},
					{
						"data": "data",
						"visible": false
					}
				]
			});
		}
	});
	
		jQuery.fn.extend({
		launchTour: function(uuid = false) {
			if (!uuid) {
				uuid = $(this).attr('data-tour-uuid');
			}
			$.ajax({
				type: "GET",
				url: "/api/"+uuid+"?gettourdata=true",
				contentType: "application/json",
				processData: false,
				success: function(data) {
					console.log('lauching');
					jQuery.globalEval(data);
					console.log('done');

				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					$(document).handleError(XMLHttpRequest);
				},
			});

		}
	});
	
	
	jQuery.fn.extend({
		reloadDataTables: function() {
			if ($('table[id*=datatable').length) {
				$("table[id*=datatable]").DataTable().ajax.reload(null, false);
			}
		}
	});
	
	jQuery.fn.extend({
		reloadCalendars: function() {
			if ($('#calendar').length) {
				$('#calendar').fullCalendar('refetchEvents');
			}
		}
	});



{{--</script>--}}
