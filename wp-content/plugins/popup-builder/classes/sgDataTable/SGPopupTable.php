<?php
require_once(dirname(__FILE__).'/Table.php');

class SGPB_PopupsView extends SGPB_Table
{
	public function __construct()
	{
		global $wpdb;
		parent::__construct('');

		$this->setRowsPerPage(SG_APP_POPUP_TABLE_LIMIT);
		$this->setTablename($wpdb->prefix.'sg_popup');
		$this->setColumns(array(
			'id',
			'title',
			'type'
		));
		$this->setDisplayColumns(array(
			'id' => 'ID',
			'onOff' => 'Enabled (show popup)',
			'title' => 'Title',
			'type' => 'Type',
			'shortcode' => 'Auto shortcode',
			'options' => 'Options'
		));
		$this->setSortableColumns(array(
			'id' => array('id', false),
			'title' => array('title', true),
			$this->setInitialSort(array(
	           'id' => 'DESC'
	       ))
		));
	}

	public function customizeRow(&$row)
	{
        $id = $row[0];
		$ajaxNonce = wp_create_nonce("sgPopupBuilderDeleteNonce");
        $isActivePopup = SgPopupGetData::isActivePopup($id);
        $switchButton = '<label class="sg-switch">
			<input class="sg-switch-checkbox" data-switch-id="'.$id.'" type="checkbox" '.$isActivePopup.' data-ajaxNonce="'.$ajaxNonce.'">
			<div class="sg-slider sg-round"></div>
		</label>';
        $type = $row[2];
       	$editUrl = admin_url()."admin.php?page=edit-popup&id=".$id."&type=".$type."";
        $row[3] = "<input type='text' onfocus='this.select();' readonly value='[sg_popup id=".$id."]' class='large-text code'>";
		$row[4] = '<a href="'.@$editUrl.'">'.__('Edit', 'sgpt').'</a>&nbsp;&nbsp;<a href="#" data-sg-popup-id="'.$id.'" data-ajaxNonce="'.$ajaxNonce.'" class="sg-js-delete-link">'.__('Delete', 'sgpt').'</a>
		<a href="'.admin_url().'admin-post.php?action=popup_clone&id='.$id.'" data-sg-popup-id="'.$id.'" class="sg-js-popup-clone">Clone</a>';
		array_splice( $row, 1, 0, $switchButton); 
	}

	public function customizeQuery(&$query)
	{
		$searchQuery = '';
		global $wpdb;
		if(isset($_POST['s']) && !empty($_POST['s']))
		{
			$searchCriteria = sanitize_title_for_query($_POST['s']);
			$searchQuery = " WHERE title LIKE '%$searchCriteria%' ";
		}
		$query .= $searchQuery;
	}

	public function customizeRowsData(&$popupsData)
	{
		$columnsNames = $this->getColumns();
		$typeKey = array_search('type', $columnsNames);

		foreach ($popupsData as $key => $popupData) {
			$type = $popupData[$typeKey];
			$className = "SG".ucfirst(strtolower($type)).'Popup';
			/* get current popup app path */
			$paths = IntegrateExternalSettings::getCurrentPopupAppPaths($type);

			$popupAppPath = $paths['app-path'];
			if(!file_exists($popupAppPath.'/classes/'.$className.'.php')) {
				unset($popupsData[$key]);
			}

		}
	}


}
