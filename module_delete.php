<?php
/*******
 * this function named [module_name]_delete is called whenever a course content is deleted
 * which includes when restoring a backup with override set, or when deleting an entire course.
 * the function must delete all module-specific material associated with this course.
 * $course is the ID of the course to delete.
 */

function google_app_delete($course) {
	global $db;

	// delete google_app course table entries
	$sql = "DELETE FROM ".TABLE_PREFIX."google_app WHERE course_id=$course";
	mysql_query($sql, $db);

	// delete google_app course files
	$path = AT_CONTENT_DIR .'google_app/' . $course .'/';
	clr_dir($path);
}

?>