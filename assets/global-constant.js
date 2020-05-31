var pathparts = location.pathname.split("/");
if (location.host == "localhost") {
	var base_url = location.origin + "/" + pathparts[1].trim("/") + "/";
} else {
	var base_url = location.origin + "/";
}


/* URL BACKEND CURL */
post_url = "api/IndexApi/post";
post_file_url = "api/IndexApi/post_file";
put_url = "api/IndexApi/put";
get_url = "api/IndexApi/get";

/* URL API */
add_user_url = "regissubmit";
login_user_url = "login";

// course
send_payment_url = "payconfirm";
send_task_url = "course_assignment";
send_paymentfile_url = "payconfirm_file";
read_course_url = "course";
create_course_url = "createcourse";
create_chapter_url = "createchapter";
delete_chapter_url = "deletechapter";
create_chapter_url_vid = "createchapter_vid";
update_course_url = "updatecourse";
delete_course_url = "deletecourse";
upload_certificate_url = "cert_upload";
delete_certificate_url = "cert_delete";
confirm_register_user = "confirm_register";
decline_register_user = "decline_register";

// assignment
assignment_download_url = 'assignment_download';

// Certificate
cert_enable_url = 'cert_enable';
cert_disable_url = 'cert_disable';

// event
create_event_url = "createevent";
update_event_url = "updateevent";
delete_event_url = "deleteevent";
add_course_event_url = "add_course_event";
add_cover_event_url = "add_cover_event";
delete_cover_event_url = "delete_cover_event";
delete_bridge_event_course_url = "delete_bridge_event_course";
confirm_event_register_user = "regisevent_confirm";
decline_event_register_user = "regisevent_decline";
create_gallery_event_url = "create_gallery_event";
upload_gallery_event_url = "upload_gallery_event";
delete_picture_event_url = "delete_gallery_event";


// user
update_profile_url = "regisupdate";
update_profile_textbased_url = "regisupdate_text";
delete_mentor_url = "delete_mentor";

// multi-data
get_datatable_url = "datatable";

/* DICTIONARY */
course_dic = "course";
course_single_dic = "single_course";
course_chapter_dic = "course_chapter";
course_member = "course_member";
mentor_dic = "mentor";
user_dic = "user";
user_single_dic = "single_user";
event_dic = "event";
event_single_dic = "single_event";
event_member_dic = "event_member";
event_gallery_dic = "event_gallery";
assignment_all = "assignment_all";
cert_status_dic = "cert_status";

/*NON CURL*/
noncurl_api_url = "http://temporaryapi.rumahpeneleh.or.id/";
// noncurl_api_url = "http://api.research-academy.org/";


/*ZOOM*/
zoom_activation_url = "zoomactivate";
zoom_create_url = "zoomcreatemeeting";