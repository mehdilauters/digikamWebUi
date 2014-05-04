<?php
class AutoscanShell extends AppShell {
	public $uses = array('User','Image');
	

    public function main() {
        $this->out('Autoscan');

		// $user = $this->User->findById(Configure::read('Digikam.rootUser'));
		
		
		
		App::import('Component', 'Session');
		
		$this->out('Running');
		$res = $this->requestAction('/images/autoscan');
		$this->out('Done');
    }
	
	
}
?>