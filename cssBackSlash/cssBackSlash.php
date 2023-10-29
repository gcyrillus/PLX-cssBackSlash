<?php
	if(!defined('PLX_ROOT')) {
		die('does not run on its own');
	}
	
	class cssBackSlash extends plxPlugin {
		const HOOKS = array(
		'AdminFootEndBody',
		);
		const BEGIN_CODE = '<?php' . PHP_EOL;
		const END_CODE = PHP_EOL . '?>';
		
		public function __construct($default_lang) {
			# appel du constructeur de la classe plxPlugin (obligatoire)
			parent::__construct($default_lang);
			
			# Ajoute des hooks
			foreach(self::HOOKS as $hook) {
				$this->addHook($hook, $hook);
			}
		}
		
		#Ajoute un caractére d'échappement devant chaque \ trouvé dans un formulaire
		public function AdminFootEndBody() {
			echo self::BEGIN_CODE;
		?>
		$plgPlugin = $plxAdmin->plxPlugins->aPlugins['<?= __CLASS__ ?>'];
		echo  '<script src="'.PLX_PLUGINS . '<?= __CLASS__ ?>/js/<?= __CLASS__ ?>.js"></script>';
		<?php
			echo self::END_CODE;
		}	
		
	}
