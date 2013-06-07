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
    $this->Album->recursive = -1;
    $albums = $this->Album->find('all');
    $sortedAlbums = array();
    foreach ($albums as $album) {
      $sortedAlbums[] = $album['Album']['relativePath'];
    }
    sort($sortedAlbums);
    
    
    $tree = array();
    $ids = array();
    foreach ($sortedAlbums as $album) {
      
      $albumId = NULL;
      foreach ($albums as $completeAlbum) {
        if($completeAlbum['Album']['relativePath'] == $album)
        {
          $ids[] = $completeAlbum['Album']['id'];
          break;
        }
      }
      
      $albumExplode = explode('/', $album);
      foreach ($albumExplode as $folder) {
        if($folder != '' )
        {
          $currentNode = &$currentNode[$folder];
        
        }
        else
        {
          if(strlen($album) == 1)
          {
            $tree['root'] = array();
            $currentNode = &$tree['root'];
            break;
          }
          else
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
//     $this->Album->recursive = 3;
    /*    $this->Album->contain("AlbumRoot");
    $this->Album->contain("Image");
    $this->Album->Image->contain("ImageTag"); */
    
//     $this->Album->Image->contain('ImageTag');
//     $this->Album->Image->ImageTag->contain('Tag');
    
    $options = array('conditions' => array('Album.' . $this->Album->primaryKey => $id),
                     'contain'   => array('AlbumRoot', 'Image', 'Image.ImageTag', 'Image.ImageTag.Tag', 'Image.ImageTag.Tag.ImageTagProperty', 'Image.ImageInformation'));
    $album = $this->Album->find('first', $options);
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
  
  
//   public function beforeFilter()
//   {
//     $tree = $this->getTree();
//     $this->set('albumTree',$tree);
//   }
}
