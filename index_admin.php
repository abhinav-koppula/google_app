<?php
define('AT_INCLUDE_PATH', '../../include/');
require (AT_INCLUDE_PATH.'vitals.inc.php');
$_custom_css = $_base_path . 'mods/google_app/module.css';
admin_authenticate(AT_ADMIN_PRIV_GOOGLE_APP);
require (AT_INCLUDE_PATH.'header.inc.php');
?>

<div class="input-form">
	<fieldset class="group_form">
            <legend class="group_form">Administrator Panel</legend>
            <center><b>Check desired services to enable them in Google Apps</b></center>
            <?php
            $query = "SELECT * FROM ".TABLE_PREFIX."my_admin_settings";
            $result = mysql_query($query);
            $row = mysql_fetch_array($result) ;
            if(!$row){
            // no settings saved yet
            $doc = $cal = $you = 0;
            } else {
            // settings saved --> check boxes accordingly
            $my_string = $row['flags'];
            $bit = $my_string[0];
            $doc = $my_string[1];
            $cal = $my_string[2];
            $you = $my_string[3];       
            }
            ?>
            <form name="service_check" action="mods/google_app/admin_settings.php" method="GET">
                <input type="checkbox" <?php if($doc) { ?> checked="true" <?php } ?> name="doc" value="1" /> Google Docs<br />
                <input type="checkbox" <?php if($cal) { ?> checked="true" <?php } ?> name="cal" value="1" /> Google Calendars<br />
                <input type="checkbox" <?php if($you) { ?> checked="true" <?php } ?> name="you" value="1" /> Youtube<br /><br />
                <div class="row buttons"><input type="submit" value="SAVE SETTINGS" /></div>
                 
            </form>           
        </fieldset>	
</div>

<?php require (AT_INCLUDE_PATH.'footer.inc.php'); ?>