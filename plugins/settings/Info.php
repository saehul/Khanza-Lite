<?php

return [
    'name'          =>  'Pengaturan',
    'description'   =>  'Pengaturan umum Khanza LITE.',
    'author'        =>  'Basoro',
    'version'       =>  '1.0',
    'compatibility' =>  '3.*',
    'icon'          =>  'wrench',

    'install'       =>  function () use ($core) {
        $core->db()->pdo()->exec("CREATE TABLE IF NOT EXISTS `lite_options` (
            `id` int(10) NOT NULL,
            `module` varchar(50) NOT NULL,
            `field` varchar(250) NOT NULL,
            `value` varchar(250) DEFAULT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

        $core->db()->pdo()->exec('ALTER TABLE `lite_options`
            ADD PRIMARY KEY (`id`);');

        $core->db()->pdo()->exec('ALTER TABLE `lite_options`
            MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;');

        $core->db()->pdo()->exec("INSERT INTO `lite_options` (`module`, `field`, `value`) VALUES ('settings', 'version', '3.0')");
        $core->db()->pdo()->exec("INSERT INTO `lite_options` (`module`, `field`, `value`) VALUES ('settings', 'homepage', 'dashboard')");
        $core->db()->pdo()->exec("INSERT INTO `lite_options` (`module`, `field`, `value`) VALUES ('settings', 'BpjsApiUrl', 'https://new-api.bpjs-kesehatan.go.id:8080/new-vclaim-rest/')");
        $core->db()->pdo()->exec("INSERT INTO `lite_options` (`module`, `field`, `value`) VALUES ('settings', 'BpjsConsID', '')");
        $core->db()->pdo()->exec("INSERT INTO `lite_options` (`module`, `field`, `value`) VALUES ('settings', 'BpjsSecretKey', '')");

    }

];
