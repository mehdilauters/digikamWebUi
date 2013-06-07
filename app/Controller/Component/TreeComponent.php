<?php
  /**
 * Creates a structured tree out of a flat category list
 */
  
App::uses('Component', 'Controller');
class TreeComponent extends Component{

  /**
   *
   * @var array
   */
  protected $flatTree = array();

  /**
   *
   * @var array
   */
  protected $tree = array();

  /**
   * Default constructor
   * @param array $categories 
   */
  function set(array $flatTree) {
    $this->flatTree= $flatTree;
  }

  /**
   * Process a subtree
   * @param array $categories
   * @param integer $parentId
   * @return array 
   */
  protected function getSubtree(array $flatTree, $parentId = 0) {
    $tree = array();

    foreach($flatTree as $flatEntry) {
      if($flatEntry['TagsTree']['pid'] == $parentId) {
        $tree[$flatEntry['TagsTree']['id']] = $flatEntry;
        $tree[$flatEntry['TagsTree']['id']]['children'] = $this->getSubtree($flatTree, $flatEntry['TagsTree']['id']);
      }
    }

    return $tree;
  }

  /**
   * Get the category tree as structured array
   * @return array 
   */
  public function getTree() {
    if(empty($this->tree)) {
      $this->tree = $this->getSubtree($this->flatTree, 0);
    }
    return $this->tree;
  }

  /**
   * Get the category tree as string representation
   * @return string
   */
  public function __toString() {
    return "<pre>" . print_r($this->getTree(), true) . "</pre>";
  }

}
?>