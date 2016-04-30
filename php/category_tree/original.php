<?php

class CategoryTree {

  protected $categories = array();

  protected $tree = array();

  public function getSubtree(array $categories, $parentId = 0) {
    $tree = array();

    foreach($categories as $category) {
      if($category['suboff'] == $parentId) {
        $tree[$category['id']] = $category;
        $tree[$category['id']]['children'] = $this->getSubtree($categories, $category['id']);
      }
    }

    return $tree;
  }

}


// Now, use the class with the given data:

$categories = array(
  array(
    'id' => 1,
    'category' => 'software',
    'suboff' => 0
  ),
  array(
    'id' => 2,
    'category' => 'programming',
    'suboff' => 1
  ),
  array(
    'id' => 3,
    'category' => 'Testing',
    'suboff' => 1
  ),
  array(
    'id' => 4,
    'category' => 'Designing',
    'suboff' => 1
  ),
  array(
    'id' => 5,
    'category' => 'Hospital',
    'suboff' => 0
  ),
  array(
    'id' => 6,
    'category' => 'Doctor',
    'suboff' => 5
  ),
  array(
    'id' => 7,
    'category' => 'Nurses',
    'suboff' => 5
  ),
  array(
    'id' => 9,
    'category' => 'Teaching',
    'suboff' => 0
  ),
  array(
    'id' => 10,
    'category' => 'php programming',
    'suboff' => 2
  ),
  array(
    'id' => 11,
    'category' => '.net programming',
    'suboff' => 2
  )
);


$myTree = new CategoryTree();
echo "<pre>";
print_r($myTree->getSubtree($categories,0));

?>