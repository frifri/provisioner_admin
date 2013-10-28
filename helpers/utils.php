<?php 

class helpers_utils{
    public static function get_account_db($account_id) {
        // making sure that $account_id is well formed
        if (preg_match("#[0-9a-f]{32}#", $account_id))
            // account/xx/xx/xxxxxxxxxxxxxxxx
            return "account/" . substr_replace(substr_replace($account_id, '/', 2, 0), '/', 5, 0);
        else 
            return false;
    }
}