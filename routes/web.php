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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//ROUTES FOR CLIENT MANAGEMENT
Route::get('/clients','ClientManagementController@index')->name('clients.index');
Route::post('/clients/add','ClientManagementController@add')->name('clients.add');
Route::post('/clients/delete','ClientManagementController@delete')->name('clients.delete');
Route::post('/clients/update','ClientManagementController@update')->name('clients.update');

//ROUTES FOR USER MANAGEMENT
Route::get('/Uusers','UserManagementController@index')->name('users.index');
Route::post('/Uusers/add','UserManagementController@adduser')->name('users.adduser');
Route::post('/Uusers/update','UserManagementController@updateuser')->name('users.updateuser');
Route::post('/Uusers/delete','UserManagementController@deleteuser')->name('users.deleteuser');

//MAILS MANAGEMENT
Route::get('/mails/inbox','MailsManagementController@index')->name('mails.index');
Route::get('/mails/compose','MailsManagementController@compose')->name('mails.compose');
Route::post('/mails/compose/insert','MailsManagementController@insert')->name('mails.insert');
Route::get('/mails/sent','MailsManagementController@sent')->name('mails.sent');
Route::get('/mails/readSentMails/{message_id}','MailsManagementController@readsentmail')->name('mails.readsentmail');

//Route for message management
Route::get('messages/inbox','MessageManagementController@inbox')->name('messages.inbox');
Route::get('messages/composeSpecificGroup','MessageManagementController@composespecific')->name('messages.composespecificgroup');
Route::get('messages/composeFullmember','MessageManagementController@composefullmember')->name('messages.composefullmember');
Route::get('messages/composePracticingmember','MessageManagementController@composepracticingmember')->name('messages.composepracticingmember');
Route::get('messages/composeAssociatemember','MessageManagementController@composeassociatemember')->name('messages.composeassociatemember');
Route::get('messages/composeToAll','MessageManagementController@composeToAll')->name('messages.composeToAll');
Route::get('messages/DraftMessages','MessageManagementController@draftMessage')->name('messages.draftmessage');
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