<?php

class sd_so_line extends dbObject {

 public static $table_name = "sd_so_line";
 public static $primary_column = "sd_so_line_id";
 public static $parent_primary_column = "sd_so_header_id";
 public static $key_column = 'line_number';
 public static $module = "sd";
 public $checkbox = [
  "rev_enabled_cb"
 ];
 public $line_status_a = [
  'ENTERED' => 'Entered',
  'AWAITING_PICKING' => 'Awaiting Picking',
  'PICKED' => 'Picked',
  'PARTIAL_PICKED' => 'Partially Picked',
  'SHIPPED' => 'Shipped',
  'PARTIAL_SHIPPED' => 'Partial Shipped',
  'CLOSED' => 'Closed',
 ];
 public $field_a = [
  'sd_so_line_id',
  'sd_so_header_id',
  'line_type',
  'line_number',
  'item_id_m',
  'shipping_org_id',
  'line_status',
  'requested_date',
  'promise_date',
  'schedule_ship_date',
  'actual_ship_date',
  'item_description',
  'line_description',
  'uom_id',
  'line_quantity',
  'picked_quantity',
  'shipped_quantity',
  'invoiced_quantity',
  'price_list_header_id',
  'price_date',
  'unit_price',
  'line_price',
  'reference_doc_type',
  'supply_source',
  'destination_type',
  'tax_code_id',
  'tax_amount',
  'gl_line_price',
  'gl_tax_amount',
  'reference_doc_number',
  'ar_transaction_header_id',
  'ar_transaction_line_id',
  "kit_cb",
  'kit_configured_cb',
  'bom_config_header_id',
  'wip_wo_header_id',
  "created_by",
  "creation_date",
  "last_update_by",
  "last_update_date"
 ];
 public $initial_search = [
  "sd_so_header_id",
  "so_number",
  "item_id_m",
  "item_number",
  "item_description"
 ];
 public $column = [
  "sd_so_header_id",
  "so_number",
  "item_id_m",
  "item_number",
  "item_description"
 ];
 public $requiredField = [
  'sd_so_header_id',
  'line_number',
  'item_description'
 ];
 
  public $numberField = [
  'exchange_rate',
  'line_quantity',
  'unit_price',
  'line_price',
  'gl_line_price',
  'gl_tax_amount'
 ];
  
 public $fields_inForm_notInDataBase = [
  "so_number",
  "item_number",
  'tax_code_value',
  'ar_transaction_number'
 ];
 public $fields_inHeader_needsToBeInserted_inPOST = [
  "sd_so_header_id"
 ];
 public $notUpdatedFromWebForm = [
  'actual_ship_date',
 ];
 public $sd_so_line_id;
 public $sd_so_header_id;
 public $line_type;
 public $line_number;
 public $item_id_m;
 public $item_description;
 public $line_description;
 public $uom_id;
 public $line_quantity;
 public $picked_quantity;
 public $shipped_quantity;
 public $invoiced_quantity;
 public $price_list_header_id;
 public $price_date;
 public $unit_price;
 public $line_price;
 public $tax_code_id;
 public $tax_amount;
  public $gl_tax_amount; 
 public $gl_line_price;
 public $reference_doc_type;
 public $reference_doc_number;
 public $ar_transaction_header_id;
 public $ar_transaction_line_id;
 public $supply_source;
 public $destination_type;
 public $kit_configured_cb;
 public $kit_cb;
 public $bom_config_header_id;
 public $wip_wo_header_id;
 public $po_status;
 public $rev_enabled_cb;
 public $rev_number;
 public $created_by;
 public $creation_date;
 public $last_update_by;
 public $last_update_date;
 public $shipping_org_id;
 public $line_status;
 public $requested_date;
 public $promise_date;
 public $schedule_ship_date;
 public $actual_ship_date;
 public $time;
 public $msg;
 public $item_number;
 public $tax_code_value;
 public $ar_transaction_number;

 private function _validate_before_save() {
  $ret = 1;
  $item = item::find_by_orgId_item_id_m($this->item_id_m, $this->shipping_org_id);
  if ($item) {
   if (empty($item->customer_ordered_cb)) {
    $ret = -90;
    echo "<br> The item is not enabled for Sales ";
   }
  } else {
   $ret = -90;
   echo "<br> The item is not assigned to the organization";
  }

  if (!empty($this->kit_cb) && empty($this->bom_config_header_id)) {
   $ret = -90;
   echo "<br><div class='message'><div class='alert alert-danger'>Sales line is not saved as selected <strong>configured item has no configuration.</strong></div> "
   . "<br>Select configuration & save again.</div>";
  } else if (empty($this->bom_config_header_id) && !empty($this->kit_cb) && !empty($this->bom_config_header_id)) {
   $this->bom_config_header_id = 1;
  }
  return $ret;
 }

