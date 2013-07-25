<?php
App::uses('AppController', 'Controller');
/**
 * Albums Controller
 *
 * @property Album $Album
 */
class AlbumsController extends AppController {

/**
 * index method
 *
 * @return void
 */
  public function index() {
    $this->Album->recursive = 2;
    $this->set('albums', $this->paginate());
  }

  public function getTree()
  {
  	$conditions = array();
  	if( $this->Auth->user('id') != 1 )
  	{
  		$conditions = array('Album.id in ('.implode(', ', $this->Session->read('Rights.UserAvailablesAlbums')).')');
  	}
  	
    $this->Album->recursive = -1;
    $albums = $this->Album->find('all',
    		array(
    				'conditions'=>$conditions,
    			)
    		);
    
    // get the list of album paths
    $sortedAlbums = array();
    foreach ($albums as $album) {
      $sortedAlbums[] = $album['Album']['relativePath'];
    }
    
    // sort it
    sort($sortedAlbums);
    
    
    $tree = array();
    $ids = array();
    
    // foreach album path
    foreach ($sortedAlbums as $album) {
      
      $albumId = NULL;
      // for each complete album structure
      foreach ($albums as $completeAlbum) {
      	// if the album info corresponds to the current album
        if($completeAlbum['Album']['relativePath'] == $album)
        {
          // add it
          $ids[$album] = $completeAlbum['Album']['id'];
          break;
        }
      }
      
      // get all its subfolder
      $albumExplode = explode('/', $album);
      foreach ($albumExplode as $folder) {
      	// add it to the tree
        if($folder != '' )
        {
          $currentNode = &$currentNode[$folder];
        
        }
        else
        {
          if(strlen($album) == 1) // album = '/'
          {
            $tree['root'] = array();
            $currentNode = &$tree['root'];
            break;
          }
          else // add it to the tree
          {
            $currentNode = &$tree['root'];
          }
        }
      }
    }
    return array('tree'=>$tree, 'ids'=>$ids);
  }
  
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function view($id = null) {
    if (!$this->Album->exists($id)) {
      throw new NotFoundException(__('Invalid album'));
    }
    
    if( ! ( in_array($id, $this->Session->read('Rights.UserAvailablesAlbums')) || $this->Auth->user('id') == 1 ))
    {
    	throw new ForbiddenException('Frobidden');
    }
    
    
    
    $options = array('conditions' => array('Album.' . $this->Album->primaryKey => $id),
//     				'joins' => array( 
//     						'type'=>'INNER JOIN',
//     			'table'=>'ImageTags',
//                  'alias' => 'ImageTag',
//                  'on'=> 
//                  'ImageTag.tagid not in ('.implode($this->Session->read('Rights.UserForbiddenTags'), ', ').')'
//            ),
                     'contain'   => array( 'AlbumRoot', 'Image', 'Image.ImageTag', 'Image.ImageTag.Tag', 'Image.ImageTag.Tag.ImageTagProperty', 'Image.ImageInformation')
    );
    
    
    $album = $this->Album->find('first', $options);
    
    $this->set('title_for_layout', 'Album / '.$album['Album']['relativePath']);
    
    //debug($album);
    foreach ($album['Image'] as $id => $image) {
    	$album['Image'][$id]['Album']['id'] = $album['Album']['id'];
    	$album['Image'][$id]['Album']['relativePath'] = $album['Album']['relativePath'];
    	foreach ($image['ImageTag'] as $tag)
    	{
    	  if( in_array($tag['Tag']['id'], $this->Session->read('Rights.UserForbiddenTags') ))
    	  		{
    	  			unset($album['Image'][$id]);
    	  		}    		
    	}
    }
    $this->set('album', $album);
    $this->set('selectedAlbum', explode('/',$album['Album']['relativePath']));
  }

/**
 * add method
 *
 * @return void
 */
  public function add() {
    if ($this->request->is('post')) {
      $this->Album->create();
      if ($this->Album->save($this->request->data)) {
        $this->Session->setFlash(__('The album has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The album could not be saved. Please, try again.'));
      }
    }
    $albumRoots = $this->Album->AlbumRoot->find('list');
    $this->set(compact('albumRoots'));
  }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function edit($id = null) {
    if (!$this->Album->exists($id)) {
      throw new NotFoundException(__('Invalid album'));
    }
    if ($this->request->is('post') || $this->request->is('put')) {
      if ($this->Album->save($this->request->data)) {
        $this->Session->setFlash(__('The album has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The album could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('Album.' . $this->Album->primaryKey => $id));
      $this->request->data = $this->Album->find('first', $options);
    }
    $albumRoots = $this->Album->AlbumRoot->find('list');
    $this->set(compact('albumRoots'));
  }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function delete($id = null) {
    $this->Album->id = $id;
    if (!$this->Album->exists()) {
      throw new NotFoundException(__('Invalid album'));
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->Album->delete()) {
      $this->Session->setFlash(__('Album deleted'));
      $this->redirect(array('action' => 'index'));
    }
    $this->Session->setFlash(__('Album was not deleted'));
    $this->redirect(array('action' => 'index'));
  }
  
  
	function beforeFilter() {
		parent::beforeFilter();
		if($this->Auth->loggedIn())
		{
			$this->Auth->allow('getTree');
			$this->Auth->allow('view');
		}	
	}
}
