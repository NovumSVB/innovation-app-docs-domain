<?php
namespace Crud\Custom\InnovationApp\TestingTable\Base;

use Crud\Custom\InnovationApp;
use Crud\FormManager;
use Crud\IApiExposable;
use Crud\IConfigurableCrud;
use Exception\LogicException;
use Model\Custom\NovumDocs\Map\TestingTableTableMap;
use Model\Custom\NovumDocs\TestingTable;
use Model\Custom\NovumDocs\TestingTableQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Map\TableMap;

/**
 * This class is automatically generated, do not modify manually.
 * Modify TestingTable instead if you need to override or add functionality.
 */
abstract class CrudTestingTableManager extends FormManager implements IConfigurableCrud, IApiExposable
{
	use InnovationApp\CrudTrait;

	public function getQueryObject(): ModelCriteria
	{
		return TestingTableQuery::create();
	}


	public function getTableMap(): TableMap
	{
		return new \Model\Custom\NovumDocs\Map\TestingTableTableMap();
	}


	public function getShortDescription(): string
	{
		return "Dit endpoint bevat fake bsn nummers.";
	}


	public function getEntityTitle(): string
	{
		return "TestingTable";
	}


	public function getOverviewUrl(): string
	{
		return "/custom/novumdocs/requirements/test_tabel/overview";
	}


	public function getEditUrl(): string
	{
		return "/custom/novumdocs/requirements/test_tabel/edit";
	}


	public function getCreateNewUrl(): string
	{
		return $this->getEditUrl();
	}


	public function getNewFormTitle(): string
	{
		return "Test tabel toevoegen";
	}


	public function getEditFormTitle(): string
	{
		return "Test tabel aanpassen";
	}


	public function getDefaultOverviewFields(): array
	{
		return ['Bsn', 'Delete', 'Edit'];
	}


	public function getDefaultEditFields(): array
	{
		return ['Bsn'];
	}


	/**
	 * Returns a model object of the type that this CrudManager represents.
	 * @param array $aData
	 * @return TestingTable
	 */
	public function getModel(array $aData = null): TestingTable
	{
		if (isset($aData['id']) && $aData['id']) {
		     $oTestingTableQuery = TestingTableQuery::create();
		     $oTestingTable = $oTestingTableQuery->findOneById($aData['id']);
		     if (!$oTestingTable instanceof TestingTable) {
		         throw new LogicException("TestingTable should be an instance of TestingTable but got something else." . __METHOD__);
		     }
		     $oTestingTable = $this->fillVo($aData, $oTestingTable);
		}
		else {
		     $oTestingTable = new TestingTable();
		     if (!empty($aData)) {
		         $oTestingTable = $this->fillVo($aData, $oTestingTable);
		     }
		}
		return $oTestingTable;
	}


	/**
	 * This method is ment to be called by save so any pre and post events are triggered also.
	 * Store form data, please first perform validation by calling validate
	 * @param array $aData an array of fields that belong to this type of data
	 * @return TestingTable
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function store(array $aData = null): TestingTable
	{
		$oTestingTable = $this->getModel($aData);


		 if(!empty($oTestingTable))
		 {
		     $oTestingTable = $this->fillVo($aData, $oTestingTable);
		     $oTestingTable->save();
		 }
		return $oTestingTable;
	}


	/**
	 * Fills the model object with data comming from a client.
	 * @param array $aData
	 * @param TestingTable $oModel
	 * @return TestingTable
	 */
	protected function fillVo(array $aData, TestingTable $oModel): TestingTable
	{
		isset($aData['bsn']) ? $oModel->setBsn($aData['bsn']) : null;
		return $oModel;
	}
}
