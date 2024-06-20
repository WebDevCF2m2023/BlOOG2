<?php
/*
CREATE TABLE IF NOT EXISTS `bloog`.`user` (
  `user_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_login` VARCHAR(60) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_bin' NOT NULL COMMENT 'case sensitive',
  `user_password` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_bin' NOT NULL COMMENT 'case sensitive',
  `user_full_name` VARCHAR(160) NULL,
  `user_mail` VARCHAR(180) NOT NULL,
  `user_status` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '0 pas actif\n1 actif\n2 banni',
  `user_secret_key` VARCHAR(80) NOT NULL,
  `permission_permission_id` INT UNSIGNED NOT NULL,
*/

namespace model\Mapping;

use model\Abstract\AbstractMapping;

class UserMapping extends AbstractMapping
{
    protected ?int $user_id;
    protected string $user_login;
    protected string $user_password;
    protected ?string $user_full_name;
    protected string $user_mail;
    protected ?int $user_status;
    protected string $user_secret_key;
    protected ?int $permission_permission_id;

    //getters
    public function getUserId():?int{
        return $this->user_id;
    }
    public function getUserLogin():string{
        return $this->user_login;
    }
    public function getUserPassword():string{
        return $this->user_password;
    }
    public function getUserFullName():?string{
        return $this->user_full_name;
    }
    public function getUserMail():string{
        return $this->user_mail;
    }
    public function getUserStatus():?int{
        return $this->user_status;
    }
    public function getUserSecretKey():string{
        return $this->user_secret_key;
    }
    public function getPermissionPermissionId():?int{
        return $this->permission_permission_id;
    }
    //setters
    public function setUserId(int $user_id){
        if ($user_id < 0)throw new \Exception("ID non valide");
        $this->user_id = $user_id;
    }
    public function setUserLogin(string $user_login){
        $this->user_login = htmlspecialchars(trim(strip_tags($user_login)),ENT_QUOTES);
    }
    public function setUserPassword(string $user_password){
        $this->user_password = htmlspecialchars(trim(strip_tags($user_password)),ENT_QUOTES);
    }
    public function setUserFullName(string $user_full_name){
        $this->user_full_name = htmlspecialchars(trim(strip_tags($user_full_name)),ENT_QUOTES);
    }
    public function setUserMail(string $user_mail){
        $this->user_mail = htmlspecialchars(trim(strip_tags($user_mail)),ENT_QUOTES);
    }
    public function setUserStatus(int $user_status){
        $this->user_status = $user_status;
    }
    public function setUserSecret_key(string $user_secret_key){
        $this->user_secret_key = htmlspecialchars(trim(strip_tags($user_secret_key)),ENT_QUOTES);
    }
    public function setPermissionPermissionId(int $permission_permission_id){
        $this->permission_permission_id = $permission_permission_id;
    }

    public function __toString(): string
    {
        return "Cette instance est créée par ".self::class;
    }

}