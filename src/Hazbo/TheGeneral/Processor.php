<?php namespace Emery\Component\TheGeneral;

class Processor implements ProcessorInterface
{
	private $loader;
	private $binder;
	private $fileContents;
	private $fileType;

	public function __construct()
	{
		$this->setFileType();

		$this->loader 	  = new Resources_Loader();
		$this->calculator = new Arithmetics_Calculator();
	}

	public function createLoader()
	{
		return $this->loader;
	}

	public function digest($loader)
	{
		$this->fileContents = $loader->getFileContents();
	}

	public function score($dataInput)
	{
		$this->calculator->setJsonSetupArrayReference($this->fileContents);
		$this->calculator->setDataInputArrayReference($dataInput);

		$this->calculator->process();
		return $this->calculator;
	}

	public function setFileType($newFileType = 'json')
	{
		return $this->fileType = $newFileType;
	}
}

?>