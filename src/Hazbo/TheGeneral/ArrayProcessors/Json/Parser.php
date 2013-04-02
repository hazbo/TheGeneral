<?php

namespace Hazbo\TheGeneral;

class ArrayProcessors_Json_Parser implements ArrayProcessors_GeneralInterface
{
	private $parsedData;

	private function parse($jsonString, $arrayOrObject)
	{
		return json_decode($jsonString, $arrayOrObject);
	}

	public function parseToArray($jsonString)
	{
		return $this->parsedData = $this->parse($jsonString, true);
	}

	public function parseToObject($jsonString)
	{
		return $this->parsedData = $this->parse($jsonString, false);
	}

	public function getData()
	{
		return $this->parsedData;
	}
}