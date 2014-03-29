<?php
/*
  ___  _ __   ___ _   _  ___
 / _ \| '_ \ / _ \ | | |/ _ \
| (_) | | | |  __/ |_| |  __/
 \___/|_| |_|\___|\__, |\___|
                  |___/

oneye is released under the GNU Affero General Public License Version 3 (AGPL3)
 -> provided with this release in license.txt
 -> or via web at www.gnu.org/licenses/agpl-3.0.txt

Copyright © 2005 - 2010 eyeos Team (team@eyeos.org)
             since 2010 Lars Knickrehm (mail@lars-sh.de)
*/

chdir('./../');
error_reporting(0);
@ini_set('arg_separator.output','&amp;');
@ini_set('max_execution_time',0);
@session_start();
@set_time_limit(0);

define('INSTALL_DIR','./installer/');
define('INSTALL_INDEX','./index.html');
define('INSTALL_INSTALLER',1);
define('INSTALL_MD5', 'e8fa1196859c599e0bd930ce6d21377b');
define('INSTALL_PACKAGE','./package.eyepackage');
define('INSTALL_SYSTEM',1);
define('INSTALL_UPDATER',1);
define('INSTALL_VERSION', '1.11.5.0preview20140329214114');
define('ONEYE_VERSION','0.9.5preview');

// Include libraries
include_once(INSTALL_DIR . 'libraries.eyecode');
lang_init();
check_init();

// Include section
if (TYPE_UPDATE) {
	if (INSTALL_UPDATER) {
		include_once(INSTALL_DIR . 'modules/update.eyecode');
	} else {
		output_errors(array(lang_translate('installer-update-error-notactive','The updater part of this oneye package is disabled. Please remember to remove the installer files.')));
	}
} elseif (TYPE_SYSTEM) {
	if (INSTALL_SYSTEM) {
		include_once(INSTALL_DIR . 'modules/system.eyecode');
	} else {
		output_errors(array(lang_translate('installer-system-error-notactive','The system part of this oneye package is disabled. Please remember to remove the installer files.')));
	}
} else {
	if (TYPE_INSTALL && INSTALL_INSTALLER) {
		include_once(INSTALL_DIR . 'modules/install.eyecode');
	} else {
		output_errors(array(lang_translate('installer-install-error-notactive','The installer part of this oneye package is disabled. Please remember to remove the installer files.')));
	}
}
?>