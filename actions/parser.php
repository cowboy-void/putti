<?php
class Parser {
	private $actions = '';
	private $filePath = 'files/';

	public function __construct($actions){
		$this->actions = $actions;
		$action = array_shift($actions);
		
		if (method_exists($this, $action)) {
			call_user_func(array($this, $action));
		} else {
			$this->default_action();
		}
	}

	public function default_action(){
		exit();
	}

	public function get_json(){
		
		if ($_SERVER['REQUEST_METHOD'] != 'POST') return false;

		$url = $_POST['url'];
		$html = file_get_contents($url);
		
		$dom = new DOMDocument();

		@$dom->loadHTML($html);

		$jsonTree = $this->get_partial_json_tree($dom->documentElement);
		$jsonTreeForFile = $this->get_full_json_tree($dom->documentElement);

		if (!file_exists($this->filePath)) {
			mkdir($this->filePath);
		}

		$fileName = $_SESSION['lastFileName'] = $this->filePath . md5($url) . '.json';
		file_put_contents($fileName, json_encode($jsonTreeForFile));

		echo json_encode($jsonTree);
	}

	public function get_json_file(){
		
		if(!isset($_SESSION['lastFileName'])) return false;

		$file = file_get_contents($_SESSION['lastFileName']);
		echo $file;
	}

	private function get_partial_json_tree($element){

		if ($element->getAttribute('id')) {
			$eId = ' #'	. $element->getAttribute('id');
		} else {
			$eId = '';
		}

		$tree = [
			'text'=> $element->tagName . $eId,
			'icon'=> false,
		];

	    foreach ($element->childNodes as $subElement) {
	    	if (!isset($subElement->tagName)) continue;
            $tree["children"][] = $this->get_partial_json_tree($subElement);
	    }

	    return $tree;
	}

	private function get_full_json_tree($element){
	
		$tree = [$element->tagName => []];
		$tree[$element->tagName]['value'] = $element->textContent;

		foreach ($element->attributes as $attribute) {
	        $tree[$element->tagName]['attributes'][$attribute->name] = $attribute->value;
	    }	

	    foreach ($element->childNodes as $subElement) {
	    	if (!isset($subElement->tagName)) continue;
            $tree[$element->tagName]["child_nodes"][] = $this->get_full_json_tree($subElement);
	    }

	    return $tree;
	}
}