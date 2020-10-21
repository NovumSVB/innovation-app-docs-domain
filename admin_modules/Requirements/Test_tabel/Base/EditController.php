<?php
namespace AdminModules\Custom\NovumDocs\Requirements\Test_tabel\Base;

use AdminModules\GenericEditController;
use Crud\Custom\InnovationApp\TestingTable\CrudTestingTableManager;
use Crud\FormManager;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumDocs\Requirements\Test_tabel instead if you need to override or add functionality.
 */
abstract class EditController extends GenericEditController
{
	public function getCrudManager(): FormManager
	{
		return new CrudTestingTableManager();
	}


	public function getPageTitle(): string
	{
		return "Test tabel";
	}
}
