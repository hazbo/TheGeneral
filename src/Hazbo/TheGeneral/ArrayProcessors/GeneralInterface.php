<?php

namespace Hazbo\TheGeneral;

interface ArrayProcessors_GeneralInterface
{
	public  function parseToArray($jsonString);
	public  function parseToObject($jsonString);
	public  function getData();
}