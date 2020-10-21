<?php
namespace AdminModules\Custom\NovumDocs\Requirements\Test_tabel\Base;

use AdminModules\GenericOverviewController;
use Core\LogActivity;
use Core\StatusMessage;
use Core\StatusMessageButton;
use Core\StatusModal;
use Core\Translate;
use Crud\Custom\InnovationApp\TestingTable\CrudTestingTableManager;
use Crud\FormManager;
use Model\Custom\NovumDocs\TestingTable;
use Model\Custom\NovumDocs\TestingTableQuery;
use Propel\Runtime\ActiveQuery\ModelCriteria;

/**
 * This class is automatically generated, do not modify manually.
 * Modify AdminModules\Custom\NovumDocs\Requirements\Test_tabel instead if you need to override or add functionality.
 */
abstract class OverviewController extends GenericOverviewController
{
	public function __construct($aGet, $aPost)
	{
		$this->setEnablePaginate(50);parent::__construct($aGet, $aPost);
	}


	public function getTitle(): string
	{
		return "Test tabel";
	}


	public function getModule(): string
	{
		return "TestingTable";
	}


	public function getManager(): FormManager
	{
		return new CrudTestingTableManager();
	}


	public function getQueryObject(): ModelCriteria
	{
		return TestingTableQuery::create();
	}


	public function doDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$oQueryObject = $this->getQueryObject();
		$oDataObject = $oQueryObject->findOneById($iId);
		if($oDataObject instanceof TestingTable){
		    LogActivity::register("Requirements", "Test tabel verwijderen", $oDataObject->toArray());
		    $oDataObject->delete();
		    StatusMessage::success("Test tabel verwijderd.");
		}
		else
		{
		       StatusMessage::warning("Test tabel niet gevonden.");
		}
		$this->redirect($this->getManager()->getOverviewUrl());
	}


	final public function doConfirmDelete(): void
	{
		$iId = $this->get('id', null, true, 'numeric');
		$sMessage = Translate::fromCode("Weet je zeker dat je dit Test tabel item wilt verwijderen?");
		$sTitle = Translate::fromCode("Zeker weten?");
		$sOkUrl = $this->getManager()->getOverviewUrl() . "?id=" . $iId . "&_do=Delete";
		$sNOUrl = $this->getRequestUri();
		$sYes = Translate::fromCode("Ja");
		$sCancel = Translate::fromCode("Annuleren");
		$aButtons  = [
		   new StatusMessageButton($sYes, $sOkUrl, $sYes, "warning"),
		   new StatusMessageButton($sCancel, $sNOUrl, $sCancel, "info"),
		];
		StatusModal::warning($sMessage, $sTitle, $aButtons);
	}
}
