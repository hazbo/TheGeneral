<?php namespace Emery\Component\TheGeneral;

class Arithmetics_Calculator
{
	private $setupArray;
	private $dataInputArray;
	private $arrayProcessorClass;
	private $orderedResults;

	private function prepareForBinding()
	{
		return $this->setupArray = $this->arrayProcessorClass->parseToArray($this->setupArray);
	}

	private function getPossibilities()
	{
		return $this->setupArray['possibilities'];
	}

	private function loopThroughDataCategories($possibilities = array())
	{
		$categories 	 = $this->setupArray['categories'];
		$possibilitySums = array();
		$result 		 = array();
		foreach ($categories as $categoryName => $category) {
			foreach ($this->dataInputArray as $key => $value) {
				if ($category[$key]) {
					$possibilitySums[$categoryName][$key] = ($category[$key] * $value);
				}
			}
		}
		foreach ($possibilitySums as $categoryName => $value) {
			$result[$categoryName] = array_sum(array_values($value));
		}
		asort($result, SORT_NUMERIC);
		return $this->orderedResults = $result;
	}

	public function __construct($fileType = 'json')
	{
		$arrayProcessorDynamicClassName
			= '\Emery'
			. '\Component'
			. '\TheGeneral'
			. '\ArrayProcessors'
			. '_' . ucfirst($fileType) . '_'
			. 'Parser';

		$this->arrayProcessorClass = new $arrayProcessorDynamicClassName();
	}

	public function getCategoryName()
	{
		return end(array_keys($this->orderedResults));
	}

	public function process()
	{
		$this->prepareForBinding();
		$this->loopThroughDataCategories($this->getPossibilities());
	}

	public function setJsonSetupArrayReference($newSetupArray)
	{
		return $this->setupArray = $newSetupArray;
	}

	public function setDataInputArrayReference($newDataInputArray)
	{
		return $this->dataInputArray = $newDataInputArray;
	}
}

?>