<?php 

/**
*  main 2600hz class
*/
class models_2600hz{
    private $_account_id;
    private $_account_db;
    private $_mac_address;
    private $_db;

    function __construct($mac_address) {
        $this->_db = new libs_bigcouch();
        $this->_mac_address = strtolower($mac_address);
    }

    public function display_doc($title, $doc) {
        if ($doc) {
            echo "$title doc: <br>";
            echo "<pre>";
            print_r($doc);
            echo "</pre>";
        } else
            echo "Nah... No result for this mac address";

        echo "<hr>";
    }

    public function display_mac_lookup($format = false) {
        $mac_doc = $this->_db->get('mac_lookup', $this->_mac_address, $format);

        $this->display_doc('mac_lookup', $mac_doc);

        if ($mac_doc) {
            $this->_account_id = $mac_doc['account_id'];
            $this->_account_db = helpers_utils::get_account_db($this->_account_id);
            return true;
        } else return false;
    }

    public function display_account() {
        $account_doc = $this->_db->get($this->_account_db, $this->_account_id);
        $this->display_doc('account', $account_doc);
    }

    public function display_device($format = false) {
        $device_doc = $this->_db->get($this->_account_db, $this->_mac_address, $format);
        $this->display_doc('device', $device_doc);
    }
}