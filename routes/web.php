<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/laravel_google_chart','LaravelGoogleGraphController@index');
Route::get('/computational','LaravelGoogleGraphController@computational');
Route::get('/comunicationReport','LaravelGoogleGraphController@comunicationReport');
Route::get('/MailComunicationReport','LaravelGoogleGraphController@MailComunicationReport');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//ROUTES FOR CLIENT MANAGEMENT
Route::get('/clients','ClientManagementController@index')->name('clients.index');
Route::post('/clients/add','ClientManagementController@add')->name('clients.add');
Route::post('/clients/delete','ClientManagementController@delete')->name('clients.delete');
Route::post('/clients/update','ClientManagementController@update')->name('clients.update');
Route::post('/clients/search','ClientManagementController@searchclient')->name('clients.searchclient');

//ROUTES FOR USER MANAGEMENT
Route::get('/Uusers','UserManagementController@index')->name('users.index');
Route::post('/Uusers/add','UserManagementController@adduser')->name('users.adduser');
Route::post('/Uusers/update','UserManagementController@updateuser')->name('users.updateuser');
Route::post('/Uusers/delete','UserManagementController@deleteuser')->name('users.deleteuser');
Route::post('/users/search','UserManagementController@searchuser')->name('users.searchuser');

//MAILS MANAGEMENT
Route::get('/mails/inbox','MailsManagementController@index')->name('mails.index');

Route::get('/mails/compose','MailsManagementController@compose')->name('mails.compose');
Route::post('/mails/compose/insert','MailsManagementController@insert')->name('mails.insert');
Route::post('/mails/compose/insertone','MailsManagementController@insertone')->name('mails.insertone');
Route::get('/mails/sent','MailsManagementController@sent')->name('mails.sent');
Route::get('/mails/send/{client_no}','MailsManagementController@sendOne')->name('mails.sendtoone');

Route::get('/mails/compose/barner/','MailsManagementController@barner')->name('mails.barner');
Route::post('/mails/compose/barner/create','MailsManagementController@createbarner')->name('mails.createbarner');
Route::get('/mails/compose/poster/','MailsManagementController@poster')->name('mails.poster');
Route::post('/mails/compose/poster/create','MailsManagementController@createposter')->name('mails.createposter');

Route::get('/mails/readSentMails/{message_id}','MailsManagementController@readsentmail')->name('mails.readsentmail');

//Route for message management
Route::get('messages/inbox','MessageManagementController@inbox')->name('messages.inbox');
Route::post('messages/sendToOnePerson','MessageManagementController@sendToOnePerson')->name('messages.sendToOnePerson');
Route::get('messages/composeSpecificGroup','MessageManagementController@composespecific')->name('messages.composespecificgroup');
Route::get('messages/composeFullmember','MessageManagementController@composefullmember')->name('messages.composefullmember');
Route::get('messages/composePracticingmember','MessageManagementController@composepracticingmember')->name('messages.composepracticingmember');
Route::get('messages/composeAssociatemember','MessageManagementController@composeassociatemember')->name('messages.composeassociatemember');
Route::get('messages/composeToAll','MessageManagementController@composeToAll')->name('messages.composeToAll');
Route::get('messages/DraftMessages','MessageManagementController@draftMessage')->name('messages.draftmessage');
//send message to one person
Route::get('/messages/send/{client_no}','MessageManagementController@sendOne')->name('messages.sendtoone');
//sending emails
Route::post('messages/sendToSpecific','MessageManagementController@sendToSpecific')->name('messages.sendToSpecific');
Route::post('messages/sendToAssociate','MessageManagementController@sendToAssociate')->name('messages.sendToAssociate');
Route::post('messages/sendToFullmember','MessageManagementController@sendToFullmember')->name('messages.sendToFullmember');
Route::post('messages/sendToPracticingMember','MessageManagementController@sendToPracticingMember')->name('messages.sendToPracticingMember');
Route::post('messages/sendToAllMember','MessageManagementController@sendToAllMember')->name('messages.sendToAllMember');
Route::post('messages/saveDraftMessage','MessageManagementController@saveDraftMessage')->name('messages.saveDraftMessage');
Route::post('messages/deleteDraftMessage','MessageManagementController@deleteDraftMessage')->name('messages.deleteDraftMessage');
Route::post('messages/updateDraftMessage','MessageManagementController@updateDraftMessage')->name('messages.updateDraftMessage');

Route::get('/messages/readMessage/{message_id}','MessageManagementController@readMessage')->name('messages.readmessage');



//compose emails
Route::get('/mails/composeToAllMember','MailsManagementController@composeToAllMember')->name('mails.composeToAllMember');
Route::post('/mails/composeToAllMember/create','MailsManagementController@composeToAllMemberCreate')->name('mails.composeToAllMemberCreate');


Route::get('/mails/composeToPracticingMember','MailsManagementController@composeToPracticingMember')->name('mails.composeToPracticingMember');
Route::post('/mails/composeToPracticingMember/create','MailsManagementController@composeToPracticingMemberCreate')->name('mails.composeToPracticingMemberCreate');

