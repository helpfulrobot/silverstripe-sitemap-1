<?php
 
class SitemapPage extends Page {
	
	private static $defaults = array(
		'ShowInMenus' => false,
		'ShowInSearch' => false,
		'ShowInSitemap' => false,
		'Priority' => '1.0',
	);
		
	public function SitemapRootItems() {
		$baseClass = ClassInfo::baseDataClass($this->owner->class);
		if (class_exists('Multisites')) {
			$parent = $this->SiteID;
		} else {
			$parent = 0;
		}
		$items = DataObject::get($baseClass, "\"{$baseClass}\".\"ParentID\" = {$parent} AND \"{$baseClass}\".\"ShowInSitemap\" = 1");
		return $items;
	}
	
}
 
class SitemapPage_Controller extends Page_Controller {
}
 
