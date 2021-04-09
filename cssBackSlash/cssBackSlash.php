<?php
    if(!defined('PLX_ROOT')) {
        die('Are you silly ?');
    }

    class cssBackSlash extends plxPlugin {
        const HOOKS = array(
            'AdminSettingsEdittplFoot',
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

        public function AdminSettingsEdittplFoot() {
            echo self::BEGIN_CODE;
?>
//code

$plgPlugin = $plxAdmin->plxPlugins->aPlugins['<?= __CLASS__ ?>'];


if(substr($tpl, strrpos($tpl, '.') + 1) =='css') {
	echo  '<script src="'.PLX_PLUGINS . '<?= __CLASS__ ?>/js/<?= __CLASS__ ?>.js"></script>';
	}
<?php
            echo self::END_CODE;
        }

    }