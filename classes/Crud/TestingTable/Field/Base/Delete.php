<?php 
namespace Crud\Custom\InnovationApp\TestingTable\Field\Base;

use Crud\Generic\Field\GenericDelete;
use Crud\IEventField;
use Model\Custom\NovumDocs\TestingTable;

abstract class Delete extends GenericDelete implements IEventField
{
	public function getDeleteUrl($oObject = null)
	{
		if($oObject instanceof TestingTable)
		{
		     return "/custom/novumdocs/requirements/test_tabel/overview?_do=ConfirmDelete&id=" . $oObject->getId();
		}
		return '';
	}


	public function getIcon(): string
	{
		return "trash";
	}


	public function getUnDeleteUrl($oObject = null)
	{
		if($oObject instanceof TestingTable)
		{
		     return "/custom/novumdocs/test_tabel?_do=UnDelete&id=" . $oObject->getId();
		}
		return '';
	}
}
