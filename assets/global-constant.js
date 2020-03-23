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
