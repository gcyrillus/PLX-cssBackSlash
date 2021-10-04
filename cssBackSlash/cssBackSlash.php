<?php
    if(!defined('PLX_ROOT')) {
        die('Oups!');
    }

    class cssBackSlash extends plxPlugin {
        const HOOKS = array(
            'AdminSettingsEdittplFoot',
			'AdminPluginCss',
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

		
		#Ajoute un caractére d'échappement devant chaque \ trouvé dans une feuille de style
        public function AdminSettingsEdittplFoot() {
            echo self::BEGIN_CODE;
?>
$plgPlugin = $plxAdmin->plxPlugins->aPlugins['<?= __CLASS__ ?>'];
if(substr($tpl, strrpos($tpl, '.') + 1) =='css')	echo  '<script src="'.PLX_PLUGINS . '<?= __CLASS__ ?>/js/<?= __CLASS__ ?>.js"></script>';
<?php
            echo self::END_CODE;
        }

		#Ajoute un caractére d'échappement devant chaque \ trouvé dans les feuilles de styles des plugins
        public function AdminPluginCss() {
            echo self::BEGIN_CODE;
?>
			
			?><script>
			
			window.onload = function() {
				
				let txta = document.querySelectorAll("textarea");
				[...txta].forEach((content) => {
				  let css = content.innerHTML;
				  content.innerHTML =escapeRegex(css);
				});
			}				
				function escapeRegex(string) {	
					 return string.replace(/[\\]/g, '\\$&');
				}

			</script>
<?php
            echo self::END_CODE;
        }		
		
    }