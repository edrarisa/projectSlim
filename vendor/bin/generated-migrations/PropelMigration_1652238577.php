<?php
use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1652238577.
 * Generated on 2022-05-11 05:09:37  
 */
class PropelMigration_1652238577 
{
    public $comment = '';

    public function preUp(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postUp(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    public function preDown(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postDown(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        $connection_default = <<< 'EOT'

# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `author`;

DROP TABLE IF EXISTS `book`;

DROP TABLE IF EXISTS `publisher`;

CREATE TABLE `users`
(
    `idregistro` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `ciudad` VARCHAR(50) NOT NULL,
    `departamento` VARCHAR(50) NOT NULL,
    `asunto` VARCHAR(100) NOT NULL,
    `mensaje` VARCHAR(300) NOT NULL,
    PRIMARY KEY (`idregistro`)
) ENGINE=InnoDB;

CREATE TABLE `ciudades`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `ciudad` VARCHAR(30) NOT NULL,
    `iddpto` INTEGER NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `departamentos`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `departamento` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
EOT;

        return array(
            'default' => $connection_default,
        );
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        $connection_default = <<< 'EOT'

# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `users`;

DROP TABLE IF EXISTS `ciudades`;

DROP TABLE IF EXISTS `departamentos`;

CREATE TABLE `author`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(128) NOT NULL,
    `last_name` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `book`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `isbn` VARCHAR(24) NOT NULL,
    `publisher_id` INTEGER NOT NULL,
    `author_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `book_fi_35872e` (`publisher_id`),
    INDEX `book_fi_ea464c` (`author_id`),
    CONSTRAINT `book_fk_35872e`
        FOREIGN KEY (`publisher_id`)
        REFERENCES `publisher` (`id`),
    CONSTRAINT `book_fk_ea464c`
        FOREIGN KEY (`author_id`)
        REFERENCES `author` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `publisher`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
EOT;

        return array(
            'default' => $connection_default,
        );
    }

}