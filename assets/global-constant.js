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
send_paymentfile_url = "payconfirm_file";
read_course_url = "course";
create_course_url = "createcourse";
create_chapter_url = "createchapter";
create_chapter_url_vid = "createchapter_vid";
upload_certificate_url = "cert_upload";
delete_certificate_url = "cert_delete";
confirm_register_user = "confirm_register";
decline_register_user = "decline_register";

// event
create_event_url = "createevent";
add_course_event_url = "add_course_event";
add_cover_event_url = "add_cover_event";
delete_cover_event_url = "delete_cover_event";
delete_bridge_event_course_url = "delete_bridge_event_course";

// multi-data
get_datatable_url = "datatable";

/* DICTIONARY */
course_dic = "course";
course_single_dic = "single_course";
course_chapter_dic = "course_chapter";
course_member = "course_member";
mentor_dic = "mentor";
user_dic = "user";
event_dic = "event";
event_single_dic = "single_event";
event_member = "event_member";


/*NON CURL*/
noncurl_api_url = "http://temporaryapi.rumahpeneleh.or.id/";