Route::get('/mails/composeToAssociateMember','MailsManagementController@composeToAssociateMember')->name('mails.composeToAssociateMember');
Route::post('/mails/composeToAssociateMember/create','MailsManagementController@composeToAssociateMemberCreate')->name('mails.composeToAssociateMemberCreate');

Route::get('/mails/composeToFullMember','MailsManagementController@composeToFullMember')->name('mails.composeToFullMember');
Route::post('/mails/composeToFullMember/create','MailsManagementController@composeToFullMemberCreate')->name('mails.composeToFullMemberCreate');



//PROFILE MANAGEMENT
Route::get('/profiles','ProfileManagementController@index')->name('profiles.index');
Route::post('/profiles/update','ProfileManagementController@update')->name('profiles.update');

//CHARTS MANAGEMENT CONTROLLER
Route::get('/charts','ChartManagementController@index')->name('charts.index');

//INVOICES
Route::get('/invoices/displayClients','InvoiceManagementController@displayClient')->name('invoices.displayClients');
Route::get('/invoices/searchClients','InvoiceManagementController@searchClient')->name('invoices.searchClients');
Route::post('/invoices/insertInvoice','InvoiceManagementController@insertInvoice')->name('invoices.insertInvoice');
Route::post('/invoices/updateInvoice','InvoiceManagementController@updateInvoice')->name('invoices.updateInvoice');
Route::post('/invoices/deleteInvoice','InvoiceManagementController@deleteInvoice')->name('invoices.deleteInvoice');
Route::get('/invoices/addItemInvoicePage/{invoice_no}','InvoiceManagementController@addItemInvoicePage')->name('invoices.addItemInvoicePage');
Route::post('/invoices/insertInvoiceItem','InvoiceManagementController@insertInvoiceItem')->name('invoices.insertInvoiceItem');
Route::post('/invoices/updateInvoiceItem','InvoiceManagementController@updateInvoiceItem')->name('invoices.updateInvoiceItem');
Route::post('/invoices/deleteInvoiceItem','InvoiceManagementController@deleteInvoiceItem')->name('invoices.deleteInvoiceItem');
Route::get('/invoices/InvoiceManagement/{client_no}','InvoiceManagementController@InvoiceManagement')->name('invoices.InvoiceManagement');
Route::get('invoiceview',array('as'=>'invoiceview','uses'=>'InvoiceManagementController@invoiceview'));
Route::get('/invoices/viewItenInInvoice','InvoiceManagementController@viewItenInInvoice')->name('invoices.viewItenInInvoice');


//route for download
Route::get('disneyplus', 'DisneyplusController@create')->name('disneyplus.create');
Route::post('disneyplus', 'DisneyplusController@store')->name('disneyplus.store');
Route::get('disneyplus/list', 'DisneyplusController@index')->name('disneyplus.index');
Route::get('export', 'DisneyplusController@export');


//ROUTES FOR EXPORT MANAGEMENT
Route::get('client/export/pdf', 'ExportManagementController@clientpdf');
Route::get('client/export/clientpdf', 'ExportManagementController@client');
Route::get('client/export/csv', 'ExportManagementController@clientcsv');
Route::get('client/export/excel', 'ExportManagementController@clientexcel');

//pdf for users
Route::get('user/export/pdf', 'ExportManagementController@userpdf');
Route::get('user/export/csv', 'ExportManagementController@usercsv');
Route::get('user/export/excel', 'ExportManagementController@userexcel');


//pdf for users
Route::get('mail/export/pdf', 'ExportManagementController@mailpdf');
Route::get('mail/export/csv', 'ExportManagementController@mailcsv');
Route::get('mail/export/excel', 'ExportManagementController@mailexcel');
Route::post('mail/export/recipient','ExportManagementController@ccmailpdf')->name('exports.ccmailpdf');


///export for message
//pdf for users
Route::get('message/export/pdf', 'ExportManagementController@messagepdf');
Route::get('message/export/csv', 'ExportManagementController@messagecsv');
Route::get('message/export/excel', 'ExportManagementController@messageexcel');



//REPORTS MANAGEMENT CONTROLLER
Route::get('report/client','ReportManagementController@client')->name('reports.client');
Route::post('report/client/report','ReportManagementController@clientreport')->name('reports.clientreport');
Route::get('report','ReportManagementController@index')->name('reports.index');



//ROUTE FOR INFOBIP
Route::get('/inforbips/send','InfobipManagementController@send')->name('infobips.send');
Route::get('/inforbips/composetospecificgroup','InfobipManagementController@composeToSpecificGroup')->name('infobips.composetospecificgroup');
Route::post('/inforbips/composetospecificgroup/send','InfobipManagementController@sendToSpecific')->name('infobips.sendToSpecific');




//COMPANY PROFILE AND SIGNATURE MANAGEMENT CONTROLLER
Route::get('signatures','SignatureManagementController@index')->name('signatures.index');
Route::post('signatures/insert','SignatureManagementController@insert')->name('signatures.insert');
Route::post('signatures/update','SignatureManagementController@update')->name('signatures.update');
Route::post('signatures/updatelogo','SignatureManagementController@updatelogo')->name('signatures.updatelogo');


//TEST MAILS

Route::get('mails/test','MailsManagementController@test')->name('mails.test');