 public function _before_save() {
  if ($this->_validate_before_save() < 0) {
   return -90;
  }

  if (!(empty($this->shipping_org_id))) {
   if (!(empty($this->item_number))) {
    $item_s = item::find_by_itemNumber_orgId($this->item_number, $this->shipping_org_id);
    $this->item_id_m = $item_s->item_id_m;
   }
  } else {
   echo "<br> Saving line data failed!. No shipping organization. Error @ po_line @" . __LINE__;
   return -99;
  }

  if ((empty($this->line_status)) && (!empty($this->schedule_ship_date))) {
   $this->line_status = $this->line_quantity < 0 ? 'AWAITING_RETURN' : 'AWAITING_PICKING';
   echo "<div class='alert alert-danger'>Line status is updated to <strong> ".$this->line_status.".</strong></div> ";
  } else if (($this->line_status = 'ENTERED') && (!empty($this->schedule_ship_date))) {
   $this->line_status = $this->line_quantity < 0 ? 'AWAITING_RETURN' : 'AWAITING_PICKING';
  } else if ((empty($this->line_status)) && (empty($this->schedule_ship_date))) {
   $this->line_status = 'ENTERED';
  }

  if ((empty($this->supply_source))) {
   $this->supply_source = 'INV';
  }
 }

 public function _after_save() {
  
 }

 public function findAll_ByOrgId($org_id, $status = '') {
  $sql = " SELECT * FROM " .
   self::$table_name .
   " WHERE shipping_org_id= :shipping_org_id  ";
  if (!empty($status)) {
   $sql .= " AND line_status = :line_status ";
   $value_a = ['shipping_org_id' => $org_id, 'line_status' => $status];
  } else {
   $value_a = ['shipping_org_id' => $org_id];
  }
  $result_array = $this->findBySql($sql, $value_a);
  return !empty($result_array) ? $result_array : false;
 }

 Public static function sd_so_line_types() {
  $option_header = option_header::find_by_name('PO_LINE_TYPE');
  $po_types = option_line::find_by_option_id($option_header->option_header_id);
  return $po_types;
 }

 public static function find_by_sd_so_headerId($sd_so_header_id) {
  $sql = "SELECT * FROM " . self::$table_name . " where sd_so_header_id = '{$sd_so_header_id}'";
  $result_array = self::find_by_sql($sql);
  return $result_array;
 }

 public static function find_by_orgId_itemId_ssd($org_id, $item_id_m = '', $ssd = '') {
  $sql = " SELECT * FROM ";
  $sql .= self::$table_name;
  $sql .= " WHERE shipping_org_id = '{$org_id}'";
  $sql .= " AND schedule_ship_date IS NOT NULL ";
  if (!empty($item_id_m)) {
   $sql .= " AND item_id_m = '{$item_id_m}'";
  }
  if (!empty($ssd)) {
   $sql .= " AND schedule_ship_date >= '{$ssd}'";
  }
  $result_array = self::find_by_sql($sql);
  return !empty($result_array) ? $result_array : false;
 }

 public function copy($sd_so_line_id) {
  global $db;
  $sql1 = " CREATE TEMPORARY TABLE tmptable SELECT * FROM sd_so_line WHERE `sd_so_line_id` = '{$sd_so_line_id}' ";
  if ($db->query($sql1)) {
   $sql2 = "  UPDATE tmptable SET `sd_so_line_id` = '' ,
           `org_id` = '{$this->org_id}' 
          WHERE `sd_so_line_id` = '{$sd_so_line_id}' ";
   if ($db->query($sql2)) {
    $sql3 = " INSERT INTO `sd_so_line` SELECT * FROM tmptable WHERE `sd_so_line_id` = '' ";
    if ($db->query($sql3)) {
     $this->sd_so_line_id = $db->insert_id();
     $this->msg = 1;
    } else {
     $this->msg = 0;
    }
   }
  }
  return $this->msg;
 }

}

//end of sd_so_line class
?>