Ext.BLANK_IMAGE_URL = '../ext/resources/images/default/s.gif';
$(function(){
	var sm = new  Ext.grid.CheckboxSelectionModel({handleMouseDown: Ext.emptyFn});
	var cm = new Ext.grid.ColumnModel([
	   new Ext.grid.RowNumberer(),
	   sm,
	   {header:'Customer ID', dataIndex:'Customer_ID', sortable: true, width:80},
	   {header:'Contact Name', dataIndex:'Contact_Name', sortable: true, width:90},
	   {header:'Company Name', dataIndex:'Company_Name', sortable: true, width:120},
	   {header:'Store Number', dataIndex:'Store_Number', sortable: true, width:80},
	   {header:'Tax ID', dataIndex:'tax_id', width:80},
	   {header:'Phone', dataIndex:'Phone', width:80},
	   {header:'Email', dataIndex:'email', width:120},
	   {header:'Last Order Date', dataIndex:'Last_order_date', sortable: true, width:80, type:'date', renderer: Ext.util.Format.dateRenderer('M d, Y')},
	   {header:'Sales Rep', dataIndex:'salesman', sortable: true, width:80}
	]);
	var store = new Ext.data.Store({
		proxy: new Ext.data.HttpProxy({method:'POST',url:'main.php?u=customer&actions=list'}),
		reader: new Ext.data.JsonReader({
			totalProperty: 'totalProperty',
			root: 'root'
		},[
		   {name:'Customer_ID'},
		   {name:'Contact_Name'},
		   {name:'Company_Name'},
		   {name:'Store_Number'},
		   {name:'tax_id'},
		   {name:'Phone'},
		   {name:'email'},
		   {name:'Last_order_date', type:'date', dateFormat: 'Y-m-d H:i:s'},
		   {name:'salesman'}
		]),
		remoteSort:true
	});
	
	var grid = new Ext.grid.GridPanel({
		renderTo: 'grid_table',
		height: 450,
		store: store,
		cm: cm,
		sm: sm,
		loadMask: true,
		viewConfig: {forceFit: true},
		tbar: new Ext.Toolbar({
			items: [{
                text: 'Add Customer',
                iconCls: 'silk-user-add',
                handler: function(btn){
					window.location.href = "main.php?u=customer&actions=add";
				}
			}, "-",
			{
				text: 'Edit Customer',
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
								title: record.get("Customer_ID"),
								iconCls: 'silk-user',
								listeners: {activate: function(){
									var u = this.body.getUpdater();
									u.update({
										url: 'main.php?u=customer&actions=edit',
										scripts: true,
										method: 'POST',
										params: 'id=' + record.get("Customer_ID") + '&shd=0&sft=0'
									});
							    }},
								closable : true
							});
						}
						var win = new Ext.Window({
							width: 800,
							height: 640,
							layout: 'fit',
							title: 'Edit Customer',
							animateTarget: 'target',
							items: [tabs],
							buttons: [{
								text: 'Save',
								iconCls: 'icon-save',
								handler: function(btn){
								}
							}, {
								text: 'View History Order',
								iconCls: 'silk-calendar-day',
								handler: function(btn){
								}
							}, {
								text: 'View History Invoice',
								iconCls: 'silk-calendar-day',
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
				text: 'Delete Customer',
				iconCls: 'silk-user-delete',
				handler: function(btn){
					var selections = grid.getSelectionModel().getSelections();
					if(selections.length > 0){
						Ext.MessageBox.confirm('Confirm', 'Are you sure to delete the selected item(s)? <br/> Click the "Yes" button to delete the customer permanently. <br/> Click the "No" button to cancel the operation.', function(btn){
							if(btn == "yes"){
								var id = [];
								for( var i = 0; i < selections.length; i++){
									var record = selections[i];
									id[i] = record.get("Customer_ID");
								}
								var myMask = new Ext.LoadMask(Ext.get("grid_table"), {msg:"Deleting..."});
								myMask.show();
								$.post("main.php?u=customer&actions=delete", {id : id.join(",")}, function(data){
									var d = eval("[" + data + "]");
									if(!d[0]['error']){
										myMask.hide();
										Ext.MessageBox.alert('Delete Customer Successfully', d[0]['message'], function(){
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
			emptyMsg: 'There is not customer, Click "Add Customer" button to add a new customer!'
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