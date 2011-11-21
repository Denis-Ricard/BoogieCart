<?php
class Catalog
{
	public function productList()
	{
		global $db;
		return $db->get_results("SELECT * FROM catalog");
	}
}