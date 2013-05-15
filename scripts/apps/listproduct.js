Ext.onReady(function(){
	Ext.BLANK_IMAGE_URL = '../ext/resources/images/default/s.gif';
	var sm = new  Ext.grid.CheckboxSelectionModel({handleMouseDown: Ext.emptyFn});
	var cm = new Ext.grid.ColumnModel([
	   new Ext.grid.RowNumberer(),
	   sm,
	   {header:'Bar Code', dataIndex:'Bar', sortable: true, width:100},
	   {header:'Product ID', dataIndex:'Product_ID', sortable: true, width:100},
	   {header:'Title', dataIndex:'Title', sortable: true, width:120},
	   {header:'Vendor', dataIndex:'Vendor', sortable:true, width:120},
	   {header:'Unit Price', dataIndex:'Unit_Price', sortable: true, width:100},
	   {header:'Product Cost', dataIndex:'Product_Cost', width:100},
	   {header:'US Style', dataIndex:'US_Style', width:120},
	   {header:'HK Style', dataIndex:'HK_Style', width:120},
	   {header:'Last Transaction', dataIndex:'lastTrans', width:120}
	]);
	var store = new Ext.data.Store({
		proxy: new Ext.data.HttpProxy({method:'POST',url:'main.php?u=product&actions=list'}),
		reader: new Ext.data.JsonReader({
			totalProperty: 'totalProperty',
			root: 'root'
		},[
		   {name:'Bar'},
		   {name:'Product_ID'},
		   {name:'Title'},
		   {name:'Vendor'},
		   {name:'Unit_Price'},
		   {name:'Product_Cost'},
		   {name:'US_Style'},
		   {name:'HK_Style'},
		   {name:'lastTrans'}
		]),
		remoteSort:true
	});
	
	var grid = new Ext.grid.GridPanel({
		renderTo: 'grid_table',
		height: 400,
		store: store,
		cm: cm,
		sm: sm,
		loadMask: true,
		viewConfig: {forceFit: true},
		tbar: new Ext.Toolbar({
			items: [{
                text: 'Add Product',
                iconCls: 'silk-user-add',
                handler: function(btn){
					window.location.href = "main.php?u=product&actions=add";
				}
			}, "-",
			{
				text: 'Edit Product',
				iconCls: 'silk-user-edit',
				handler: function(btn){
					var selections = grid.getSelectionModel().getSelections();
					if(selections.length > 0 ){
						var tabs = new Ext.TabPanel({
							activeTab : 0
						});
						
						for(var i = 0; i < selections.length; i++){
							var record = selections[i];
							tabs.add({
								title: record.get("Bar"),
								iconCls: 'silk-user',
								listeners: {activate: function(){
									var u = this.body.getUpdater();
									u.update({
										url: 'main.php?u=product&actions=edit',
										scripts: true,
										method: 'POST',
										params: 'id=' + record.get("Title") + '&shd=0&sft=0'
									});
							    }},
								closable : true
							});
						}
						var win = new Ext.Window({
							width: 800,
							height: 640,
							layout: 'fit',
							title: 'Edit Product',
							animateTarget: 'target',
							items: [tabs],
							buttons: [{
								text: 'Save',
								iconCls: 'icon-save',
								handler: function(btn){
								}
							}, {
								text: 'Cancel',
								iconCls: 'silk-cancel',
								handler: function(btn){
									win.close();
								}
							}]
						});
						win.show();
					} else {
						Ext.MessageBox.confirm('Confirm', 'Please select at least one item to do the operation?', function(btn){});
					}
				}
			},"-",
			{
				text: 'Delete Product',
				iconCls: 'silk-user-delete',
				handler: function(btn){
					var selections = grid.getSelectionModel().getSelections();
					if(selections.length > 0){
						Ext.MessageBox.confirm('Confirm', 'Are you sure to delete the selected item(s)? <br/> Click the "Yes" button to delete the product permanently. <br/> Click the "No" button to cancel the operation.', function(btn){
							if(btn == "yes"){
								var id = [];
								for( var i = 0; i < selections.length; i++){
									var record = selections[i];
									id[i] = record.get("Customer_ID");
								}
								var myMask = new Ext.LoadMask(Ext.get("grid_table"), {msg:"Deleting..."});
								myMask.show();
								$.post("main.php?u=product&actions=delete", {id : id.join(",")}, function(data){
									var d = eval("[" + data + "]");
									if(!d[0]['error']){
										myMask.hide();
										Ext.MessageBox.alert('Delete Product Successfully', d[0]['message'], function(){
											store.reload();
											grid.view.refresh();
										});
									}
								});
							}
						});
					} else {
						 Ext.MessageBox.confirm('Confirm', 'Please select at least one item to do the operation?', function(btn){});
					}
				}
			}
			]
		}),
		bbar: new Ext.PagingToolbar({
			pageSize: 50,
			store: store,
			displayInfo: true,
			emptyMsg: 'There is not customer, Click "Add Product" button to add a new product!'
		})
	});
	
	store.load({params:{start:0, limit:50}});
	
	$("#edit-confirm").dialog({
		autoOpen: false,
		resizable: false,
		height:160,
		width:300,
		modal: true,
		title : "Edit the selected customer",
		buttons: {
			'Yes': function() {
				$(this).dialog('close');
			},
			'No': function() {
				$(this).dialog('close');
			}
		}
	});	

	$("#delete-confirm").dialog({
		autoOpen: false,
		resizable: false,
		height:160,
		width:300,
		modal: true,
		title : "Delete the selected customer",
		buttons: {
			'Yes': function() {
				$(this).dialog('close');
			},
			'No': function() {
				$(this).dialog('close');
			}
		}
	});	

	function op(com,grid){
		if (com=='Delete'){
			$("#delete-confirm").html("Are you sure to delete the selected item?");
			$("#delete-confirm").dialog("open");
		}
		else if (com=='Edit'){
			$("#edit-confirm").html("Are you sure to edit the selected item?");
			$("#edit-confirm").dialog("open");
		}			
	}	
});