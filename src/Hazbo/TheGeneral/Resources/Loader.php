<?php

namespace Hazbo\TheGeneral;

class Resources_Loader
{
	private $fileContents;

	public function getFileContents()
	{
		return $this->fileContents;
	}

	public function loadJsonFile($jsonFilePath)
	{
		$this->fileContents = file_exists($jsonFilePath) ? file_get_contents($jsonFilePath) : false;
	}
}